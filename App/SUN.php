<?php
/*
$quote = file_get_contents('http://finance.google.co.uk/finance/info?client=ig&q=NYSE:SUN');
$avgp = "0.05"; 
$high = "0.05";
$low = "0.05";
 $json = str_replace("\n", "", $quote);
  $data = substr($json, 4, strlen($json) -5);
  $json_output = json_decode($data, true);
  echo "&L=".$json_output['l']."&N=SUN&"; 
$temp = file_get_contents("SUNTEMP.txt", "r");
  */
$json_output['l'] = file_get_contents('SUNLAST.txt');
$avgp = "0.05"; 
$high = "0.05";
$low = "0.05";
 
  echo "&L=".$json_output['l']."&N=SUN&"; 
$temp = file_get_contents("SUNTEMP.txt", "r");



if ($json_output['l'] != $temp ) {
$mhigh = ($avgp + $high)/2;
$mlow = ($avgp + $low)/2;
$llow = ($low - (($avgp - $low)/2));
$hhigh = ($high + (($high - $avgp)/2));
$diff = $json_output['l']  - $temp;
$diff = number_format($diff, 2, '.', '');
$avgp = number_format($avgp, 2, '.', '');
if ( $json_output['l'] > $temp ) { 
if ( ($json_output['l'] > $mhigh ) && ($json_output['l'] < $high)) { echo "&sign=au" ; }
if ( ($json_output['l'] < $mlow ) && ($json_output['l'] > $low)) { echo "&sign=ad" ; }
if ( $json_output['l'] < $llow ) { echo "&sign=as" ; }
if ( $json_output['l'] > $hhigh ) { echo "&sign=al" ; } 
 if ( ($json_output['l'] < $hhigh) && ($json_output['l'] > $high)) { echo "&sign=auu" ; }
if ( ($json_output['l'] > $llow) && ($json_output['l'] < $low)) { echo "&sign=add" ; }
//else { echo "&sign=a" ; } 
$filedish = fopen("C:\wamp\www\malert.txt", "a+");
            $write = fputs($filedish, "Sunoco:".$json_output['l']. ":Moving up:".$diff.":".$high.":".$low.":".$avgp."\r\n");
		fclose( $filedish );}
if ( $json_output['l'] < $temp ) { 
 if ( ($json_output['l'] >$mhigh) && ($json_output['l'] < $high)) { echo "&sign=bu" ; }
if ( ($json_output['l'] < $mlow) && ($json_output['l'] > $low)) { echo "&sign=bd" ; }
if ( $json_output['l'] < $llow ) { echo "&sign=bs" ; }
if ( $json_output['l'] > $hhigh ) { echo "&sign=bl" ; } 
 if ( ($json_output['l'] < $hhigh) && ($json_output['l'] > $high)) { echo "&sign=buu" ; }
if ( ($json_output['l'] > $llow) && ($json_output['l'] < $low)) { echo "&sign=bdd" ; }
// else { echo "&sign=b" ; }
 $filedish = fopen("C:\wamp\www\malert.txt", "a+");
            $write = fputs($filedish, "Sunoco:".$json_output['l']. ":Moving down:".$diff.":".$high.":".$low.":".$avgp."\r\n");
		fclose( $filedish );}
$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;
$index = file_get_contents("SNP500LAST.txt");
$time = date('h:i:s',$new_time);
$filename= 'SUN.txt'; 
$file = fopen($filename, "a+" );

fwrite( $file, $json_output['l'].":".$index.":".$time."\r\n" ); 

fclose( $file ); 

if (($json_output['l'] > $mhigh ) && ($temp<= $mhigh ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
$risk = ($json_output['l'] - $low) * (200000/$json_output['l']);
$risk = (int)$risk;
          $filedash = fopen("C:\wamp\www\alert.txt", "a+");
            $wrote = fputs($filedash, "Sunoco:".$json_output['l']. ":Approaching:PHIGH:".$high.":Buy Cost:".$risk."\r\n");
		fclose( $filedash );
		
			
     }   
if (($json_output['l'] < $mhigh ) && ($temp>= $mhigh ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;
$risk = ($high - $json_output['l']) * (200000/$json_output['l']);
$risk = (int)$risk;
$time = date('h:i:s',$new_time);
     $filedash = fopen("C:\wamp\www\alert.txt", "a+");
         $wrote = fputs($filedash, "Sunoco:". $json_output['l'].":Moving Down:PHIGH:".$high.":short Cost:".$risk."\r\n");
		fclose( $filedash );
     }   
if (($json_output['l'] > $mlow ) && ($temp<= $mlow ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
$risk = ($json_output['l'] - $low) * (200000/$json_output['l']);
$risk = (int)$risk;
          $filedash = fopen("C:\wamp\www\alert.txt", "a+");
            $wrote = fputs($filedash, "Sunoco:".$json_output['l']. ":Moving Up:PLOW:".$low.":Buy Cost:".$risk."\r\n");
		fclose( $filedash );
		
			
     }   
if (($json_output['l'] < $mlow ) && ($temp>= $mlow ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;
$risk = ($high - $json_output['l']) * (200000/$json_output['l']);
$risk = (int)$risk;
$time = date('h:i:s',$new_time);
     $filedash = fopen("C:\wamp\www\alert.txt", "a+");
         $wrote = fputs($filedash, "Sunoco:". $json_output['l'].":Approaching:PLOW:".$low.":short Cost:".$risk."\r\n");
		fclose( $filedash );
     }   
if (($json_output['l'] > $high ) && ($temp<= $high ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
$risk = ($json_output['l'] - $low) * (200000/$json_output['l']);
$risk = (int)$risk;
          $filedash = fopen("C:\wamp\www\alert.txt", "a+");
            $wrote = fputs($filedash, "Sunoco:".$json_output['l']. ":Breaking:PHIGH:".$high.":Buy Cost:".$risk."\r\n");
		fclose( $filedash );
		
			
     }   
if (($json_output['l'] > $hhigh ) && ($temp<= $hhigh ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
$risk = ($json_output['l'] - $low) * (200000/$json_output['l']);
$risk = (int)$risk;
          $filedash = fopen("C:\wamp\www\alert.txt", "a+");
            $wrote = fputs($filedash, "Sunoco:".$json_output['l']. ":Moving Beyond:PHIGH:".$high.":Buy Cost:".$risk."\r\n");
		fclose( $filedash );
		
			
     }   
if (($json_output['l'] < $hhigh ) && ($temp>= $hhigh ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
     
         $filedash = fopen("C:\wamp\www\alert.txt", "a+");
             $wrote = fputs($filedash, "Sunoco:". $json_output['l']. ":Coming near:PHIGH:".$high.":Buy Cost:".$risk."\r\n");
		fclose( $filedash );
   
     }   
if (($json_output['l'] < $high ) && ($temp>= $high ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
     
         $filedash = fopen("C:\wamp\www\alert.txt", "a+");
             $wrote = fputs($filedash, "Sunoco:". $json_output['l']. ":Retracing:PHIGH:".$high."\r\n");
		fclose( $filedash );
   
     }   
if (($json_output['l'] < $llow ) && ($temp>= $llow ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;
$risk = ($high - $json_output['l']) * (200000/$json_output['l']);
$risk = (int)$risk;
$time = date('h:i:s',$new_time);
     $filedash = fopen("C:\wamp\www\alert.txt", "a+");
         $wrote = fputs($filedash, "Sunoco:". $json_output['l'].":Breaking Beyond:PLOW:".$low.":short Cost:".$risk."\r\n");
		fclose( $filedash );
     }   
if (($json_output['l'] < $low ) && ($temp>= $low ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;
$risk = ($high - $json_output['l']) * (200000/$json_output['l']);
$risk = (int)$risk;
$time = date('h:i:s',$new_time);
     $filedash = fopen("C:\wamp\www\alert.txt", "a+");
         $wrote = fputs($filedash, "Sunoco:". $json_output['l'].":Breaking:PLOW:".$low.":short Cost:".$risk."\r\n");
		fclose( $filedash );
     }   
if (($json_output['l'] > $llow ) && ($temp<= $llow ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
    $filedash = fopen("C:\wamp\www\alert.txt", "a+");
     $wrote = fputs($filedash, "Sunoco:". $json_output['l'].":Coming near:PLOW:".$low.":short Cost:".$risk."\r\n");
	fclose( $filedash );
     }   
if (($json_output['l'] > $low ) && ($temp<= $low ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;

$time = date('h:i:s',$new_time);
    $filedash = fopen("C:\wamp\www\alert.txt", "a+");
     $wrote = fputs($filedash, "Sunoco:". $json_output['l'].":Retracing:PLOW:".$low."\r\n");
	fclose( $filedash );
     }   

if (($json_output['l'] > $avgp ) && ($temp<= $avgp ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;
$risk = ($json_output['l'] - $low) * (200000/$json_output['l']);
$risk = (int)$risk;
$avgp = number_format($avgp, 2, '.', '');
$time = date('h:i:s',$new_time);
     $filedash = fopen("C:\wamp\www\alert.txt", "a+");
     $wrote = fputs($filedash, "Sunoco:".$json_output['l']. ":Sliding up:PAVG:".$avgp.":Buy Cost:".$risk."\r\n");
	fclose( $filedash );
     }   

if (($json_output['l'] < $avgp ) && ($temp>= $avgp ))
      {$my_time = date('h:i:s',time());
$seconds2add = 19800;

$new_time= strtotime($my_time);
$new_time+=$seconds2add;
$risk = ($high - $json_output['l']) * (200000/$json_output['l']);
$risk = (int)$risk;
$avgp = number_format($avgp, 2, '.', '');
$time = date('h:i:s',$new_time);
     $filedash = fopen("C:\wamp\www\alert.txt", "a+");
        $wrote = fputs($filedash, "Sunoco:".$json_output['l']. ":Sliding down:PAVG:".$avgp.":Short Cost:".$risk."\r\n");
	fclose( $filedash );	 
     }   
}
$filedash = fopen("SUNTEMP.txt", "w");
        $wrote = fputs($filedash,  $json_output['l']);
	fclose( $filedash );

//echo "&chg=".$json_output['cp']."&"; 
?>
