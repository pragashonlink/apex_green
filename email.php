<?php

$to = 'myself@myemail.com';

$subject = 'HTML Form in HTML Email';

$headers = "From: myself@myemail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body>';
$message .= '<form action="http://mysite.com/process.php" method="post" target="_blank">';
$message .= '<label>How did you like the movie <strong>Turfnuts</strong>?</label><br />';
$message .= '<input name="rating" type="radio" /> ★☆☆☆<br />';
$message .= '<input name="rating" type="radio" /> ★★☆☆<br />';
$message .= '<input name="rating" type="radio" /> ★★★☆<br />';
$message .= '<input name="rating" type="radio" /> ★★★★<br />';
$message .= '<br />';
$message .= '<label for="commentText">Leave a quick review:</label><br />';
$message .= '<textarea cols="75" name="commentText" rows="5"></textarea><br />';
$message .= '<br />';
$message .= '<input type="submit" value="Submit your review" />&nbsp;</form>';
$message .= '</body></html>';

mail($to, $subject, $message, $headers);

?>