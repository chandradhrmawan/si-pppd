<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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

		if($this->session->has_userdata('id_user')){
			$this->isLogin();
		}else{
			$this->load->view('login/index');
		}
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

	public function isLogin()
	{
		
		$data['breadcump'] 		= "Dashboard";
		$data['title_page']		= "Dashboard";
		$data['content_view']	= "main/index";
		$this->load->view('layout_admin/index',$data);
	}

	public function doLogout()
	{
		session_destroy();
		$this->load->view('login/index');
	}
}
