<?php
SESSION_START();
include_once("db_connection.php");

// Checking For Blank Fields..
//print_r ($_POST);
if((!isset($_POST["vids"])) AND (!isset($_POST["sub"])) AND (!isset($_POST["email"])) AND (!isset($_POST["msg"]))){
    echo "Fill All Fields..";
}else{
// Check if the "Sender's Email" input field is filled out
//print_r ($_POST['vids']);
    /*$v_ids_2_email=implode($_POST['vids'],',');
    //echo $v_ids_2_del;
    $v_sel_emails="select email from insulations where ID in (".$v_ids_2_email.")";
    //echo $v_sel_emails;
    $res = mysqli_query($conn,$v_sel_emails);
    while($row=mysqli_fetch_array($res))
    {
        $email_res_str=$email_res_str.','.$row[email];
    }*/
    //echo $email_res_str;
    //echo $v_query;

//$email=$_POST['vemail'];
// Sanitize E-mail Address
//$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
//$email= filter_var($email, FILTER_VALIDATE_EMAIL);
//if (!$email){
//echo "Invalid Sender's Email";
//}
//else{
    $return_val = false;
    $failedEmails = array();
    $email_from='enquiry@apexgreen.co.uk';
    //$email_cc='fiaz@apexgreen.co.uk';
//$email_cc='nhmishra201@gmail.com';
    $email2='fiaz@apexgreen.co.uk';
    $subject = $_POST['sub'];
    $message = $_POST['msg'];
    $addresses = explode(",", $_POST['email']);
    array_push($addresses, $email2);
    reset($addresses);



    $headers = 'From:'. $email_from . "\r\n"; // Sender's Email
    //$headers .= 'Cc:'. $email_cc . "\r\n"; // Carbon copy to Sender
    //$headers .= 'Bcc:'. $_POST['email'] . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html\r\n";
// Message lines should not exceed 70 characters (PHP rule), so wrap it
    $message = wordwrap($message, 70);
// Send Mail By PHP Mail Function

    //print_r($addresses);

    foreach ($addresses as $address) {
        trim($address);
        if(!empty($address)) {
            $return_val = mail($address, $subject, $message, $headers);

            if(!$return_val) {
                array_push($failedEmails, $address);
            }
        }
    }

    if($return_val === 	TRUE) {
        echo "Your mail has been sent successfully!";
        if(isset($_SESSION['failed_emails'])) {
            unset($_SESSION["failed_emails"]);
        }
    } else {
        echo "Sorry, Email could not be sent to following recipients: (". implode(", " , $failedEmails) ."). Please try again.";
        //print_r($failedEmails);
    }

//}
}
?>
