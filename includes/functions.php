<?

	function alertbox($title, $message) {
		$output = '<div align="center"><table width="80%" style="margin: 0.5em 7.5%; border: 1px solid #000; padding: 0.5em; font-size: 92%; background-color: #F8EABA" cellpadding="3"><tr><td valign="middle"><img src="/images/alerts/Diamond-caution.png"></img></td><td style="width: 100%"><font size="2"><b>'.$title.'</b></font><br>'.$message.'</td></tr></table></div>';
		return $output;
	}
	
	function infobox($title, $message) {
		$output = '<div align="center"><table width="80%" style="margin: 0.5em 7.5%; border: 1px solid #000; padding: 0.5em; font-size: 92%; background-color: #F5F5DC" cellpadding="3"><tr><td valign="middle"><img src="/images/alerts/Circle-question.png"></img></td><td style="width: 100%"><font size="2"><b>'.$title.'</b></font><br>'.$message.'</td></tr></table></div>';
		return $output;
	}
	
?>