/*Owner & Copyrights: Vance King Saxbe. A.*/<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" dir="ltr" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Demo of RSS 2.0 feed cached</title></head>
<link type="text/css" href="rss-style.css" rel="stylesheet">
	
<body bgcolor="#FFFFFF">
<h1>Demo of RSS 2.0 feed cached</h1>
<hr>
<div id="zone" > Loads  an RSS file from a cached copy and update the copy at a given frequency. 
</div>

<br>
<fieldset class="rsslib">
/*Copyright (c) <2014> Author Vance King Saxbe. A, and contributors Power Dominion Enterprise, Precieux Consulting and other contributors. Modelled, Architected and designed by Vance King Saxbe. A. with the geeks from GoldSax Consulting and GoldSax Technologies email @vsaxbe@yahoo.com. Development teams from Power Dominion Enterprise, Precieux Consulting. Project sponsored by GoldSax Foundation, GoldSax Group and executed by GoldSax Manager.*/
$cachename = "rss-cache-tmp.php";
$url = "http://www.scriptol.com/rss.xml"; 
if(file_exists($cachename))
{
  $now = date("G");
  $time = date("G", filemtime($cachename));
  if($time == $now)
  {
     include($cachename);
     exit();
  }
}
require_once("rsslib.php");
$cache = RSS_Display($url, 15, false, true);
file_put_contents($cachename, $cache);
echo $cache;
?>
</fieldset>

(c) 201 Scriptol.com.
</body>
</html>
/*email to provide support at vancekingsaxbe@powerdominionenterprise.com, businessaffairs@powerdominionenterprise.com, For donations please write to fundraising@powerdominionenterprise.com*/