<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize input
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone   = htmlspecialchars(trim($_POST['phone']));
    $service = htmlspecialchars(trim($_POST['service']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Compose email
    $to = "deehmash@gmail.com"; // CHANGE THIS to your email
    $subject = "New Contact Form Submission from $name";
    $body = "You have received a new message from your website contact form.\n\n" .
            "Name: $name\n" .
            "Email: $email\n" .
            "Phone: $phone\n" .
            "Service: $service\n\n" .
            "Message:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        // Redirect back with success message
        header("href=thank-you.html");
        exit();
    } else {
        echo "Error: Message could not be sent. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
