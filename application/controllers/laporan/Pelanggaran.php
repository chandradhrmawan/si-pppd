<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran extends CI_Controller {

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
		$data['breadcump'] 			= "Laporan Pelanggaran";
		$data['title_page']			= "Laporan Pelanggaran";
		$data['content_view']		= "laporan/pelanggaran";
		$this->load->view('layout_admin/index',$data);	
	}

	public function listData()
	{
		$data =	array(
			'tgl_awal'  	=> formatDate($this->input->get('tgl_awal')),
			'tgl_akhir' 	=> formatDate($this->input->get('tgl_akhir')),
		);
		$result = $this->transaksi_model->getReportPelanggaran($data);
        // debux($result);die;
		$content = "";
		foreach ($result as $key => $value) {
			$no = $key+1;
			$content .= "
			<tr>
				<td>$no</td>
				<td>$value->jenis_kegiatan</td>
				<td>$value->tanggal_kegiatan</td>
				<td>$value->nomor_surat_tugas</td>
				<td>$value->no_ktp</td>
				<td>$value->nama</td>
				<td>$value->alamat</td>
				<td>$value->nm_pelanggaran</td>
				<td>$value->nm_tindakan</td>
				<td>$value->tanggal_pelanggaran</td>
				<td>$value->lokasi</td>
			</tr>";
		}

		$date_now = date('d-m-Y h:i:s');
		$html = "
		<h3><center>Laporan Data Pelanggaran </center></h3>
		<h4><center>$date_now</center></h4>
		<div class='table-responsive'>
		<table class='table table-striped table-hover table-bordered table-sm'>
              <thead>
              <tr>
                <th>No</th>
                <th>Jenis Kegiatan</th>
                <th>Tanggal Kegiatan</th>
                <th>Nomor Surat Tugas</th>
                <th>No Ktp</th>
                <th>Nama</th>
                <th>Alamatn</th>
                <th>Jenis Pelanggaran</th>
                <th>Tindakan</th>
                <th>Tanggal Pelanggaran</th>
                <th>Lokasi Pelanggaran</th>
              </tr>
              </thead>
              <tbody>
              ".$content."
              </tbody>
            </table> 
            <div class='form-group'>
              <button type='button' id='btn-print' class='btn btn-info btn-flat' style='margin-right: 5px;' onclick='doPrint()'>
          <i class='fa fa-print'></i> Print Data
        </button>
            </div>
        </div>";
        echo json_encode($html);
	}

	public function exportExcel()
	{	
		$data = $_GET;
		$data['listData'] = $this->transaksi_model->getReportPelanggaran($data);
		$this->load->view('laporan/excel/pelanggaran',$data);
	}

    public function rekap()
	{				
		$data['breadcump'] 			= "Laporan Pelanggaran";
		$data['title_page']			= "Laporan Pelanggaran";
		$data['content_view']		= "laporan/rekap_pelanggaran";
        $data['ref_tindakan']       = $this->master_model->getAll('mst_tindakan');
		$data['jml_tindakan']       = $this->master_model->jmlData('mst_tindakan');
		$data['data_kegiatan'] = $this->transaksi_model->getPelanggaranKegiatan();
		$this->load->view('layout_admin/index',$data);	
	}

	public function getByBulan($id_kegiatan,$bulan,$tahun=2022)
	{
		$result = $this->transaksi_model->getByBulan($id_kegiatan,$bulan,$tahun);
		return $result->jml;
	}

	public function getByBulanPelanggaran($kd_pelanggaran,$bulan,$tahun=2022)
	{
		$result = $this->transaksi_model->getByBulanPelanggaran($kd_pelanggaran,$bulan,$tahun);
		return $result->jml;
	}

	public function getByKegiatan($id_kegiatan,$tahun=2022)
	{
		$result = $this->transaksi_model->getByKegiatan($id_kegiatan,$tahun);
		return $result->jml;
	}

	public function getByPelanggaran($kd_pelanggaran,$tahun=2022)
	{
		$result = $this->transaksi_model->getByPelanggaran($kd_pelanggaran,$tahun);
		return $result->jml;
	}

	public function getByTindakan($id_kegiatan,$kd_tindakan)
	{
		$result = $this->transaksi_model->getByTindakan($id_kegiatan,$kd_tindakan);
		return $result->jml;
	}

	public function getTotalTindakan($kd_tindakan)
	{
		$result = $this->transaksi_model->getTotalTindakan($kd_tindakan);
		return $result->jml;
	}

	public function getTotalBulan($bulan,$tahun=2022)
	{
		$result = $this->transaksi_model->getTotalBulan($bulan,$tahun);
		return $result->jml;
	}
}
