<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

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
		$data['breadcump'] 			= "Laporan Kegiatan";
		$data['title_page']			= "Laporan Kegiatan";
		$data['content_view']		= "laporan/kegiatan";
		$this->load->view('layout_admin/index',$data);	
	}

	public function listData()
	{
		$data =	array(
			'tgl_awal'  	=> formatDate($this->input->get('tgl_awal')),
			'tgl_akhir' 	=> formatDate($this->input->get('tgl_akhir')),
		);
		$result = $this->transaksi_model->getReportKegiatan($data);
        $content = "";
		foreach ($result as $key => $value) {
			$no = $key+1;
			$content .= "
			<tr>
				<td>$no</td>
				<td>$value->tanggal_kegiatan</td>
				<td>$value->nomor_surat_tugas</td>
				<td>$value->jenis_kegiatan</td>
				<td>$value->lokasi</td>
				<td>$value->tindak_lanjut</td>
			</tr>";
		}

		$date_now = date('d-m-Y h:i:s');
		$html = "
		<h3><center>Laporan Data Kegiatan </center></h3>
		<h4><center>$date_now</center></h4>
		<div class='table-responsive'>
		<table class='table table-striped table-hover table-bordered table-sm'>
              <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Kegiatan</th>
                <th>Nomor Surat Tugas</th>
                <th>Jenis Kegiatan</th>
                <th>Lokasi</th>
                <th>Tindak Lanjut</th>
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
		$data['listData'] = $this->transaksi_model->getReportKegiatan($data);
		$this->load->view('laporan/excel/kegiatan',$data);
	}
}
