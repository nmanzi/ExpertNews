<?
	session_start();
	require_once("includes/config.php");
	
	if($_GET["action"] == "subscribe")
	{	
		$fp = fopen("$sub_file", "r");
		$file_text = fread($fp, 999999);
		fclose($fp);
		
		$subscribers = explode(",",$file_text);
		foreach($subscribers as $subscriber)
		{
			if($subscriber == $_GET["email"])
			{
				$result = 1;
				break;
			}
			else
			{
				$result = 0;
			}
		}
		
		if($result == 1)
		{
			$main = "<div align=\"left\">Thank you for subscribing to the <b><em>be inspired!</em></b> newsletter!</div>";
		}
		else
		{
			if($deactivated == "on")
			{
				$main = "<div align=\"left\">We're sorry!<br /><br />The <b><em>be inspired!</em></b> newsletter subscription service is temporarily unavailable. We've been informed and we'll fix the problem in a jiffy. Please try again soon!</div>";
			}
			else
			{
				$fp = fopen("$sub_file", "a+");
				fwrite($fp, $_GET["email"] . ",");
				fclose($fp);
				$main = "<div align=\"left\">You have been subscribed successfully.<br />Thank you for subscribing to the <b><em>be inspired!</em></b> newsletter!</div>";
			}
		}
	}
	else
	{
		$main = "<div align=\"left\">Please <a href=\"http://www.eye4you.com.au/beinspired.php\">Subscribe to the newsletter.</a></div>";
	}
	require_once('includes/pubtemplate.php');
?>