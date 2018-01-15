<?php

include_once("db_connection.php");

$query = "SELECT COUNT(*) FROM lead_status_event WHERE status_code = 'REM' AND Status = 'N'";

$res      = mysqli_query($conn, $query);
$count = 0;

if ($row=mysqli_fetch_row($res))
{
  $count = $row[0];
}

echo $count;

?>