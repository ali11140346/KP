<script>
  var chart; 
  $(document).ready(function() {
      chart = new Highcharts.Chart(
      {
        
       chart: {
        renderTo: 'mygraph',
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false
       },   
       title: {
        text: 'Grafik Jumlah Santri Berdasarkan Jenis Kelamin'
       },
       tooltip: {
        formatter: function() {
          return '<b>'+
          this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
        }
       },
       
      
       plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            color: '#000000',
            connectorColor: 'green',
            formatter: function() 
            {
              return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
            }
          }
        }
       },
     
        series: [{
        type: 'pie',
        name: 'Grafik Santri Per Jenis Kelamin',
        data: [
        <?php

          $qs = $db->query("SELECT * FROM prosentase_kelamin");
          while ($row = $qs->fetch(PDO::FETCH_ASSOC)) {
            $jenkel = $row['jenkel'];
            $jumlah = $row['jum_per_kelamin'];
            ?>
            [ 
              '<?php echo $jenkel ?>', <?php echo $jumlah; ?>
            ],
            <?php
          }
          ?>
     
        ]
      }]
      });
  }); 

  $(document).ready(function() {
      chart = new Highcharts.Chart(
      {
        
       chart: {
        renderTo: 'mygraph2',
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false
       },   
       title: {
        text: 'Grafik Jumlah Santri Berdasarkan Komplek'
       },
       tooltip: {
        formatter: function() {
          return '<b>'+
          this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
        }
       },
       
      
       plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            color: '#000000',
            connectorColor: 'green',
            formatter: function() 
            {
              return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
            }
          }
        }
       },
     
        series: [{
        type: 'pie',
        name: 'Grafik Santri Per Jenis Kelamin',
        data: [
        <?php

          $qs2 = $db->query("SELECT * FROM prosentase");
          while ($row2 = $qs2->fetch(PDO::FETCH_ASSOC)) {
            $nama_komplek = $row2['nama_komplek'];
            $jmlsantri = $row2['jum_santri'];
            ?>
            [ 
              '<?php echo $nama_komplek ?>', <?php echo $jmlsantri; ?>
            ],
            <?php
          }
          ?>
     
        ]
      }]
      });
  }); 
</script>
<div class="row-fluid">
  <div class="span6 ">
    <div class="widget blue">
        <div class="widget-title">
            <h4><i class="icon-bar-chart"></i> Grafik Sebaran Jumlah Santri Berdasarkan Jenis Kelamin</h4>
          <span class="tools">
              <a href="javascript:;" class="icon-chevron-down"></a>
              <a href="javascript:;" class="icon-remove"></a>
          </span>
        </div>
        <div class="widget-body">
          <div id ="mygraph"></div>
        </div>
    </div>
  </div>
  <div class="span6 ">
    <div class="widget green">
        <div class="widget-title">
            <h4><i class="icon-bar-chart"></i> Grafik Sebaran Jumlah Santri Beradasarkan Komplek</h4>
          <span class="tools">
              <a href="javascript:;" class="icon-chevron-down"></a>
              <a href="javascript:;" class="icon-remove"></a>
          </span>
        </div>
        <div class="widget-body">
          <div id ="mygraph2"></div>
        </div>
    </div>
  </div>
</div>