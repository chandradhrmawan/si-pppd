<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_pengembalian.xls");
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
        <th>Keperluan Perjalanan</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Nama Pengemudi</th>
        <th>Total Biaya</th>
      </tr>
      </thead>
      <tbody>
        <?php foreach ($listData as $key => $value): 
            $no = $key+1;
            $tgl_pengembalian = view_date_hi($value->tgl_pengembalian);
            $tgl_pinjam = view_date_hi($value->tgl_pinjam);
            $total_biaya = number_format($value->total_biaya);
        ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$value->no_plat?></td>
                <td><?=$value->judul?></td>
                <td><?=$value->tujuan_perjalanan?></td>
                <td><?=$tgl_pinjam?></td>
                <td><?=$tgl_pengembalian?></td>
                <td><?=$value->nama?></td>
                <td>Rp.<?=$total_biaya?></td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>