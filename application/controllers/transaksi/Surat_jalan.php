<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_jalan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->CI =& get_instance();
		$this->load->model("general_model");
		$this->load->model("master_model");
		$this->load->model("transaksi_model");
		$this->load->model("crud_model");
	}

	public function index()
	{				
		$data['breadcump'] 		= "Cetak Surat Jalan";
		$data['title_page']		= "Cetak Surat Jalan";
		$data['content_view']	= "transaksi/list_cetak_surat";
		$data['data_pemesanan'] = $this->transaksi_model->getAllRiwayatSewaByIdSupir($this->session->userdata('id_user'));
		$data['data_supir']  	= $this->master_model->getAllSupir();
		$this->load->view('layout_admin/index',$data);	
	}

	public function pesan($id_kendaraan)
	{
		$data['breadcump'] 		  = "Form Pesan Kendaraan";
		$data['title_page']		  = "Form Pesan Kendaraan";
		$data['content_view']	  = "transaksi/form_pesan_kendaraan";
		$data['detail_kendaraan'] = $this->transaksi_model->getDetailByIdkendaraan($id_kendaraan);
		$this->load->view('layout_admin/index',$data);	
	}

	public function file($id_sewa)
	{
		$data['breadcump'] 		  = "Form Pesan Kendaraan";
		$data['title_page']		  = "Form Pesan Kendaraan";
		$data['data_sewa']	      = $this->transaksi_model->getDetailSewaByIdSewa($id_sewa);
		
		$this->load->view('transaksi/file',$data);	
	}

	public function updateStatusJalan()
	{
		$id_sewa = $this->input->post('id_sewa');
		$status  = $this->input->post('status');

		$data = array(
			'status_perjalanan' => $status,
			'lon_kordinat' 		=> $this->input->post('lon'),
			'lat_kordinat' 		=> $this->input->post('lat'),
			'last_update' 		=> date('Y-m-d h:i:s')
		);

		$update = $this->transaksi_model->updateKordinat($id_sewa,$data);

		echo json_encode(array('status' => TRUE));

	}

	public function updateRealTime()
	{
		$id_sewa = $this->input->post('id_sewa');
		
		$data = array(
			'lon_kordinat' 		=> $this->input->post('lon'),
			'lat_kordinat' 		=> $this->input->post('lat'),
			'last_update' 		=> date('Y-m-d h:i:s')
		);

		$update = $this->transaksi_model->updateKordinat($id_sewa,$data);

		echo json_encode(array('status' => TRUE));

	}

}
