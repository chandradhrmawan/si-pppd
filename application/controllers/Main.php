<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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

		if($this->session->has_userdata('id_user')){
			$this->isLogin();
		}else{
			$this->load->view('login/index');
		}
	}

	public function isLogin()
	{
		if($this->session->userdata('id_role') == 1){
			$this->dashboard();
		}elseif($this->session->userdata('id_role') == 4){
			$this->dashboardSupir();
		}else{
			$this->dashboardUser();
		}
	}

	public function dashboard()
	{	
		$year  					 = date('Y');
		$data['breadcump'] 		 = "Dashboard";
		$data['title_page']		 = "Dashboard";
		$data['content_view']	 = "main/index";
		$data['tahun'] 			 = $this->master_model->getTahunTransaksi();
		$data['chart_data'] 	 = $this->gantiTahun($year);
		// debux($data['chart_data']);die;
		$data['jml_tugas'] 		 = $this->master_model->jmlData('tx_surat_tugas');
		$data['jml_kegiatan'] 	 = $this->master_model->jmlData('tx_kegiatan');
		$data['jml_pelanggaran'] = $this->master_model->jmlData('tx_pelanggaran');
		$this->load->view('layout_admin/index',$data);
	}

	public function dashboardUser()
	{
		$year  					= date('Y');
		$data['breadcump'] 		= "Dashboard";
		$data['title_page']		= "Dashboard";
		$data['content_view']	= "main/indexUser";
		$this->load->view('layout_admin/index',$data);
	}

	public function dashboardSupir()
	{
		$year  					= date('Y');
		$data['breadcump'] 		= "Dashboard";
		$data['title_page']		= "Dashboard";
		$data['content_view']	= "main/indexSupir";
		$data['no_plat'] 		= @$this->transaksi_model->getTugasSupirByIdSupir($this->session->userdata('id_user'))->no_plat;
		$this->load->view('layout_admin/index',$data);
	}

	public function gantiTahun($year)
	{
		$result = $this->transaksi_model->getBarChartData($year);
		foreach ($result as $key => $value) {
			$data['name'] = $key;
			$data['y'] 	= (int)$value;
			$row[] = $data;
		}
		return $row;
	}

	public function listData()
	{
		$year   = $this->input->post('tahun');
		$result = $this->gantiTahun($year);
		echo json_encode($result);
	}

	public function dataTahun()
	{
		$result = $this->transaksi_model->getChartKendaraan();
		$jml  	= 0;
		$row 	= [];
		foreach ($result as $key => $value) {
			$data['name'] = $value->tahun;
			$data['y'] 	= (int)$value->persen;
			$row[] = $data;
		}
		return $row;
	}

	public function dataJenis()
	{
		$result = $this->transaksi_model->getChartTipe();
		$jml  	= 0;
		$row 	= [];
		foreach ($result as $key => $value) {
			$data['name'] = $value->nm_tipe;
			$data['y'] 	= (int)$value->persen;
			$row[] = $data;
		}
		return $row;

	}


}
