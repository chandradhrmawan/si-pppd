<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

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
		$data['breadcump'] 			= "Laporan Service";
		$data['title_page']			= "Laporan Service";
		$data['content_view']		= "laporan/service";
		$this->load->view('layout_admin/index',$data);	
	}

	public function listData()
	{
		$data =	array(
			'tgl_awal'  	=> formatDate($this->input->get('tgl_awal')),
			'tgl_akhir' 	=> formatDate($this->input->get('tgl_akhir')),
			'status_lunas' 	=> $this->input->get('status_lunas')
		);
		$result = $this->transaksi_model->getReportService($data);
		$content = "";
		foreach ($result as $key => $value) {
			$no = $key+1;
			$tgl_service = view_date_hi($value->tgl_service);
			$total = number_format($value->total,2);
			$content .= "
			<tr>
				<td>$no</td>
				<td>$value->nama</td>
				<td>$tgl_service</td>
				<td>$value->no_plat</td>
				<td>$value->judul</td>
				<td>$value->note</td>
				<td>Rp. $total</td>
			</tr>";
		}

		$date_now = date('d-m-Y h:i:s');
		$html = "
		<h3><center>Laporan Data Service Sikopmil</center></h3>
		<h4><center>$date_now</center></h4>
		<div class='table-responsive'>
		<table class='table table-striped table-hover table-bordered table-sm'>
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Mekanik</th>
                <th>Tgl Service</th>
                <th>No Plat</th>
                <th>Nama Kendaraan</th>
                <th>Deskripsi Service</th>
                <th>Total</th>
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
        <button type='button' id='btn-excel' class='btn btn-success btn-flat' style='margin-right: 5px;' onclick='exportExcel()'>
              <i class='fa fa-file-excel-o'></i> Export Excel</button>
            </div>
        </div>";
        echo json_encode($html);
	}

	public function exportExcel()
	{	
		$data =	array(
			'tgl_awal'  	=> formatDate($this->input->get('tgl_awal')),
			'tgl_akhir' 	=> formatDate($this->input->get('tgl_akhir')),
			'status_lunas' 	=> $this->input->get('status_lunas')
		);
		$data['listData'] = $this->transaksi_model->getReportService($data);
		$this->load->view('laporan/excel/service',$data);
	}
}
