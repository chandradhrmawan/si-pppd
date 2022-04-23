<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

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
		$data['breadcump'] 			= "Monitoring Kendaraan";
		$data['title_page']			= "Monitoring Kendaraan";
		$data['content_view']		= "transaksi/monitoring";
		$data['location'] 			= $this->general_model->getStartPoint();
		$data['data_supir'] 		= json_encode($this->transaksi_model->getLocSupir());
		$data['list_data_supir'] 	= $this->transaksi_model->getLocSupir();
		$this->load->view('layout_admin/index',$data);	
	}

	public function loadData()
	{
		$data['location'] 			= $this->general_model->getStartPoint();
		$data['data_supir'] 		= json_encode($this->transaksi_model->getLocSupir());
		echo json_encode($data);
	}

	public function loadMap()
	{
		$data['location'] 			= $this->general_model->getStartPoint();
		$data['data_supir'] 		= json_encode($this->transaksi_model->getLocSupir());
		$this->load->view('transaksi/map',$data);	
	}

	public function updateLoc($id_user)
	{	
		$data = array(
			'lon' => $this->input->post('lon'),
			'lat' => $this->input->post('lat')
		);
		$resp = $this->transaksi_model->updateLoc($id_user,$data);
		echo json_encode(array('status' => true));
	}

}
