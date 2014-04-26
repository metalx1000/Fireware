<?php
$myFile = "item.lst";
$fh = fopen($myFile, 'r');

while(!feof($fh))
  {
    $item = fgets($fh); 
    $item = trim(preg_replace('/\s\s+/', ' ', $item));
  echo "<li onclick='send(\"$item\")'><a>$item</a></li>";
  }

fclose($fh);
?>



