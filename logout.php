<?
	session_start();

	$_SESSION['valid'] = false;
	
	header("Location: index.php");
?>