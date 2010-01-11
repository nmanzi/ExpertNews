<?

	// MySQL management module for the ENMI
	// Written by Nathan Manzi - nathan.manzi@synflare.com
	
	require_once('config.php');
	
	function getmaillist($dbname,$dbusername,$dbpasswd,$tablename) {
		$query = "SELECT email FROM ".$tablename;
		$link = mysql_connect('localhost', $dbusername, $dbpasswd);
		if (!$link) {
		   	die('Could not connect: ' . mysql_error());
		}
		$dbopen = mysql_select_db($dbname, $link);
		if (!$dbopen) {
		   	die ('Invalid DB : ' . mysql_error());
		}
		$result = mysql_query($query, $link);
		if (!$result) {
			die ('Can\'t talk to the database : ' . mysql_error());
		}
		echo $result;
	}
	
	getmaillist("eye4you_Newsletter", "news_sql", "eye4you", "customers");
?>