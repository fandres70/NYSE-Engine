<?php
$quote = file_get_contents('http://finance.google.co.uk/finance/info?client=ig&q=NYSE:HCN');
$avgp = "56.98"; 
$high = "57.31";
$low = "56.93";
 $json = str_replace("\n", "", $quote);
  $data = substr($json, 4, strlen($json) -5);
  $json_output = json_decode($data, true);
  echo "&L=".$json_output['l']."&N=HCN&"; 
$temp = file_get_contents("HCNTEMP.txt", "r");
  

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
$filename= 'HCN.txt'; 
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
            $wrote = fputs($filedash, "HCN:". "breaking:PHIGH:"."Buy Cost:".$risk."\r\n");
		fclose( $filedash );
		
			
     }   


if (($json_output['l'] < $high ) && ($temp>= $high ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
     
         $filedash = fopen("alert.txt", "a+");
             $wrote = fputs($filedash, "HCN:". "retracing:PHIGH:"."\r\n");
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
         $wrote = fputs($filedash, "HCN:". "breaking:PLOW:"."short Cost:".$risk."\r\n");
		fclose( $filedash );
     }   

if (($json_output['l'] > $low ) && ($temp<= $low ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
    $filedash = fopen("alert.txt", "a+");
     $wrote = fputs($filedash, "HCN:". "retracing:PLOW:"."\r\n");
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
     $wrote = fputs($filedash, "HCN:". "sliding up:PAVG:"."Buy Cost:".$risk."\r\n");
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
        $wrote = fputs($filedash, "HCN:". "Sliding down:PAVG:"."Short Cost:".$risk."\r\n");
	fclose( $filedash );	 
     }   
}
$filedash = fopen("HCNTEMP.txt", "w");
        $wrote = fputs($filedash,  $json_output['l']);
	fclose( $filedash );

//echo "&chg=".$json_output['cp']."&"; 
?>
