<!-- Author: Nathan Shava
     Date created: 15 JUNE 2018
     Description: Login handler
     Filename: customer_login.php
-->
<?php
require 'connect.php';
session_start();

if (!isset($_POST['loginEmailAdd'])) //Ensures client email is set
{
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/graciousstore/site/client_reg_login.php');
    exit;
} else {


    if (isset($_POST['loginEmailAdd']) && ($_POST['loginEmailAdd'] != "") AND isset($_POST['loginPwd']) && ($_POST['loginPwd'] != "")) {

        $emailAddress = $connect->escape_string($_POST['loginEmailAdd']);

        $clientExist = $connect->query("CALL checkCustomer('" . $emailAddress . "');") or die($connect->error);

        if ($clientExist->num_rows == 0)
        {
            ?>
            <script>
                alert('No associated account was found with that email address. Please register a new account or enter a valid email address');
                window.location.href = "client_reg_login.php";
            </script>
            <?php

            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/graciousstore/site/client_reg_login.php');
            exit;
        } else
        {

            $client = mysqli_fetch_assoc($clientExist);

            if ((password_verify($_POST['loginPwd'], $client['cust_pwd']))) {

                $_SESSION['clientfirstname'] = $client['cust_firstname'];
                $_SESSION['clientlastname'] = $client['cust_lastname'];
                $_SESSION['custLoggedIn'] = true;

                ?>
                <script>
                    alert('Welcome <?php echo $client['cust_firstname']; ?>');
                    window.location.href = "welcome.php";
                </script>
                <?php

            } else {

                //Login unsuccessful
                $_SESSION['custLoggedIn'] = false;
                ?>
                <script>
                    alert('Login failed! Please ensure you have entered the correct email address and/or password.');
                    window.location.href = "client_reg_login.php";
                </script>
                <?php
            }
        }
    }
}
?>
