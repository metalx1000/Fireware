<?php
ini_set('display_errors',1);  error_reporting(E_ALL);

$call_type = htmlspecialchars($_GET['call_type']);
$address = htmlspecialchars($_GET['address']);
$units = htmlspecialchars($_GET['units']);
$comments = htmlspecialchars($_GET['comments']);
$time = htmlspecialchars($_GET['time']);

if($comments == ""){
  $comments = "Unknown";
}

if($call_type == "clear"){
  $msg="Your Unit is not assigned to any calls at this time.";
}else{
  $msg = "$units $call_type call at $address. Reference $comments. Dispatch time. $time";
}

print $msg;

$myfile = fopen("../msg.txt", "w") or die("Unable to open file!");
fwrite($myfile, "$msg");
fclose($myfile);

?>
