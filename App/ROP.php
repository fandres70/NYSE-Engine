/*Owner & Copyrights: Vance King Saxbe. A.*//*Copyright (c) <2014> Author Vance King Saxbe. A, and contributors Power Dominion Enterprise, Precieux Consulting and other contributors. Modelled, Architected and designed by Vance King Saxbe. A. with the geeks from GoldSax Consulting and GoldSax Technologies email @vsaxbe@yahoo.com. Development teams from Power Dominion Enterprise, Precieux Consulting. Project sponsored by GoldSax Foundation, GoldSax Group and executed by GoldSax Manager.*/
$quote = file_get_contents('http://finance.google.co.uk/finance/info?client=ig&q=NYSE:ROP');
$avgp = "102.22"; 
$high = "103.47";
$low = "101.93";
 $json = str_replace("\n", "", $quote);
  $data = substr($json, 4, strlen($json) -5);
  $json_output = json_decode($data, true);
  echo "&L=".$json_output['l']."&N=ROP&"; 
$temp = file_get_contents("ROPTEMP.txt", "r");
  

if ($json_output['l'] != $temp ) {
if ( $json_output['l'] > $temp ) { 
if ( ($json_output['l'] > ($avgp + $high)/2) && ($json_output['l'] < $high)) { echo "&sign=au" ; }
if ( ($json_output['l'] < ($avgp + $low)/2) && ($json_output['l'] > $low)) { echo "&sign=ad" ; }
if ( $json_output['l'] < ($low - (($avgp - $low)/2)) ) { echo "&sign=as" ; }
if ( $json_output['l'] > ($high + (($high - $avgp)/2)) ) { echo "&sign=al" ; } 
 if ( ($json_output['l'] < ($high + (($high - $avgp)/2))) && ($json_output['l'] > $high)) { echo "&sign=auu" ; }
if ( ($json_output['l'] > ($low - (($avgp - $low)/2))) && ($json_output['l'] < $low)) { echo "&sign=add" ; }
//else { echo "&sign=a" ; } 
}
if ( $json_output['l'] < $temp ) { 
 if ( ($json_output['l'] > ($avgp + $high)/2) && ($json_output['l'] < $high)) { echo "&sign=bu" ; }
if ( ($json_output['l'] < ($avgp + $low)/2) && ($json_output['l'] > $low)) { echo "&sign=bd" ; }
if ( $json_output['l'] < ($low - (($avgp - $low)/2)) ) { echo "&sign=bs" ; }
if ( $json_output['l'] > ($high + (($high - $avgp)/2)) ) { echo "&sign=bl" ; } 
 if ( ($json_output['l'] < ($high + (($high - $avgp)/2))) && ($json_output['l'] > $high)) { echo "&sign=buu" ; }
if ( ($json_output['l'] > ($low - (($avgp - $low)/2))) && ($json_output['l'] < $low)) { echo "&sign=bdd" ; }
// else { echo "&sign=b" ; }
 }
$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
$filename= 'ROP.txt'; 
$file = fopen($filename, "a+" );

fwrite( $file, $json_output['l'].":".$time."\r\n" ); 

fclose( $file ); 


if (($json_output['l'] > $high ) && ($temp<= $high ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
$risk = ($json_output['l'] - $low) * (200000/$json_output['l']);
          $filedash = fopen("alert.txt", "a+");
            $wrote = fputs($filedash, "ROP:". "breaking:PHIGH:"."Buy Cost:".$risk."\r\n");
		fclose( $filedash );
		
			
     }   


if (($json_output['l'] < $high ) && ($temp>= $high ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
     
         $filedash = fopen("alert.txt", "a+");
             $wrote = fputs($filedash, "ROP:". "retracing:PHIGH:"."\r\n");
		fclose( $filedash );
   
     }   

if (($json_output['l'] < $low ) && ($temp>= $low ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;
$risk = ($high - $json_output['l']) * (200000/$json_output['l']);
$time = date('h:i:s',$new_time);
     $filedash = fopen("alert.txt", "a+");
         $wrote = fputs($filedash, "ROP:". "breaking:PLOW:"."short Cost:".$risk."\r\n");
		fclose( $filedash );
     }   

if (($json_output['l'] > $low ) && ($temp<= $low ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
    $filedash = fopen("alert.txt", "a+");
     $wrote = fputs($filedash, "ROP:". "retracing:PLOW:"."\r\n");
	fclose( $filedash );
     }   

if (($json_output['l'] > $avgp ) && ($temp<= $avgp ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;
$risk = ($json_output['l'] - $low) * (200000/$json_output['l']);
$time = date('h:i:s',$new_time);
     $filedash = fopen("alert.txt", "a+");
     $wrote = fputs($filedash, "ROP:". "sliding up:PAVG:"."Buy Cost:".$risk."\r\n");
	fclose( $filedash );
     }   

if (($json_output['l'] < $avgp ) && ($temp>= $avgp ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;
$risk = ($high - $json_output['l']) * (200000/$json_output['l']);
$time = date('h:i:s',$new_time);
     $filedash = fopen("alert.txt", "a+");
        $wrote = fputs($filedash, "ROP:". "Sliding down:PAVG:"."Short Cost:".$risk."\r\n");
	fclose( $filedash );	 
     }   
}
$filedash = fopen("ROPTEMP.txt", "w");
        $wrote = fputs($filedash,  $json_output['l']);
	fclose( $filedash );

//echo "&chg=".$json_output['cp']."&"; 
?>
/*email to provide support at vancekingsaxbe@powerdominionenterprise.com, businessaffairs@powerdominionenterprise.com, For donations please write to fundraising@powerdominionenterprise.com*/