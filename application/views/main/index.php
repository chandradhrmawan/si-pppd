<?php error_reporting(0) ?>
<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$jml_sewa?></h3>

              <p>Jumlah Surat Tugas</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-clipboard"></i>
            </div>
            <a href="<?=base_url()?>transaksi/Sewa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$jml_kendaraan?><sup style="font-size: 20px"></sup></h3>

              <p>Jumlah Kegiata Aktif</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-car"></i>
            </div>
            <a href="<?=base_url()?>master/Kendaraan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$jml_users?></h3>

              <p>Jumlah Pelanggaran</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-contacts"></i>
            </div>
            <a href="<?=base_url()?>master/Users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- <div class="col-lg-3 col-xs-6"> -->
          <!-- small box -->
          <!-- <div class="small-box bg-red"> -->
            <!-- <div class="inner"> -->
              <!-- <h3>Rp. <?=number_format($jml_service,2)?></h3> -->

              <!-- <p>Total Pengeluaran Service</p> -->
            <!-- </div> -->
            <!-- <div class="icon"> -->
              <!-- <i class="ion ion-calculator"></i> -->
            <!-- </div> -->
            <!-- <a href="<?=base_url()?>transaksi/Service" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          <!-- </div> -->
        <!-- </div> -->
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <!-- start the chart -->
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/series-label.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <script src="https://code.highcharts.com/modules/export-data.js"></script>

      <div class="row">
        <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
               
              </div>
            </div>
            <div class="box-body pad">

              <form class="form-inline">
              <div class="form-group mx-sm-3 mb-2">
                <label>Tahun</label>
                <select name="tahun" id="tahun" class="form-control" onchange="gantiTahun(this.value)">
                  <option value="">--Pilih Tahun--</option>
                  <?php foreach ($tahun as $key => $value) { ?>
                    <option value="<?=$value->tahun?>"><?=$value->tahun?></option>
                  <?php } ?>
                </select>
              </div>
              </form>
               <div id="container_bar"></div>  
              <!-- end konten -->
            </div>
        </div>
        </div>

       <!-- <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body pad">
               <div id="container_pie1"></div>  
              </div>
        </div>
        </div> -->

        <!-- <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body pad">
               <div id="container_pie2"></div>  
              </div>
        </div>
        </div> -->
      </div>
      <!-- /.row (main row) -->

</section>


<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() { 
   bar_chart();
  //  pie_tahun();
  //  pie_jenis();
   $('.highcharts-credits').hide();
});

const gantiTahun = (tahun) => {
  $.blockUI({ message: '<span style="font-weight:bold;">Permintaan Anda Sedang Diproses...</span>' });
  $.ajax({
    url : "<?php echo base_url() ?>main/listData",
    type: "POST",
    data: {"data":tahun},
    dataType : "json",
    success: function(data)
    { 
      $.unblockUI();
      bar_chart(data);
     },
     error: function (jqXHR, textStatus, errorThrown)
     {
      alert('Error adding / update data');
      $.unblockUI();
     }
  });
}

const bar_chart = (data="") => {

  data = (data == "") ? <?php echo json_encode($chart_data) ?> : data ;
  // bar chart
  // Create the chart

  Highcharts.setOptions({
      chart: {
            style: {
                fontFamily: "Trebuchet MS"
            }
        },
       lang: {
           thousandsSep: ','
       }
   });


  Highcharts.chart('container_bar', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Statisik Pelanggaran'
      },
      subtitle: {
          text: 'Data Pelanggaran'
      },
      xAxis: {
          type: 'category'
      },
      yAxis: {
          title: {
              text: 'Jumlah '
          }

      },
      legend: {
          enabled: false
      },
      plotOptions: {
          series: {
              borderWidth: 0,
              dataLabels: {
                  enabled: true,
                  format: '{y}'
              }
          }
      },

      tooltip: {
          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>Jumlah {point.y}</b><br/>'
      },

      "series": [
          {
              "name": "Bulan",
              "colorByPoint": true,
              "data": data
          }
      ]
  });
  $('.highcharts-credits').hide();
}

/* const pie_tahun = (data = "") => {

  data = (data == "") ? <?php echo json_encode($pie_tahun) ?> : data ;

  Highcharts.chart('container_pie1', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Chart Kendaraan Berdasarkan Tahun Produksi'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false
              },
              showInLegend: true
          }
      },
      series: [{
          name: 'Presentase',
          colorByPoint: true,
          data: data
      }]
  });
  $('.highcharts-credits').hide();
}

const pie_jenis = (data = "") => {

   data = (data == "") ? <?php echo json_encode($pie_jenis) ?> : data ;

  Highcharts.chart('container_pie2', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Chart Kendaraan Berdasarkan Tipe Kendaraan'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false
              },
              showInLegend: true
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: data
      }]
  });
  $('.highcharts-credits').hide();
} */

</script>
