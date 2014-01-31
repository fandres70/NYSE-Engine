<?php
$quote = file_get_contents('http://finance.google.co.uk/finance/info?client=ig&q=NYSE:XRAY');
$avgp = "40.10"; 
$high = "40.36";
$low = "40.00";
 $json = str_replace("\n", "", $quote);
  $data = substr($json, 4, strlen($json) -5);
  $json_output = json_decode($data, true);
  echo "&L=".$json_output['l']."&N=XRAY&"; 
$temp = file_get_contents("XRAYTEMP.txt", "r");
  

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
$filename= 'XRAY.txt'; 
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
            $wrote = fputs($filedash, "XRAY:". "breaking:PHIGH:"."Buy Cost:".$risk."\r\n");
		fclose( $filedash );
		
			
     }   


if (($json_output['l'] < $high ) && ($temp>= $high ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
     
         $filedash = fopen("alert.txt", "a+");
             $wrote = fputs($filedash, "XRAY:". "retracing:PHIGH:"."\r\n");
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
         $wrote = fputs($filedash, "XRAY:". "breaking:PLOW:"."short Cost:".$risk."\r\n");
		fclose( $filedash );
     }   

if (($json_output['l'] > $low ) && ($temp<= $low ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
    $filedash = fopen("alert.txt", "a+");
     $wrote = fputs($filedash, "XRAY:". "retracing:PLOW:"."\r\n");
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
     $wrote = fputs($filedash, "XRAY:". "sliding up:PAVG:"."Buy Cost:".$risk."\r\n");
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
        $wrote = fputs($filedash, "XRAY:". "Sliding down:PAVG:"."Short Cost:".$risk."\r\n");
	fclose( $filedash );	 
     }   
}
$filedash = fopen("XRAYTEMP.txt", "w");
        $wrote = fputs($filedash,  $json_output['l']);
	fclose( $filedash );

//echo "&chg=".$json_output['cp']."&"; 
?>
