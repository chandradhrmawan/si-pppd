<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran extends CI_Controller {

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
		$data['breadcump'] 			    = "Data Surat Pelanggaran";
		$data['title_page']			    = "Data Surat Pelanggaran";
		$data['content_view']		    = "transaksi/list_pelanggaran";
		$data['data_user']			    = $this->transaksi_model->getUsers();
		$data['data_user_json']		    = json_encode($data['data_user']);
        $data['data_pelanggaran'] 		= $this->transaksi_model->getDataPelanggaran();
        $data['data_kegiatan'] 		    = $this->transaksi_model->getDataKegiatan();
		$data['data_pelanggaran_json']	= json_encode($data['data_pelanggaran']);
		$this->load->view('layout_admin/index',$data);	
	}

    public function form_add()
    {
        $data['breadcump'] 			    = "Form Pelanggaran";
		$data['title_page']			    = "Form Pelanggaran";
		$data['content_view']		    = "transaksi/form_pelanggaran";
		$data['data_user']			    = $this->transaksi_model->getUsers();
		$data['data_user_json']		    = json_encode($data['data_user']);
		$data['data_pelanggaran'] 		= $this->transaksi_model->getDataPelanggaran();
        $data['data_pelanggaran_json']	= json_encode($data['data_pelanggaran']);
        $data['data_kegiatan'] 		    = $this->transaksi_model->getDataKegiatan();
		$data['ref_pelanggaran']	    = $this->transaksi_model->getRefPelanggaran();
		$data['ref_tindakan']	    	= $this->transaksi_model->getRefTindakan();
		$this->load->view('layout_admin/index',$data);	
    }

    public function form_edit($id_pelanggaran)
    {
        $data['breadcump'] 			= "Form Pelanggaran";
		$data['title_page']			= "Form Pelanggaran";
		$data['content_view']		= "transaksi/form_pelanggaran_edit";
        $data['data_kegiatan'] 		= $this->transaksi_model->getDataKegiatan();
        $data['data_pelanggaran'] 	= $this->transaksi_model->findDataPelanggaran($id_pelanggaran);
		$data['ref_pelanggaran']	= $this->transaksi_model->getRefPelanggaran();
		$data['ref_tindakan']	   	= $this->transaksi_model->getRefTindakan();
        $this->load->view('layout_admin/index',$data);	
    }

	public function find($id)
	{
		$data = $this->transaksi_model->findDataPelanggaran($id);
		$data->users = $this->_getUsersInId(json_decode($data->id_user));
		echo json_encode($data);
	}

	public function save()
	{
		$result = $this->transaksi_model->saveDataPelanggaran($this->input->post());
		echo json_encode(array('status' => $result));
	}

	public function update($id_pelanggaran)
	{
		$result = $this->transaksi_model->updateDataPelanggaran($id_pelanggaran,$this->input->post());
		echo json_encode(array('status' => $result));
	}

	public function delete()
	{
		$result = $this->transaksi_model->deleteDataPelanggaran($this->input->post());
		echo json_encode(array('status' => $result));
	}
	
	public function _getUsersInId($arrIn)
	{
		$result = $this->transaksi_model->getUserInId($arrIn);
		return $result; 
	}

}
