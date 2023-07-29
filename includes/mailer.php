<?php
if (isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['email']) && $_POST['email'] != "") {
    include('../lang/lang-'.$_POST['site_language'].'.php');
    // This is Google API url where we pass the API secret key to validate the user request.
    $google_recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    //upisati svoj secret key
    $recaptcha_secret_key = '6LdKF0YjAAAAALSiEM6yJVj7wt0-7uwVTM9oS6g0'; // Add your generated Secret key
    $set_recaptcha_response = $_POST['recaptcha_response'];
    // Make the request and capture the response by making below request.
    $get_recaptcha_response = file_get_contents($google_recaptcha_url . '?secret=' . $recaptcha_secret_key . '&response=' . $set_recaptcha_response);
    //print( $get_recaptcha_response);
    $get_recaptcha_response = json_decode($get_recaptcha_response);
    $success_msg = "";
    $err_msg = "";
    //Set the Google recaptcha spam score here and based the score, take your action
    //if ($get_recaptcha_response->success == true && $get_recaptcha_response->score >= 0.5 && $get_recaptcha_response->action == 'submit') {
    if (1==1) {
        $success_msg = $lang['global']['kontakt_poruka_poslana'];
        /*
            THIS FILE USES PHPMAILER INSTEAD OF THE PHP MAIL() FUNCTION
        */
        require 'PHPMailer/PHPMailerAutoload.php';
        /*
         *  CONFIGURE EVERYTHING HERE
        */
        // an email address that will be in the From field of the email.
        $fromEmail = 'noreply@spaceify.cloud';
        //$fromEmail = 'no-reply@lanaco.info';
        $fromName = 'Spaceify';
        // an email address that will receive the email with the output of the form
        // $sendToEmail = 'support@spaceify.cloud';
        $sendToEmail = 'marko.markovic@lanaco.com';
        $sendToName = 'Spaceify kontakt forma';
        // subject of the email
        $subject = 'Spaceify - Nova poruka';
        // form field names and their translations.
        // array variable name => Text to appear in the email
        $fields = array(
            'name' => 'Ime',
            'surname' => 'Prezime',
            'email' => 'Email',
            'company' => 'Kompanija',
            'message' => 'Poruka',
            'jib' => 'JIB',
            'phone' => 'Telefon',
            'state' => 'Država',
            'city' => 'Grad',
            'zipcode' => 'Poštanski broj',
            'address' => 'Adresa',
        );
        // If something goes wrong, we will display this message.
        $errorMessage = $lang['global']['kontakt_poruka_greska'];
        /*
         *  LET'S DO THE SENDING
        */
        // if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
        error_reporting(E_ALL & ~E_NOTICE);
        try {
            if (count($_POST) == 0) throw new \Exception('Form is empty');
            $emailTextHtml = "<h4>Nova poruka sa Spaceify</h4><hr>";
            $emailTextHtml .= "<table>";
            foreach ($_POST as $key => $value) {
                // If the field exists in the $fields array, include it in the email
                if (isset($fields[$key])) {
                    $emailTextHtml .= "<tr><th>$fields[$key]</th><td>$value</td></tr>";
                }
            }
            $emailTextHtml .= "</table><hr>";
            $mail = new PHPMailer;
            $mail->CharSet = "UTF-8";
            $mail->setFrom($fromEmail, $fromName);
            $mail->addAddress($sendToEmail, $sendToName); // you can add more addresses by simply adding another line with $mail->addAddress();
            $mail->addReplyTo($fromEmail);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->msgHTML($emailTextHtml); // this will also create a plain-text version of the HTML email, very handy
            if (!$mail->send()) {
                throw new \Exception('I could not send the email.' . $mail->ErrorInfo);
            }
            $responseArray = array(
                'type' => 'success',
                'message' => $success_msg
            );
        }
        catch(\Exception $e) {
            // $responseArray = array('type' => 'danger', 'message' => $errorMessage);
            $responseArray = array(
                'type' => 'danger',
                'message' => $e->getMessage()
            );
        }
    }
    else {
        $err_msg = $errorMessage;
    }
}
else {
    $err_msg = $errorMessage;
}
// Get the response and pass it into your ajax as a response.
$return_msg = array(
    'error' => $err_msg,
    'success' => $success_msg,
);
echo json_encode($return_msg);
?>