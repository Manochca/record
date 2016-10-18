<?php
	if($_POST['exit']){
		session_start();
		unset($_SESSION['password']);
		unset($_SESSION['username']); 
		session_destroy();
		header('Location: index.php');
	}
?>