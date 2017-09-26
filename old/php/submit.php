<?php
foreach ($_POST as $key => $value) {
    if (isset($$key)) continue;

    $$key = $value;
    echo "$key: $value\n";
}

?>

