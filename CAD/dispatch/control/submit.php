<?php
ini_set('display_errors',1);  error_reporting(E_ALL);

$call_type = htmlspecialchars($_GET['call_type']);
$address = htmlspecialchars($_GET['address']);
$units = htmlspecialchars($_GET['units']);

print "$units $call_type call at $address";

$myfile = fopen("../msg.txt", "w") or die("Unable to open file!");
fwrite($myfile, "$units $call_type call at $address");
fclose($myfile);

//the following is for grabing mp3 voice from Google
//it is currently not working :P
/*
function grab_mp3($url,$saveto){
    $ch = curl_init ($url);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    $raw=curl_exec($ch);
    curl_close ($ch);
//    if(file_exists($saveto)){
//        unlink($saveto);
//    }
    $fp = fopen($saveto,'w');
    fwrite($fp, $raw);
    fclose($fp);
}

$msg = "$units $call_type call at $address";
$url = "http://translate.google.com/translate_tts?tl=en&q=$msg";

grab_mp3($url,"../dispatch.mp3");
*/
?>
