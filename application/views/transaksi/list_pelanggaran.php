<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
          <!-- <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button> -->
         
        </div>
        <!-- /. tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body pad">
        
            <div class="row tambah">
                <div class="col-md-6">
                  
                        <a href="#" onclick="add()">
                          <button id="" class="btn btn-info" style="border-radius: 0;"> Add New
                            <i class="fa fa-plus"></i>
                        </button></a>
                    
                </div>                
            </div>
        
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-checkable order-column table-sm" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggar</th>
                        <th>Jenis Pelanggaran</th>
                        <th>Tindakan</th>
                        <th>Tanggal Pelanggaran</th>
                        <th>Nomor Surat Tugas</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Jenis Kegiatan</th>
                        <th style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($data_pelanggaran as $key => $value):
                ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value->nama?></td>
                        <td><?=$value->nm_pelanggaran?></td>
                        <td><?=$value->nm_tindakan?></td>
                        <td><?=viewDateOnly($value->tanggal_pelanggaran)?>
                        <td><?=$value->nomor_surat_tugas?></td>
                        <td><?=view_date_hi($value->tanggal_kegiatan)?>
                        <td><?=$value->jenis_kegiatan?></td>
                        <td style="text-align:center;">
                          <button class="btn btn-primary btn-flat btn-sm" type="button" onclick="edit(<?=$value->id_pelanggaran?>)">Ubah <span class="fa fa-edit"></span></button>
                          <button class="btn btn-danger btn-flat btn-sm" type="button" onclick="modalDelete(<?=$value->id_pelanggaran?>)">Hapus <span class="fa fa-trash"></span></button>
                        </td>
                          
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
      </div>
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col-->
</div>
<!-- ./row -->

<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript">
    var save_method; //for save method string
    var table;

    const dataUsers = <?=$data_user_json?>;
    const dataPelanggaran = <?=$data_pelanggaran_json?>;

    $(document).ready(function() { 
      //TAMPIL DATA TABLE SERVER SIDE
      table = $('#table').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": false //Feature control DataTables' server-side processing mode.
      });
    });

    const add = () => {
        let url = "<?php echo site_url('transaksi/Pelanggaran/form_add')?>";
        window.location.replace(url)
    }

    const edit = (id_pelanggaran) => {
        let url = "<?php echo site_url('transaksi/Pelanggaran/form_edit/')?>"+id_pelanggaran;
        window.location.replace(url)
    }
</script>
