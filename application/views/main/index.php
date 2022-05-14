<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$jml_tugas?></h3>

              <p>Jumlah Surat Tugas</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-clipboard"></i>
            </div>
            <a href="<?=base_url()?>transaksi/Tugas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$jml_kegiatan?><sup style="font-size: 20px"></sup></h3>

              <p>Jumlah Kegiata Aktif</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-car"></i>
            </div>
            <a href="<?=base_url()?>transaksi/Kegiatan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$jml_pelanggaran?></h3>

              <p>Jumlah Pelanggaran</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-contacts"></i>
            </div>
            <a href="<?=base_url()?>transaksi/Pelanggaran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
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
               <div id="container_bar2"></div>  
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
               <div id="container_pie2"></div>  
              </div>
        </div>
        </div>
      </div>
      /.row (main row) -->

</section>


<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() { 
   bar_chart();
   bar_chart2();
  //  pie_tahun();
  //  pie_jenis();
   $('.highcharts-credits').hide();
});

const gantiTahun = (tahun) => {
  $.blockUI({ message: '<span style="font-weight:bold;">Permintaan Anda Sedang Diproses...</span>' });
  $.ajax({
    url : "<?php echo base_url() ?>main/listData",
    type: "POST",
    data: {"tahun":tahun},
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

  console.log(data)

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

const bar_chart2 = (data=null) => {
  Highcharts.chart('container_bar2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Statistik Penerbitan'
    },
    subtitle: {
        text: 'Data Penerbitan'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.f} Orang</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series:<?=$chart_data2?>
  });
}


</script>
