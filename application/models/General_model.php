<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class General_model extends CI_Model {

	public function get_web_setting()
	{	
		$this->db->select("*");
		$this->db->from("m_web_setting");
		return $this->db->get()->row();
	}

	public function get_banner()
	{
		$this->db->select("*");
		$this->db->from("m_banner");
		return $this->db->get()->result();	
	}

	public function get_menu($stat,$role)
	{
		$this->db->select("*");
		$this->db->from("mst_menu");
		$this->db->like('role',$role);
		$this->db->where("status",$stat);
		return $this->db->get()->result();
	}

	public function get_detail_menu($id_menu,$role)
	{
		$this->db->select("*");
		$this->db->from("mst_detail_menu");
		$this->db->like('role',$role);
		$this->db->where("id_menu",$id_menu);
		return $this->db->get()->result();
	}

	public function get_all_kategori()
	{
		$this->db->select("*");
		$this->db->from("m_kategori");
		return $this->db->get()->result();	
	}

	public function get_all_mhs()
	{
		$this->db->select("*");
		$this->db->from("m_mahasiswa");
		$this->db->where("id_mahasiswa not in (select id_mahasiswa from m_data)");
		return $this->db->get()->result();
	}

	public function get_kolom_table($table)
	{
		return $this->db->query("SELECT COLUMN_NAME as kolom FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$table'")->result();
	}

	public function get_nilai()
	{
		return $this->db->query("select a.id, b.nama_kriteria, c.nama_pembentuk, a.min, a.max 
						from m_nilai a
						LEFT JOIN kriteria b ON b.id_kriteria = a.id_kriteria
						LEFT JOIN m_pembentuk c on c.id_pembentuk = a.nama")->result();
	}

	public function get_kriteria()
	{
		$this->db->select("*");
		$this->db->from("kriteria");
		return $this->db->get()->result();	
	}

	public function cek_data($table)
	{
		$this->db->from($table);
		$ret = $this->db->get()->num_rows();
		return $ret;
	}

	public function insert_normalisasi($data)
	{
		$this->db->insert('normalisasi', $data);
	}

	public function get_data_normalisasi()
	{
		$this->db->from('normalisasi');
		return $this->db->get()->result();
	}

	public function insert_decision_matrix($data)
	{
		$this->db->insert('decision_matrix', $data);
	}

	public function get_decision_matrix()
	{
		$this->db->from('decision_matrix');
		return $this->db->get()->result();
	}

	public function insert_preferensi($data)
	{
		$this->db->insert('preferensi', $data);
	}

	public function get_preferensi()
	{
		$this->db->from('preferensi');
		return $this->db->get()->result();
	}

	public function get_ranking_preferensi()
	{
		$this->db->from('preferensi');
		$this->db->order_by('nilai desc');
		return $this->db->get()->result();
	}

	public function get_trans_data()
	{
		$data['decision_matrix'] = $this->db->get('decision_matrix')->num_rows();
		$data['normalisasi'] 	 = $this->db->get('normalisasi')->num_rows();
		$data['preferensi'] 	 = $this->db->get('preferensi')->num_rows();
		return $data;
	}

	public function delete_selected($data)
	{
		foreach ($data as $value) {
			$this->db->empty_table($value); 
		}
		return $this->db->affected_rows();
	}

	public function get_data_line()
	{
		$sql = $this->db->query("SELECT
					b.nama,
					a.penghasilan,
					a.listrik,
					a.air,
					a.telpon,
					a.pbb,
					a.kendaraan,
					a.pengeluaran,
					a.hutang
				FROM
					m_data a
				LEFT JOIN m_mahasiswa b ON b.id_mahasiswa = a.id_mahasiswa
				order by a.penghasilan desc");
		return $sql->result();
	}

	public function get_data_kriteria_by_id($id=null)
	{	
		if(empty($id)){
			$sql = 'penghasilan';
		}else{
			$sql = strtolower(get_kriteria($id));
		}

		switch ($sql) {
			case 'gaji orangtua':
				$sql = 'penghasilan';
			break;
			case 'pajak kendaraan':
				$sql = 'kendaraan';
			break;
			
		}

		$query = $this->db->query("SELECT
									b.nama as name,
									a.$sql as y
								FROM
									m_data a
								LEFT JOIN m_mahasiswa b ON b.id_mahasiswa = a.id_mahasiswa
								order by y desc")->result();

		return $query;
	}

	public function get_jumlah_data()
	{
		$data['kriteria'] 	= $this->db->get('kriteria')->num_rows();
		$data['data'] 	 	= $this->db->get('m_data')->num_rows();
		$data['mahasiswa'] 	= $this->db->get('m_mahasiswa')->num_rows();
		$data['bobot'] 	 	= $this->db->get('m_pembentuk')->num_rows();
		return $data;
	}

	public function get_detail_nilai($id)
	{
		$this->db->from('m_nilai');
		$this->db->where('id_kriteria',$id);
		return $this->db->get()->result();
	}

	public function update_nilai($id,$value,$cat)
	{
		if($cat=='min'){
			$this->db->query("UPDATE m_nilai SET min = '$value' where id = '$id'");
		}else{
			$this->db->query("UPDATE m_nilai SET max = '$value' where id = '$id'");
		}

		return $this->db->affected_rows();
	}

	public function doLogin($username,$password)
	{
		$this->db->select("*");
		$this->db->from("mst_users");
		$this->db->where("username",$username);
		$this->db->where("password",$password);
		return $this->db->get()->row_array();
	}

	public function getStartPoint()
	{
		$this->db->select("*");
		$this->db->from("mst_start_point");
		return $this->db->get()->row_array();
	}

	public function updateStartPoint($lon,$lat)
	{
		$this->db->query("UPDATE mst_start_point set lon = '$lon', lat = '$lat'  where id_loc = 1");
		return $this->db->affected_rows();
	}

	
}
