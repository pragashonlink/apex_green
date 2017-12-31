<?php
include_once 'db_connection.php';
if(isset($_POST) && !empty($_POST['job_id']) && !empty($_POST['assign_id'])) {
    $query = "UPDATE insulations SET assigned_to = '".$_POST['assign_id']."' WHERE ID = ".$_POST['job_id'];

    if (mysqli_query($conn, $query)) {
        echo "success";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo 'Sorry, something went wrong';
}