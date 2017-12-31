<?php
   session_start();
   //echo i am in php;
   include_once("db_connection.php");
   //print_r($_POST);
   	$id = $_POST['lead_id'];
	//echo $id;
	$posted_by = $_SESSION["user"];

	function clear_inputs($val) {
	    $return = '';
	    return strip_tags(html_entity_decode($val));
    }
	 
//   echo "i am out";
	if (!isset($_SESSION["role"])) {
		header("Location: login.php");
	}
   elseif (isset($_SESSION["role"])&&($_SESSION["role"]=='ADMIN' ||$_SESSION["role"]=='ASSI')) {
	//$lead_check = "SELECT * FROM lead_status_event WHERE id = $id";
	//echo "here i am";
	$v_title = $_POST['title'];
	//echo $v_title;
	$v_forename = clear_inputs($_POST['fname']);
	$v_surname = clear_inputs($_POST['sname']);
	$v_address = clear_inputs($_POST['address']);
	$v_postcode = clear_inputs($_POST['post_code']);
	$v_phone = clear_inputs($_POST['phone']);
	$v_altno = clear_inputs($_POST['aphone']);
	$v_email = clear_inputs($_POST['email']);
	$v_fuel_type = clear_inputs($_POST['fuel_type']);
	$v_boiler_period = clear_inputs($_POST['boiler_age']);
	$v_property_type = clear_inputs($_POST['property_type']);
	//echo "property_type=" . $v_property_type;
	$v_propertyPeriod = clear_inputs($_POST['property_built']);
	//echo v_propertyPeriod;
	$v_wall_insulation_type = clear_inputs($_POST['wall_insulation_type']);
	//echo $v_wall_insulation_type;
	$v_roof_insulation_type = clear_inputs($_POST['roof_insulation_type']);
	$v_owner = clear_inputs($_POST['owner']);
	$v_benefits = clear_inputs($_POST['benefits']);
	$v_cavity_charges = clear_inputs($_POST['cavity_charges']);
	$v_cavity_area = clear_inputs($_POST['cavity_area']);
	$v_cavity_gap = clear_inputs($_POST['cavity_gap']);
	$v_loft_charges = clear_inputs($_POST['loft_charges']);
	$v_loft_area = clear_inputs($_POST['loft_area']);
	$v_insu_required = clear_inputs($_POST['insu_required']);
	$v_notes = strip_tags(html_entity_decode($_POST['notes']), '<br>');

	//$v_notes = "[".date("Y-m-d h:i:sa")."] ".$v_notes."\n";

	//update insulations set title='$v_title' , forename='$v_forename' , surname='$v_surname', address='$v_address', postcode='$v_postcode', phone='$v_phone',  altno='$v_altno', email='$v_email', fuel_type='$v_fuel_type', boiler_period='$v_boiler_period', type_of_property='$v_type_of_property', property_period='$v_property_built', wall_insulation_type='$v_wall_insulation_type', roof_insulation_type='$v_roof_insulation_type', owner='$v_owner', created_by = '$posted_by' where id = $id";
	
	$update_event = "update insulations set title='$v_title' , forename='$v_forename' , surname='$v_surname', address='$v_address', postcode='$v_postcode', phone='$v_phone',  altno='$v_altno', email='$v_email', fuel_type='$v_fuel_type', boiler_period='$v_boiler_period', property_type='$v_property_type', propertyPeriod='$v_propertyPeriod', wall_insulation_type='$v_wall_insulation_type', roof_insulation_type='$v_roof_insulation_type',owner='$v_owner', cavity_charges='$v_cavity_charges' , cavity_area='$v_cavity_area', cavity_gap='$v_cavity_gap', loft_charges='$v_loft_charges', loft_area='$v_loft_area', insu_required='$v_insu_required', notes='$v_notes', created_by = '$posted_by', benefits = '$v_benefits' where id = $id";
	
	//echo $update_event;

		 $res = mysqli_query($conn,$update_event);
		 echo "Lead updated Successfully.";
		 //echo $update_event;
	}
	elseif (isset($_SESSION["role"])&&($_SESSION["role"] !== 'ADMIN' ||$_SESSION["role"]=='ASSI')) {
		//update note
		NULL;
	}
//echo "Location: lead_details.php?id='$id'";
//header("Location: lead_details.php?id='$id'");
?>