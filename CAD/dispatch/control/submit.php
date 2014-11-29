<?php
$call_type = htmlspecialchars($_GET['call_type']);
$address = htmlspecialchars($_GET['address']);
$units = htmlspecialchars($_GET['units']);

print "$units $call_type call at $address";
?>
