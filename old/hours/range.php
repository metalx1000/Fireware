
<?php
$myFile = "hour_type.lst";
$fh = fopen($myFile, 'r');

while(!feof($fh))
  {
    $item = fgets($fh); 
    $item = trim(preg_replace('/\s\s+/', ' ', $item));

    if ($item != ""){
        $label = trim(preg_replace('/_/', ' ', $item));

        echo "<label for='$item'>$label:</label>\n";
        echo "<input name='$item' id='$item' min='0' max='24' step='.25' data-show-value='true' data-popup-enabled='true' type='range' class='form1'>\n";
    }
  }

fclose($fh);
?>
