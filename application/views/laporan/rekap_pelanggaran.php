<?php 
$CI = &get_instance();
?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-info" id="box-input">
      <div class="box-body pad">
        <h3><center>Laporan Rekapitulasi Pelanggaran SIP-PPPD</center></h3>
        <h4><center><?=date('d-m-Y H:i:s')?></center></h4>
        <div class='table'>
        <table class='table table-striped table-hover table-bordered table-sm'>
            <thead>
            <tr>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">No</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">Jenis Pelanggaran</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">JAN</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">FEB</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">MAR</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">APR</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">MEI</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">JUNI</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">JUL</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">AGS</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">SEP</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">OKT</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">NOV</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">DES</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;">Jml Kasus</th>
                <th style="text-align: center;" colspan="<?=$jml_tindakan+1?>">Tindakan Proses</th>
            </tr>
            <tr >
                <?php foreach ($ref_tindakan as $key => $value) { ?>
                <th><?=$value->nm_tindakan?></th>
                <?php } ?>
            </tr>
            </thead> 
            <tbody>
              <?php 
              $totalKasus = 0;
              foreach ($data_kegiatan as $key => $value) {
                $kasus = $CI->getByPelanggaran($value->kd_pelanggaran);
                $totalKasus+=$kasus;
              ?>
                <tr>
                  <td><?=$key+1?></td>
                  <td><?=$value->nm_pelanggaran?></td>
                  <?php 
                  for ($i=1; $i <=12; $i++) { 
                  ?>
                    <td>
                      <?=$CI->getByBulanPelanggaran($value->kd_pelanggaran,$i)?>
                    </td>
                  <?php } ?>
                  <td>
                    <?=$kasus?>
                  </td>
                  <?php 
                    foreach ($ref_tindakan as $key => $valuez) { 
                    $tindakan = $CI->getByTindakan($value->kd_pelanggaran,$valuez->kd_tindakan);  
                    ?>
                    <td>
                      <?=$tindakan?>
                    </td>
                    <?php } ?>
                  </tr>
                <?php } ?>
              <th style="text-align: right;" colspan="2">Jumlah</th>
              <?php for ($i=1; $i <= 12; $i++) { ?> 
                <td><?=$CI->getTotalBulan($i)?></td>
              <?php } ?>
              <td><?=$totalKasus?></td>
              <?php 
                foreach ($ref_tindakan as $key => $value) { 
                $tindakan = $CI->getTotalTindakan($value->kd_tindakan);  
                ?>
                <td>
                  <?=$tindakan?>
                </td>
                <?php } ?>
              </tbody>
            </table>
            <br/>
            <table cellpadding="2" cellspacing="2" border="0" width="100%" style="text-align: center;font-weight: bold;">
                  <tr>
                    <td width="35%">KEPALA SATUAN POLISI PRAMONG PRAJA</td>
                    <td>&nbsp;</td>
                    <td width="35%">PADANG 30 DESEMBER 2022</td>
                  <tr>
                  <tr>
                    <td>KOTA PADANG</td>
                    <td></td>
                    <td>KASI PENYIDIK</td>
                  <tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  <tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  <tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  <tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  <tr>
                  <tr>
                    <td>PETUGAS 1</td>
                    <td>&nbsp;</td>
                    <td>PETUGAS 3</td>
                  <tr>
                  <tr>
                    <td>NIPP : 12312381724516235</td>
                    <td>&nbsp;</td>
                    <td>NIPP : 32312381724516235</td>
                  <tr>
            </table>
        </div>  
        <br/>
        <row>
            <button type='button' id='btn-print' class='btn btn-info btn-flat' style='margin-right: 5px;' onclick='doPrint()'>
            <i class='fa fa-print'></i> Print Data
            </button>
                </row>
      </div>
    </div>
  </div>    
  </div>


<script>
  const doPrint = () => {
      // $('#box-input').hide();
      $('#btn-print').hide();
      window.print();
      // $('#box-input').show();
      $('#btn-print').show();
    }
</script>