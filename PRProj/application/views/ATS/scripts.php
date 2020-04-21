<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url(); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>plugins/tableexport/libs/FileSaver/FileSaver.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>plugins/tableexport/libs/js-xlsx/xlsx.core.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/tableexport/tableExport.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/tableexport/tableExport.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>

<script src="<?php echo base_url(); ?>dist/js/sortable.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>dist/js/fileinput.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url(); ?>dist/fa/theme.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<script type="text/javascript" src="<?php echo base_url(); ?>plugins/sorter/sort.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/sweetalert/sweetalert2.min.js"></script>





<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script>
		
		$(".na").click(function() {
	swal('The department you have selected does not match your profile in the organization. Please select the correct department or contact the IT administrator.');

		});
		
</script>
<script>
		
		$(function() {
  $('.onlynum').on('keydown',function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
		
</script>

<script>
		
		$("#excel").click(function() {
	$('#example').tableExport({type:'excel'});

		});
		
</script>

<script type="text/javascript">




		$(function() {
			
			var dateToday = new Date(); 
$('.dtrange').daterangepicker({
			

    "alwaysShowCalendars": true,
       "singleDatePicker": true,
 "buttonClasses": "none",
 "opens": "center",
 "drops": "down",
  "minDate": dateToday,
  
	
  locale: {
            format: 'DD-MM-YYYY'
        }
    
}, function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});
});





</script>


<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
    CKEDITOR.replace('editor3')
    CKEDITOR.replace('editor4')
   
   
  })
  
  $('#menu-toggle').click( function(){
    $(this).toggleClass('fa fa-caret-square-o-right').toggleClass('fa fa-caret-square-o-left');
});
</script>
<script>


var min = 40;
var max = 360;
var mainmin = 200;

$('#split-bar').mousedown(function (e) {
    e.preventDefault();
    $(document).mousemove(function (e) {
        e.preventDefault();
        var x = e.pageX - $('#sidebar').offset().left;
        if (x > min && x < max && e.pageX < ($(window).width() - mainmin)) {  
          $('#sidebar').css("width", x);
          $('.content-wrapper').css("margin-left", x);
        }
    })
});
$(document).mouseup(function (e) {
    $(document).unbind('mousemove');
});









</script>