<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_model extends CI_Model {

	public function getAll($table)
	{	
		$this->db->select("*");
		$this->db->from($table);
		return $this->db->get()->result();
	}

	public function jmlData($table)
	{
		$this->db->select("*");
		$this->db->from($table);
		return $this->db->get()->num_rows();
	}

	public function TotalService()
	{
		$this->db->select("sum(total) as total");
		$this->db->from('tx_hdr_service');
		return $this->db->get()->row();
	}

	public function getAllSupir()
	{

		$q1 = $this->db->query("select id_user from tx_sewa where status_sewa not in(4,5,6)")->result_array();
		$dataUser = [];
		foreach ($q1 as $key => $value) {
			$dataUser[$key] = $value['id_user'];
		}
		$this->db->select("*");
		$this->db->from("mst_users");
		$this->db->where("id_role",4);

		if(!isset($dataUser)){
			$this->db->where_not_in('id_user', array_unique($dataUser));
		}
		return $this->db->get()->result();
	}

	public function getModelKendaraan()
	{
		$sql = "SELECT DISTINCT(model) as model from mst_kendaraan";
		return $this->db->query($sql)->result();
	}

	public function getTahunTransaksi()
	{
		$sql = "SELECT DISTINCT(YEAR(tgl_sewa)) as tahun from tx_sewa";
		return $this->db->query($sql)->result();
	}
	
}
