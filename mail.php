<?php
$name = trim($_POST['contact-name']);
$email = trim($_POST['contact-email']);
$message = trim($_POST['contact-message']);
if ($name == "") {
    $msg['err'] = "\n Name can not be empty!";
    $msg['field'] = "contact-name";
    $msg['code'] = FALSE;
} else if ($email == "") {
    $msg['err'] = "\n Email can not be empty!";
    $msg['field'] = "contact-email";
    $msg['code'] = FALSE;
} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $msg['err'] = "\n Please put a valid email address!";
    $msg['field'] = "contact-email";
    $msg['code'] = FALSE;
} else if ($message == "") {
    $msg['err'] = "\n Message can not be empty!";
    $msg['field'] = "contact-message";
    $msg['code'] = FALSE;
} else {
    $to = 'hamza@hamzamufti.com';
    $subject = 'Hi 👋';
    $_message = '<html><head></head><body>';
    $_message .= '<p>Name: ' . $name . '</p>';
    $_message .= '<p>Email: ' . $email . '</p>';
    $_message .= '<p>Message: ' . $message . '</p>';
    $_message .= '</body></html>';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From:  Papr <contact@example.com>' . "\r\n";
    $headers .= 'cc: contact@example.com' . "\r\n";
    $headers .= 'bcc: contact@example.com' . "\r\n";
    mail($to, $subject, $_message, $headers, '-f hamza@hamzamufti.com');

    $msg['success'] = "\n Email has been sent successfully.";
    $msg['code'] = TRUE;
}
echo json_encode($msg);