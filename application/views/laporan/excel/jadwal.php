<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_jadwal_service.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<h3><center>Laporan Data Sewa PT.Sikopmil</center></h3>
<h4><center><?=date('d-m-Y H:i:s')?></center></h4>
<div class='table-responsive'>
<table class='table table-striped table-hover table-bordered table-sm'>
      <thead>
      <tr>
        <th>No</th>
        <th>Nomor Polisi</th>
        <th>Nama Kendaraan</th>
        <th>Tanggal Jadwal Service</th>
        <th>Tanggal Aktual Service</th>
      </tr>
      </thead>
      <tbody>
        <?php foreach ($listData as $key => $value): 
            $no = $key+1;
            $tgl_jadwal_service = view_date_hi($value->tgl_jadwal_service);
            $tgl_aktual_service = view_date_hi($value->tgl_aktual_service);
        ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$value->no_plat?></td>
                <td><?=$value->judul?></td>
                <td><?=$tgl_jadwal_service?></td>
                <td><?=$tgl_aktual_service?></td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>