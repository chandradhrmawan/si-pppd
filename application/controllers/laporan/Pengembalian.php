<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

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
    $data['breadcump']      = "Laporan Pengembalian Kendaraan";
    $data['title_page']     = "Laporan Pengembalian Kendaraan";
    $data['content_view']   = "laporan/pengembalian";
    $this->load->view('layout_admin/index',$data);  
  }

  public function listData()
  {
    $data = array(
      'tgl_awal'  => formatDate($this->input->get('tgl_awal')),
      'tgl_akhir' => formatDate($this->input->get('tgl_akhir'))
    );
    $result = $this->transaksi_model->getReportPengembalian($data);
    $content = "";
    foreach ($result as $key => $value) {
      $no = $key+1;
      $tgl_pengembalian = view_date_hi($value->tgl_pengembalian);
      $tgl_pinjam = view_date_hi($value->tgl_pinjam);
      $total_biaya = number_format($value->total_biaya);

      $content .= "
      <tr>
        <td>$no</td>
        <td>$value->no_plat</td>
        <td>$value->judul</td>
        <td>$value->tujuan_perjalanan</td>
        <td>$tgl_pinjam</td>
        <td>$tgl_pengembalian</td>
        <td>$value->nama</td>
        <td>Rp.$total_biaya</td>
      </tr>";
    }

    $date_now = date('d-m-Y h:i:s');
    $html = "
    <h3><center>Laporan Pengembalian Kendaraan</center></h3>
    <h4><center>$date_now</center></h4>
    <div class='table-responsive'>
    <table class='table table-striped table-hover table-bordered table-sm'>
              <thead>
              <tr>
                <th>No</th>
                <th>Nomor Polisi</th>
                <th>Nama Kendaraan</th>
                <th>Keperluan Perjalanan</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Nama Pengemudi</th>
                <th>Total Biaya</th>
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
    $data = array(
      'tgl_awal'  => formatDate($this->input->get('tgl_awal')),
      'tgl_akhir' => formatDate($this->input->get('tgl_akhir'))
    );
    $data['listData'] = $this->transaksi_model->getReportPengembalian($data);
    $this->load->view('laporan/excel/pengembalian',$data);
  }
}
