<?php

$db = new SQLite3("db.sqlite");
$table = "table1";

$results = $db->query("SELECT * FROM $table");

$rows = array();
while($row = $results->fetchArray()) {
  $rows[] = $row;
}
print json_encode($rows);

?>
