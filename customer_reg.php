<!-- Author: Nathan Shava
     Date created: 15 JUNE 2018
     Description: Login handler
     Filename: customer_reg.php
-->
<?php
require_once 'connect.php';
session_start();

if (isset($_POST['emailAdd']) && ($_POST['emailAdd'] != "") && isset($_POST['pwd']) && ($_POST['pwd'] != ""))
{

    $_SESSION['custfirstname'] = $_POST['firstname'];
    $_SESSION['lastname'] = $_POST['lastname'];

    $first_name = $connect->escape_string($_POST['firstname']);
    $last_name = $connect->escape_string($_POST['lastname']);
    $contact_number = $connect->escape_string($_POST['contact']);
    $streetAdd = $connect->escape_string($_POST['streetAdd']);
    $suburb = $connect->escape_string($_POST['suburb']);
    $city = $connect->escape_string($_POST['city']);
    $province = $connect->escape_string($_POST['province']);
    $email_address = $connect->escape_string($_POST['emailAdd']);
    $password = $connect->escape_string(password_hash($_POST['pwd'], PASSWORD_BCRYPT));
    $pwdHash = $connect->escape_string(md5(rand(0, 1000)));

    //Ensure that the email has not been already used for registration
    $email_check = $connect->query("CALL `checkCustomer`('" . $email_address . "');");

    if ($email_check->num_rows > 0) {
        ?>
        <script>
            alert('Sorry this email has already been used for registration. Please enter a different email or proceed to login');
            window.location.href = "client_reg_login.php";
        </script>
        <?php
    } else //No matching email address found
    {
        mysqli_free_result($email_check);
        mysqli_next_result($connect);

        //Call Stored Procedure to insert customer record into the Customer table
        $insert_customer = "CALL customerReg('" . $first_name . "', '" . $last_name . "', '" . $contact_number . "', '" . $streetAdd . "', '" . $suburb . "', '" . $city . "', '" . $province . "', '" . $email_address . "', '" . $password . "', '" . $pwdHash . "')";
        $result = $connect->query($insert_customer);

        if ($result == true) {

            $_SESSION['clientfirstname'] = $first_name;
            $_SESSION['clientlastname'] = $last_name;
            $_SESSION['custLoggedIn'] = true; //Indicates that the user has been signed in
            ?>
            <script>
                alert('You have been successfully registered!');
                window.location.href = "welcome.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Sorry we could not register you at this time! Please try again after a few moments or refresh the page');
                window.location.href = "client_reg_login.php";
            </script>
            <?php
        }
    }
}
?>