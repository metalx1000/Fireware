<?php
ini_set('display_errors',1);  error_reporting(E_ALL);
$call_type = htmlspecialchars($_POST['calltype']);

if($call_type == "clear"){
  $msg="Your Unit is not assigned to any calls at this time.";
}else{
  $msg = htmlspecialchars($_POST['msg']);
}
print $msg;
$myfile = fopen("msg.txt", "w") or die("Unable to open file!");
fwrite($myfile, "$msg");
fclose($myfile);
?>
