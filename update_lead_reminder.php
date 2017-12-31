<?php
include_once("db_connection.php");

$id = $_POST['lead_id'];
$rem_date=$_POST['rem_date'];
$rem_time=$_POST['rem_time'];
$rem_msg=$_POST['message'];
$posted_by = 'Neha';



//echo $_GET['title'];
//if ( isset($_POST['date_time']) && isset($_POST['lead_id'])){
	
	$rem = $rem_date . ' ' . $rem_time ;
	
	//$id = $_GET['lead_id'];
    $v_status="REM";
	
	$lead_check = "SELECT * FROM lead_status_event WHERE id = $id";
	$insert_event = "INSERT INTO lead_status_event(id,status_code, reminder_time,reminder_notes,created_by) values ('$id','$v_status','$rem','$posted_by')";
	$update_event = "update lead_status_event set status_code='$v_status' , reminder_time='$rem', reminder_notes='$rem_msg' , updated_by = '$posted_by' where id = $id";
	
	//echo $lead_check, '\n';
	
	 //echo $insert_event, '\n';
	 
	 //echo $update_event, '\n';


	 
	 $res_lead_check = mysqli_query($conn,$lead_check);
	 if(mysqli_num_rows($res_lead_check)===0)
	 {
		 mysqli_query($conn,$insert_event);
		 echo "Lead Schedule Created.";
	 }
	 else{
		 mysqli_query($conn,$update_event);
		 echo "Lead Schedule updated.";
	 }
	 
//}
//echo "Location: lead_details.php?id='$id'";
//header("Location: lead_details.php?id='$id'");
?>