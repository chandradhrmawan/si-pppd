<?php
/*
crud & datatable model
send param from controler
$table, $pk, $field
*/
class Crud_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function get_datatables($table,$pk,$field)
	{
		$this->_get_datatables_query($table,$pk,$field);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	private function _get_datatables_query($table,$pk,$field)
	{

		$this->db->select($field);
		$this->db->from($table);

		$i = 0;
	
		foreach ($field as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($pk))
		{
			$order = $pk;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function count_filtered($table,$pk,$field)
	{
		$this->_get_datatables_query($table,$pk,$field);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($table)
	{
		$this->db->from($table);
		return $this->db->count_all_results();
	}

	public function save($table,$data){
		$this->db->insert($table, $data);
		return $this->db->affected_rows();
	}
	

	public function update($table,$pk,$where, $data)
	{
		$this->db->where($pk, $where);
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}


	public function get_by_id($table,$pk,$id)
	{
		$this->db->from($table);
		$this->db->where($pk,$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function delete($table,$pk,$id)
	{
		$this->db->where($pk, $id);
		$this->db->delete($table);
		return $this->db->affected_rows(); 
	}

}
?>