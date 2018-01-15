<?php
	include_once("db_connection.php");

	$id = $_POST['lead_id'];
	$rem_date=$_POST['rem_date'];
	$rem_time=$_POST['rem_time'];
	$rem_msg=$_POST['message'];
	$posted_by = 'Neha';

	$rem = $rem_date . ' ' . $rem_time ;
	
  $v_status="REM";
	
	$lead_check = "SELECT * FROM lead_status_event WHERE id = $id";
	$insert_event = "INSERT INTO lead_status_event(id,status_code, reminder_time,reminder_notes,created_by, status) values ('$id','$v_status','$rem', '$rem_msg','$posted_by', 'N')";
	$update_event = "update lead_status_event set status_code='$v_status' , reminder_time='$rem', reminder_notes='$rem_msg' , updated_by = '$posted_by', status='N' where id = $id";
	 
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

	 //echo $insert_event;
	 //echo $update_event;
	 //exit;

?>