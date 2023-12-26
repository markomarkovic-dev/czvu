<?php
    include 'includes/global-header.php';
    $message = '';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $honeypot = $_POST['honeypot'];

        // Validate input and check honeypot
        if(empty($name) || empty($surname) || empty($email) || empty($phone) || empty($message) || !empty($honeypot)){
            $message = $lang['global']['field-check'];
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $message = $lang['global']['email-error'];
        }
        else{
            // Send the email
            $to = 'markomarko988@gmail.com'; // Replace with your email address
            $subject = 'Kontakt forma';
            $body = "Ime: $name\nPrezime: $surname\nEmail: $email\nTelefon: $phone\nPoruka: $message";
            $body = iconv(mb_detect_encoding($body, mb_detect_order(), true), "UTF-8", $body);
            $headers = "From: nopreply@cvu.com\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            if(mail($to, $subject, $body, $headers)){
                $message = $lang['global']['message-success'];
            }
            else{
                $message = $lang['global']['message-error'];
            }
        }
    }
?>

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
                <h1 class="section-heading"><?= $lang[$pagename]['heading']?></h1>
                <div class="contact-row">
                    <div class="contact-form-column">
                    <h2 class="section-heading"><?= $lang[$pagename]['write-us']?></h2>
                    <form method="post" action="" class="contact-form" id="contact-form">
                        <div class="input-wrapper-split">
                            <div class="input-wrapper form-group form-element">
                                <label for="name"><?= $lang['global']['name']?></label>
                                <input type="text" name="name" id="name" class="form-control" data-error="<?= $lang['global']['field-required']?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="input-wrapper form-group form-element">
                                <label for="surname"><?= $lang['global']['surname']?></label>
                                <input type="text" name="surname" id="surname" class="form-control" data-error="<?= $lang['global']['field-required']?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="input-wrapper-split">
                            <div class="input-wrapper form-group form-element">
                                <label for="email"><?= $lang['global']['email']?></label>
                                <input type="email" name="email" id="email" class="form-control" data-error="<?= $lang['global']['email-error']?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="input-wrapper form-group form-element">
                                <label for="phone"><?= $lang['global']['phone']?></label>
                                <input type="tel" name="phone" id="phone" class="form-control" data-error="<?= $lang['global']['field-required']?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="input-wrapper form-group form-element">
                            <label for="message"><?= $lang['global']['message']?></label>
                            <textarea name="message" id="message" rows="5" class="form-control" data-error="<?= $lang['global']['field-required']?>" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- Honeypot field -->
                        <div class="input-wrapper hidden-field">
                            <label for="honeypot">Leave this field blank:</label>
                            <input type="text" name="honeypot" id="honeypot">
                        </div>
                        <input type="submit" name="submit" id="send-button" value="<?= $lang['global']['send-message']?> &#8594">
                    </form>
                        <p><?php echo $message; ?></p>
                    </div>
                    <div class="contact-location-column">
                        <h2 class="section-heading"><?= $lang[$pagename]['call-us']?></h2>
                        <a href="tel:+387 51 348 807"><i class="ri-phone-line"></i> +387 51 348 807</a>
                        <a href="https://goo.gl/maps/2yZGk8XFgEBbfT5WA" target="_blank"><i class="ri-map-pin-2-line"></i> <?= $lang[$pagename]['street-address']?></a>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2832.2308115034302!2d17.2096021!3d44.776099599999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475e030ce3584a55%3A0x25597e601326f8f6!2sBulevar%20vojvode%20Petra%20Bojovi%C4%87a%201A%2C%20Banja%20Luka%2078000!5e0!3m2!1shr!2sba!4v1687106524704!5m2!1shr!2sba" width="100%" height="313" style="border:0;border-radius:16px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </section>
        </main>

        <?php include('includes/global-footer.php'); ?>
    </div>