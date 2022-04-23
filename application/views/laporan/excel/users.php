<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_users.xls");
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
        <?php foreach ($listData as $key => $value): 
            $no = $key+1;
            $status = ($value->status != 0) ? 'Aktif' : 'Non Aktif';
        ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$value->nama?></td>
                <td><?=$value->username?></td>
                <td><?=$value->nip?></td>
                <td><?=$value->nm_jabatan?></td>
                <td><?=$value->nm_role?></td>
                <td><?=$value->alamat?></td>
                <td><?=$status?></td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>