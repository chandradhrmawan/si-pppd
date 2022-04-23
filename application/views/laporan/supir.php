<form name="form" id="form" enctype="multipart/form-data" method="post">
<div class="row">
  <div class="col-md-12">
    <div class="box box-info" id="box-input">
      <div class="box-body pad">
            <div class="form-group">
              <label>NIP</label>
              <input type="text" name="nip" id="nip" class="form-control">
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-primary btn-flat" style="margin-right: 5px;" onclick="printPrev()">
          <i class="fa fa-search"></i> Show Data
        </button>
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
    let nip = $('#nip').val()

    $.ajax({
        url : "<?php echo site_url('laporan/Supir/listData')?>?nip="+nip,
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
     let nip = $('#nip').val()

    let url = "<?php echo site_url('laporan/Supir/exportExcel')?>?nip="+nip
    window.open(url,"_blank")
  }
  printPrev()

</script>



