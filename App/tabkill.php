/*Owner & Copyrights: Vance King Saxbe. A.*//*Copyright (c) <2014> Author Vance King Saxbe. A, and contributors Power Dominion Enterprise, Precieux Consulting and other contributors. Modelled, Architected and designed by Vance King Saxbe. A. with the geeks from GoldSax Consulting and GoldSax Technologies email @vsaxbe@yahoo.com. Development teams from Power Dominion Enterprise, Precieux Consulting. Project sponsored by GoldSax Foundation, GoldSax Group and executed by GoldSax Manager.*/
function getTime() 
    { 
    $a = explode (' ',microtime()); 
    return(double) $a[0] + $a[1]; 
    } 
$Start = getTime();

$sc[0] = "IBM";
$sc[1] = "MMM";
$sc[2] = "CVX";
$sc[3] = "XOM";
$sc[4] = "UTX";
$sc[5] = "JNJ";
$sc[6] = "PG";
$sc[7] = "MCD";
$sc[8] = "KO";
$sc[9] = "CAT";
$sc[10] = "BA";
$sc[11] = "WMT";
$sc[12] = "TRV";
$sc[13] = "HPQ";
$sc[14] = "JPM";
$sc[15] = "AXP";
$sc[16] = "DFT";
$sc[17] = "MRK";
$sc[18] = "VZ";
$sc[19] = "DIS";
$sc[20] = "HD";
$sc[21] = "KFT";
$sc[22] = "T";
$sc[23] = "MSFT";
$sc[24] = "CSCO";
$sc[25] = "INTC";
$sc[26] = "BAC";
$sc[27] = "PFE";
$sc[28] = "GE";
$sc[29] = "AA";
$sc[30] = "ORCL";
$sc[31] = "GOOG";
$sc[32] = "AAPL";
$sc[33] = "MSI";
$sc[34] = "EXC";
$sc[35] = "SO";
$sc[36] = "D";
$sc[37] = "CTL";
$sc[38] = "ACN";
$sc[39] = "CIT";
$sc[40] = "";
$sc[41] = "C";
$sc[42] = "APPL";
$sc[43] = "CASY";
$sc[44] = "GS";
$sc[45] = "MS";
$sc[46] = "AIG";
$sc[47] = "PCX";
$sc[48] = "BHI";
$sc[49] = "ETR";
$sc[50] = "PXD";
$sc[51] = "NFLX";


$cont = file_get_contents('yuk.txt');
$stop = ".";
for ( $i = 0; $i <= 51; $i++ ) {
$conti = str_replace("XRFGYUT",$sc[$i],$cont);
$filename= "tab.php"; //The name of your .txt file
$file = fopen($filename, "a+" );
fwrite( $file, $conti."\r\n" ); //Write the data input box to the .txt file.
fclose( $file ); //Close the file from further editing
}
$End = getTime(); 
echo "&T= ".number_format(($End - $Start),2)." secs";
echo "&result=Updated in....";
?>/*email to provide support at vancekingsaxbe@powerdominionenterprise.com, businessaffairs@powerdominionenterprise.com, For donations please write to fundraising@powerdominionenterprise.com*/