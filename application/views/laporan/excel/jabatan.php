<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_jabatan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<h3><center>Laporan Data Jabatan Sikopmil</center></h3>
<h4><center><?=date('d-m-Y H:i:s')?></center></h4>
<div class='table-responsive'>
<table class='table table-striped table-hover table-bordered table-sm'>
      <thead>
      <tr>
        <th>No</th>
        <th>Nama Jabatan</th>
      </tr>
      </thead>
      <tbody>
        <?php foreach ($listData as $key => $value): 
            $no = $key+1;
        ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$value->nm_jabatan?></td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>