<?
	session_start();
	require_once("includes/config.php");
	if(isset($_GET['email'])) $remove = "1";
	if(isset($_POST['email'])) $remove = "1";
	
	if ($remove == "1")
	{
		$fp = fopen("$unsub_file", "a+");
		if(isset($_GET['email'])) fwrite($fp, $_GET["email"] . ",");
		if(isset($_POST['email'])) fwrite($fp, $_POST["email"] . ",");
		fclose($fp);
		$main = '<div align="left">You have been unsubscribed successfully...</div><br><div align="left">To return to the eye4you main page, click <a href="http://www.eye4you.com.au">here</a></div>';
	}
	else
	{
		$main = '<div align="left">No Unsubscribe Link. Refer to email.</div>';
	}
	require_once("includes/pubtemplate.php");
?>