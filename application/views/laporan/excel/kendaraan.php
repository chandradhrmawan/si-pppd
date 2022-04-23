<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_kendaraan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<h3><center>Laporan Data Kendaraan PT.Sikopmil</center></h3>
<h4><center><?=date('d-m-Y H:i:s')?></center></h4>
<div class='table-responsive'>
    <table border="1" cellpadding="2" cellspacing="2">
      <thead>
      <tr>
        <th style='background-color:#D2E3E3;'>No</th>
        <th style='background-color:#D2E3E3;'>Nama Kendaraan</th>
        <th style='background-color:#D2E3E3;'>Jenis</th>
        <th style='background-color:#D2E3E3;'>Merk</th>
        <th style='background-color:#D2E3E3;'>Tipe</th>
        <th style='background-color:#D2E3E3;'>No Plat</th>
        <th style='background-color:#D2E3E3;'>No Mesin</th>
        <th style='background-color:#D2E3E3;'>Model</th>
        <th style='background-color:#D2E3E3;'>Transmisi</th>
        <th style='background-color:#D2E3E3;'>Tenaga</th>
        <th style='background-color:#D2E3E3;'>Km Akhir</th>
      </tr>
      </thead>
      <tbody>
        <?php foreach ($listData as $key => $value):?>
            <tr>
                <td><?=$key+1?></td>
                <td><?=$value->judul?></td>
                <td><?=$value->nm_jenis?></td>
                <td><?=$value->nm_merk?></td>
                <td><?=$value->nm_tipe?></td>
                <td><?=$value->no_plat?></td>
                <td><?=$value->no_mesin?></td>
                <td><?=$value->model?></td>
                <td><?=$value->transmisi?></td>
                <td><?=$value->tenaga?></td>
                <td><?=$value->km_akhir?></td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table> 
</div>