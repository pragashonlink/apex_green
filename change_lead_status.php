<?php 
include_once("db_connection.php");
   session_start();

	$posted_by = $_SESSION["user"];

	if (!isset($_SESSION["role"]))
	{
		header("Location: login.php");
	}
	if($_POST['status'] == 'UTA' OR $_POST['status'] == 'COMP' OR $_POST['status'] == 'ICOM' OR $_POST['status'] == 'VC' OR $_POST['status'] == 'RAA' OR $_POST['status'] == 'CBNR' OR $_POST['status'] == 'RJCT' OR $_POST['status'] == 'RDTB' OR $_POST['status'] == 'QULI' OR $_POST['status'] == 'MISSED') {
	$v_status = $_POST['status'];
	$id = $_POST['lead_id'];
	$date = (isset($_POST['completed_date'])) ? $_POST['completed_date'] : '';
	
	//$v_query="update lead_status_event set status_code='$v_status' where ID = $v_id";
	
	$lead_check = "SELECT * FROM lead_status_event WHERE id = $id";
	$insert_event = "INSERT INTO lead_status_event(id,status_code,start, created_by, upd_time  ) values ('$id','$v_status',now(),'$posted_by',now())";
	$update_event = "update lead_status_event set status_code='$v_status' ,start=now(), updated_by = '$posted_by' where id = $id";

	$set_complted_date = "UPDATE insulations SET completed_date = STR_TO_DATE('".$date."' , '%d/%m/%Y/') WHERE id = $id";

    if(!empty($date)) {
        //echo $set_complted_date;
        mysqli_query($conn, $set_complted_date);
    }
    //die();

	 /*echo $insert_event, '--';
	 
	 echo $update_event;

	 die();*/

	 if($v_status == 'COMP') {
         mysqli_query($conn, $set_complted_date);
     }
	 
	 $res_lead_check = mysqli_query($conn,$lead_check);
	 
	 if(mysqli_num_rows($res_lead_check)===0) {
		 mysqli_query($conn,$insert_event);
		 echo "Lead inserted Successfully.";
	 } else{
		 mysqli_query($conn,$update_event);
		 echo "Lead Updated Successfully.";
	 }
}


//$Insert_query = "INSERT INTO insulations (postcode,title,forename, surname,address, phone, altno, email, status_code) 
	//							   VALUES('$postCode','$title','$forename','$surname','$address','$mobile','$altno','$email','NEW')";
														 
	//echo "Insert_query is : ". $Insert_query;												 
//if (!mysqli_query($conn,$Insert_query))
//{
//  echo("Error description: " . mysqli_error($conn));
//}
//else{
//	header("Location: index.php");
//}

?>