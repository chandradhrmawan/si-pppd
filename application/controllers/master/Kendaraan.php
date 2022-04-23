<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

	//param for model
	var $table = 'mst_kendaraan';
	var $pk    = 'id_kendaraan';
	var $field = array('id_kendaraan','id_jenis','id_merk','id_tipe','no_plat','no_mesin','status','judul','deskripsi','model','transmisi','tenaga',
		'km_akhir','path','daya_angkut','kapasitas_bbm','bahan_bakar');

	//param for view
	var $view_list = array('No','Jenis','merk','Tipe','No Polisi','No Mesin','Status','Judul','Model','Transmisi','Tenaga','Km Akhir','Foto','Aksi');

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
		$data['breadcump'] 		= "Kendaraan";
		$data['title_page']		= "Kendaraan";
		$data['content_view']	= "kendaraan/index";
		$data['merk'] 			= $this->master_model->getAll('mst_merk');
		$data['tipe'] 			= $this->master_model->getAll('mst_tipe');
		$data['jenis'] 			= $this->master_model->getAll('mst_jenis');
		$data['view_list']		= $this->view_list;
		$this->load->view('layout_admin/index',$data);	
	}

	public function list_data()
	{
		$list = $this->crud_model->get_datatables($this->table,$this->pk,$this->field);
		$data = array();
		$no = $_POST['start'];
		$field = $this->field;
		array_shift($field);

		foreach ($list as $regulasi) {
			$no++;
			$row = array();

			$row[] = $no;
			
			foreach ($field as $fields){

				if($fields == 'id_jenis'){
					$row[] = getMasterData('nm_jenis','mst_jenis','id_jenis',$regulasi->$fields);
				}elseif($fields == 'id_merk'){
					$row[] = getMasterData('nm_merk','mst_merk','id_merk',$regulasi->$fields);
				}elseif($fields == 'id_tipe'){
					$row[] = getMasterData('nm_tipe','mst_tipe','id_tipe',$regulasi->$fields);
				}elseif($fields == 'deskripsi'||$fields == 'daya_angkut'||$fields =='kapasitas_bbm'||$fields == 'bahan_bakar' ){
					continue;
				}elseif($fields == 'status'){

					/*if($regulasi->$fields == 1){
                        $row[] = '<span class="label label-warning">Menunggu Persetujuan Atasan</span>';
                    }elseif($regulasi->$fields == 2){
                        $row[] = '<span class="label label-success">Sudah Disetujui Atasan</span>';
                    }elseif($regulasi->$fields == 3){
                        $row[] = '<span class="label label-info">Dalam Proses Peminjaman</span>';
                    }elseif($regulasi->$fields == 4){
                        $row[] = '<span class="label label-default">Peminjaman Selesai</span>';
                    }elseif($regulasi->$fields == 5){
                        $row[] = '<span class="label label-danger">Permohonan Ditolak</span>';
                    }elseif($regulasi->$fields == 0){
                        $row[] = '<span class="label label-info">Tersedia</span>';
                    } */

                    if($regulasi->$fields == 1){
                        $row[] = '<span class="label label-success">Tersedia</span>';
                    }else{
                        $row[] = '<span class="label label-info">Tidak Tersedia</span>';
                    } 


				}elseif($fields == 'path'){

					if(!empty($regulasi->$fields)){
						$img = "<img src='".base_url()."uploads/kendaraan/".$regulasi->$fields."' width='100' height='100'>";
					}else{
						$img = "<img src='".base_url()."assets/img/no_img.png' width='100' height='100'>";
					}

					$row[] = $img;

				}else{
					$row[] = $regulasi->$fields;	
				}

			}

			$row[] = '<a  href="#" title="Edit" onclick="edit_data('."'".$regulasi->id_kendaraan."'".')" >
						<i class="fa fa-pencil"></i> Edit
					  </a> &nbsp; |		 
					  <a class="delete" href="#" title="Delete" onclick="delete_data('."'".$regulasi->id_kendaraan."'".','."'".$regulasi->path."'".')" >
					  <i class="fa fa-trash"></i> Delete
					  </a>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->crud_model->count_all($this->table),
			"recordsFiltered" => $this->crud_model->count_filtered($this->table,$this->pk,$this->field),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function ajax_add()	
	{
		$field = $this->field;
		array_shift($field);

		if ($this->input->post($field[0]) == '') {
			echo json_encode(array("status" => "error"));
		} else {

			foreach($field as $fields):

				if($fields == 'path'){
					if (!empty($_FILES["image"]["name"])) {
					    $data[$fields] = $this->_uploadImage(date('dmYhis'));
					} else {
					    $data[$fields] = $this->input->post($fields);
					}
				}else{
					$data[$fields] = $this->input->post($fields);
				}

			endforeach;
			$data['km_akhir'] = 0;

			$insert = $this->crud_model->save($this->table,$data);
			if($insert!=0){
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
		
	}

	public function ajax_get_data_by_id($id)
	{
		$data = $this->crud_model->get_by_id($this->table,$this->pk,$id);
		echo json_encode($data);
	}

	public function ajax_update()
	{
		$field = $this->field;
		$id    = $this->pk;
		array_shift($field);
		
		foreach($field as $fields):

			if($fields == 'path'){
				if (!empty($_FILES["image"]["name"])) {
					$this->_deleteFile($this->input->post($fields));
				    $data[$fields] = $this->_uploadImage(date('dmYhis'));
				} else {
				    $data[$fields] = $this->input->post($fields);
				}
			}else{
				$data[$fields] = $this->input->post($fields);
			}

		endforeach;

		$update =  $this->crud_model->update($this->table,$this->pk,$this->input->post('id_kendaraan'),$data);

		if($update!=0){
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

	public function delete_via_ajax()
	{
		$id = $this->input->post('id');
		$this->_deleteFile($this->input->post('path'));
		$delete = $this->crud_model->delete($this->table,$this->pk,$id);
		echo  ($delete!=0) ? json_encode(array("status" => TRUE)) : json_encode(array("status" => FALSE));	
	}

	public function _uploadImage($name)
    {
        $config['upload_path']          = './uploads/kendaraan';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $name;
	    $config['overwrite']			= true;
	    $config['max_size']             = 10024; // 10MB

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            return null;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            return $data['upload_data']['file_name'];
        }
    }

    public function _deleteFile($file_name)
    {	
    	if(!empty($file_name)){
	    	$path_to_file = './uploads/kendaraan/'.$file_name;
	    	if(file_exists($path_to_file)){
				unlink($path_to_file);
	    	}else{
	    		return null;
	    	}
    	}else{
    		return null;
    	}

		
    }
}
