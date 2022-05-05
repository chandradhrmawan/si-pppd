<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_surat_tugas.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<h3><center>Laporan Data Pelanggaran SI-PPPD</center></h3>
<h4><center><?=date('d-m-Y H:i:s')?></center></h4>
<div class='table-responsive'>
<table border="1" cellpadding="2" cellspacing="2">
    <thead>
    <tr>
        <th style='background-color:#D2E3E3;'>No</th>
        <th style='background-color:#D2E3E3;'>Nomor Surat Tugas</th>
        <th style='background-color:#D2E3E3;'>Dasar Kegiatan</th>
        <th style='background-color:#D2E3E3;'>Tujuan Kegiatan</th>
        <th style='background-color:#D2E3E3;'>Waktu Rekam</th>
        <th style='background-color:#D2E3E3;'>Is Active</th>
    </tr>
    </thead>
    <tbody>
      <?php foreach ($listData as $key => $value):
        $no = $key+1;
        $is_active = $value->is_active == 1 ? 'Aktif' : 'Non Aktif';
      ?>
      <tr>
        <td><?=$no?></td>
        <td><?=$value->nomor_surat_tugas?></td>
        <td><?=$value->dasar_kegiatan?></td>
        <td><?=$value->tujuan_kegiatan?></td>
        <td><?=$value->waktu_rekam?></td>
        <td><?=$is_active?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table> 
</div>