<?php 
include_once("db_connection.php");
//SESSION_START();
?>

<?php

//print_r($_POST);
$fullname = $_POST['full_name'];
$username = $_POST['user_name'];

$email = $_POST['user_mail'];
$password = $_POST['user_password'];
$confirm_password = $_POST['user_confirm_password'];


$contact_number = $_POST['user_contact_number'];
$role = $_POST['user_role'];
$message = $_POST['user_message'];

//echo " i m outside";

$Insert_query = "INSERT INTO user_role (full_name,username,email,password, contact_number,role, message) 
								   VALUES('$fullname','$username','$email','$password','$contact_number','$role','$message')";
														 
	//echo "Insert_query is : ". $Insert_query;												 
if (!mysqli_query($conn,$Insert_query))
{
  echo("Error description: " . mysqli_error($conn));
}
else{
	header("Location: index.php");

}

?>