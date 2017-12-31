<?php
include_once("db_connection.php");
include_once("send_letter_func.php");

$id = $_POST['lead_id'];
$posted_by = 'Neha';

//echo $_GET['title'];
if ( isset($_POST['date_time']) && isset($_POST['lead_id'])){

    /*** Look for customer's details ***/
    $select_customer_query = "SELECT title, forename, surname, email FROM insulations WHERE ID = ".$_POST['lead_id'];
    $res_customer = mysqli_query($conn, $select_customer_query);


    /*$date = date_create($_POST['date_time']);
    echo date_format($date, 'l jS \of F Y h:i A');*/

    /*echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    die();*/

    $start = $_POST['date_time'];

    //$id = $_GET['lead_id'];
    $v_status=$_POST['status'];

    $lead_check = "SELECT * FROM lead_status_event WHERE id = $id";
    $insert_event = "INSERT INTO lead_status_event(id,status_code, start,created_by  ) values ('$id','$v_status','$start','$posted_by')";
    $update_event = "update lead_status_event set status_code='$v_status' , start='$start' , updated_by = '$posted_by' where id = $id";

    if(isset($_POST['assign_to']) && !empty($_POST['assign_to'])) {
        $updateAssign = "UPDATE insulations SET assigned_to = '".$_POST['assign_to']."' WHERE ID = $id";

        //echo $updateAssign;

        if (mysqli_query($conn, $updateAssign)) {
            //echo "success";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    //echo $insert_event;

    //echo $update_event;

    $res_lead_check = mysqli_query($conn,$lead_check);
    if(mysqli_num_rows($res_lead_check)===0)
    {
        if (mysqli_query($conn,$insert_event)) {
            if(sendLetter($id, $v_status, $start, $conn)) {
                echo "Lead Schedule Created.";
            } else {
                echo "Something went wrong.";
            }
        } else {
            echo "Error adding record: " . mysqli_error($conn);
        }
    }
    else{
        if (mysqli_query($conn,$update_event)) {
            if(sendLetter($id, $v_status, $start, $conn)) {
                echo "Lead Schedule updated.";
            }
            else {
                echo "Something went wrong.";
            }

        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
}
//echo "Location: lead_details.php?id='$id'";
//header("Location: lead_details.php?id='$id'");
?>