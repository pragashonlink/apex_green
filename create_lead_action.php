<?php 
include_once("db_connection.php");
SESSION_START();
?>

<?php

if (isset($_POST['benefits'])) {
$var_benefits = $_POST['benefits'];
$ben = implode(", ", $var_benefits);    
}

$v_created_by = 'Neha';

$wall_insulation_type = $_POST['wall_insulation_type'];
$roof_insulation_type = $_POST['roof_insulation_type'];
$propertyPeriod = $_POST['property_built'];
$type_of_property = $_POST['type_of_property'];
$boiler_period = $_POST['boiler_age'];
$fuel_type = $_POST['fuel_type'];

$owner = $_POST['owner'];


$address = $_POST['address'];
$line_address = "My first line Address";//$_POST['owner'];

$town = $_POST['town'];

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

$mobile = $_POST['mobile'];
$altno = $_POST['altno'];
$email = $_POST['email'];
$lead_source = $_POST['lead_source'];

//"INSERT INTO insulations (postcode,title,forename, surname,address, phone, altno, email, wall_insulation_type,roof_insulation_type,property_period,fuel_type,
//type_of_property,boiler_period,owner,benefits,created_by) 
								   //VALUES('$postCode','$title','$forename','$surname','$address','$mobile','$altno',
								   //'$email','$wall_insulation_type','$roof_insulation_type','$property_period','$fuel_type','$type_of_property','$boiler_period','$owner','$ben','$v_created_by')";
							
 if ($_POST['submit'])
 {

$Insert_query = "INSERT INTO insulations (postcode,title,forename, surname,address, phone, altno, email, wall_insulation_type,roof_insulation_type,propertyPeriod,fuel_type,
property_type,boiler_period,owner,benefits,lead_source,created_by)
			    VALUES('$postCode','$title','$forename','$surname','$address','$mobile','$altno',
								   '$email','$wall_insulation_type','$roof_insulation_type','$propertyPeriod','$fuel_type','$type_of_property','$boiler_period','$owner','$ben','$lead_source','$v_created_by')";
													 
	echo "Insert_query is : ". $Insert_query;												 
if (!mysqli_query($conn,$Insert_query))
{
  echo("Error description: " . mysqli_error($conn));
}
else{
	header("Location: index.php");

}
}
?>