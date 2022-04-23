<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_sewa.xls");
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
        <th>Nama Penyewa</th>
        <th>No Plat</th>
        <th>Nama Kendaraan</th>
        <th>Tanggal Sewa</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Tujuan Perjalanan</th>
        <th>Lokasi Tujuan</th>
        <th>Jarak</th>
        <th>Km Akhir</th>
      </tr>
      </thead>
      <tbody>
        <?php foreach ($listData as $key => $value): 
            $no = $key+1;
            $tgl_sewa = view_date_hi($value->tgl_sewa);
            $tgl_pinjam = view_date_hi($value->tgl_pinjam);
            $tgl_kembali = view_date_hi($value->tgl_kembali);
        ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$value->nama?></td>
                <td><?=$value->no_plat?></td>
                <td><?=$value->judul?></td>
                <td><?=$tgl_sewa?></td>
                <td><?=$tgl_pinjam?></td>
                <td><?=$tgl_kembali?></td>
                <td><?=$value->tujuan_perjalanan?></td>
                <td><?=$value->lokasi_tujuan?></td>
                <td><?=$value->jarak?></td>
                <td><?=$value->km_akhir?></td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>