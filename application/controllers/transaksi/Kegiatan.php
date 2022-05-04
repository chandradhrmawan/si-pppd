<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

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
		$data['breadcump'] 			= "Data Kegiatan";
		$data['title_page']			= "Data Kegiatan";
		$data['content_view']		= "transaksi/list_kegiatan";
		$data['data_user']			= $this->transaksi_model->getUsers();
		$data['data_user_json']		= json_encode($data['data_user']);
		$data['data_kegiatan'] 		= $this->transaksi_model->getDataKegiatan();
		$data['data_kegiatan_json']	= json_encode($data['data_kegiatan']);
		$data['data_tugas'] 		= $this->transaksi_model->getDataTugas();
		foreach ($data['data_tugas'] as $key => $value) {
			$data['data_tugas'][$key]->data_users = ($this->_getUsersInId(json_decode($value->id_user)));
		}
		$data['data_tugas_json']	= json_encode($data['data_tugas']);
		$this->load->view('layout_admin/index',$data);	
	}

	public function find($id)
	{
		$data = $this->transaksi_model->findDataKegiatan($id);
		echo json_encode($data);
	}

	public function save()
	{
		$is_upload = $this->do_upload();
		if($is_upload['status']){
			$postData = $this->input->post();
			$postData['keterangan'] = $is_upload['upload_data']['file_name'];
			$result = $this->transaksi_model->saveDataKegiatan($postData);
			echo json_encode(array(
				'status' => true
			));
		}else{
			$result = $this->transaksi_model->saveDataKegiatan($this->input->post());
			echo json_encode(array(
				'status' => true
			));
		}
	}

	public function update()
	{
		$is_upload = $this->do_upload();
		if($is_upload['status']){
			$postData = $this->input->post();
			$postData['keterangan'] = $is_upload['upload_data']['file_name'];
			$result = $this->transaksi_model->updateDataKegiatan($postData['id_kegiatan'],$postData);
			echo json_encode(array(
				'status' => true
			));
		}else{
			$result = $this->transaksi_model->updateDataKegiatan($this->input->post('id_kegiatan'),$this->input->post());
			echo json_encode(array(
				'status' => true
			));
		}
	}

	public function delete()
	{
		$result = $this->transaksi_model->deleteDataKegiatan($this->input->post());
		echo json_encode(array('status' => $result));
	}

	public function _getUsersInId($arrIn)
	{
		$result = $this->transaksi_model->getUserInId($arrIn);
		return $result; 
	}

	public function do_upload()
	{
			$config['upload_path']          = './uploads/kegiatan/';
			$config['allowed_types']        = 'gif|jpg|png';
			// $config['max_size']             = 100;
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('keterangan'))
			{
					return array(
						'status' => false,
						'error' => $this->upload->display_errors()
					);
			}
			else
			{
					return array(
						'status' => true,
						'upload_data' => $this->upload->data()
					);
			}
	}
	

}
