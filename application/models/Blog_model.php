<?php
/*
crud & datatable model
send param from controler
$table, $pk, $field
*/
class Blog_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function get_post($id_blog)
	{
		$this->db->select("a.id_blog,a.create_date, b.nama_kategori, a.judul, a.konten, a.hit,a.id_kategori");
		$this->db->from("blog a");
		$this->db->join("m_kategori b","b.id_kategori = a.id_kategori","inner");
		$this->db->where("id_blog",$id_blog);
		return $this->db->get()->row();
	}

	public function get_all_post()
	{
		$this->db->select("a.id_blog,a.create_date, b.nama_kategori, a.judul, a.konten, a.hit,a.id_kategori");
		$this->db->from("blog a");
		$this->db->join("m_kategori b","b.id_kategori = a.id_kategori","inner");
		return $this->db->get()->result();
	}

}
?>