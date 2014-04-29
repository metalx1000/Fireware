<?php
$myFile = "item.lst";
$fh = fopen($myFile, 'r');

while(!feof($fh))
  {
    $item = fgets($fh); 
    $item = trim(preg_replace('/\s\s+/', ' ', $item));
    if (strpos($item,'|') !== false ){
        $item = explode("|", $item);
        $url = "../$item[1]/index.php";
        echo "<li><a href='$url' data-ajax='false'>$item[0]</a></li>\n";
    }
  }

fclose($fh);
?>



