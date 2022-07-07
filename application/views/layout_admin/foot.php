</section>
<!-- /.content -->
</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2022 SI-PPPD.</strong> All rights
    reserved.
  </footer>

</div>
<input type="hidden" name="lon_hid" id="lon_hid">
<input type="hidden" name="lat_hid" id="lat_hid">
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>assets/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!--Block UI -->
<script src="<?= base_url() ?>assets/admin/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/sweet/sweetalert.min.js"></script>
<link href="<?php echo base_url(); ?>assets/sweet/sweetalert.css" rel="stylesheet" type="text/css" />
<!-- FastClick -->
<script src="<?=base_url()?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/admin/dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="<?=base_url()?>assets/admin/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url()?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url()?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Morris.js charts -->
<script src="<?=base_url()?>assets/admin/bower_components/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>assets/admin/bower_components/morris.js/morris.min.js"></script>
<script>
  $(function () {
    getGeoLocation()
     $('.select2').select2()
     $('.textarea').wysihtml5()
     $('.datepicker').datepicker({
      autoclose: true,
      language: "id",
      todayHighlight: true,
      dateFormat: 'dd/mm/yyyy' 
     })

    let id_role = "<?=$this->session->userdata('id_role')?>";

    setInterval(()=>{ 
     
      if(id_role == 4){
        updateLoc("<?=$this->session->userdata('id_user')?>")
      }

    }, 5000);

    // function updateLoc(id_user)
    // {
    //   let lon = $('#lon_hid').val()
    //   let lat = $('#lat_hid').val()

    //   $.ajax({
    //     url: '<?=base_url()?>transaksi/Monitoring/updateLoc/'+id_user,
    //     method: 'POST',
    //     data:{"lon":lon,"lat":lat},
    //     dataType: "JSON",
    //     success: function(response) {
    //      console.log(response)
    //     },
    //     error: function (jqXHR, textStatus, errorThrown){
    //       alert('Error adding / update data');
    //     }
    //   });
    // }


    function getGeoLocation(){
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((e)=>{
          let lon      = e.coords.longitude
          let lat      = e.coords.latitude
          
          $('#lon_hid').val(lon)
          $('#lat_hid').val(lat)

        });
      } else { 
        alert("Geolocation is not supported by this browser.");
      }
    }


  })
</script>
</body>
</html>