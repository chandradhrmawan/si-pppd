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
      <div class="box-body">
        <!-- form start -->
        <form role="form" id="form1">
            <div class="box-header with-border">
                <h3 class="box-title">Form Data Pelanggaran</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
            <div class="form-group">
                <label>Kegiatan</label>
                <select class="form-control" name="id_kegiatan" id="id_kegiatan">
                    <option value="">-- Pilih Kegiatan --</option>
                    <?php foreach ($data_kegiatan as $key => $value) : ?>
                        <option value="<?=$value->id_kegiatan?>"><?=$value->jenis_kegiatan?> | <?=$value->nomor_surat_tugas?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>No Ktp</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp">
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="5" cols="5"></textarea>
            </div>

            <div class="form-group">
                <label>Pendidikan</label>
                <input type="text" class="form-control" id="pendidikan" name="pendidikan">
            </div>

            <div class="form-group">
                <label>Perkerjaan</label>
                <input type="text" class="form-control" id="perkerjaan" name="perkerjaan">
            </div>

            <div class="form-group">
                <label>Status Kawin</label>
                <select name="status_kawin" class="form-control" id="status_kawin">
                    <option value="0">Belum Kawin</option>
                    <option value="1">Kawin</option>
                </select>
            </div>

            </div><!-- /.box-body -->
            <!-- <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div> -->

            <div class="box-header with-border">
                <h3 class="box-title">Form Pelanggaran Peraturan</h3>
            </div>
            <div class="box-body">

            <div class="form-group">
                <label>Jenis Pelanggaran</label>
                <select class="form-control" name="jenis_pelanggaran" id="jenis_pelanggaran">
                    <option value="">-- Pilih Jenis Pelanggaran --</option>
                    <?php foreach ($ref_pelanggaran as $key => $value) : ?>
                        <option value="<?=$value->kd_pelanggaran?>"><?=$value->nm_pelanggaran?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Tindakan</label>
                <select class="form-control" name="kd_tindakan" id="kd_tindakan">
                    <option value="">-- Pilih Tindakan --</option>
                    <?php foreach ($ref_tindakan as $key => $value) : ?>
                        <option value="<?=$value->kd_tindakan?>"><?=$value->nm_tindakan?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Pelanggaran</label>
                <input type="date" class="form-control" id="tanggal_pelanggaran" name="tanggal_pelanggaran">
            </div>

            <div class="form-group">
                <label>Lokasi</label>
                <textarea class="form-control" name="lokasi" id="lokasi" rows="5" cols="5"></textarea>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary btn-flat" onclick="save()">Submit</button>
            </div>

            
            </div><!-- /.box -->
           <!--  <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
            </div> -->
        </form>
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col-->
</div>
<!-- ./row -->

<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript">

    const save = () => {

        let postData = {
            id_kegiatan : document.getElementById('id_kegiatan').value,
            no_ktp : document.getElementById('no_ktp').value,
            nama : document.getElementById('nama').value,
            alamat : document.getElementById('alamat').value,
            pendidikan : document.getElementById('pendidikan').value,
            perkerjaan : document.getElementById('perkerjaan').value,
            status_kawin : document.getElementById('status_kawin').value,
            jenis_pelanggaran : document.getElementById('jenis_pelanggaran').value,
            kd_tindakan : document.getElementById('kd_tindakan').value,
            tanggal_pelanggaran : document.getElementById('tanggal_pelanggaran').value,
            lokasi : document.getElementById('lokasi').value
        }

        url = "<?php echo site_url('transaksi/Pelanggaran/save')?>";
        $.ajax({
            url : url,
            type: "POST",
            data: postData,
            dataType: "JSON",
            success: function(data)
            {
                if(data.status==true){
                    swal('Pesan','Save Data Berhasil', 'success');
                    setTimeout(() => {
                        window.location.replace("<?php echo site_url('transaksi/Pelanggaran/index')?>"); }
                    , 2000);
                
                }else{
                    $('#modal_form').modal('hide');
                    swal('Pesan','Save Data Gagal', 'error');           
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

</script>
