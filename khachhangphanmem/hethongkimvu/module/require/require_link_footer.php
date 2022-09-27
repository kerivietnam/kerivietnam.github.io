<?php
	if(!isset($_SESSION["company_member"])){
		@session_start();
	}
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/plugins/bootstrap-datetimepicker.js"></script>
    <script src="../js/plugins/bootstrap-notify.js"></script>
    <script src="../js/plugins/bootstrap-switch.js"></script>
    <script src="../js/plugins/fullcalendar.min.js"></script>
    <script src="../js/plugins/jquery-jvectormap.js"></script>
    <script src="../js/plugins/jquery.bootstrap-wizard.js"></script>
    <script src="../js/plugins/jquery.validate.min.js"></script>
    <script src="../js/plugins/moment.min.js"></script>
    <script src="../js/plugins/nouislider.min.js"></script>
    <script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="../js/plugins/sweetalert2.min.js"></script>
    <script src="../js/core/bootstrap.min.js"></script>
    <script src="../js/core/jquery.min.js"></script>
    <script src="../js/core/popper.min.js"></script>
    <script src="../js/now-ui-dashboard.minaa26.js" type="text/javascript"></script>
    <script src="../js/plugins/jquery.dataTables.min.js"></script>
    <script src="./demo/jquery.sharrre.js"></script>
    <script src="../js/core/function.js"></script>
	
	<?php
		if (!isset($_SESSION['company_member'])) {
	?>

	<script language="javascript">
		$("button.btn").css({'display':'none'});
	</script>
   <?php
		} else if ($_SESSION['company_member']["name_user"] != "admin" && $_SESSION['company_member']["name_user"] != "nhphuong") {
			echo $_SESSION["company_member"]["name_user"];
			//exit();
	?>
		<script language="javascript">
	var all = $("button.btn").each(function() {
		//console.log($(this).html());
		if(($(this).html()).toUpperCase() == "XÓA")
			//alert($(this).html());
			$(this).remove();
	});
	</script>
	   <?php
		}
	?>
