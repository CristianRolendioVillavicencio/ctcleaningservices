<?php

$to = "cristian_villavicencio@live.com";  // Your email here
$name = $_REQUEST['name'];
$address = $_REQUEST['address'];
$phone = $_REQUEST['phone'];
$from = $_REQUEST['email'];
$service = $_REQUEST['service'];
$date = $_REQUEST['date'];
$time1 = $_REQUEST['time1'];
$time2 = $_REQUEST['time2'];
$often = $_REQUEST['often'];
$bedrooms = $_REQUEST['bedrooms'];
$bathroom = $_REQUEST['bathroom'];
$message = $_REQUEST['message'];
$headers = "From: $from";
$subject = "Order Form from Cleaning Service";

$email_content = <<<EMAIL
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .email-container { background-color: #ffffff; width: 100%; max-width: 600px; margin: 20px auto; padding: 20px; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
        .header { background-color: #0046be; color: #ffffff; padding: 10px 20px; text-align: center; font-size: 24px; }
        .content { padding: 20px; line-height: 1.6; color: #333333; }
        .content p { margin: 10px 0; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">Congratulations, Cleaning Service Team!</div>
        <div class="content">
            <p>Hello Ct Cleaning Services:</p>
            <p>You have received a new potential client interested in your $service services. It's time to shine!</p>
            <p><strong>Potential Client Information:</strong></p>
            <ul>
                <li>Name: $name</li>
                <li>Email: $from</li>
                <li>Phone: $phone</li>
                <li>Address: $address</li>
                <li>Service: $service</li>
                <li>Date: $date</li>
                <li>From: $time1</li>
                <li>To: $time2</li>
                <li>How often: $often</li>
                <li>Bedrooms: $bedrooms</li>
                <li>Bathrooms: $bathroom</li>
                <li>Message: $message</li>
            </ul>
            <p><strong>Review the Details:</strong> Verify the information provided by the potential client.</p>
            <p><strong>Get in Touch:</strong> Do not miss the opportunity to turn this potential client into a successful sale. Call them or send them an email as soon as possible.</p> 
            <p><strong>Offer Value:</strong> Provide excellent customer service and highlight our unique services.</p>
        </div>
    </div>
</body>
</html>
EMAIL;

// Build the email headers for HTML content
$email_headers = "From: Cleaning Service <info@cleaningservice.com>\r\n";
$email_headers .= "Reply-To: $from\r\n";
$email_headers .= "MIME-Version: 1.0\r\n";
$email_headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$email_headers .= "X-Mailer: PHP/" . phpversion();

// Attempt to send the email
if (mail($to, $subject, $email_content, $email_headers)) {
    // If the email is sent successfully, send a HTTP 200 (OK) response
    http_response_code(200);
    echo "📧 Mail sent successfully!";
} else {
    // If sending fails, send a HTTP 500 (Internal Server Error) response
    http_response_code(500);
    echo "🧧 Mail sending failed!";
}

?>
