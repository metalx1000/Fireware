<?php

include('connect.php');
include('table.php');

$user = $_GET['user'];
$result = mysqli_query($con,"SELECT * FROM $table WHERE user2=$user OR user=$user");

$rows = array();

while($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
}

print json_encode($rows);
mysqli_close($con);
?>
