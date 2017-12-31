<?php
require_once '../core/init.php';

$response = [];
$errors = [];
$fields = array();

/*** Setting up fields ***/
$fields = array(
    'site_id' => array(
        'field_name' => 'Site ID',
        'required'   => true,
        'db_column'  => 'siteID',
        'max'       => 2
    ),
    'title' => array(
        'field_name' => 'Title',
        'required'   => false,
        'db_column'  => 'title',
        'max'       => 50
    ),
    'first_name' => array(
        'field_name' => 'First Name',
        'required'   => true,
        'db_column'  => 'forename',
        'min'        => 2,
        'max'        => 50
    ),
    'last_name' => array(
        'field_name' => 'Last Name',
        'required'   => false,
        'db_column'  => 'surname'
    ),
    'email' => array(
        'field_name' => 'Email',
        'required'   => true,
        'db_column'  => 'email'
    ),
    'phone' => array(
        'field_name' => 'Phone',
        'required'   => true,
        'db_column'  => 'phone'
    ),
    'alt_phone' => array(
        'field_name' => 'Phone',
        'required'   => false,
        'db_column'  => 'phone'
    ),
    'time_to_phone' => array(
        'field_name' => 'Time to Phone',
        'required'   => true,
        'db_column'  => 'time_to_phone'
    ),
    'address' => array(
        'field_name' => 'Address',
        'required'   => true,
        'db_column'  => 'address'
    ),
    'town' => array(
        'field_name' => 'Town',
        'required'   => true,
        'db_column'  => 'town'
    ),
    'post_code' => array(
        'field_name' => 'Post Code',
        'required'   => true,
        'db_column'  => 'postcode'
    ),
    'wall_insulation_type' => array(
        'field_name' => 'Wall Insulation Type',
        'required'   => false,
        'db_column'  => 'wall_insulation_type'
    ),
    'bed_rooms' => array(
        'field_name' => 'Bed Rooms',
        'required'   => false,
        'db_column'  => 'roof_insulation_type'
    ),
    'property_type' => array(
        'field_name' => 'Property Type',
        'required'   => true,
        'db_column'  => 'property_type'
    ),
    'property_period' => array(
        'field_name' => 'Property Period',
        'required'   => false,
        'db_column'  => 'propertyPeriod'
    ),
    'owner' => array(
        'field_name' => 'Owner',
        'required'   => false,
        'db_column'  => 'owner'
    ),
    'benefits' => array(
        'field_name' => 'Benefits',
        'required'   => false,
        'db_column'  => 'benefits'
    ),
    'add_info' => array(
        'field_name' => 'Add Info',
        'required'   => false,
        'db_column'  => 'add_info'
    ),
    'fuel_type' => array(
        'field_name' => 'Fuel Type',
        'required'   => false,
        'db_column'  => 'fuel_type'
    ),
    'boiler_period' => array(
        'field_name' => 'Boiler Period',
        'required'   => false,
        'db_column'  => 'boiler_period'
    ),
    'hdn_payment_type' => array(
        'field_name' => 'Payment Type',
        'required'   => false,
        'db_column'  => 'hdn_payment_type'
    ),
    'lead_source' => array(
        'field_name' => 'Lead Source',
        'required'   => true,
        'db_column'  => 'lead_source'
    ),
    'cavity_charges' => array(
        'field_name' => 'Cavity Charges',
        'required'   => true,
        'db_column'  => 'cavity_charges'
    ),
    'cavity_area' => array(
        'field_name' => 'Cavity area',
        'required'   => true,
        'db_column'  => 'cavity_area'
    ),
    'cavity_gap' => array(
        'field_name' => 'Cavity Gap',
        'required'   => true,
        'db_column'  => 'cavity_gap'
    ),
    'loft_charges' => array(
        'field_name' => 'Loft Charges',
        'required'   => true,
        'db_column'  => 'loft_charges'
    ),
    'insu_required' => array(
        'field_name' => 'Insu Required',
        'required'   => true,
        'db_column'  => 'insu_required'
    ),
    'notes' => array(
        'field_name' => 'Insu Required',
        'required'   => true,
        'db_column'  => 'insu_required',
        'max'       => 255
    )
);

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $postBody = file_get_contents("php://input");
    $postBody = json_decode($postBody);

    $posted_fields = array();
    foreach ($postBody as $key => $value) {
        $posted_fields[$key] = $value;
    }

    $validate = new Validate();
    $validation = $validate->check($posted_fields, $fields);

    if($validation->passed()) {
        //echo 'passed';
        $db = Database::getInstance();
        $insert_array = array();
        foreach ($posted_fields as $key => $val) {
            //echo $fields[$key]['db_column'], '<br/>';
            $insert_array[$fields[$key]['db_column']] = $val;
        }
        /*echo '<pre>';
        print_r($insert_array);
        echo '</pre>';*/
        /*if(!$db->insert('insulations', $insert_array)){
            echo 'error';
        } else {
            echo 'success';
        }*/
        if(!$db->insert('insulations', $insert_array)){
            array_push($errors, array(
                'status_code' => 500,
                'title' => 'Insert error',
                'description' => 'Error inserting record to the database'
            ));
            http_response_code(500);
        } else {
            $response['status_code'] = 200;
            $response['message'] = 'Record inserted successfully';
            http_response_code(200);
        }
    } else {
        foreach ($validation->error() as $err) {
            array_push($errors, array(
                'status_code' => 422,
                'title' => 'Validation error',
                'description' => $err
            ));
            http_response_code(400);
        }
    }

    if(!empty($errors)) {
        $response['errors'] = $errors;
    }

//} else if($_SERVER['REQUEST_METHOD'] === "GET") {
    //echo 'get';
} else {
    //echo 'other';
    array_push($errors, array(
        'status_code' => 405,
        'title' => 'This method is not allowed',
        'description' => 'Requested method is not allowed. This API currently supports for \'POST\' method only'
    ));
    $response = [
        'error' => $errors
    ];
    http_response_code(405);
}
header('Content-type: application/json');
echo json_encode($response);