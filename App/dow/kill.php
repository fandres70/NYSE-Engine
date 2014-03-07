/*Owner & Copyrights: Vance King Saxbe. A.*//*Copyright (c) <2014> Author Vance King Saxbe. A, and contributors Power Dominion Enterprise, Precieux Consulting and other contributors. Modelled, Architected and designed by Vance King Saxbe. A. with the geeks from GoldSax Consulting and GoldSax Technologies email @vsaxbe@yahoo.com. Development teams from Power Dominion Enterprise, Precieux Consulting. Project sponsored by GoldSax Foundation, GoldSax Group and executed by GoldSax Manager.*/
function getTime() 
    { 
    $a = explode (' ',microtime()); 
    return(double) $a[0] + $a[1]; 
    } 
$Start = getTime();

$sc[0] = "AA";
$sc[1] = "AXP";
$sc[2] = "BA";
$sc[3] = "BAC";
$sc[4] = "CAT";
$sc[5] = "CSCO";
$sc[6] = "CVX";
$sc[7] = "DD";
$sc[8] = "DIS";
$sc[9] = "GE";
$sc[10] = "HD";
$sc[11] = "HPQ";
$sc[12] = "IBM";
$sc[13] = "INTC";
$sc[14] = "JNJ";
$sc[15] = "JPM";
$sc[16] = "KFT";
$sc[17] = "KO";
$sc[18] = "MCD";
$sc[19] = "MMM";
$sc[20] = "MRK";
$sc[21] = "MSFT";
$sc[22] = "PFE";
$sc[23] = "PG";
$sc[24] = "T";
$sc[25] = "TRV";
$sc[26] = "UTX";
$sc[27] = "VZ";
$sc[28] = "WMT";
$sc[29] = "XOM";




$sci[0] = "NYSE";
$sci[1] = "NYSE";
$sci[2] = "NYSE";
$sci[3] = "NYSE";
$sci[4] = "NYSE";
$sci[5] = "NASDAQ";
$sci[6] = "NYSE";
$sci[7] = "NYSE";
$sci[8] = "NYSE";
$sci[9] = "NYSE";
$sci[10] = "NYSE";
$sci[11] = "NYSE";
$sci[12] = "NYSE";
$sci[13] = "NASDAQ";
$sci[14] = "NYSE";
$sci[15] = "NYSE";
$sci[16] = "NYSE";
$sci[17] = "NYSE";
$sci[18] = "NYSE";
$sci[19] = "NYSE";
$sci[20] = "NYSE";
$sci[21] = "NASDAQ";
$sci[22] = "NYSE";
$sci[23] = "NYSE";
$sci[24] = "NYSE";
$sci[25] = "NYSE";
$sci[26] = "NYSE";
$sci[27] = "NYSE";
$sci[28] = "NYSE";
$sci[29] = "NYSE";














$cont = file_get_contents('fuck.txt');
$stop = ".";
for ( $i = 0; $i <= 29; $i++ ) {

$myFile = $sc[$i].$stop."php";

unlink($myFile);

$xFile = $sc[$i].$stop."txt";

unlink($xFile);
$fil = $sc[$i].".csv";
$row = 0;
$fille = fopen($fil, "r");
while (($data = fgetcsv($fille, 8000, ",")) !== FALSE) {

if ( $row == 1) 
{  
$avgp = $data[4];
$high = $data[2];
$low = $data[3];
}
   
    $row++; 
}
fclose($fille);



$conti = str_replace("ICICIBANK",$sc[$i],$cont);
$contii = str_replace("ZPXURY",$sci[$i],$conti);
$contiii = str_replace("average",$avgp,$contii);
$contiiii = str_replace("previoushigh",$high,$contiii);
$contiiiii = str_replace("previouslow",$low,$contiiii);



$filename= $sc[$i].$stop."php"; //The name of your .txt file
$file = fopen($filename, "a+" );









fwrite( $file, $contiiiii."\r\n" ); //Write the data input box to the .txt file.

fclose( $file ); //Close the file from further editing

}
$End = getTime(); 

echo "&T= ".number_format(($End - $Start),2)." secs";
echo "&result=Updated in....";
?>/*email to provide support at vancekingsaxbe@powerdominionenterprise.com, businessaffairs@powerdominionenterprise.com, For donations please write to fundraising@powerdominionenterprise.com*/