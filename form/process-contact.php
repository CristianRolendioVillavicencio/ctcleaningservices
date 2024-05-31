<?php

$to = "cristian_villavicencio@live.com";  // Your email here
$from = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
//$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : '';
$headers = "From: $from";
$subject = "Question Form from Cleaning Service";

$fields = array();
$fields["name"] = "First name";
$fields["email"] = "Email";
//$fields["phone"] = "Phone";
$fields["message"] = "Message";

$body = "Here is what was sent:\n\n";
foreach($fields as $a => $b){   
    $body .= sprintf("%20s: %s\r\n", $b, ${$a});
}

$send = mail($to, $subject, $body, $headers);

if($send) {
    echo "Mail sent successfully!";
} else {
    echo "Mail sending failed!";
}

?>
