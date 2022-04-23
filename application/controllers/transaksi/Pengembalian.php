<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

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
		$data['breadcump'] 		   = "Pengembalian";
		$data['title_page']		   = "Pengembalian";
		$data['content_view']	   = "transaksi/list_pengembalian";
		$data['data_pengembalian'] = $this->transaksi_model->getDataPengembalian($this->session->userdata('id_user'));
		$data['data_sewa'] 		   = $this->transaksi_model->getDataSewaByIdSupir($this->session->userdata('id_user'));
		$data['data_supir']  	   = $this->master_model->getAllSupir();
		$this->load->view('layout_admin/index',$data);	
	}

	public function doSavePengembalian()
	{

		$dataSewa = $this->transaksi_model->getDetailSewaByIdSewa($this->input->post('id_sewa'));
		$km_old   = !empty($dataSewa->km_akhir) ? (int)$dataSewa->km_akhir : 0;	

		$postData = array('id_sewa'      => $this->input->post('id_sewa'),
					  'total_biaya' 	 => $this->input->post('total_biaya'),
					  'lampiran' 		 => $this->input->post('lampiran'),
					  'km_selesai'  	 => $km_old,
					  'id_supir' 		 => $this->input->post('id_supir'),
					  'tgl_pengembalian' => date('Y-m-d h:i:s'),
					  'status' 			 => 1,
					  'lampiran' 		 => $this->_uploadImage(date('dmYhis'))
		);

		$upData = array('id_sewa' 		 => $this->input->post('id_sewa'),
					  'total_biaya' 	 => $this->input->post('total_biaya'),
					  'lampiran' 		 => $this->input->post('lampiran'),
					  'km_selesai_post'  => $this->input->post('km_selesai'),
					  'km_selesai'  	 => $km_old,
					  'id_supir' 		 => $this->input->post('id_supir'),
					  'tgl_pengembalian' => date('Y-m-d h:i:s'),
					  'status' 			 => 1,
					  'lampiran' 		 => $this->_uploadImage(date('dmYhis'))
		);

		$insert = $this->transaksi_model->savePengembalian($postData);
		$update = $this->transaksi_model->updatePengembalian($upData);

		if($insert && $update){
				$ret = array (
					'status' => TRUE,
					'message'   => 'Insert Or Update Success'
				);
			}else{
				$ret = array (
					'status' => FALSE,
					'message'   => 'Insert Or Update Failed'
				);
			}

			echo json_encode($ret);
	}


	public function _uploadImage($name)
    {
    	if (!empty($_FILES["bukti"]["name"])) {

	        $config['upload_path']          = './uploads/pengembalian';
	        $config['file_name']            = $name;
		    $config['overwrite']			= true;
	        $config['allowed_types']  		= '*';
		    $config['max_size']             = 100024; // 100MB

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('bukti'))
	        {
	            $error = array('error' => $this->upload->display_errors());
	            return $this->upload->display_errors();
	        }
	        else
	        {
	            $data = array('upload_data' => $this->upload->data());
	            return $data['upload_data']['file_name'];
	        }
	    }else{
	    	return null;
	    }
    }

    public function file($id_sewa)
	{
		$data['data_sewa']			= $this->transaksi_model->getDetailSewaByIdSewa($id_sewa);
		$data['data_pengembalian'] 	= $this->transaksi_model->getDataPengembalianByIdSewa($id_sewa);
		$this->load->view('transaksi/surat_perjalaan',$data);	
	}

	public function updatePengembalianStatus()
	{	
		$id_pengembalian = $this->input->post('id_pengembalian');
		$data = array(
			'status' => $this->input->post('status_proses')
		);
		$this->transaksi_model->updatePengembalianStatus($id_pengembalian,$data);
		echo json_encode(array('status' => true));
	}

}
