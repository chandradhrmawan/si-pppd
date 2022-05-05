<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_pelanggaran.xls");
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
        <th style='background-color:#D2E3E3;'>Jenis Kegiatan</th>
        <th style='background-color:#D2E3E3;'>Tanggal Kegiatan</th>
        <th style='background-color:#D2E3E3;'>Nomor Surat Tugas</th>
        <th style='background-color:#D2E3E3;'>No Ktp</th>
        <th style='background-color:#D2E3E3;'>Nama</th>
        <th style='background-color:#D2E3E3;'>Alamatn</th>
        <th style='background-color:#D2E3E3;'>Jenis Pelanggaran</th>
        <th style='background-color:#D2E3E3;'>Tindakan</th>
        <th style='background-color:#D2E3E3;'>Tanggal Pelanggaran</th>
        <th style='background-color:#D2E3E3;'>Lokasi Pelanggaran</th>
    </tr>
    </thead>
    <tbody>
      <?php foreach ($listData as $key => $value):
        $no = $key+1;
      ?>
      <tr>
        <td><?=$no?></td>
        <td><?=$value->jenis_kegiatan?></td>
        <td><?=$value->tanggal_kegiatan?></td>
        <td><?=$value->nomor_surat_tugas?></td>
        <td><?=$value->no_ktp?></td>
        <td><?=$value->nama?></td>
        <td><?=$value->alamat?></td>
        <td><?=$value->nm_pelanggaran?></td>
        <td><?=$value->nm_tindakan?></td>
        <td><?=$value->tanggal_pelanggaran?></td>
        <td><?=$value->lokasi?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table> 
</div>