<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Local Reimbursement</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<style>
		body{
			font-family:'exo';
			}
		thead,th,td
		{
			font-family:'exo';
			text-align: center;
		}
		th {
			font-family:'exo';
			text-transform: uppercase;
		}
		table{
			font-size:12px!important;
			border:1px solid black;
			border-color:#3482AE;
			text-align: center;
			width:100%;
			box-shadow: 5px 5px 5px 5px rgba(46,61,73,0.15);
		}

		label,.col-sm-1,.box-title
		{
			color:#3482AE;
			text-transform: uppercase;
			font-family:'exo';
		}
		</style>
        
		
    </head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >      	  
        <?php include_once 'headsidelist.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <!-- Content Header (Page header) -->
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Dashboard
                    <?php
                    if (isset($error)) {
                        echo "<div class='message'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
                </h1>
                <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
                    <li><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/create_local_claim') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li> <a href="<?php echo site_url('ELAR/local_reim/Local_cntr/create_local_claim') ?>" style="color:#FFFFFF;text-transform: uppercase;">Cash Reimbursement</a></li>
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Accepted Request Table
                    </li>
                    </li>
                </ol>
            </section>
			<section class="content">
      <div class="row">
        <div class="col-xs-12">
     
          <div class="box">
            
            <!-- /.box-header -->
           <div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);height:60%;">             
				
			</div>
           </div>
         </div>
        </div>
       </section></div>
<!-- /.content -->
    
<!--Edit delete action model pop up end from here-->
			<div class="modal fade displaycontent" id="selectCliam">
                <div class="modal-dialog" role="document" style="width: 720px;">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#3482AE">
                          
                            <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Select Claim</h4>
                        </div>
                        <div class="modal-body" style="height:200px; margin-top:50px;">
                            <section class="module pt-10" id="contact" >
                                <div class="container" style="width: auto;">
                                      <div class="row">
                                            <div class="col-sm-12" style="  ">
                                                <select class="form-control" required name="selectVal" id="selectVal" onchange="changeFunc();">
													 <option value="" >Select Claim</option>
													 <option value="LocalClaim" >Local Claim</option>
													 <option value="IOUClaim" >IOU Claim</option>
													 <option value="OtherClaim" >Other Claim</option>
													 <option value="TravelClaim" >Travel Claim</option>
												</select>
                                             </div>
										</div>
								</div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
<?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script type="text/javascript">


$(function() {
  $('#selectCliam').modal({
    show: true,
    keyboard: false,
    backdrop: 'static'
  });
});
	
	
    $(document).ready(function(){
        $("#selectCliam").modal('show');
    });

function changeFunc()
{

	 var selectBox = document.getElementById("selectVal");
	 var selectedValue = selectBox.options[selectBox.selectedIndex].value;
   
	if(selectedValue=="LocalClaim")
	{
		window.location.href = "localDashboard";
	}
	else if(selectedValue=="IOUClaim")
	{
		window.location.href = "localDashboard";
	}
	
}

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

     $("#status_filter").change(function () {
			   var num=$(this).val();
			   $('input[type=search].form-control').val(num);
	
    $('input[type=search].form-control').keyup();
		 });
		
		
   // Handle form submission event
    $('#frm-example').on('submit', function(e){
      var form = this;
      


      // FOR DEMONSTRATION ONLY
      // The code below is not needed in production
      
      // Output form data to a console     
      $('#example-console-rows').text(rows_selected.join(","));
      $('#can_id').val(rows_selected.join(","));
      
      // Output form data to a console     
      $('#example-console-form').text($(form).serialize());
       
      // Remove added elements
      $('input[name="id\[\]"]', form).remove();
       
      // Prevent actual form submission
    
   });   
});

</script>
</body>
</html>

