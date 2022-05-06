<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

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
		$data['breadcump'] 			= "Data Surat Tugas";
		$data['title_page']			= "Data Surat Tugas";
		$data['content_view']		= "transaksi/list_tugas";
		$data['data_user']			= $this->transaksi_model->getUsers();
		$data['data_user_json']		= json_encode($data['data_user']);
		$data['data_tugas'] 		= $this->transaksi_model->getDataTugas();
		foreach ($data['data_tugas'] as $key => $value) {
			$data['data_tugas'][$key]->data_users = ($this->_getUsersInId(json_decode($value->id_user)));
		}
		$data['data_tugas_json']	= json_encode($data['data_tugas']);
		$this->load->view('layout_admin/index',$data);	
	}

	public function find($id)
	{
		$data = $this->transaksi_model->findDataTugas($id);
		$data->users = $this->_getUsersInId(json_decode($data->id_user));
		echo json_encode($data);
	}

	public function save()
	{
		
		$result = $this->transaksi_model->saveDataTugas($this->input->post());
		echo json_encode(array('status' => $result));
	}

	public function update()
	{
		$result = $this->transaksi_model->updateDataTugas($this->input->post());
		echo json_encode(array('status' => $result));
	}

	public function delete()
	{
		$result = $this->transaksi_model->deleteDataTugas($this->input->post());
		echo json_encode(array('status' => $result));
	}
	
	public function _getUsersInId($arrIn)
	{
		$result = $this->transaksi_model->getUserInId($arrIn);
		return $result; 
	}

	public function cetakSurat($id)
	{
		$data['dasar'] = $this->transaksi_model->findDataTugas($id);
		$data['dasar']->users = $this->_getUsersInId(json_decode($data['dasar']->id_user));
		$this->load->view('surat/tugas',$data);
	}

}
