<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

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
		$data['breadcump'] 			= "Laporan Kendaraan";
		$data['title_page']			= "Laporan Kendaraan";
		$data['content_view']		= "laporan/kendaraan";
		$data['data_jenis']  		= $this->master_model->getAll('mst_jenis');
		$data['data_merk']  		= $this->master_model->getAll('mst_merk');
		$data['data_model'] 		= $this->master_model->getModelKendaraan();
		$this->load->view('layout_admin/index',$data);	
	}

	public function listData()
	{
		$data = $_GET;
		$result = $this->transaksi_model->getReportKendaraan($data);
		$content = "";
		foreach ($result as $key => $value) {
			$no = $key+1;
			$content .= "
			<tr>
				<td>$no</td>
				<td>$value->judul</td>
				<td>$value->nm_jenis</td>
				<td>$value->nm_merk</td>
				<td>$value->nm_tipe</td>
				<td>$value->no_plat</td>
				<td>$value->no_mesin</td>
				<td>$value->model</td>
				<td>$value->transmisi</td>
				<td>$value->tenaga</td>
				<td>$value->km_akhir</td>
			</tr>";
		}

		$date_now = date('d-m-Y h:i:s');
		$html = "
		<h3><center>Laporan Data Kendaraan Sikopmil</center></h3>
		<h4><center>$date_now</center></h4>
		<div class='table-responsive'>
		<table class='table table-striped table-hover table-bordered table-sm'>
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Kendaraan</th>
                <th>Jenis</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>No Plat</th>
                <th>No Mesin</th>
                <th>Model</th>
                <th>Transmisi</th>
                <th>Tenaga</th>
                <th>Km Akhir</th>
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
		$data['listData'] = $this->transaksi_model->getReportKendaraan($data);
		$this->load->view('laporan/excel/kendaraan',$data);
	}
}
