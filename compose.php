<?
	// compose.php
	// forked from OpenNewsletter
	// nathan.manzi@eye4you.com.au
	
	session_start();
	require_once("includes/config.php");
	
	// Removed existing code, added phpmailer code.
	require("includes/class.phpmailer.php");
	
	// Check to see if the session is still valid...
	if($_SESSION["valid"] != true)
	{
	    header("Location: index.php");
	}
	
	// Time to send!
	if($_POST["action"] == "send")
	{
		 $fp = fopen("$db_file", "r");
		 while (!feof($fp))
		 {
			$char = fread($fp, 1);
			if($char == ",")
			{
				// Rewrite message with unsubscription and publishing notes.
				$unsubscribe = '<br /><font face="Verdana" size="2"><hr noshade /><br /><b>If you would like to unsubscribe your email ' . $buffer . ' from the eye4you mailing list, please click <a href="http://newsletter.eye4you.com.au/unsubscribe.php?email=' . $buffer . '">here.</a></b><br /></font><br />';
				$publisher = '<font face="Verdana" size="2">be inspired! is published by:<br /><br />eye4you Pty Ltd<br />Suite 4 / 4 Canning Rd, Kalamunda WA 6076, Australia<br />ABN: 37 111 073 520<br />Ph: +61 8 9257 3842   Fax: +61 8 9257 3843<br /><a href="http://www.eye4you.com.au">www.eye4you.com.au</a><br />';

				$message = $_POST["message"] . $unsubscribe . $publisher;
				
				$mail = new PHPMailer();
				
				$mail->From = $admin_email;
				$mail->FromName = $admin_name;
				$mail->AddAddress($buffer);
				$mail->AddReplyTo($admin_email, $admin_name);
				
				$mail->IsHTML(true);
				
				$mail->Subject = $_POST["subject"];
				$mail->Body    = $message;
				$mail->AltBody = $_POST["ptbody"];
				
				if(!$mail->Send())
				{
					$badsend = "1";
					echo "ERROR ERROR!";
					echo $ErrorInfo;
					exit;
				}
				else
				{
					$badsend = "0";
				}
				
				$buffer = "";
			}
			else
			{
				$buffer .= "$char";
			}
		 }
		 fclose($fp);
		if($badsend == "0")
			$msg .= "<div class=message>The newsletter has been sent to all the subscribers</div><br>";
		else
			$msg .= "<div class=error>The newsletter could not be sent to all the subscribers</div><br>";

	}
	
	$main .= "
			<div class=page_heading>Compose Newsletter</div>
			$msg
			<form name=form action='compose.php?type=$_GET[type]' method='post'>
			<table width=95%>
			<tr>
				<td><b>Subject</b>:<br>
				<input class=textField2 type=text name=subject title='Please enter a subject for the newsletter.'> <span class=error_text id=label_subject></span></td>
			</tr>
			<tr>
				<td><b>From</b>:<br>
				<input class=textField2 disabled type=text name=email_from value='$admin_name <$admin_email>'></td>
			</tr>
			<tr>
				<td>
				<table cellpadding=0 cellspacing=0 width=90%>
				<tr><td><b>HTML Message</b>:</td></tr>
				<tr><td><textarea rows=25 cols=97% name=message title='Please write something in the HTML message area.'></textarea><span class=error_text id=label_message></span></td></tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>
				<table cellpadding=0 cellspacing=0 width=90%>
				<tr><td><b>Plain Text Message</b>:</td></tr>
				<tr><td><textarea rows=25 cols=97% name=ptbody title='Please write something in the PT message area.'></textarea><span class=error_text id=label_message></span></td></tr>
				</table>
				</td>
			</tr>
			<tr>
				<td><input class=button type=submit value=Send><input type=hidden name=action value=send></td>
			</tr>
			</table>
			</form>
			";

	$page = "compose";
	require_once("includes/template.php");
?>