<?
	require_once("includes/config.php");

	session_start();
	
	if($_SESSION["valid"] != true)
	{
	    header("Location: index.php");
	}
	
	if($_POST["action"] == "update")
	{	
		$fp = fopen("includes/config.php", "w");
		$file_text = "<?
	\$admin_name = '$_POST[admin_name]';
	\$admin_email = '$_POST[admin_email]';
	\$unsubscribe_link = '$_POST[unsubscribe_link]';
	\$site_url = '$_POST[site_url]';
	\$db_file = '$_POST[db_file]';
	\$sub_file = '$_POST[sub_file]';
	\$unsub_file = '$_POST[unsub_file]';
	\$deactivated = '$_POST[active]';
	require('functions.php');
?>";
		fwrite($fp, $file_text);
		fclose($fp);
		$msg = infobox("Settings Updated!", "All configuration changes have been saved.");
	}
	
	if($unsubscribe_link == 'on') $un = 'checked';
	if($deactivated == 'on') $de = 'checked';
	
	$main .= "
			<div class=page_heading>Settings</div>
			$msg
			<form name=form action='settings.php' method='post'>
			 Name (Emails are sent as this)<br>
			 <input class=textField type=text name='admin_name' value='$admin_name' title='Please enter name.'>
			 <br>
			 <span class=error_text id=label_admin_name></span>
			 <br>
			 Email (Emails are sent as this)<br>
			 <input class=textField type=text name='admin_email' value='$admin_email' title='Please enter a valid email address.'>
			 <br>
			 <span class=error_text id=label_admin_email></span>
			 <br>
			 Site URL<br>
			 <input class=textField type=text name='site_url' value='$site_url' title='Please enter a valid URL for site.'>
			 <br>
			 <span class=error_text id=label_site_url></span>
			 <br>
			 Database File<br>
			 <input type=hidden name=old_db_file value=$db_file>
			 <input class=textField type=text name='db_file' value='$db_file' title='Please enter a valid db file name.'>
			 <br>
			 <span class=error_text id=label_db_file></span>
			 <br>
			 New Subscriptions Database File<br>
			 <input type=hidden name=old_sub_db_file value=$sub_file>
			 <input class=textField type=text name='sub_file' value='$sub_file' title='Please enter a valid db file name.'>
			 <br>
			 <span class=error_text id=label_sub_db_file></span>
			 <br>
			 Unsubscriptions Database File<br>
			 <input type=hidden name=old_unsub_db_file value=$unsub_file>
			 <input class=textField type=text name='unsub_file' value='$unsub_file' title='Please enter a valid db file name.'>
			 <br>
			 <span class=error_text id=label_unsub_db_file></span>
			 <br>
			 Send Unsubscribe Link<br>
			 <input class=textField type=checkbox $un name='unsubscribe_link' title='Please enter a valid Newsletter Charset.'>
			 <br>
			 Deactivate Subscriptions<br>
			 <input class=textField type=checkbox $de name='active' title='Deactivate Subscriptions?'>
			 <br><br>
			 <input type=hidden name=action value=update>
			 <input class=button type=submit value=Update>
			 </form>
			 <script language=javascript>
				var validator  = new Validator('form');
				validator.addValidation('admin_username','req','');
				validator.addValidation('admin_name','req','');
				validator.addValidation('admin_email','req','');
				validator.addValidation('admin_email','email','');
				validator.addValidation('site_url','req','');
				validator.addValidation('db_file','req','');
			</script>
			 ";
	
	$page = "settings";
	require_once("includes/template.php");
?>