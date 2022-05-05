<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_kegiatan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<h3><center>Laporan Data Kegiatan SI-PPPD</center></h3>
<h4><center><?=date('d-m-Y H:i:s')?></center></h4>
<div class='table-responsive'>
<table border="1" cellpadding="2" cellspacing="2">
    <thead>
    <tr>
        <th style='background-color:#D2E3E3;'>No</th>
        <th style='background-color:#D2E3E3;'>Tanggal Kegiatan</th>
        <th style='background-color:#D2E3E3;'>Nomor Surat Tugas</th>
        <th style='background-color:#D2E3E3;'>Jenis Kegiatan</th>
        <th style='background-color:#D2E3E3;'>Lokasi</th>
        <th style='background-color:#D2E3E3;'>Tindak Lanjut</th>
    </tr>
    </thead>
    <tbody>
      <?php foreach ($listData as $key => $value):
        $no = $key+1;
      ?>
      <tr>
        <td><?=$no?></td>
        <td><?=$value->tanggal_kegiatan?></td>
        <td><?=$value->nomor_surat_tugas?></td>
        <td><?=$value->jenis_kegiatan?></td>
        <td><?=$value->lokasi?></td>
        <td><?=$value->tindak_lanjut?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table> 
</div>