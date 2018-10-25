<!--
Author: Nathan Shava
Date created: 15 JUNE 2018
Description: Customer Password reset script
Filename: confirmReset.php
-->
<?php
require 'connect.php';
session_start();

//Ensure passwords match
if ($_POST['newPwd'] == $_POST['verPwd']) {

    $newPwd = $connect->escape_string(password_hash($_POST['verPwd'], PASSWORD_BCRYPT));

    $email = $connect->escape_string($_POST['hiddenemailAdd']);
    $hash = $connect->escape_string($_POST['hiddenpwdHash']);

    // Check if the customer is registered
    $resetPwd = "CALL passwordReset('" . $email . "', '" . $newPwd . "', '" . $hash . "');";
    $status = $connect->query($resetPwd);

    if ($status == true) { //Password reset successful

        ?>
        <script>
            alert('Your password has been reset successfully. Proceed to Login');
            window.location.href = "client_reg_login.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Could not reset password your password at this moment. Please refresh the page and try again!');
            window.location.href = "reset.php";
        </script>
        <?php
    }
} else { // Passwords don't match

    ?>
    <script>
        alert('Could not reset password your password at this moment. Please ensure your passwords match!');
        window.location.href = "reset.php";
    </script>
    <?php
}

?>