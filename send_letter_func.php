<?php
require_once ('lib/fpdf/html2pdf.php');

function sendLetter($id, $team, $task_date, $conn) {
    if($id && !empty($id) && $team && !empty($team)) {

        /*** Look for customer's details ***/
        $select_customer_query = "SELECT title, forename, surname, email FROM insulations WHERE ID = ".$id;
        $res_customer = mysqli_query($conn, $select_customer_query);

        if (mysqli_num_rows($res_customer) > 0) {
            $customer = mysqli_fetch_assoc($res_customer);

            $customer_name = $customer['title'] . ' ' . $customer['forename'] . ' ' . $customer['surname'];
            $mail_name = $customer['title'] . ' ' . $customer['forename'];

            $job_txt = ($team === 'INST') ? "insulation date" : "your assessment date &amp; time";
            $dt = date_create($task_date);
            //$task_date = ($team === 'INST') ? date_format($dt, 'l jS \of F Y') : date_format($dt, 'l jS \of F Y h:i A');
            $task_date = date_format($dt, 'l jS \of F Y h:i A');
            $today = date('jS F Y');

            $pdf = new PDF_HTML('P', 'mm', 'A4');

            $pdf->AddPage();

            $pdf->SetFont('Arial', '', 12);

            $pdf->Image('img/letterhead.jpg', 10, 10 , 189);
            $pdf->Ln(45);
            $pdf->SetTextColor(0, 32, 96);
            $pdf->Cell(189, 10, $today, 0, 1, 'R');
            $pdf->Ln(1);
            $pdf->Cell(189, 10, 'Dear '.$customer_name.',', 0, 1);
            $pdf->Ln(3);

            if($team === 'INST') {
                $message = "We write with reference to the recent home installation survey carried out by one of our energy assessors at your home and would like to advise you that we have now processed your application form.<br><br>";
            } else {
                $message = "We write with reference to the recent home installation enquiry you have applied online and we would like to advise you that we have now processed your application form.<br><br>";
            }

            $message .= "We would like to take this opportunity to thank you for choosing our firm ". (($team === 'INST') ? 'to insulate your home.' : 'for your home installation.') ." We guarantee a high level of service and ensure that we insulate your homes using quality materials so you have the added protection of knowing that your home will be kept warm during the cold temperatures.<br><br>";
            $message .= "Grant covers full cost of insulation. All funds are provided by the major energy companies under the Energy Companies Obligation (ECO) scheme. These energy companies have an obligation to reduce carbon emissions from domestic homes and they achieve these targets by installing energy efficient measurements. Insulation Grants do not depend on which energy provider households use.<br><br>";
            $message .= "People are rapidly insulating their homes due to massive increase in fuel bills and as a result we have increased work load; therefore, we are unable to give specific times but pleased to confirm below an <b>$job_txt</b>.";

            //$pdf->MultiCell( '', 6, $message, 1);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->WriteHTML(utf8_decode($message));

            $pdf->SetFont('Arial', 'B', 14);
            $pdf->Ln(6);
            $pdf->SetTextColor(0, 32, 96);
            $pdf->Cell('', 12, $task_date, 0, 1);
            $pdf->Ln(1);

            $pdf->SetFont('Arial', 'B', 12);
            $pdf->SetTextColor(152, 72, 6);

            if($team === 'INST') {
                $disclaimer_txt = "* Please note installation slots are 3 to 4 hours from the start time.".chr(10)."* Technician can arrive at any time during these hours on the day.";
                $pdf->Cell(30, 10, '', 0, 0);
                $pdf->MultiCell('159', 6, utf8_decode($disclaimer_txt), 0);
            } else {
                $disclaimer_txt ="* Please note energy assessment slot is 3 hours from start time.".chr(10)."* Assessor can arrive at any time during these hours on the day.";
                $pdf->Cell(30, 10, '', 0, 0);
                $pdf->MultiCell('159', 6, utf8_decode($disclaimer_txt), 0);
            }

            /*$disclaimer_inst = "* Please note our technician can arrive at any time on this day.";
            $disclaimer_asm = "* Please note energy assessment slot is 3 hours from start time.".chr(10)."* Assessor can arrive at any time during these hours on the day.";
            $disclaimer = ($team === 'INST') ? $disclaimer_inst : $disclaimer_asm;
            $pdf->MultiCell('', 6, utf8_decode($disclaimer), 0);*/

            $pdf->Ln(5);

            $pdf->SetFont('Arial', '', 12);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->MultiCell('', 6, 'Please note that we are fully certified under the relevant industry codes of practice and we provide a support service before and after work have been completed. Should you have any queries, please contact the office on Monday to Friday 9:30am to 5:30pm.', 0);

            $pdf->Ln(4);
            $pdf->Cell('', 5, 'Yours Sincerely,', 0, 1);
            $pdf->Image('img/signature.jpg', $pdf->GetX(), $pdf->GetY() , '30');
            $pdf->SetFont('Arial', '', 11);
            $pdf->Ln(12);
            $pdf->Cell('', 5, 'Planning Team', 0, 1);
            $pdf->Ln(5);

            $pdf->Image('img/letter-footer.jpg', 10, $pdf->GetY(), 189);
            //$pdf->Output();

            /*** Send email ***/
            //$to = "svbbk.92@gmail.com";
            $from = "enquiry@apexgreen.co.uk";
            //$task = ($team === 'INST') ? "insulation" : "assessment";
            $subject = "Appointment Confirmed";
            $message = "<h3>Dear $mail_name,</h3>";
            $message .= "<p>Thanks for the application for insulation grant and we can confirm this has been processed
                            now. Apex Green Limited is qualified approved Installer for (ECO) Energy Companies
                            Obligation schemes specialising in cavity Walls Insulation, Loft Insulation, Boiler Installations
                            and Electric Storage Heaters. We are pleased to attach your appointment letter.</p>";
            $message .= "<p>Please note that we are fully certified under the relevant industry codes of practice and we
                            provide a support service before and after work have been completed. Should you have any
                            queries, please contact the office on Monday to Friday 9:30am to 5:30pm.</p>";
            $message .= "<p>Kind regards,</p>";
            $message .= "<img src='http://apexgreen.info/img/apex_logo.png' style='height: 25px; margin-bottom: 10px;' alt='ApexGreen'/><br/>";
            $message .= "<a href='http://www.apexgreen.co.uk' target='_blank'>http://www.apexgreen.co.uk</a><br/>";
            $message .= "Email: <a href='mailto:enquiry@apexgreen.co.uk'>enquiry@apexgreen.co.uk</a><br/>";
            $message .= "Phone: <a href='callto:08005053236'>0800 505 3236</a>";

            // a random hash will be necessary to send mixed content
            $separator = md5(time());

            // carriage return type (we use a PHP end of line constant)
            $eol = PHP_EOL;

            // attachment name
            $filename = "ApexGreen.pdf";

            // encode data (puts attachment in proper format)
            $pdfdoc = $pdf->Output("", "S");
            $attachment = chunk_split(base64_encode($pdfdoc));

            // main header
            $headers  = "From: ".$from.$eol;
            $headers .= "MIME-Version: 1.0".$eol;
            $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

            // no more headers after this, we start the body! //

            $body = "--".$separator.$eol;
            $body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
            //$body .= "This is a MIME encoded message.".$eol;

            // message
            $body .= "--".$separator.$eol;
            $body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
            $body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
            $body .= $message.$eol;

            // attachment
            $body .= "--".$separator.$eol;
            $body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;
            $body .= "Content-Transfer-Encoding: base64".$eol;
            $body .= "Content-Disposition: attachment".$eol.$eol;
            $body .= $attachment.$eol;
            $body .= "--".$separator."--";

            // send message
            if(mail($customer['email'], $subject, $body, $headers)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}