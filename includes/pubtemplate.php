<html>
<head>
	<title>eye4you Newsletter Interface</title>
	<meta name="keywords" content="opennewsletter, OpenNewsletter, Open Newsletter, Open PHP Newsletter, open-source newsletter, free newsletter, free php newsletter, self exile, sohail abid, web helix, self.exile@gmail.com, creator of opennewsletter,">
	<meta name="description" content="OpenNewsletter is a free & open-source newsletter/mailing-list manager developed in php Self Exile. It does not require a database. You just need to put it in your website and its running!">
	<style>
	body, td, th { color:#4466BB; font-family: Verdana; line-height:1.5; font-size:12px; }
	a, a:visited { border-bottom:1px dotted #4466BB; text-decoration:none; color:#4466BB; }
	a:hover		 { background-color:#DFE8FF; text-decoration:none; }


	.menu_header           { color: white; font-weight: bold; text-decoration: none; text-align: center; vertical-align: middle }
	.menu_header a:link    { color: white; background-color: #4466BB; display: block; padding: 3px; border:1px solid #5f81d7; }
	.menu_header a:visited { color: white; background-color: #4466BB; display: block; padding: 3px; border:1px solid #5f81d7; }
	.menu_header a:hover   { color: white; background-color: #5f81d7; display: block; padding: 3px; border:1px solid #5f81d7; }
	.menu_header a:active  { color: white; background-color: #4466BB; display: block; padding: 3px; border:1px solid #5f81d7; }
	a.menu2, a.menu2:visited{ color:#FFFFFF; background-color:#5f81d7; }
	a.menu2:hover			{ color:#FFFFFF; background-color:#5f81d7; }
	
	h1, h2, h3, h4 { font-weight:normal; }
	hr 			{ color:#eeeeee; height:1px; }
	input, textarea, select { font-family:Verdana; font-size:12px; color:#4466BB; border:1px solid #4466BB; }
	.textField 	{ width:200px; }
	.textField2 	{ width:620px; }
	.button 	{ background-image:url(images/bg_button.gif); width:91; height:22; color:#000000; border:0; padding-bottom:3px; font-weight:bold; }
	.copyright 	{ color:#5f81d7; font-size:11px; }
	.heading 	{ font-size:24px; }
	.heading2 	{ font-size:16px; font-weight:bold; }
	.page_heading { font-size:18px; width:100%; border-bottom:1px solid #DFE8FF; text-align:left; margin-bottom:10px; }
	.message	{ width:80%; color:#4466BB; background-color:#DFE8FF; padding:5px; border:1px solid #4466BB; text-align:center; }
	.error		{ width:80%; color:#4466BB; background-color:#DFE8FF; padding:5px; border:1px solid #4466BB; text-align:center; }
	.error_text		{ color:#FF0000; }
</style>
<script language="JavaScript" type="text/javascript" src="includes/gen_validatorv2.js"></script>

<?php
if($page == "compose" && $_GET["type"]=="html")
{
?>
<!-- tinyMCE -->
<script language="javascript" type="text/javascript" src="includes/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">

	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		theme_advanced_buttons1 : "fontselect,fontsizeselect,formatselect,separator,bold,italic,underline,strikethrough,separator,sup,sub,separator,cut,copy,paste,separator,undo,redo",
		theme_advanced_buttons2 : "justifyleft,justifycenter,justifyright,justifyfull,separator,bullist,numlist,separator,outdent,indent,separator,forecolor,backcolor,separator,hr,link,unlink,anchor,image,table,separator,charmap,code",
		theme_advanced_buttons3 : "",
 		theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        plugins : "advimage,table,",
 		
		debug : false
	});
</script>
<!-- /tinyMCE -->
<?php
}
?>

</head>

<body bgcolor='f3f3f3'>
<table align=center width='750' border='0' cellpadding='0' cellspacing='0' background='images/content_bkg.gif'>
<tr><td><img src='images/content_cap_top.gif' width='750' height='8'></td></tr>
<tr>
	<td style='padding-top:10px;padding-left:20px;padding-bottom:10px;padding-right:20px;'>
	
	<div class="heading" style="border-bottom:1px solid #DFE8FF; margin-bottom:5px; ">
	  <div align="center"><img src="../images/trans-small.gif" width="161" height="51" align="absmiddle">
	    newsletter management v0.2a</div>
	</div>	
	
	<table width=100% style="margin-top:5px;margin-bottom:5px;">
	<tr>
	<td>
		<div align="center" style="border:1px solid #DFE8FF; padding:10px;">
			<? echo $main; ?>
		</div>
	</td>
	</tr>
	</table>
	
	<div style='border:1px solid #DFE8FF; padding:3px;' align='center' class=copyright><span class="heading" style="border-bottom:1px solid #DFE8FF; margin-bottom:5px; "> <font size=1> <a href='http://www.eye4you.com.au'>Home Page</a> | <a href='http://www.eye4you.com.au/premium/'>eye4you Central</a></font></span></div>
	
	
	</td>
</tr>
<tr><td><img src='images/content_cap_bottom.gif' width='750' height='12'></td></tr>
</table>
</body>
</html>