<?php
// Checking For Blank Fields..
include_once("db_connection.php");
SESSION_START();

//print_r ($_POST);
if($_POST["vids"]==""){
	echo "Select atleast one lead to delete.";
}else{
// Check if the "Sender's Email" input field is filled out
	//print_r ($_POST['vids']);
	//$v_ids_2_del=implode(',', $_POST['vids']);

    $id = (is_array($_POST['vids'])) ? implode(",", $_POST['vids']) : $_POST['vids'];

    $id = str_replace(",", "','", $id);

	//echo $v_ids_2_del;
	$v_del_status="delete from lead_status_event where ID in ('".$id."')";
	$v_del_ins="delete from insulations where ID in ('".$id."')";
	//echo $v_query;
	if (!mysqli_query($conn,$v_del_status))
	{
	  echo("Error description: " . mysqli_error($conn));
	}
	if (!mysqli_query($conn,$v_del_ins))
	{
	  echo("Error description: " . mysqli_error($conn));
	}
	else{
		echo "Leads deleted successfully";
		//header("Location: index.php");
	}
}
?>