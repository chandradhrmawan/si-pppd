<form name="form" id="form" enctype="multipart/form-data" method="post">
<div class="row">
  <div class="col-md-12">
    <div class="box box-info" id="box-input">
      <div class="box-body pad">
            <div class="form-group">
              <label>jabatan</label>
              <select name="id_jabatan" id="id_jabatan" class="form-control">
                <option value="">--</option>
                <?php foreach ($data_jabatan as $key => $value): ?>
                  <option value="<?=$value->id_jabatan?>"><?=$value->nm_jabatan?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group">
              <label>Role</label>
              <select name="id_role" id="id_role" class="form-control">
                <option value="">--</option>
                <?php foreach ($data_role as $key => $value): ?>
                  <option value="<?=$value->id_role?>"><?=$value->nm_role?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group">
              <label>Status</label>
              <select name="status" id="status" class="form-control">
                <option value="">--</option>
                  <option value="0">Tidak Aktif</option>
                  <option value="0">Aktif</option>
              </select>
            </div>

            <div class="form-group">
              <button type="button" class="btn btn-primary btn-flat" style="margin-right: 5px;" onclick="printPrev()">
          <i class="fa fa-search"></i> Show Data
        </button>
        <button type="button" class="btn btn-success btn-flat" style="margin-right: 5px;" onclick="exportExcel()">
              <i class="fa fa-file-excel-o"></i> Export Excel</button>
            </div>
      </div>
    </div>

    <div class="box">
      <div id="table-show"></div>
    </div>
  </div>
    
  </div>


</form>
<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">

 const doPrint = () => {
    $('#box-input').hide();
    $('#btn-print').hide();
    window.print();
    $('#box-input').show();
    $('#btn-print').show();
  }

  const printPrev = () => {
    let id_jabatan = $('#id_jabatan').val()
    let id_role    = $('#id_role').val()
    let status     = $('#status').val()

    $.ajax({
        url : "<?php echo site_url('laporan/Users/listData')?>?id_jabatan="+id_jabatan+"&id_role="+id_role+"&status="+status,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('#table-show').html(data)
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get data from ajax');
        }
      });
  }
  const exportExcel = () => {
    let id_jabatan = $('#id_jabatan').val()
    let id_role    = $('#id_role').val()
    let status     = $('#status').val()

    let url = "<?php echo site_url('laporan/Users/exportExcel')?>?id_jabatan="+id_jabatan+"&id_role="+id_role+"&status="+status
    window.open(url,"_blank")
  }
  printPrev()

</script>



