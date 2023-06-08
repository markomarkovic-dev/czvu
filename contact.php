<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
<?php
    $message = '';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        // Validate input
        if(empty($name) || empty($surname) || empty($email) || empty($phone) || empty($message)){
            $message = 'Please fill in all the fields.';
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $message = 'Invalid email format.';
        }
        else{
            // Send the email
            $to = 'markomarko988@gmail.com'; // Replace with your email address
            $subject = 'Contact Form Submission';
            $body = "Name: $name\nSurname: $surname\nEmail: $email\nPhone: $phone\nMessage: $message";
            $headers = "From: nopreply@cvu.com"; // Replace with the masked "From" address
            if(mail($to, $subject, $body, $headers)){
                $message = 'Message sent successfully.';
            }
            else{
                $message = 'An error occurred while sending the message.';
            }
        }
    }
?>
<h1>Contact Form</h1>
<p><?php echo $message; ?></p>
<form method="post" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br><br>
    <label for="surname">Surname:</label>
    <input type="text" name="surname" id="surname" required><br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br><br>
    <label for="phone">Phone Number:</label>
    <input type="tel" name="phone" id="phone" required><br><br>
    <label for="message">Message:</label><br>
    <textarea name="message" id="message" rows="5" required></textarea><br><br>
    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
