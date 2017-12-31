<?php
    $host='94.126.40.138';
    $username='LCN377861_apex';
    $password='123456apex';
    $dbname='apexgreen_co_uk_db';

	//Connecting to sql db.
	$conn = new mysqli($host, $username, $password);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	//else
	//{
	//echo "Connected successfully";
	//}

	mysqli_select_db($conn,$dbname);
?>