<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supir extends CI_Controller {

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
		$data['breadcump'] 			= "Laporan Data Pengemudi";
		$data['title_page']			= "Laporan Data Pengemudi";
		$data['content_view']		= "laporan/supir";
		$this->load->view('layout_admin/index',$data);	
	}

	public function listData()
	{
		$data = $_GET;
		$result = $this->transaksi_model->getReportSupir($data);
		$content = "";
		foreach ($result as $key => $value) {
			$no = $key+1;
			$status = ($value->status != 0) ? 'Aktif' : 'Non Aktif';
			$content .= "
			<tr>
				<td>$no</td>
				<td>$value->nama</td>
				<td>$value->username</td>
				<td>$value->nip</td>
				<td>$value->nm_jabatan</td>
				<td>$value->nm_role</td>
				<td>$value->alamat</td>
				<td>$status</td>
			</tr>";
		}

		$date_now = date('d-m-Y h:i:s');
		$html = "
		<h3><center>Laporan Data Pengemudi Sikopmil</center></h3>
		<h4><center>$date_now</center></h4>
		<div class='table-responsive'>
		<table class='table table-striped table-hover table-bordered table-sm'>
              <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Nip</th>
                <th>Jabatan</th>
                <th>Role</th>
                <th>Alamat</th>
                <th>Status</th>
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
		$data['listData'] = $this->transaksi_model->getReportSupir($data);
		$this->load->view('laporan/excel/supir',$data);
	}
}
