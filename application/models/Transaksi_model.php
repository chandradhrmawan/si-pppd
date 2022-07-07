<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaksi_model extends CI_Model {

	public function getReportPelanggaran($where)
	{
		$this->db->select("a.id_pelanggaran,
		a.id_kegiatan,
		b.jenis_kegiatan,
		b.tanggal_kegiatan, 
		c.id_surat_tugas,
		c.nomor_surat_tugas, 
		a.no_ktp,
		a.nama,
		a.alamat,
		a.pendidikan,
		a.perkerjaan,
		a.status_kawin,
		a.jenis_pelanggaran,
		d.nm_pelanggaran,
		a.kd_tindakan,
		e.nm_tindakan,
		a.tanggal_pelanggaran,
		a.lokasi,
		a.waktu_rekam");
		$this->db->from("tx_pelanggaran a");
		$this->db->join("tx_kegiatan b","a.id_kegiatan = b.id_kegiatan");
		$this->db->join("tx_surat_tugas c","c.id_surat_tugas = b.id_surat_tugas");
		$this->db->join("mst_pelanggaran d","d.kd_pelanggaran = a.jenis_pelanggaran");
		$this->db->join("mst_tindakan e","e.kd_tindakan = a.kd_tindakan");
		if(!empty($where['tgl_awal']) && !empty($where['tgl_akhir'])){
			$this->db->where('a.tanggal_pelanggaran >= ', $where['tgl_awal']);
			$this->db->where('a.tanggal_pelanggaran <= ', $where['tgl_akhir']);	
		}
		$this->db->order_by("a.id_pelanggaran","desc");
		return $this->db->get()->result();
	}

	public function getReportKegiatan($where)
	{
		$this->db->select("a.id_kegiatan,
		DATE_FORMAT(a.tanggal_kegiatan,'%Y-%m-%d') AS tanggal_kegiatan ,
		a.id_surat_tugas,
		b.nomor_surat_tugas, 
		a.jenis_kegiatan,
		a.lokasi,
		a.tindak_lanjut,
		a.keterangan,
		a.waktu_simpan");
		$this->db->from("tx_kegiatan a");
		$this->db->join("tx_surat_tugas b","a.id_surat_tugas = b.id_surat_tugas");
		if(!empty($where['tgl_awal']) && !empty($where['tgl_akhir'])){
			$this->db->where('a.tanggal_kegiatan >= ', $where['tgl_awal']);
			$this->db->where('a.tanggal_kegiatan <= ', $where['tgl_akhir']);	
		}
		$this->db->order_by("a.id_kegiatan","desc");
		return $this->db->get()->result();
	}

	public function getReportUsers($where)
	{
		$this->db->select("*");
		$this->db->from("mst_users a");
		$this->db->join("mst_jabatan b","a.id_jabatan = b.id_jabatan");
		$this->db->join("mst_role c","c.id_role = a.id_role");
		
		if(!empty($where['id_jabatan'])){
			$this->db->where('a.id_jabatan', $where['id_jabatan']);	
		}
		if(!empty($where['id_role'])){
			$this->db->where('a.id_role', $where['id_role']);	
		}
		if(!empty($where['status'])){
			$this->db->where('a.status', $where['status']);	
		}
		$this->db->order_by("a.id_user","desc");
		return $this->db->get()->result();
	}

	public function getReportSupir($where)
	{
		$this->db->select("*");
		$this->db->from("mst_users a");
		$this->db->join("mst_jabatan b","a.id_jabatan = b.id_jabatan");
		$this->db->join("mst_role c","c.id_role = a.id_role");
		
		if(!empty($where['nip'])){
			$this->db->where('a.nip', $where['nip']);	
		}

		$this->db->where('a.id_role',4);	
		
		$this->db->order_by("a.id_user","desc");
		return $this->db->get()->result();
	}

	public function getBarChartData($year)
	{
		$sql = "SELECT 
			(SELECT COUNT(id_pelanggaran) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 1 AND YEAR(tanggal_pelanggaran) = '".$year."') as JANUARI,
			(SELECT COUNT(id_pelanggaran) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 2 AND YEAR(tanggal_pelanggaran) = '".$year."') as FEBRUARI,
			(SELECT COUNT(id_pelanggaran) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 3 AND YEAR(tanggal_pelanggaran) = '".$year."') as MARET,
			(SELECT COUNT(id_pelanggaran) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 4 AND YEAR(tanggal_pelanggaran) = '".$year."') as APRIL,
			(SELECT COUNT(id_pelanggaran) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 5 AND YEAR(tanggal_pelanggaran) = '".$year."') as MEI,
			(SELECT COUNT(id_pelanggaran) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 6 AND YEAR(tanggal_pelanggaran) = '".$year."') as JUNI,
			(SELECT COUNT(id_pelanggaran) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 7 AND YEAR(tanggal_pelanggaran) = '".$year."') as JULI,
			(SELECT COUNT(id_pelanggaran) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 8 AND YEAR(tanggal_pelanggaran) = '".$year."') as AGUSTUS,
			(SELECT COUNT(id_pelanggaran) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 9 AND YEAR(tanggal_pelanggaran) = '".$year."') as SEPTEMBER,
			(SELECT COUNT(id_pelanggaran) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 10 AND YEAR(tanggal_pelanggaran) = '".$year."') as OKTOBER,
			(SELECT COUNT(id_pelanggaran) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 11 AND YEAR(tanggal_pelanggaran) = '".$year."') as NOVEMBER,
			(SELECT COUNT(id_pelanggaran) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 12 AND YEAR(tanggal_pelanggaran) = '".$year."') as DESEMBER
		FROM
			DUAL";
		return $this->db->query($sql)->row();
	}

	public function getBarChartData2($year)
	{
		$sql = "SELECT
			a.kd_tindakan,
			a.nm_tindakan,
			(select count(*) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 1 AND YEAR(tanggal_pelanggaran) = '".$year."' and kd_tindakan = a.kd_tindakan) as JANUARI,
			(select count(*) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 2 AND YEAR(tanggal_pelanggaran) = '".$year."' and kd_tindakan = a.kd_tindakan) as FEBRUARI,
			(select count(*) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 3 AND YEAR(tanggal_pelanggaran) = '".$year."' and kd_tindakan = a.kd_tindakan) as MARET,
			(select count(*) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 4 AND YEAR(tanggal_pelanggaran) = '".$year."' and kd_tindakan = a.kd_tindakan) as APRIL,
			(select count(*) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 5 AND YEAR(tanggal_pelanggaran) = '".$year."' and kd_tindakan = a.kd_tindakan) as MEI,
			(select count(*) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 6 AND YEAR(tanggal_pelanggaran) = '".$year."' and kd_tindakan = a.kd_tindakan) as JUNI,
			(select count(*) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 7 AND YEAR(tanggal_pelanggaran) = '".$year."' and kd_tindakan = a.kd_tindakan) as JULI,
			(select count(*) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 8 AND YEAR(tanggal_pelanggaran) = '".$year."' and kd_tindakan = a.kd_tindakan) as AGUSTUS,
			(select count(*) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 9 AND YEAR(tanggal_pelanggaran) = '".$year."' and kd_tindakan = a.kd_tindakan) as SEPTEMBER,
			(select count(*) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 10 AND YEAR(tanggal_pelanggaran) = '".$year."' and kd_tindakan = a.kd_tindakan) as OKTOBER,
			(select count(*) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 11 AND YEAR(tanggal_pelanggaran) = '".$year."' and kd_tindakan = a.kd_tindakan) as NOVEMBER,
			(select count(*) from tx_pelanggaran where MONTH(tanggal_pelanggaran) = 12 AND YEAR(tanggal_pelanggaran) = '".$year."' and kd_tindakan = a.kd_tindakan) as DESEMBER
		from
			mst_tindakan a";
		return $this->db->query($sql)->result();
	}

	public function getReportJabatan($data)
	{
		$this->db->select("*");
		$this->db->from("mst_jabatan");
		if(!empty($data['nm_jabatan'])){
			$this->db->like('LOWER(nm_jabatan)', strtolower($data['nm_jabatan']));
		}
		return $this->db->get()->result();
	}

	public function getDataTugas($isActive="",$idUser="6")
	{
		$this->db->select("a.id_surat_tugas ,
		a.nomor_surat_tugas,
		a.dasar_kegiatan as dasar_kegiatan_full,
		CONCAT(SUBSTR(dasar_kegiatan, 1, 50),' ......') AS dasar_kegiatan,
		a.tujuan_kegiatan as tujuan_kegiatan_full,
		CONCAT(SUBSTR(tujuan_kegiatan, 1, 50),'......') AS tujuan_kegiatan,
		a.is_active ,
		a.waktu_rekam ,
		a.waktu_update ,
		a.id_user
		");
		$this->db->from("tx_surat_tugas a");
		if($idUser != "6"){
			$this->db->like("a.id_user",$idUser);
		}

		if($isActive != ""){
			$this->db->where("a.is_active",$isActive);
		}
		$this->db->order_by("a.waktu_rekam","desc");
		return $this->db->get()->result();
	}

	public function getReportTugas($where)
	{
		$this->db->select("a.id_surat_tugas ,
		a.nomor_surat_tugas,
		a.dasar_kegiatan as dasar_kegiatan_full,
		CONCAT(SUBSTR(dasar_kegiatan, 1, 50),' ......') AS dasar_kegiatan,
		a.tujuan_kegiatan as tujuan_kegiatan_full,
		CONCAT(SUBSTR(tujuan_kegiatan, 1, 50),'......') AS tujuan_kegiatan,
		a.is_active ,
		a.id_user,
		a.waktu_rekam ,
		a.waktu_update ,
		a.id_user
		");
		$this->db->from("tx_surat_tugas a");
		if(!empty($where['tgl_awal']) && !empty($where['tgl_akhir'])){
			$this->db->where('a.waktu_rekam >= ', $where['tgl_awal']);
			$this->db->where('a.waktu_rekam <= ', $where['tgl_akhir']);	
		}
		$this->db->order_by("a.waktu_rekam","desc");
		return $this->db->get()->result();
	}

	public function findDataTugas($id)
	{
		$this->db->select("a.id_surat_tugas ,
		a.nomor_surat_tugas,
		a.dasar_kegiatan ,
		a.tujuan_kegiatan ,
		a.is_active ,
		a.waktu_rekam ,
		a.waktu_update ,
		a.id_user");
		$this->db->from("tx_surat_tugas a");
		$this->db->order_by("a.waktu_rekam","desc");
		$this->db->where('a.id_surat_tugas', $id);	
		return $this->db->get()->row();
	}

	public function getUsers(){
		$this->db->select("a.id_user ,
		a.nama,
		a.username,
		a.nip ,
		a.status ,
		a.alamat ,
		b.nm_jabatan ,
		c.nm_role ");
		$this->db->from("mst_users a");
		$this->db->join("mst_jabatan b","a.id_jabatan = b.id_jabatan");
		$this->db->join("mst_role c","c.id_role = a.id_role");
		$this->db->order_by("a.id_user","desc");
		return $this->db->get()->result();
	}

	public function saveDataTugas($postData){
		$this->db->insert('tx_surat_tugas', $postData);
		return true;
	}

	public function updateDataTugas($postData)
	{	
		$dt = array(
			'nomor_surat_tugas'  => $postData['nomor_surat_tugas'],
	        'dasar_kegiatan'  => $postData['dasar_kegiatan'],
			'id_user'  => $postData['id_user'],
			'tujuan_kegiatan'  => $postData['tujuan_kegiatan'],
			'is_active'  => $postData['is_active'],
	        'waktu_update' =>date("Y-m-d H:i:s")
		);
		$this->db->where('id_surat_tugas', $postData['id_surat_tugas']);
		$this->db->update('tx_surat_tugas', $dt);
		return true;
	}

	public function deleteDataTugas($postData)
	{
		$this->db->where('id_surat_tugas', $postData['id_surat_tugas']);
		$this->db->delete('tx_surat_tugas');
		return true;
	}

	public function getUserInId($arr)
	{
		$this->db->select("a.id_user,
		a.nama,
		a.username,
		a.nip,
		a.id_jabatan,
		a.status,
		a.id_role,
		a.alamat,
		c.nm_role ,
		b.nm_jabatan ");
		$this->db->from("mst_users a");
		$this->db->join("mst_jabatan b","a.id_jabatan = b.id_jabatan");
		$this->db->join("mst_role c","c.id_role = a.id_role");
		$this->db->where_in('a.id_user',$arr);
		$this->db->order_by("a.id_user","desc");
		return $this->db->get()->result();
	}

	public function getDataKegiatan()
	{
		$this->db->select("a.id_kegiatan,
		DATE_FORMAT(a.tanggal_kegiatan,'%Y-%m-%d') AS tanggal_kegiatan ,
		a.id_surat_tugas,
		b.nomor_surat_tugas, 
		a.jenis_kegiatan,
		a.lokasi,
		a.tindak_lanjut,
		a.keterangan,
		a.waktu_simpan");
		$this->db->from("tx_kegiatan a");
		$this->db->join("tx_surat_tugas b","a.id_surat_tugas = b.id_surat_tugas");
		$this->db->order_by("a.id_kegiatan","desc");
		return $this->db->get()->result();
	}

	public function getDataPelanggaran()
	{	
		$this->db->select('
		a.id_pelanggaran,
		a.id_kegiatan,
		b.jenis_kegiatan,
		b.tanggal_kegiatan, 
		c.id_surat_tugas,
		c.nomor_surat_tugas, 
		a.no_ktp,
		a.nama,
		a.alamat,
		a.pendidikan,
		a.perkerjaan,
		a.status_kawin,
		a.jenis_pelanggaran,
		d.nm_pelanggaran,
		a.kd_tindakan,
		e.nm_tindakan,
		a.tanggal_pelanggaran,
		a.lokasi,
		a.waktu_rekam');
		$this->db->from("tx_pelanggaran a");
		$this->db->join("tx_kegiatan b","a.id_kegiatan = b.id_kegiatan");
		$this->db->join("tx_surat_tugas c","c.id_surat_tugas = b.id_surat_tugas");
		$this->db->join("mst_pelanggaran d","d.kd_pelanggaran = a.jenis_pelanggaran");
		$this->db->join("mst_tindakan e","e.kd_tindakan = a.kd_tindakan");
		$this->db->order_by("a.id_pelanggaran","desc");
		return $this->db->get()->result();
	}

	public function findDataPelanggaran($id_pelanggaran)
	{	
		$this->db->select('
		a.id_pelanggaran,
		a.id_kegiatan,
		b.jenis_kegiatan,
		b.tanggal_kegiatan, 
		c.id_surat_tugas,
		c.nomor_surat_tugas, 
		a.no_ktp,
		a.nama,
		a.alamat,
		a.pendidikan,
		a.perkerjaan,
		a.status_kawin,
		a.jenis_pelanggaran,
		d.nm_pelanggaran,
		a.kd_tindakan,
		e.nm_tindakan,
		a.tanggal_pelanggaran,
		a.lokasi,
		a.waktu_rekam');
		$this->db->from("tx_pelanggaran a");
		$this->db->join("tx_kegiatan b","a.id_kegiatan = b.id_kegiatan");
		$this->db->join("tx_surat_tugas c","c.id_surat_tugas = b.id_surat_tugas");
		$this->db->join("mst_pelanggaran d","d.kd_pelanggaran = a.jenis_pelanggaran");
		$this->db->join("mst_tindakan e","e.kd_tindakan = a.kd_tindakan");
		$this->db->where('a.id_pelanggaran', $id_pelanggaran);	
		return $this->db->get()->row();
	}

	public function saveDataPelanggaran($postData)
	{
		$this->db->insert('tx_pelanggaran', $postData);
		return true;
	}

	public function updateDataPelanggaran($id_pelanggaran,$postData)
	{
		$this->db->where('id_pelanggaran', $id_pelanggaran);
		$this->db->update('tx_pelanggaran', $postData);
		return true;
	}

	public function saveDataKegiatan($postData)
	{
		$this->db->insert('tx_kegiatan', $postData);
		return true;
	}

	public function updateDataKegiatan($id_kegiatan,$postData)
	{
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->update('tx_kegiatan', $postData);
		return true;
	}

	public function deleteDataKegiatan($postData)
	{
		$this->db->where('id_kegiatan', $postData['id_kegiatan']);
		$this->db->delete('tx_kegiatan');
		return true;
	}

	public function getRefPelanggaran()
	{	
		$this->db->select('*');
		$this->db->from('mst_pelanggaran');
		$this->db->where('is_active',true);
		return $this->db->get()->result();
	}

	public function getRefTindakan()
	{	
		$this->db->select('*');
		$this->db->from('mst_tindakan');
		$this->db->where('is_active',true);
		return $this->db->get()->result();
	}

	public function getByBulan($id_kegiatan,$bulan,$tahun)
	{
		return $this->db->query('select
		COUNT(id_pelanggaran) as jml
		from
		tx_pelanggaran
		where
		month(tanggal_pelanggaran) = "'.$bulan.'"
		and year(tanggal_pelanggaran) = "'.$tahun.'"
		and id_kegiatan = "'.$id_kegiatan.'"')->row();
	}

	public function getByBulanPelanggaran($kd_pelanggaran,$bulan,$tahun)
	{
		return $this->db->query('select
		COUNT(*) as jml
		from
		tx_pelanggaran
		where
		month(tanggal_pelanggaran) = "'.$bulan.'"
		and year(tanggal_pelanggaran) = "'.$tahun.'"
		and jenis_pelanggaran = "'.$kd_pelanggaran.'"')->row();
	}

	public function getByKegiatan($id_kegiatan,$tahun)
	{
		return $this->db->query('select
		COUNT(id_pelanggaran) as jml
		from
		tx_pelanggaran
		where
		year(tanggal_pelanggaran) = "'.$tahun.'"
		and id_kegiatan = "'.$id_kegiatan.'"')->row();
	}

	public function getByPelanggaran($kd_pelanggaran,$tahun)
	{
		return $this->db->query('select
		COUNT(*) as jml
		from
		tx_pelanggaran
		where
		year(tanggal_pelanggaran) = "'.$tahun.'"
		and jenis_pelanggaran = "'.$kd_pelanggaran.'"')->row();
	}

	public function getByTindakan($id_kegiatan,$kd_tindakan)
	{
		return $this->db->query('select
			COUNT(*) as jml
		from
			tx_pelanggaran
		where
			kd_tindakan = "'.$kd_tindakan.'"
			and
			id_kegiatan  = "'.$id_kegiatan.'"')->row();
	}
	
	public function getTotalBulan($bulan,$tahun)
	{
		return $this->db->query('select
		COUNT(id_pelanggaran) as jml
		from
		tx_pelanggaran
		where
		month(tanggal_pelanggaran) = "'.$bulan.'"
		and year(tanggal_pelanggaran) = "'.$tahun.'"')->row();
	}

	public function getTotalTindakan($kd_tindakan)
	{
		return $this->db->query('select
			COUNT(*) as jml
		from
			tx_pelanggaran
		where
			kd_tindakan = "'.$kd_tindakan.'"')->row();
	}

	public function getPelanggaranKegiatan()
	{
		return $this->db->query('select mp.kd_pelanggaran,mp.nm_pelanggaran from tx_pelanggaran tp
		left join tx_kegiatan tk on tp.id_kegiatan  = tk.id_kegiatan
		left join mst_pelanggaran mp on mp.kd_pelanggaran = tp.jenis_pelanggaran
		group by mp.kd_pelanggaran,mp.nm_pelanggaran')->result();
	}
	
}
