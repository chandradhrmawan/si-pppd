<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_service_kendaraan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<h3><center>Laporan Data Service PT.Sikopmil</center></h3>
<h4><center><?=date('d-m-Y H:i:s')?></center></h4>
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
      <?php foreach ($listData as $key => $value):
        $no = $key+1;
        $tgl_service = view_date_hi($value->tgl_service);
        $total = number_format($value->total,2);
      ?>
      <tr>
        <td><?=$no?></td>
        <td><?=$value->nama?></td>
        <td><?=$tgl_service?></td>
        <td><?=$value->no_plat?></td>
        <td><?=$value->judul?></td>
        <td><?=$value->note?></td>
        <td>Rp. <?=$total?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table> 
</div>