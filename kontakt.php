<?php include('includes/global-header.php'); ?>
<div class="layout-container">
        <?php
            require_once "templates/header.php";
        ?>
        <main>
            <section>
            <div class="background-img background-right">
                    <div class="background-wrapper">
                        <img src="assets/images/grafika-desna.svg" alt="">
                    </div>
                </div>
                <h1 class="section-heading">Feel free to <strong>contact us</strong> for any questions and suggestions</h1>
                <div class="contact-row">
                    <div class="contact-form-column">
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
                    <h2 class="section-heading">Write to us</h2>
                    <form method="post" action="" class="contact-form">
                        <div class="input-wrapper-split">
                            <div class="input-wrapper">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" required>
                            </div>
                            <div class="input-wrapper">
                                <label for="surname">Surname:</label>
                                <input type="text" name="surname" id="surname" required>
                            </div>
                        </div>
                        <div class="input-wrapper-split">
                            <div class="input-wrapper">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" required>
                            </div>
                            <div class="input-wrapper">
                                <label for="phone">Phone Number:</label>
                                <input type="tel" name="phone" id="phone" required>
                            </div>
                        </div>
                        <div class="input-wrapper">
                            <label for="message">Message:</label>
                            <textarea name="message" id="message" rows="5" required></textarea>
                        </div>
                        <input type="submit" name="submit" value="Send message &#8594">
                    </form>
                        <p><?php echo $message; ?></p>
                    </div>
                    <div class="contact-location-column">
                        <h2 class="section-heading">Call us or visit us</h2>
                        <a href="tel:+387 51 348 807"><i class="ri-phone-line"></i> +387 51 348 807</a>
                        <a href="https://goo.gl/maps/2yZGk8XFgEBbfT5WA" target="_blank"><i class="ri-map-pin-2-line"></i> Bulevar vojvode Petra Bojovića 1a, Banja Luka</a>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2832.2308115034302!2d17.2096021!3d44.776099599999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475e030ce3584a55%3A0x25597e601326f8f6!2sBulevar%20vojvode%20Petra%20Bojovi%C4%87a%201A%2C%20Banja%20Luka%2078000!5e0!3m2!1shr!2sba!4v1687106524704!5m2!1shr!2sba" width="100%" height="313" style="border:0;border-radius:16px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </section>
        </main>
        <?php
            require_once "templates/footer.php";

        ?>
    </div>

    <?php include('includes/global-footer.php'); ?>