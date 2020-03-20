<?php
error_reporting(0);
system("clear");
echo "
-----------------------------------------------------

Auto visitor blog/web

-----------------------------------------------------
\n";
$user=file_get_contents("user-agents.txt");
$exp_user=explode("\n",$user);
//$i=0;
$referer=["http://facebook.com","http://google.com.sg","http://twitter.com","http://facebook.com","http://google.com.sg","http://twitter.com","http://google.co.id","http://google.com.my","http://google.jp","http://google.us","http://google.tl","http://google.ac","http://google.ad","http://google.ae","http://google.af","http://google.ag","http://google.ru","http://google.by","http://google.ca","http://google.cn","http://google.cl","http://google.cm","http://google.cv","http://google.gg","http://google.ge","http://google.gr","http://google.com.tw","https://search.yahoo.com","http://www.beinyu.com"];
$cok=rand(0,28);
echo "Web/Blog-> ";
$web=trim(fgets(STDIN));
if($web==false){
	echo "Masukan urlnya!";
}else{
	echo "Jumlah visitor-> ";
	$visitor=trim(fgets(STDIN));
}
if($web==true){
for($i=0;$i<$visitor;$i++){
		$ch = curl_init();
		CURL_SETOPT($ch, CURLOPT_URL, $web);
		CURL_SETOPT($ch, CURLOPT_HTTPHEADER, array('Referer: '.$referer[rand(0,28)],'User-Agent: '.$exp_user[$i]));
		CURL_SETOPT($ch, CURLOPT_FOLLOWLOCATION, true);
		CURL_SETOPT($ch, CURLOPT_SSL_VERIFYHOST, false);
		CURL_SETOPT($ch, CURLOPT_SSL_VERIFYPEER, false);
		CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER, 1);
		CURL_SETOPT($ch, CURLOPT_USERAGENT, $exp_user[$i]);
		$result = curl_exec($ch);
                $info=curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
		curl_close($ch);
		echo $web." -> ".$exp_user[$i]." -> ".$info."\n";
}
}else{
	echo "Cek ulang url!";
}
