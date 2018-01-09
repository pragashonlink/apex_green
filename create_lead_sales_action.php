<?php 
include_once("db_connection.php");
SESSION_START();
?>

<?php

//echo "Welcome : " .$_SESSION['username'] ;
//print_r($_POST);
//if (isset($_POST['benefits'])) {
//$var_benefits = $_POST[benefits];
//$ben = implode(", ", $var_benefits);    
//}

$v_created_by = 'Neha';

$wall_insulation_type = $_POST['wall_insulation_type'];
$roof_insulation_type = $_POST['roof_insulation_type'];
$propertyPeriod = $_POST['property_built'];
$property_type = $_POST['type_of_property'];
$boiler_period = $_POST['boiler_age'];
$fuel_type = $_POST['fuel_type'];

$owner = $_POST['owner'];


$address = $_POST['address'];
$line_address = "My first line Address";//$_POST['owner'];

//$town = $_POST['town'];

$title = $_POST['title'];
$forename = $_POST['firstname'];
$surname = $_POST['surname'];
$postCode = $_POST['postcode'];

$mobile = $_POST['mobile'];
$altno = $_POST['altno'];
$email = $_POST['email'];
$forename = $_POST['firstname'];
$surname = $_POST['surname'];
$postCode = $_POST['postcode'];
$benefits = $_POST['benefits'];
$mobile = $_POST['mobile'];
$altno = $_POST['altno'];
$email = $_POST['email'];
$cavity_charges= $_POST['cavity_charges'];
$cavity_area= $_POST['cavity_area'];
$cavity_gap= $_POST['cavity_gap'];
$loft_charges= $_POST['loft_charges'];
$loft_area= $_POST['loft_area'];
$insu_required= $_POST['insu_required'];
$lead_source = $_POST['lead_source'];
$siteID = $_POST['siteID'];

//"INSERT INTO insulations (postcode,title,forename, surname,address, phone, altno, email, wall_insulation_type,roof_insulation_type,property_period,fuel_type,
//type_of_property,boiler_period,owner,benefits,created_by) 
								   //VALUES('$postCode','$title','$forename','$surname','$address','$mobile','$altno',
								   //'$email','$wall_insulation_type','$roof_insulation_type','$property_period','$fuel_type','$type_of_property','$boiler_period','$owner','$ben','$v_created_by')";
							
 if ($_POST['submit'])
 {

$Insert_query = "INSERT INTO insulations (siteID, postcode,title,forename, surname,address, phone, altno, email, wall_insulation_type,roof_insulation_type,propertyPeriod,fuel_type,
property_type,boiler_period,owner,benefits,cavity_charges,cavity_area,cavity_gap,loft_charges,loft_area,insu_required ,lead_source,created_by)
			    VALUES('$siteID','$postCode','$title','$forename','$surname','$address','$mobile','$altno',
								   '$email','$wall_insulation_type','$roof_insulation_type','$propertyPeriod','$fuel_type','$property_type','$boiler_period','$owner','$benefits','$cavity_charges','$cavity_area','$cavity_gap','$loft_charges','$loft_area','$insu_required','$lead_source','$v_created_by')";
		//echo $Insert_query;

echo "Insert_query is : ". $Insert_query;												 
exit;

if (!mysqli_query($conn,$Insert_query))
{
  echo("Error description: " . mysqli_error($conn));
}
else{
	header("Location: thanks.php");

}
}
?>