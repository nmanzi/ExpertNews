<?
	session_start();
	require_once("includes/config.php");
	
	if($_SESSION["valid"] == true)
	{
		$main = "
				<div class=\"page_heading\">Version Information</div>
				<div align=\"left\">
				Welcome to ExpertNews v0.1<br />
				<ul>
				<li>July 31st, 2006: Registered sourceforge.net project, site uploaded to <a href='http://expertnews.sourceforge.net'>expertnews.sourceforge.net</a>. Also submitted to CVS.
				<li>July 20th, 2006: Implemented <a href='http://phpmailer.sourceforge.net/'>phpmailer</a> code.</li>
				<li>July 5th, 2006: Renamed to ExpertNews, forked from the OpenNewsletter Project (<a href=\"http://sohail.econs.net/opennewsletter/\">found here</a>)</li>
				</ul>
				<br />
				<b>TO-DO</b>
				<ul>
				<li>Clean and improve mail sending code <b>DONE</b></li>
				<li>Implement list import utility</li>
				<li>Templates and template management</li>
				<li>MySQL Integration</li>
				<li>HTML file upload and send</li>
				<li>List seperation, campaign tracking</li>
				</ul>
				</div>
		        ";
	}
	else
	{
		if($_GET["msg"] == "error")
		$main = alertbox("Login Failed", "The username or password was entered incorrectly. Please try again.");			
		$main .= "<div class=\"heading2\">Login to ExpertNews</div><br />
				 <form action='login.php' method='post'>
				 Username<br />
				 <input class=\"textField\" type=\"text\" name=\"username\" /><br /><br />
				 Password<br />
				 <input class=\"textField\" type=\"password\" name=\"password\" /><br /><br />
				 <input class=\"button\" type=\"submit\" value=\"Login\" />
				 </form>";
	}

	$page = "home";
	require_once("includes/template.php");
?>