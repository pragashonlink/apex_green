<?php

include('db_connection.php');
//$select = "select `dp_id`,`client_id`,`invester_name`,`pan_no` from 
//(SELECT `dp_id` , `client_id` , `invester_name` , `pan_no`
//FROM `app_form` union all
//SELECT `dp_id`,`client_id`,`first_holder_name`,`first_holder_pan` FROM `response_record`)
//tbl order by `dp_id`,`client_id`";
$select = "SELECT  * from insulations";

//run mysql query and then count number of fields
$export = mysqli_query ($conn, $select ) 
   or die ( "Sql error : " . mysql_error( ) );
$fields = mysqli_num_fields ( $export );

//create csv header row, to contain table headers 
//with database field names
for ( $i = 0; $i < $fields; $i++ ) {
//$header .= mysql_field_name( $export , $i ) . ",";
$header .= mysqli_fetch_field_direct($export,$i)->name . "\t";
//$header .= mysqli_fetch_field_direct($export,$i)->name . ",";
}

//this is where most of the work is done. 
//Loop through the query results, and create 
 //a row for each
while( $row = mysqli_fetch_row( $export ) ) {
$line = '';
//for each field in the row
foreach( $row as $value ) {
    //if null, create blank field
    if ( ( !isset( $value ) ) || ( $value == "" ) ){
        $value = '" "' ."\t";
    }
    //else, assign field value to our data
    else {
        $value = str_replace( '"' , '""' , $value );
        $value = '"' . $value . '"' . "\t";
    }
    //add this field value to our row
    $line .= $value;
}
//trim whitespace from each row
$data .= trim( $line ) . "\n";
}
//remove all carriage returns from the data
$data = str_replace( "\r" , "" , $data );

/*$file_name = 'excel_data';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";*/
//create a file and send to browser for user to download
//header("Content-type: application/vnd.ms-excel");
//header( "Content-disposition: filename=".$file_name.".xls");
//print "$header\n$data";
//exit;

$file="demo.xlsx";
$test="<table  ><tr><td>Cell 1</td><td>Cell 2</td></tr></table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
echo $test;

?>