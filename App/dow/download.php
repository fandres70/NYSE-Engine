/*Copyright (c) <2014> Author Vance King Saxbe. A, and contributors Power Dominion Enterprise, Precieux Consulting and other contributors. Modelled, Architected and designed by Vance King Saxbe. A. with the geeks from GoldSax Consulting and GoldSax Technologies email @vsaxbe@yahoo.com. Development teams from Power Dominion Enterprise, Precieux Consulting. Project sponsored by GoldSax Foundation, GoldSax Group and executed by GoldSax Manager.*/

function getTime() 
    { 
    $a = explode (' ',microtime()); 
    return(double) $a[0] + $a[1]; 
    } 
$Start = getTime();

$scz[0] = "AA";
$scz[1] = "AXP";
$scz[2] = "BA";
$scz[3] = "BAC";
$scz[4] = "CAT";
$scz[5] = "CSCO";
$scz[6] = "CVX";
$scz[7] = "DD";
$scz[8] = "DIS";
$scz[9] = "GE";
$scz[10] = "HD";
$scz[11] = "HPQ";
$scz[12] = "IBM";
$scz[13] = "INTC";
$scz[14] = "JNJ";
$scz[15] = "JPM";
$scz[16] = "KFT";
$scz[17] = "KO";
$scz[18] = "MCD";
$scz[19] = "MMM";
$scz[20] = "MRK";
$scz[21] = "MSFT";
$scz[22] = "PFE";
$scz[23] = "PG";
$scz[24] = "T";
$scz[25] = "TRV";
$scz[26] = "UTX";
$scz[27] = "VZ";
$scz[28] = "WMT";
$scz[29] = "XOM";















$day = date("d");

$month = date("m");
$year = date("Y");

for ( $i = 0; $i <= 29; $i++) { 
$url = "http://ichart.finance.yahoo.com/table.csv?s=".$scz[$i]."&d=".$month."&e=".$day."&f=".$year."&g=d&a=".$month."&b=".$day."&c=2000&ignore=.csv";
$file = $scz[$i].".csv"; echo $scz[$i]."Downloading....";
copy ( $url, $file );
}
$End = getTime(); 

echo "&T= ".number_format(($End - $Start),2)." secs";

?>