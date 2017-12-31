<?php
require_once ("db_connection.php");
if(isset($_POST)) {
    if(!empty($_POST['type']) && !empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['id'])) {
        $return_val = false;

        $type = $_POST['type'];

        $to = $_POST['email'];

        $query = "INSERT INTO job_email_log (`job_id`, `type`, `sent_date`) VALUES (".$_POST['id'].", '".$type."', NOW())";

        //echo $query;
        //die();

        $subject = 'Please contact us - '.$_POST['postcode'];

        $message = '<p>Dear ' . $_POST['name'] . ',</p>';

        $headers = "From: enquiry@apexgreen.co.uk\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        if($type == 'first_cont') {
            $message .= '<p>Thank you for making an application for a home installation grant and we can confirm this has now been processed.  Your details have been logged on to our system and we have been trying to book a no obligation and free of cost energy assessment but have been unsuccessful.  We would be grateful if you could reply to this email to allow us to proceed with the assessment.</p>';
            $message .= '<p>We would like to advise that Apex Green Limited is an approved Installer for (ECO2t) Energy Companies Obligation Scheme specialising in Cavity Walls Insulation, Loft Insulation, Boiler and Electric Storage Heaters installation. We are fully industry certified approved installers with direct access for grants.  You can therefore rest assured that we will be carrying out the installation to a very high standard and look forward to forming a trusting relationship for years to come.</p>';
            $message .= '<p>We would be grateful if you could kindly respond so that we can arrange for an assessment and look forward to hearing from you.</p>';
        } else if($type == 'second_cont') {
            $message .= '<p>We write further to our email for note that you have not responded.   We did point out that your application has been processed successfully and we are simply waiting for you to contact us that we can carry out a no obligation  free energy assessment for your home.</p>';
            $message .= '<p>Kindly can you get back to us as soon as you can so we can book your free energy assessment and home installation.</p>';
        } else if($type = 'third_cont') {
            $message .= '<p>We write further to our previous emails and note that we have still not received a response.   Following your application, we are still holding your details on or database and have trying to contact you for the purposes of booking your no obligation free energy assessment.</p>';
            $message .= '<p>We will be grateful if you can contact us with way so we can proceed with the booking.   Alternatively if you have changed you mind then please advice accordingly so that we can close your application on our system which will prevent you being sent constant reminders.</p>';
            $message .= '<p>We await hearing from you as a matter of urgency.</p>';
        }

        $message .= "<p>Kind regards,</p>";
        $message .= "<img src='http://apexgreen.info/img/apex_logo.png' style='height: 25px; margin-bottom: 10px;' alt='ApexGreen'/><br/>";
        $message .= "<a href='http://www.apexgreen.co.uk' target='_blank'>http://www.apexgreen.co.uk</a><br/>";
        $message .= "Email: <a href='mailto:enquiry@apexgreen.co.uk'>enquiry@apexgreen.co.uk</a><br/>";
        $message .= "Phone: <a href='callto:08005053236'>0800 505 3236</a>";

        $return_val = mail($to, $subject, $message, $headers);

        if($return_val === TRUE) {
            mysqli_query($conn, $query);
        }

        echo ($return_val === TRUE) ? 'success' : 'error';

    } else {
        echo 'Empty fields';
    }
} else {
    echo 'error';
}