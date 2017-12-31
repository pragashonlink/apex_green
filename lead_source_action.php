<?php 
include_once("db_connection.php");
//SESSION_START();
?>

<?php

//print_r($_POST);

$sourcename = $_POST['lead_source_name'];

//$email = $_POST['user_mail'];
//$password = $_POST['user_password'];
//$confirm_password = $_POST['user_confirm_password'];


//$contact_number = $_POST['user_contact_number'];
//$role = $_POST['user_role'];
$sourcemessage = $_POST['lead_source_message'];

//echo " i m outside";

$Insert_query = "INSERT INTO lead_source (source_name,source_desc) 
								   VALUES('$sourcename','$sourcemessage')";
														 
	//echo "Insert_query is : ". $Insert_query;												 
if (!mysqli_query($conn,$Insert_query))
{
  echo("Error description: " . mysqli_error($conn));
}
else{
	header("Location: index.php");

}

?>