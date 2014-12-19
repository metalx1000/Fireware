<?php

include('connect.php');
include('table.php');

$result = mysqli_query($con,"SELECT * FROM $table");

$rows = array();

while($row = mysqli_fetch_array($result)) {
    print $row['user'];
    print "will work for ";
    print $row['user2'];
    print " on ";
    print $row['exchange_date'];
    print " - Entered on ";
    print $row['date'] ;
    print "<br>";
}

mysqli_close($con);
?>
