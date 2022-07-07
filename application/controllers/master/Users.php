<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	//param for model
	var $table = 'mst_users';
	var $pk    = 'id_user';
	var $field = array('id_user','nama','username','nip','id_jabatan','status','id_role','alamat');

	//param for view
	var $view_list = array('No','Nama','Username','Nip','Jabatan','Status','Role','Alamat','Action');

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
		$data['breadcump'] 		= "Users";
		$data['title_page']		= "Users";
		$data['content_view']	= "users/index";
		$data['view_list']		= $this->view_list;
		$data['jabatan'] 		= $this->master_model->getAll('mst_jabatan');
		$data['role'] 			= $this->master_model->getAll('mst_role');
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

				if($fields == 'id_jabatan'){
					$row[] = getMasterData('nm_jabatan','mst_jabatan','id_jabatan',$regulasi->$fields);
				}elseif($fields == 'status') {
					$row[] = getStatusUser($regulasi->$fields);
				}elseif($fields == 'id_role') {
					$row[] = getMasterData('nm_role','mst_role','id_role',$regulasi->$fields);
				}else{
					$row[] = $regulasi->$fields;	
				}

			}

			$row[] = '<a  href="#" title="Edit" onclick="edit_data('."'".$regulasi->id_user."'".')" >
						<i class="fa fa-pencil"></i> Edit
					  </a> &nbsp; |		 
					  <a class="delete" href="#" title="Delete" onclick="delete_data('."'".$regulasi->id_user."'".')" >
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
		array_push($field, "password");

		if ($this->input->post($field[0]) == '') {
			echo json_encode(array("status" => "error"));
		} else {

			foreach($field as $fields):

				if($fields == 'password'){
					$data[$fields] = md5($this->input->post($fields));
				}else{
					$data[$fields] = $this->input->post($fields);
				}

			endforeach;

			$insert = $this->crud_model->save($this->table,$data);
			echo  ($insert!=0) ? json_encode(array("status" => TRUE)) : json_encode(array("status" => FALSE));
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
		
		if(!empty($this->input->post('password'))){
			array_push($field, "password");
		}

		foreach($field as $fields):
		if($fields == 'password'){
			$data[$fields] = md5($this->input->post($fields));
		}else{
			$data[$fields] = $this->input->post($fields);
		}
		endforeach;

		$update =  $this->crud_model->update($this->table,$this->pk,$this->input->post('id_user'),$data);

		echo  ($update!=0) ? json_encode(array("status" => TRUE)) : json_encode(array("status" => FALSE));
	}

	public function delete_via_ajax()
	{
		$id = $this->input->post('id');
		$delete = $this->crud_model->delete($this->table,$this->pk,$id);
		echo  ($delete!=0) ? json_encode(array("status" => TRUE)) : json_encode(array("status" => FALSE));	
	}


	
	
}
