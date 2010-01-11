<?
	session_start();
	require_once("includes/config.php");
	require_once("includes/incognito.php");
	if(isset($_POST["username"])) $username = $_POST["username"]; else $username = "";
	if(isset($_POST["password"])) $password = $_POST["password"]; else $password = "";
	
	if($admin_username == $username && $admin_password == $password)
	{
		$_SESSION['valid'] = true;
		header("Location: index.php");
	}
	else
	{
		$_SESSION['valid'] = false;
		header("Location: index.php?msg=error");
	}

?>