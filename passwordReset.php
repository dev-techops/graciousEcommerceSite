<!-- Author: Nathan Shava
     Date created: 15 JUNE 2018
     Description: Password Reset Link
     Filename: passwordReset.php
-->
<?php
require 'connect.php';
session_start();

//Member cannot reset password unless their registered email is provided
if (isset($_POST['emailAdd']) && ($_POST['emailAdd'] != "")) {

    $email = $connect->escape_string($_POST['emailAdd']);

    // Check if customer account exists
    $customer = $connect->query("CALL checkCustomer('" . $email . "');");

    $details = mysqli_fetch_assoc($customer);

    $pwdHash = $details['pwd_hash'];

    // Member registered
    if ($customer->num_rows > 0) {

        // Send the password reset link (reset_password.php)
        $mailRecipient = $email;
        $mailSubject = 'Password Reset (Gracious Hair Parlour)';
        $mailMessage = '
        Hi ' . $details['cust_firstname'] . '!,
        
        Please click on the link below to reset your account password:
        
        http://localhost:1234/graciousstore/site/reset.php?cust_email=' . $email . '&pwd_hash=' . $pwdHash;

        $mailSender = 'From: admin@graciousstore.co.za';

        $resetMail = mail($mailRecipient, $mailSubject, $mailMessage, $mailSender);

        if ($resetMail == true) {

            ?>
            <script>
                alert('A link has been sent to <?php echo $email ?> with instructions to reset your password');
                window.location.href = "client_reg_login.php";
            </script>
            <?php
        } else {

            ?>
            <script>
                alert('Unable to perform operation. Please ensure you have an active internet connection');
                window.location.href = "resetpass.php";
            </script>
            <?php
        }
    } else { // Member not registered therefore cancel operation

        ?>
        <script>
            alert('The email you entered could not be validated. Please enter the email used to register your account and try again');
            window.location.href = "resetpass.php";
        </script>
        <?php
    }
}
?>