<?php
include_once("db_connection.php");
   session_start();

	$posted_by = $_SESSION["user"];

	if (!isset($_SESSION["role"]))
	{
		header("Location: login.php");
	}
	
$id = $_POST['source_id'];

//echo $_GET['title'];
if ( isset($_POST['source_id'])){

	$update_surce = "update user_role set active_flag='N', updated_by = '$posted_by' where id = $id";

	 echo $update_surce;
	 
		 mysqli_query($conn,$update_surce);
		 echo "Lead Source updated.";
}
//echo "Location: lead_details.php?id='$id'";
//header("Location: lead_details.php?id='$id'");
?>