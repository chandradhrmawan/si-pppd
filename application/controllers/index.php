<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->CI =& get_instance();
		$this->load->model("general_model");
		$this->load->model("master_model");
		$this->load->model("transaksi_model");
	}

	public function index()
	{				
		$data['breadcump'] 		= "Index";
		$data['title_page']		= "Index";
		$this->load->view('frontend/home',$data);	
	}

	public function list_kendaraan()
	{				
		$data['breadcump'] 		= "List Kendaraan";
		$data['title_page']		= "List Kendaraan";

		$limit = 10;
		$page  = isset($_GET['page']) ? $this->input->get('page') : 1 ;
		$start = ($page>1) ? ($page * $limit) - $limit : 0;
		$where = $this->input->get();

		$data['list_kendaraan']  = $this->transaksi_model->getAllKendaraan($start,$limit,$where);
		$data['total_kendaraan'] = count($data['list_kendaraan']);
		$data['page'] 			 = ceil($this->transaksi_model->countAllKendaraan() / $limit);
		
		$data['data_jenis'] 	= $this->master_model->getAll('mst_jenis');
		$data['data_merk'] 		= $this->master_model->getAll('mst_merk');
		$data['data_tipe'] 		= $this->master_model->getAll('mst_tipe');
		$this->load->view('frontend/grid_kendaraan',$data);	
	}

	public function form_pesan($id_kendaraan)
	{
		$data['breadcump'] 		= "Form Pesan";
		$data['title_page']		= "Form Pesan";
		$data['detail_kendaraan'] = $this->transaksi_model->getDetailByIdkendaraan($id_kendaraan);
		$data['location'] 		= $this->general_model->getStartPoint();
		$this->load->view('frontend/form_pesan',$data);	
	}

	public function riwayat_sewa()
	{	
		$data['breadcump'] 		= "Riwayat Pinjam";
		$data['title_page']		= "Riwayat Pinjam";
		$data['list_data'] 		= $this->transaksi_model->getRiwayatSewaByIduser($this->session->userdata('id_user'));
		$this->load->view('frontend/riwayat_sewa',$data);	

	}

	public function login()
	{
		if($this->session->has_userdata('id_user')){
			$this->index();
		}else{
			$this->load->view('frontend/login');
		}
	}

	public function doLogout()
	{
		session_destroy();
		redirect(base_url().'index', 'refresh');
	}

	public function doLogin()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$isValid = $this->general_model->doLogin($username,$password);

		if(isset($isValid)){
			$this->session->set_userdata($isValid);
			$ret = array(
		        'status' 	=> TRUE,
		        'message'   => 'Sukses',
		        'data'  	=> $isValid,
			);
		}else{
			$ret = array(
		        'status' 	=> FALSE,
		        'message'   => 'Username / Password Salah'
			);
		}
		echo json_encode($ret);
	}

	public function savePesanan()
	{
		$post = $this->input->post('data');
		$data = array('id_user' => $this->session->userdata('id_user'),
			'id_kendaraan' 		=> $post['id_kendaraan'],
			'tgl_sewa' 			=> date('Y/m/d H:i:s'),
			'no_hp' 			=> $post['no_hp'],
			'tgl_pinjam' 		=> formatDate($post['tgl_pesan']),
			'tgl_kembali' 		=> formatDate($post['tgl_kembali']),
			'tujuan_perjalanan' => $post['tujuan_perjalanan'],
			'lokasi_tujuan' 	=> $post['addr'],
			'lon' 				=> $post['lon'],
			'lat' 				=> $post['lat'],
			'jarak' 			=> $post['jarak'],
			'status_sewa' 		=> '1'
		);

		$insert = $this->transaksi_model->doSavePesanan($data);

		if($insert){
			$ret = array (
				'status' => TRUE,
				'data'   => $data
			);
		}else{
			$ret = array (
				'status' => FALSE,
				'data'   => $data
			);
		}

		echo  json_encode($ret);
	}

	public function getDetailSewaByIdSewa($id_sewa)
	{
		$data  				= $this->transaksi_model->getDetailSewaByIdSewa($id_sewa);
		$data->tgl_sewa 	= view_date_hi($data->tgl_sewa);
		$data->tgl_kembali  = view_date_hi($data->tgl_kembali);
		$data->tgl_pinjam   = view_date_hi($data->tgl_pinjam);
		$data->km_akhir     = (!empty($data->km_akhir)) ? (int) $data->km_akhir : 0;
		echo json_encode($data);
	}

	public function validatePesanUser($id_user)
	{
		$count = $this->transaksi_model->countSewa($id_user);
		echo json_encode($count);
	}

	public function cancelBooking()
	{
		$id_sewa  	= $this->input->post('id_sewa');
		$keterangan = $this->input->post('keterangan');
		$data  		= array('keterangan' => $keterangan);
		$this->transaksi_model->doCancelBooking($id_sewa,$data);
		echo json_encode(array('status' => true));
	}

	public function getNotifSewa()
	{
		$data = $this->model->getRiwayatSewaByIduserNotif($this->session->userdata('id_user'));
		return $data;
	}

	public function updateIsRead($id_sewa)
	{
		$this->transaksi_model->updateIsRead($id_sewa);
		echo json_encode(array('status' => true));
	}
}
