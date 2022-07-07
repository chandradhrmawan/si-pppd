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

	public function getTahunTransaksi()
	{
		$sql = "SELECT DISTINCT(YEAR(tanggal_pelanggaran)) as tahun from tx_pelanggaran";
		return $this->db->query($sql)->result();
	}
	
}
