<?php

$to = "cristian_villavicencio@live.com";  // Your email here
$from = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : '';
$headers = "From: $from";
$subject = "Question Form from Cleaning Service";

$fields = array();
$fields["name"] = "First name";
$fields["email"] = "Email";
$fields["message"] = "Message";

$body = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .email-container { background-color: #ffffff; width: 100%; max-width: 600px; margin: 20px auto; padding: 20px; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
        .header { background-color: #0046be; color: #ffffff; padding: 10px 20px; text-align: center; font-size: 24px; }
        .content { padding: 20px; line-height: 1.6; color: #333333; }
        .content p { margin: 10px 0; }
        .field-label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">New Question from CT Cleaning Service</div>
        <div class="content">
            <p><span class="field-label">Name:</span> $name</p>
            <p><span class="field-label">Email:</span> $from</p>
            <p><span class="field-label">Message:</span> $message</p>
        </div>
    </div>
</body>
</html>
HTML;

// Build the email headers for HTML content
$email_headers = "From: Cleaning Service <info@cleaningservice.com>\r\n";
$email_headers .= "Reply-To: $from\r\n";
$email_headers .= "MIME-Version: 1.0\r\n";
$email_headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$email_headers .= "X-Mailer: PHP/" . phpversion();

// Attempt to send the email
if (mail($to, $subject, $body, $email_headers)) {
    echo "📧 Mail sent successfully!";
} else {
    echo "🧧 Mail sending failed!";
}

?>
