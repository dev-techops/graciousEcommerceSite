<!-- Author: Nathan Shava
     Date created: 15 JUNE 2018
     Description: Client booking script
     Filename: makingbooking.php
-->
<?php
require 'connect.php'; //File used to establish connection to the database

if (isset($_POST['emailAdd']) && ($_POST['emailAdd'] != "") AND isset($_POST['appointmentdate']) && ($_POST['appointmentdate'] != "")) {

    $fname = $connect->escape_string($_POST['firstname']);
    $lname = $connect->escape_string($_POST['lastname']);
    $contact = $connect->escape_string($_POST['contact']);
    $emailAdd = $connect->escape_string($_POST['emailAdd']);
    $appointmentDate = $connect->escape_string($_POST['appointmentdate']);
    $services = $connect->escape_string($_POST['services']);

    $booking = $connect->query("CALL makeBooking('" . $fname . "', '" . $lname . "', '" . $contact . "', '" . $emailAdd . "', '" . $appointmentDate . "', '" . $services . "');");

    if ($booking == true)
    {
        /**
         * Client's email
         */
        $mailRecipient = $emailAdd;
        $mailSubject = 'Gracious Hair Parlour Appointment';
        $mailMessage = '
            Hello ' . $fname . ',
    
            Thank you for making an appointment with us for the ' . $services . '!
    
            Please note that your appointment been scheduled for ' . $appointmentDate . '
            
            We look forward to seeing you soon!
            
            ________________________________________________________________________________________
            
            Gracious Beauty Parlour & Boutique
            1 Cranko road, Lower Main road, Observatory, Cape Town, Western Cape
            
            For any queries (contact us on +27 83 940 5608 or email at gracious.parlour@gmail.com)';


        $mailSender = 'From: bookings@graciousparlour.com';

        /**
         * Gracious Admin email
         */
        $recipient = 'gracious.parlour@gmail.com';
        $subject = 'Gracious Hair Parlour Appointment';
        $message = '
            Hello Gracious,
    
            An appointment for the ' . $services . ' has been made!
    
            Please note that the scheduled appointment date is for the ' . $appointmentDate . '
            
            For any further communication please note the client\'s details below: 
            
            First name: ' . $fname . '
            Last name: ' . $lname . '
            Contact number: ' . $contact . '
            Email address: ' . $emailAdd;


        $sender = 'From: bookings@graciousparlour.com';

        $mail = mail($recipient, $subject, $message, $sender);
        $verificationMail = mail($mailRecipient, $mailSubject, $mailMessage, $mailSender);

        if (($mail == true) && ($verificationMail == true)) { //Ensures both emails are sent

            ?>
            <script>
                alert('Your appointment has been successfully logged. See you soon!');
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
    } else
    {
        //Error
        ?>
        <script>
            alert('Sorry your booking could not be made at this moment!');
            window.location.href = "bookings.php";
        </script>
        <?php
    }
}
?>