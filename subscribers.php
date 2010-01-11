<?
	session_start();
	require_once("includes/config.php");
	
	if($_SESSION["valid"] != true)
	{
	    header("Location: index.php");
	}
	
	if(file_exists($db_file)) {
	
		if($_GET["action"] == "add")
		{
			$fp = fopen("$db_file", "r");
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
				$msg = "<div class=error>Cannot add subscriber, subscriber already exists...</div>";
			}
			else
			{
				$fp = fopen("$db_file", "a+");
				fwrite($fp, $_GET["email"] . ",");
				fclose($fp);
				$msg = "<div class=message>Subscriber added successfully...</div>";
			}
		}
		
		if($_GET["action"] == "delete")
		{	
			$fp = fopen("$db_file", "r");
			$file_text = fread($fp, 999999);
			fclose($fp);
			
			$fp = fopen("$db_file", "w");
			$file_text_new = str_replace("$_GET[email],", "", $file_text);
			fwrite($fp, $file_text_new);
			fclose($fp);
			$msg = "<div class=message>Subscriber deleted successfully...</div><br>";
		}
		
		$main .= "
				<div class=page_heading>Manage Subscribers</div>
				$msg
				<table width=95%>
				<tr>
				<td align=center>
				<div class=heading2>add a subscribers</div><br>
				<form name=add action='subscribers.php' method='get'>
				Email<br>
				<input class=textField type=text name=email title='Please enter a valid email address...'>
				<br>
				<span class=error_text id=label_email></span>
				<br>
				<input type=hidden name=action value=add>
				<input type=submit value=Add>
				</form>
				</td>
				<td align=center>
					<div class=heading2>delete a subscribers</div><br>
					<form action='subscribers.php' method='get'>
					Email<br>
					<select class=textField name=email>";
						$fp = fopen("$db_file", "r");
						while (!feof($fp))
						{
							$char = fread($fp, 1);
							if($char == ",")
							{
								$main .= "<option>$buffer</option>";
								$buffer = "";
							}
							else
							{
								$buffer .= "$char";
							}
						}
						fclose($fp);
				 $main .= "</select><br><br>
				 <input type=hidden name=action value=delete>
				 <input type=submit value=Delete>
				 </form>
				 </td>
				 </tr>
				 </table>";
	} else {
		$main = alertbox("Database Error", "I'm sorry, but the database file was not found.");
	}
	$page = "subscribers";
	require_once("includes/template.php");
?>