<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" dir="ltr" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Loading directly an RSS feed and displaying it</title></head>
<link type="text/css" href="rss-style.css" rel="stylesheet">
	
<body bgcolor="#FFFFFF">
<h1>RSS 2.0 Demo Direct</h1>
<hr>
<div id="zone" > Loads directly an RSS file and displays the list of recent articles. 
</div>

<br>
<fieldset class="rsslib">
/*Copyright (c) <2014> Author Vance King Saxbe. A, and contributors Power Dominion Enterprise, Precieux Consulting and other contributors. Modelled, Architected and designed by Vance King Saxbe. A. with the geeks from GoldSax Consulting and GoldSax Technologies email @vsaxbe@yahoo.com. Development teams from Power Dominion Enterprise, Precieux Consulting. Project sponsored by GoldSax Foundation, GoldSax Group and executed by GoldSax Manager.*/
	require_once("rsslib.php");
	$url = "http://www.scriptol.com/rss.xml";
	echo RSS_Display($url, 15, false, true);
?>
</fieldset>
</body>
</html>
