<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Report</title> 
    <?php include_once 'styles.php'; ?>
    <style>
      label,.col-sm-1,.box-title
      {
        color:#3482AE;
        text-transform: uppercase;
        font-family:'exo';
      }
      .kv-file-upload{
        display:none;
      }
      @media (min-width: 992px) {
        .row-fluid 
        {
          overflow-x: scroll;
          white-space: nowrap;
          max-height:500px;
        }
        .col-md-3 
        {
          display: inline-block;
          vertical-align: top;
          float: none;
        }
      }
      .col-lg-3,.col-lg-6{
        border:2px solid #FFFFFF;
        box-shadow: 0 4px 8px 0 rgba(40, 40, 40, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
        text-align:center;
        padding-top:1%;
        padding-bottom:1%;
        height: 50%;
        text-transform: uppercase;
        font-family:'exo';
      }
    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >     
    <?php include_once 'headsidelist.php'; ?> 
    <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
      <section class="content-header">  
        <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Reports
        <?php
          if (isset($error)) {
            echo "<div class='message'>";
            echo $error;
            echo "</div>";
          }
        ?>
        </h1>
        <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
          <li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-Home"></i> Home</a></li>
          <li> <a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;">LMS</a></li>
          <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Reports</li>
        </ol>
      </section>
      <section class="content">
        <div class="wrapper">
          <div class="box-body">
            <div class="row" style="margin-left:0%;margin-right:0%;">
              <div class="col-lg-6">
                <div id="plantwiseBook" style="width: 100%; height: 100%;"></div>
              </div>
              <div class="col-lg-6">
                <div id="dueDateWiseBook" style="width: 100%; height: 100%;"></div>
              </div>
            </div>
            <div class="row" style="margin-left:0%;margin-right:0%;">
              <div class="col-lg-6">
                <div id="plantWiseBookRequest" style="width: 100%; height: 100%;"></div>
              </div>
            </div>
           </div>
        </div>
      </section>
      <?php include_once 'scripts.php'; ?>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function (){
          var table = $('#example').DataTable({
            'columnDefs': [
            {
              'targets': 0,
            }
          ],
          'select': {
            'style': 'multi'
          },
          "bStateSave": true,
          "ordering": false,
          'order': [[1, 'desc']]
        });
      });
    </script>
    ad>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(plantwisebook);
        google.charts.setOnLoadCallback(DueDateWisebook);
         google.charts.setOnLoadCallback(plantWiseBookRequest);
        function plantwisebook() {
              $.ajax({
                type: 'POST',
                url: 'PlantWiseReport',
                success: function (data1) {
                  var data = new google.visualization.DataTable();
                  data.addColumn('string', 'plant_name');
                  data.addColumn('number', 'order_id');
                  var jsonData = $.parseJSON(data1);
                  for (var i = 0; i < jsonData.length; i++) {
                   data.addRow([jsonData[i].plant_name, parseInt(jsonData[i].order_id)]);
                 }
                 var options = {
                  legend: '',
                  pieSliceText: 'label',
                  title: 'PlantWise Book Given',
                   is3D: true,
                };
               var chart = new google.visualization.PieChart(document.getElementById('plantwiseBook'));
                chart.draw(data, options);
               }
            });
          }
          function DueDateWisebook() {
              $.ajax({
                type: 'POST',
                url: 'DueDateWiseReport',
                success: function (data1) {
                  var data = new google.visualization.DataTable();
                  data.addColumn('string', 'plant_name');
                  data.addColumn('number', 'order_id');
                  var jsonData = $.parseJSON(data1);
                  for (var i = 0; i < jsonData.length; i++) {
                   data.addRow([jsonData[i].plant_name, parseInt(jsonData[i].order_id)]);
                 }
                 var options = {
                  legend: '',
                  pieSliceText: 'label',
                  title: 'DueDateWise Book Details',
                  is3D: true,
                };
               var chart = new google.visualization.PieChart(document.getElementById('dueDateWiseBook'));
                chart.draw(data, options);
               }
            });
          }
          function plantWiseBookRequest() {
              $.ajax({
                type: 'POST',
                url: 'plantWiseBookRequest',
                success: function (data1) {
                  var data = new google.visualization.DataTable();
                  data.addColumn('string', 'plant_name');
                  data.addColumn('number', 'order_id');
                  var jsonData = $.parseJSON(data1);
                  for (var i = 0; i < jsonData.length; i++) {
                   data.addRow([jsonData[i].plant_name, parseInt(jsonData[i].order_id)]);
                 }
                 var options = {
                  legend: '',
                  pieSliceText: 'label',
                  title: 'PlantWise Book Request',
                  is3D: true,
                };
               var chart = new google.visualization.PieChart(document.getElementById('plantWiseBookRequest'));
                chart.draw(data, options);
               }
            });
          }

      </script>
  </body>
</html>

