<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->CI =& get_instance();
		$this->load->model("general_model");
		$this->load->model("master_model");
		$this->load->model("crud_model");
	}

	public function index()
	{				
		$data['breadcump'] 		= "Config Start Point";
		$data['title_page']		= "Config Start Point";
		$data['content_view']	= "config/start_point";
		$data['location'] 		= $this->general_model->getStartPoint();
		$this->load->view('layout_admin/index',$data);	
	}

	public function saveStartPoint()
	{
		$lon = $this->input->post('lon');
		$lat = $this->input->post('lat');

		$update = $this->general_model->updateStartPoint($lon,$lat);
		$data = array(
			'lon' => $lon,
			'lat' => $lat,
		);

		$ret = array (
			'status' => TRUE,
			'pesan'  => "Update Data Berhasil",
			'data'   => $data
		);
	

		echo  json_encode($ret);
	}	
}
