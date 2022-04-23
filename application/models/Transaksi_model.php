<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaksi_model extends CI_Model {

	public function getAllKendaraan($limit,$start,$where)
	{	
		$this->db->select("*");
		$this->db->from("mst_kendaraan a");
		$this->db->join("mst_jenis b","a.id_jenis = b.id_jenis");
		$this->db->join("mst_merk c","a.id_merk = c.id_merk");
		$this->db->join("mst_tipe d","a.id_tipe = d.id_tipe");
		$this->db->limit($start,$limit);

		if(!empty($where['keyword'])){
			$this->db->like('LOWER(a.judul)', strtolower($where['keyword']));	
		}
		if(!empty($where['id_jenis'])){
			$this->db->like('b.id_jenis', $where['id_jenis']);	
		}
		if(!empty($where['id_merk'])){
			$this->db->like('a.id_merk', $where['id_merk']);	
		}

		$this->db->order_by("a.id_kendaraan","desc");
		return $this->db->get()->result();
	}

	public function countAllKendaraan()
	{	
		$this->db->select("*");
		$this->db->from("mst_kendaraan a");
		$this->db->join("mst_jenis b","a.id_jenis = b.id_jenis");
		$this->db->join("mst_merk c","a.id_merk = c.id_merk");
		$this->db->join("mst_tipe d","a.id_tipe = d.id_tipe");
		$this->db->order_by("a.judul","asc");
		return $this->db->get()->num_rows();
	}

	public function countSewa($id_user)
	{
		$this->db->select("*");
		$this->db->from("tx_sewa a");
		$this->db->where("a.id_user",$id_user);
		$status_allow = array(4,5);
		$this->db->where_not_in('a.status_sewa', $status_allow);
		return $this->db->get()->num_rows();
	}

	public function getDetailByIdkendaraan($id_kendaraan)
	{
		$this->db->select("*");
		$this->db->from("mst_kendaraan a");
		$this->db->join("mst_jenis b","a.id_jenis = b.id_jenis");
		$this->db->join("mst_merk c","a.id_merk = c.id_merk");
		$this->db->join("mst_tipe d","a.id_tipe = d.id_tipe");
		$this->db->where("a.id_kendaraan",$id_kendaraan);
		return $this->db->get()->row();
	}
	
	public function doSavePesanan($data)
	{
		$this->db->insert('tx_sewa', $data);
		return true;
	}

	public function insJadwalService($data)
	{
		$this->db->insert('tx_jadwal_service', $data);
		return true;
	}

	public function insTxKordinat($data)
	{
		$this->db->insert('tx_kordinat', $data);
		return true;
	}

	public function savePengembalian($data)
	{
		$this->db->insert('tx_pengembalian', $data);
		return true;
	}

	public function saveHdrService($data)
	{
		$this->db->insert('tx_hdr_service', $data);
		return $this->db->insert_id();
	}

	public function saveDtlService($data)
	{
		$this->db->insert('tx_dtl_service', $data);
		return $this->db->insert_id();
	}

	public function updateTotalHdrService($id,$total)
	{
		$dtService = array(
	        'total' => $total
		);
		$this->db->where('id_hdr_service', $id);
		$this->db->update('tx_hdr_service', $dtService);
		return true;
	}

	public function doCancelBooking($id,$data)
	{
		$dt = array(
	        'keterangan'  => $data['keterangan'],
	        'status_sewa' => 6
		);
		$this->db->where('id_sewa', $id);
		$this->db->update('tx_sewa', $dt);
		return true;
	}

	public function updateIsRead($id_sewa)
	{
		$dt = array(
	        'is_read'  	  => 1
		);
		$this->db->where('id_sewa', $id_sewa);
		$this->db->update('tx_sewa', $dt);
		return true;
	}

	public function updateJadwalService($id_jadwal,$data)
	{
		$this->db->where('id_jadwal', $id_jadwal);
		$this->db->update('tx_jadwal_service', $data);
		return true;
	}

	public function getRiwayatSewaByIduser($id_user)
	{
		$this->db->select("a.*,b.nama,c.judul,c.no_plat,d.nama as nama_supir");
		$this->db->from("tx_sewa a");
		$this->db->join("mst_users b","b.id_user = a.id_user");
		$this->db->join("mst_users d","d.id_user = a.id_supir",'left');
		$this->db->join("mst_kendaraan c","c.id_kendaraan = a.id_kendaraan");
		$this->db->where("a.id_user",$id_user);
		$this->db->order_by("a.id_sewa","desc");
		return $this->db->get()->result();
	}

	public function getRiwayatSewaByIduserNotif($id_user)
	{
		$this->db->select("*");
		$this->db->from("tx_sewa a");
		$this->db->join("mst_users b","b.id_user = a.id_user");
		$this->db->join("mst_kendaraan c","c.id_kendaraan = a.id_kendaraan");
		$this->db->where("a.id_user",$id_user);
		$this->db->where("a.is_read",0);
		$this->db->order_by("a.id_sewa","desc");
		return $this->db->get()->num_rows();
	}

	public function getAllRiwayatSewa()
	{
		$this->db->select("*");
		$this->db->from("tx_sewa a");
		$this->db->join("mst_users b","b.id_user = a.id_user");
		$this->db->join("mst_kendaraan c","c.id_kendaraan = a.id_kendaraan");
		// $this->db->join("mst_supir d","d.id_supir = a.id_supir","left");
		$this->db->order_by("a.id_sewa","desc");
		return $this->db->get()->result();
	}

	public function updateStatusSewa($id_sewa,$data)
	{
		$this->db->where('id_sewa', $id_sewa);
		$this->db->update('tx_sewa', $data);
		return true;
	}

	public function updateStatusSupir($id_supir,$data)
	{
		$this->db->where('id_supir', $id_supir);
		$this->db->update('mst_supir', $data);
		return true;
	}

	public function updateKordinat($id_sewa,$data)
	{
		$this->db->where('id_sewa', $id_sewa);
		$this->db->update('tx_kordinat', $data);
		return true;
	}

	public function getDetailSewaByIdSewa($id_sewa)
	{
		$this->db->select("a.*,b.nama,b.nip,e.nm_jabatan,d.nama as nama_supir,
						c.km_akhir,b.alamat,c.no_plat,c.judul,
						c.model,c.transmisi,c.tenaga,c.no_mesin,c.deskripsi");
		$this->db->from("tx_sewa a");
		$this->db->join("mst_users b","b.id_user = a.id_user","inner");
		$this->db->join("mst_jabatan e","e.id_jabatan = b.id_jabatan","inner");
		$this->db->join("mst_users d","d.id_user = a.id_supir","left");
		$this->db->join("mst_kendaraan c","c.id_kendaraan = a.id_kendaraan");
		$this->db->where("a.id_sewa",$id_sewa);
		return $this->db->get()->row();
	}

	public function getAllRiwayatSewaByIdSupir($id_supir)
	{
		$this->db->select("a.*,b.*,c.*,d.status_perjalanan,d.id_kordinat,d.lat_kordinat,d.lon_kordinat");
		$this->db->from("tx_sewa a");
		$this->db->join("mst_users b","b.id_user = a.id_user");
		$this->db->join("mst_kendaraan c","c.id_kendaraan = a.id_kendaraan");
		$this->db->join("tx_kordinat d","a.id_sewa = d.id_sewa","left");

		if($this->session->userdata('id_role') == 4){
			$this->db->where("a.id_supir",$id_supir);
		}
		
		$this->db->order_by("a.id_sewa","desc");
		return $this->db->get()->result();
	}

	public function getTugasSupirByIdSupir($id_supir)
	{
		$this->db->select("c.no_plat");
		$this->db->from("tx_sewa a");
		$this->db->join("mst_users b","b.id_user = a.id_user");
		$this->db->join("mst_kendaraan c","c.id_kendaraan = a.id_kendaraan");
		$this->db->where("a.id_supir",$id_supir);
		$this->db->order_by("a.id_sewa","desc");
		return $this->db->get()->row();
	}

	public function getDataSewaByIdSupir($id_supir)
	{
		$this->db->select("a.id_sewa,c.no_plat");
		$this->db->from("tx_sewa a");
		$this->db->join("mst_users b","b.id_user = a.id_user");
		$this->db->join("mst_kendaraan c","c.id_kendaraan = a.id_kendaraan");
		if($this->session->userdata('id_role') == 4){
			$this->db->where("a.id_supir",$id_supir);
		}
		$this->db->where("a.status_sewa",2);
		$this->db->order_by("a.id_sewa","desc");
		return $this->db->get()->result();
	}

	public function getDataPengembalian($id_supir)
	{
		$this->db->select("a.*,b.nama,c.judul,c.no_plat,c.deskripsi,d.id_sewa,d.tgl_pinjam");
		$this->db->from("tx_pengembalian a");
		$this->db->join("mst_users b","b.id_user = a.id_supir");
		$this->db->join("tx_sewa d","d.id_sewa = a.id_sewa");
		$this->db->join("mst_kendaraan c","c.id_kendaraan = d.id_kendaraan");
		if($this->session->userdata('id_role') == 4){
			$this->db->where("a.id_supir",$id_supir);
		}
		$this->db->order_by("a.id_pengembalian","desc");
		return $this->db->get()->result();
	}

	public function getDataPengembalianByIdSewa($id_sewa)
	{
		$this->db->select("*");
		$this->db->from("tx_pengembalian a");
		$this->db->join("mst_users b","b.id_user = a.id_supir");
		$this->db->join("tx_sewa d","d.id_sewa = a.id_sewa");
		$this->db->join("mst_kendaraan c","c.id_kendaraan = d.id_kendaraan");
		$this->db->where("a.id_sewa",$id_sewa);
		$this->db->order_by("a.id_pengembalian","desc");
		return $this->db->get()->row();
	}

	public function updatePengembalian($data)
	{
		
		$dataSewa = $this->getDetailSewaByIdSewa($data['id_sewa']);
		$km_old = $dataSewa->km_akhir;

		$dtKendaraan = array(
	        // 'km_akhir' => $km_old + $data['km_selesai'],
	        'km_akhir' => $data['km_selesai_post'],
	        'status'   => 1
		);
		$this->db->where('id_kendaraan', $dataSewa->id_kendaraan);
		$this->db->update('mst_kendaraan', $dtKendaraan);

		$dtSewa = array(
	        'status_sewa' => 4
		);
		$this->db->where('id_sewa', $data['id_sewa']);
		$this->db->update('tx_sewa', $dtSewa);

		$dtKordinat = array(
	        'status_perjalanan' => 2
		);
		$this->db->where('id_sewa', $data['id_sewa']);
		$this->db->update('tx_kordinat', $dtKordinat);

		return true;
	}

	public function updateDataService($id_hdr_service,$data)
	{
		$dt = array(
	        'status' => $data['status'],
	        'keterangan' => $data['keterangan'],
		);
		$this->db->where('id_hdr_service', $id_hdr_service);
		$this->db->update('tx_hdr_service', $dt);
		return true;
	}

	public function updateStatusLunas($id_hdr_service,$data)
	{
		$dt = array(
	        'status_lunas' => $data['status_lunas']
		);
		$this->db->where('id_hdr_service', $id_hdr_service);
		$this->db->update('tx_hdr_service', $dt);
		return true;
	}

	public function updatePengembalianStatus($id_pengembalian,$data)
	{
		$dt = array(
	        'status' => $data['status']
		);
		$this->db->where('id_pengembalian', $id_pengembalian);
		$this->db->update('tx_pengembalian', $dt);
		return true;
	}

	public function getDataService()
	{
		$this->db->select("a.*,b.judul,b.no_plat,c.nama");
		$this->db->from("tx_hdr_service a");
		$this->db->join("mst_kendaraan b","a.id_kendaraan = b.id_kendaraan","inner");
		$this->db->join("mst_users c","a.id_user = c.id_user","inner");
		$this->db->order_by("a.id_hdr_service","desc");
		return $this->db->get()->result();
	}

	public function getDataJadwalService($status_service=null)
	{
		$this->db->select("a.*,b.judul,b.no_plat");
		$this->db->from("tx_jadwal_service a");
		$this->db->join("mst_kendaraan b","a.id_kendaraan = b.id_kendaraan","inner");

		if(!empty($status_service)){
			$this->db->where("a.status_service",$status_service);
		}

		$this->db->order_by("a.id_jadwal","desc");
		return $this->db->get()->result();
	}

	public function listKendaraanJadwalService()
	{
		$sql = "SELECT *,
				MOD(km_akhir, 10000) as stat_service
				FROM
					mst_kendaraan 
				WHERE
					id_kendaraan NOT IN ( SELECT id_kendaraan FROM tx_jadwal_service WHERE status_service = 1 )
				AND (MOD(km_akhir, 10000) = 0)
				";
		$data = $this->db->query($sql)->result();
		return $data;
	}

	public function findDataJadwalService($id_jadwal)
	{
		$this->db->select("a.*,b.judul,b.no_plat");
		$this->db->from("tx_jadwal_service a");
		$this->db->join("mst_kendaraan b","a.id_kendaraan = b.id_kendaraan","inner");
		$this->db->where("a.id_jadwal",$id_jadwal);
		$this->db->order_by("a.id_jadwal","desc");
		return $this->db->get()->row();
	}

	public function getReportService($where)
	{
		$this->db->select("a.*,b.*,c.nama");
		$this->db->from("tx_hdr_service a");
		$this->db->join("mst_kendaraan b","a.id_kendaraan = b.id_kendaraan","inner");
		$this->db->join("mst_users c","a.id_user = c.id_user","inner");
		if(!empty($where['tgl_awal']) && !empty($where['tgl_akhir'])){
			$this->db->where('a.tgl_service >= ', $where['tgl_awal']);
			$this->db->where('a.tgl_service <= ', $where['tgl_akhir']);	
		}
		if($where['status_lunas'] != ''){
			$this->db->where('a.status_lunas = ', $where['status_lunas']);
		}
		return $this->db->get()->result();
	}

	public function getDataHdrService($id_hdr_service)
	{
		$this->db->select("*");
		$this->db->from("tx_hdr_service a");
		$this->db->join("mst_kendaraan b","a.id_kendaraan = b.id_kendaraan","inner");
		$this->db->where("a.id_hdr_service",$id_hdr_service);
		return $this->db->get()->row();
	}

	public function getDataDtlService($id_hdr_service)
	{
		$this->db->select("*");
		$this->db->from("tx_dtl_service a");
		$this->db->where("a.id_hdr_service",$id_hdr_service);
		return $this->db->get()->result();
	}

	public function getReportKendaraan($where)
	{
		$this->db->select("*");
		$this->db->from("mst_kendaraan a");
		$this->db->join("mst_jenis b","a.id_jenis = b.id_jenis");
		$this->db->join("mst_merk c","a.id_merk = c.id_merk");
		$this->db->join("mst_tipe d","a.id_tipe = d.id_tipe");
		
		if(!empty($where['id_jenis'])){
			$this->db->where('a.id_jenis', $where['id_jenis']);	
		}
		if(!empty($where['id_merk'])){
			$this->db->where('a.id_merk', $where['id_merk']);	
		}
		if(!empty($where['model'])){
			$this->db->where('a.model', $where['model']);	
		}

		$this->db->order_by("a.judul","asc");
		return $this->db->get()->result();
	}

	public function getReportSewa($where)
	{
		$this->db->select("*");
		$this->db->from("tx_sewa a");
		$this->db->join("mst_kendaraan b","a.id_kendaraan = b.id_kendaraan");
		$this->db->join("mst_users c","c.id_user = a.id_user");
		
		if(!empty($where['tgl_awal']) && !empty($where['tgl_akhir'])){
			$this->db->where('a.tgl_sewa >= ', $where['tgl_awal']);
			$this->db->where('a.tgl_sewa <= ', $where['tgl_akhir']);	
		}
		
		$this->db->order_by("a.id_sewa","desc");
		return $this->db->get()->result();
	}

	public function getReportPengembalian($where)
	{
		$this->db->select("a.*,b.nama,c.judul,c.no_plat,d.id_sewa,d.tgl_pinjam,d.tujuan_perjalanan");
		$this->db->from("tx_pengembalian a");
		$this->db->join("mst_users b","b.id_user = a.id_supir");
		$this->db->join("tx_sewa d","d.id_sewa = a.id_sewa");
		$this->db->join("mst_kendaraan c","c.id_kendaraan = d.id_kendaraan");
		if(!empty($where['tgl_awal']) && !empty($where['tgl_akhir'])){
			$this->db->where('a.tgl_pengembalian >= ', $where['tgl_awal']);
			$this->db->where('a.tgl_pengembalian <= ', $where['tgl_akhir']);	
		}
		$this->db->order_by("a.id_pengembalian","desc");
		return $this->db->get()->result();
	}

	public function getReportJadwalService($where)
	{
		$this->db->select("a.*,c.judul,c.no_plat");
		$this->db->from("tx_jadwal_service a");
		$this->db->join("mst_kendaraan c","c.id_kendaraan = a.id_kendaraan");
		if(!empty($where['tgl_awal']) && !empty($where['tgl_akhir'])){
			$this->db->where('a.tgl_jadwal_service >= ', $where['tgl_awal']);
			$this->db->where('a.tgl_jadwal_service <= ', $where['tgl_akhir']);	
		}
		$this->db->order_by("a.id_jadwal","desc");
		return $this->db->get()->result();
	}

	public function getLocSupir()
	{
		$this->db->select("a.id_kordinat,a.id_sewa,a.status_perjalanan,a.lat_kordinat,a.lon_kordinat,a.last_update,
						  c.judul,c.no_plat,d.nama");
		$this->db->from("tx_kordinat a");
		$this->db->join("tx_sewa b","a.id_sewa = b.id_sewa");
		$this->db->join("mst_kendaraan c","c.id_kendaraan = b.id_kendaraan");
		$this->db->join("mst_users d","d.id_user = b.id_supir");
		$this->db->where("a.status_perjalanan != 2");
		return $this->db->get()->result();
	}

	public function updateLoc($id_user,$data)
	{
		$sql = "SELECT * FROM 
				tx_sewa 
				WHERE id_supir = '$id_user' 
				AND status_sewa = '2'";
		$data1 = $this->db->query($sql)->row();


		if(isset($data1)){
			$sql2=  "SELECT * FROM 
				 tx_kordinat
				 WHERE id_sewa = '$data1->id_sewa'
				 AND status_perjalanan = '1'";
			$data2 = $this->db->query($sql2)->row();

			if(isset($data2)){
				$id_kordinat = $data2->id_kordinat;
				$start = $data2->counter;
				$counter = $start + 1;
				$update_date = date('Y-m-d h:i:s');
				$sql3 = "UPDATE tx_kordinat SET lon_kordinat = '".$data['lon']."',
											lat_kordinat = '".$data['lat']."',
											counter = '".$counter."',
											last_update = '".$update_date."'
						WHERE id_kordinat = '".$id_kordinat."'";
				$data3 = $this->db->query($sql3);
				return true;
			}
		}
		return true;
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
				(SELECT COUNT(id_sewa) from tx_sewa where MONTH(tgl_sewa) = 1 AND YEAR(tgl_sewa) = 2020) as JANUARI,
				(SELECT COUNT(id_sewa) from tx_sewa where MONTH(tgl_sewa) = 2 AND YEAR(tgl_sewa) = 2020) as FEBRUARI,
				(SELECT COUNT(id_sewa) from tx_sewa where MONTH(tgl_sewa) = 3 AND YEAR(tgl_sewa) = 2020) as MARET,
				(SELECT COUNT(id_sewa) from tx_sewa where MONTH(tgl_sewa) = 4 AND YEAR(tgl_sewa) = 2020) as APRIL,
				(SELECT COUNT(id_sewa) from tx_sewa where MONTH(tgl_sewa) = 5 AND YEAR(tgl_sewa) = 2020) as MEI,
				(SELECT COUNT(id_sewa) from tx_sewa where MONTH(tgl_sewa) = 6 AND YEAR(tgl_sewa) = 2020) as JUNI,
				(SELECT COUNT(id_sewa) from tx_sewa where MONTH(tgl_sewa) = 7 AND YEAR(tgl_sewa) = 2020) as JULI,
				(SELECT COUNT(id_sewa) from tx_sewa where MONTH(tgl_sewa) = 8 AND YEAR(tgl_sewa) = 2020) as AGUSTUS,
				(SELECT COUNT(id_sewa) from tx_sewa where MONTH(tgl_sewa) = 9 AND YEAR(tgl_sewa) = 2020) as SEPTEMBER,
				(SELECT COUNT(id_sewa) from tx_sewa where MONTH(tgl_sewa) = 10 AND YEAR(tgl_sewa) = 2020) as OKTOBER,
				(SELECT COUNT(id_sewa) from tx_sewa where MONTH(tgl_sewa) = 11 AND YEAR(tgl_sewa) = 2020) as NOVEMBER,
				(SELECT COUNT(id_sewa) from tx_sewa where MONTH(tgl_sewa) = 12 AND YEAR(tgl_sewa) = 2020) as DESEMBER
			FROM
				DUAL";
		return $this->db->query($sql)->row();
	}

	public function getChartKendaraan()
	{
		$sql = "SELECT
					count( model ) jml,
					model AS tahun,
					( round( count( model ) / ( SELECT count( * ) FROM mst_kendaraan ) * 100 ) ) AS persen 
				FROM
					mst_kendaraan 
				GROUP BY
					model";
		return $this->db->query($sql)->result();
	}	

	public function getChartTipe()
	{
		$sql = "SELECT
				count( a.id_tipe ) jml,
				b.nm_tipe,
				( round( count( a.id_tipe ) / ( SELECT count( * ) FROM mst_kendaraan ) * 100 ) ) AS persen 
			FROM
				mst_kendaraan a
				left join mst_tipe b on a.id_tipe = b.id_tipe
			GROUP BY
				a.id_tipe";
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
}
