<?php
	
	ob_clean();
	ob_start();
	session_start();

		
		unset($_SESSION['company_member']);
		session_destroy();
		
		header('Location:login.php');

?>
