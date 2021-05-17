<?php
$name = trim($_POST['contact-name']);
$phone = trim($_POST['contact-phone']);
$email = trim($_POST['contact-email']);
$message = trim($_POST['contact-message']);
if ($name == "") {
    $msg['err'] = "\n Need a name, pls.";
    $msg['field'] = "contact-name";
    $msg['code'] = FALSE;
} else if ($email == "") {
    $msg['err'] = "\n Seems like there's no email?";
    $msg['field'] = "contact-email";
    $msg['code'] = FALSE;
} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $msg['err'] = "\n I can't understand your email address";
    $msg['field'] = "contact-email";
    $msg['code'] = FALSE;
} else if ($message == "") {
    $msg['err'] = "\n The message box is for writing messages";
    $msg['field'] = "contact-message";
    $msg['code'] = FALSE;
} else {
    $to = 'hamza101muf@gmail.com';
    $subject = '👋 So...';
    $_message = '<html><head></head><body>';
    $_message .= '<p>Name: ' . $name . '</p>';
    $_message .= '<p>Message: ' . $phone . '</p>';
    $_message .= '<p>Email: ' . $email . '</p>';
    $_message .= '<p>Message: ' . $message . '</p>';
    $_message .= '</body></html>';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From:  Papr <contact@example.com>' . "\r\n";
    $headers .= 'cc: contact@example.com' . "\r\n";
    $headers .= 'bcc: contact@example.com' . "\r\n";
    mail($to, $subject, $_message, $headers, '-f contact@example.com');

    $msg['success'] = "\n Email has been sent successfully.";
    $msg['code'] = TRUE;
}
echo json_encode($msg);