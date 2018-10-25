<!-- Author: Nathan Shava
     Date created: 15 AUG 2018
     Description: Contact Us feedback
     Filename: feedback.php
-->
<?php
require 'connect.php'; //File used to establish connection to the database

if (isset($_POST['emailAdd']) && ($_POST['emailAdd'] != "") AND isset($_POST['fullName']) && ($_POST['fullName'] != "")) {

    //Escaping strings prevents SQL injection
    $fullName = $connect->escape_string($_POST['fullName']);
    $emailAdd = $connect->escape_string($_POST['emailAdd']);
    $contact = $connect->escape_string($_POST['contact']);
    $message = $connect->escape_string($_POST['feedbackMsg']);

    // Send registration confirmation link (verify.php)
    $mailRecipient = 'gracious.parlour@gmail.com';
    $mailSubject = $fullName . ' feedback (Contact Us)';
    $mailMessage = '
            Hello Gracious,
    
            ' . $fullName . ' has sent you the following message:
    
            ' . $message . '
            
            ________________________________________________________________________________
            
            Message details:
            
            Full name: ' . $fullName . '
            Email address: ' . $emailAdd . ' 
            Contact number: ' . $contact;


    $mailSender = 'From: ' . $emailAdd;

    $verificationMail = mail($mailRecipient, $mailSubject, $mailMessage, $mailSender);

    if ($verificationMail == true) {
        //Verification email sent
        ?>
        <script>
            alert('Your message has been sent! We appreciate your feedback and will get to you as soon as possible');
            window.location.href = "welcome.php";
        </script>
        <?php
    } else {

        ?>
        <script>
            window.location.href = "welcome.php";
        </script>
        <?php
    }

}
?>