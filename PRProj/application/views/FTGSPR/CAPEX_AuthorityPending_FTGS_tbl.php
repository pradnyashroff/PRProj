<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pendding Table Interplant CAPEX FTGS </title>
    <?php include_once 'styles.php'; ?>
	<style>
		   @media (min-width: 992px) {

		   .row-fluid {
			overflow-x: scroll;
			white-space: nowrap;
			max-height:500px;
		  }
		  .col-md-3 {
			display: inline-block;
			vertical-align: top;
			float: none;
		  }
		}

		label,.col-sm-1,.box-title
		{
			color:#3482AE;
			text-transform: uppercase;
			font-family:'exo';
		}

		table{
			font-size:12px!important;
			border:1px solid black;
			border-color:#3482AE;
			text-align: center;
			width:100%;
			box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);
		}
		th {
			font-family:'exo';
			text-transform: uppercase;
		}
		thead,th,td
		{
			font-family:'exo';
			text-align: center;
		}
		body{
			font-family:'exo';
		}
		</style>
	</head>
	<body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >
		<?php include_once 'headsidelistFTGS.php'; ?>			
		<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
			<section class="content-header">
				<h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Pendding Table Interplant CAPEX FTGS</h1>
				<ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
					<li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-dashboard"></i> Home</a></li>
					<li> <a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;">FTGS CAPEX</a></li>
					<li class="active" style="color:#FFFFFF;text-transform: uppercase;">Pendding Table Interplant CAPEX FTGS</li>
				</ol>
			</section>
			<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-body">
							<form id="frm-example" action="" method="POST">
								<a href="#" id="excel" title="Generate Excel Sheet" ><img src="<?php echo base_url(); ?>assets/images/excel.jpg" style="heu=ight:30px;width:30px;"></img></a>
								<br><br><table id="example" class="table table">
									<thead>
										<tr style="background-color:#3482AE;color:#FFFFFF;">
											<th>CAPEX NO</th>
											<th>QCS NO</th>
											<th>PR NO</th>
											<th>CAPEX DATE</th>
											<th>CAPEX OWNER NAME</th>
											<th>CAPITAL/REVENUE</th>
											<th>SELECTED SUPPLIER</th>
											<th>CAPEX Status</th>
										</tr>
									</thead>
									<tbody>
									<!-- approval 1 capex-->
										<?php 
											$pendingList= $this->method_call->IONfetchpenddingDetails($emp_code);
											if($pendingList!=null)
											{
												$sr_no=1;			  
												foreach ($pendingList->result() as $row)  
												{  
										?>
										<tr>
											<td> <a href="<?php echo site_url('FTGS_PR/Ftgs_pr/CAPEX_approval1View/'.$row->ftgs_capex_id);?>" style="color:red;" class="glyphicon glyphicon-edit"><?php echo $row->ftgs_capex_id; ?></a></td>
											<td><?php echo $row->ftgs_qcs_id;?></td>
											<td><?php echo $row->ftgs_pr_id;?></td>
											<td><?php echo $row->ftgs_capex_date;?></td>
											<td><?php echo $row->ftgs_cap_recommender;?></td>
											<td><?php echo $row->ftgs_radio_val;?></td>
											<td><?php echo $row->ftgs_cap_sel_supplier;?></td>
											<td>
												<?php 
													$st = $row->ftgs_capex_status;
													$status= "";
													if($st == '1')
													echo 'Pendding';
													?></td>
												</tr>
												<?php $sr_no++;
												}
											}
										?>
										
										
										
										<!-- approval 2 capex-->
										<?php 
											$pendingList= $this->method_call->AssetfetchpenddingDetails($emp_code);
											if($pendingList!=null)
											{
												$sr_no=1;			  
												foreach ($pendingList->result() as $row)  
												{  
										?>
										<tr>
											<td> <a href="<?php echo site_url('FTGS_PR/Ftgs_pr/CAPEX_approval2View/'.$row->ftgs_capex_id);?>" style="color:red;" class="glyphicon glyphicon-edit"><?php echo $row->ftgs_capex_id; ?></a></td>
											<td><?php echo $row->ftgs_qcs_id;?></td>
											<td><?php echo $row->ftgs_pr_id;?></td>
											<td><?php echo $row->ftgs_capex_date;?></td>
											<td><?php echo $row->ftgs_cap_recommender;?></td>
											<td><?php echo $row->ftgs_radio_val;?></td>
											<td><?php echo $row->ftgs_cap_sel_supplier;?></td>
											<td>
												<?php 
													$st = $row->ftgs_capex_status;
													$status= "";
													if($st == '1')
													echo 'Pendding';
													?></td>
												</tr>
												<?php $sr_no++;
												}
											}
										?>
										
									</tbody>
								</table>
								<pre id="example-console-rows" style="display:none!important"></pre>
								<pre id="example-console-form" style="display:none!important"></pre>
								<input type="hidden" name="can_id" id="can_id"> 
							</form>
						</div>
                     </div>
				</div>
             </div>
		</section>
	</div>
	<?php include_once 'scripts.php'; ?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.js"></script>
	<script>
		$(document).ready(function(){ 
			var doc = new jsPDF();
			var specialElementHandlers = {
				'#editor': function(element, renderer){
					return true;
				}
			};
			$('#cmd').click(function () {
				doc.fromHTML($('#example').get(0), 15, 15, {
					'width': 170, 
					'elementHandlers': specialElementHandlers
				});
				doc.save('sample-file.pdf');
			});
		});
    $(function () {
		$('#example').excelTableFilter();
	});
	$(document).ready(function (){
		var table = $('#example').DataTable({
			'columnDefs': [
				{
					'targets': 0,
					'checkboxes': {
					'selectRow': true
				}
			}
		],
		'select': {
        'style': 'multi'
      },
	  "bStateSave": true,
	  "ordering": false,
      'order': [[1, 'desc']]
   });
	$("#status_filter").change(function () {
		var num=$(this).val();
		$('input[type=search].form-control').val(num);
	    $('input[type=search].form-control').keyup();
	});
    $('#frm-example').on('submit', function(e){
		var form = this;
		var rows_selected = table.column(0).checkboxes.selected();
		$.each(rows_selected, function(index, rowId){
        $(form).append(
            $('<input>')
            .attr('type', 'text')
            .attr('name', 'id[]')
            .val(rowId)
         );
     });
	$('#example-console-rows').text(rows_selected.join(","));
		$('#can_id').val(rows_selected.join(","));
        $('#example-console-form').text($(form).serialize());
        $('input[name="id\[\]"]', form).remove();
     });   
	});
	</script>
  </body>
</html>