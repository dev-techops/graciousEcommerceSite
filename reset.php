<!-- Author: Nathan Shava
     Date created: 15 JUNE 2018
     Description: Reset password
     Filename: reset.php
-->
<?php
require 'connect.php';
session_start();

// Make sure email and hash variables aren't empty
if (isset($_GET['cust_email']) && ($_GET['cust_email'] != "") AND isset($_GET['pwd_hash']) && ($_GET['pwd_hash'] != "")) {

    $email = $connect->escape_string($_GET['cust_email']);
    $hash = $connect->escape_string($_GET['pwd_hash']);

    // Make sure user email with matching hash exist
    $customer = "CALL verifyRegCust('" . $email . "','" . $hash . "');";
    $result = $connect->query($customer);

    if ($result->num_rows == 0) {

        ?>
        <script>
            alert('Invalid URL for password reset! Please ensure you follow the instructions as indicated in the email that was sent to your mailbox');
            window.location.href = "resetpass.php";
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert('Unable to verify your account details');
        window.location.href = "resetpass.php";
    </script>
    <?php
}

DEFINE('HAIRFOODCAT', 1);
DEFINE('HAIRCONDCAT', 2);
DEFINE('HAIRRELCAT', 3);
DEFINE('NATURALCAT', 4);
DEFINE('OILTREATMENTCAT', 5);
DEFINE('COSMETICSCAT', 6);
DEFINE('SPRAYCAT', 7);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="resources/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="resources/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="resources/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="resources/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="resources/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="resources/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="resources/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="resources/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body class="animsition">

<!-- Header -->
<header class="header-v2">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop">
                <div class="left-header">
                    <!-- Gracious Navbar Logo -->
                    <div class="logo">
                        <a href="welcome.php"><img src="images/logos/logo.jpg" style="width:100px; height:250px;"
                                                   alt="GRACIOUS-LOGO"></a>
                    </div>
                </div>

                <div class="center-header">
                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="active-menu">
                                <a href="allproducts.php">Store</a>
                            </li>
                            <li>
                                <a href="#">Categories</a>
                                <ul class="sub-menu">
                                    <!--Script to fetch product category names-->
                                    <?php
                                    $hairfoodCat = "CALL productCategories('" . HAIRFOODCAT . "');";
                                    $category1 = $connect->query($hairfoodCat);
                                    while ($hairFood = mysqli_fetch_assoc($category1)) { ?>
                                        <li><a href="hairfoodproducts.php"><?php echo $hairFood['category_name']; ?></a>
                                        </li>
                                        <?php
                                    }
                                    mysqli_free_result($category1);
                                    mysqli_next_result($connect); ?>
                                    <?php
                                    $oilMoistCat = "CALL productCategories('" . HAIRCONDCAT . "');";
                                    $category2 = $connect->query($oilMoistCat);
                                    while ($oilMoist = mysqli_fetch_assoc($category2)) { ?>
                                        <li><a href="conditioners.php"><?php echo $oilMoist['category_name']; ?></a>
                                        </li>
                                        <?php
                                    }
                                    mysqli_free_result($category2);
                                    mysqli_next_result($connect);
                                    ?>
                                    <?php
                                    $relaxerCat = "CALL productCategories('" . HAIRRELCAT . "');";
                                    $category3 = $connect->query($relaxerCat);
                                    while ($relaxer = mysqli_fetch_assoc($category3)) { ?>
                                        <li><a href="relaxerproducts.php"><?php echo $relaxer['category_name']; ?></a>
                                        </li>
                                        <?php
                                    }
                                    mysqli_free_result($category3);
                                    mysqli_next_result($connect);
                                    ?>
                                    <?php
                                    $naturalCat = "CALL productCategories('" . NATURALCAT . "');";
                                    $category4 = $connect->query($naturalCat);
                                    while ($natural = mysqli_fetch_assoc($category4)) { ?>
                                        <li><a href="naturalproducts.php"><?php echo $natural['category_name']; ?></a>
                                        </li>
                                        <?php
                                    }
                                    mysqli_free_result($category4);
                                    mysqli_next_result($connect);
                                    ?>
                                    <?php
                                    $treatmentCat = "CALL productCategories('" . OILTREATMENTCAT . "');";
                                    $category5 = $connect->query($treatmentCat);
                                    while ($treatment = mysqli_fetch_assoc($category5)) {
                                        ?>
                                        <li>
                                            <a href="treatmentproducts.php"><?php echo $treatment['category_name']; ?></a>
                                        </li>
                                        <?php
                                    }
                                    mysqli_free_result($category5);
                                    mysqli_next_result($connect);
                                    ?>
                                    <?php
                                    $cosmeticsCat = "CALL productCategories('" . COSMETICSCAT . "');";
                                    $category6 = $connect->query($cosmeticsCat);
                                    while ($cosmetics = mysqli_fetch_assoc($category6)) {
                                        ?>
                                        <li><a href="cosmetics.php"><?php echo $cosmetics['category_name']; ?></a></li>
                                        <?php
                                    }
                                    mysqli_free_result($category6);
                                    mysqli_next_result($connect);
                                    ?>
                                    <?php
                                    $spraysCat = "CALL productCategories('" . SPRAYCAT . "');";
                                    $category7 = $connect->query($spraysCat);
                                    while ($sprays = mysqli_fetch_assoc($category7)) {
                                        ?>
                                        <li><a href="hairsprayproducts.php"><?php echo $sprays['category_name']; ?></a>
                                        </li>
                                        <?php
                                    }
                                    mysqli_free_result($category7);
                                    mysqli_next_result($connect);
                                    ?>
                                </ul>
                            </li>
                            <li>
                                <a href="aboutus.php">About Us</a>
                            </li>
                            <li>
                                <a href="contactus.php">Contact Us</a>
                            </li>
                            <li>
                                <a href="client_reg_login.php">Sign Up/Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

</header>

<!-- Title page -->
<section class="how-overlay2 bg-img1" style="background-image: url(images/salon_img/salon_chairs.jpg);height:500px;">
    <div class="container">
        <div class="txt-center p-t-160 p-b-165">
            <h3 style="color:#ffffff;" class="txt-l-101 cl0 txt-center p-b-14 respon1">
                Reset Password
            </h3>
        </div>
    </div>
</section>

<!-- content page -->
<div class="bg0 p-t-95 p-b-100">
    <div class="container">
        <form name="resetFrm" id="resetFrm" method="post" action="confirmReset.php">
            <p class="txt-s-101 cl9 p-b-17">
                Enter your your new password below to complete the process
            </p>

            <div class="p-b-20">
                <div class="txt-s-101 cl9 p-b-14">
                    <label for="newPwd">
                        New Password:
                    </label>
                </div>

                <input class="txt-s-101 cl3 size-a-41 bo-all-1 bocl15 p-rl-15 focus1"
                       placeholder="Type your new password here" type="password" id="newPwd"
                       name="newPwd">
            </div>

            <div class="p-b-20">
                <div class="txt-s-101 cl9 p-b-14">
                    <label for="verPwd">
                        Confirm Password:
                    </label>
                </div>
                <input class="txt-s-101 cl3 size-a-41 bo-all-1 bocl15 p-rl-15 focus1"
                       placeholder="Verify your new password" type="password" id="verPwd"
                       name="verPwd">
            </div>

            <div class="flex-w">

                <input type="hidden" id="hiddenemailAdd" name="hiddenemailAdd" value="<?php echo $email; ?>">
                <input type="hidden" id="hiddenpwdHash" name="hiddenpwdHash" value="<?php echo $hash; ?>">

                <button class="flex-c-m txt-s-105 cl0 bg10 size-a-40 hov-btn2 trans-04 p-rl-10 m-r-18" type="button"
                        name="btnConfirmReset"
                        id="btnConfirmReset"
                        onclick="validateForm()">
                    Confirm
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Logo -->
<div class="sec-logo bg0">
    <div class="container">
        <div class="flex-w flex-sa-m bo-t-1 bocl13 p-tb-60">
            <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                <img class="trans-04" src="images/logos/africanpride.png" style="width:150px;height:100px;"
                     alt="African Pride">
            </a>

            <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                <img class="trans-04" src="images/logos/africanprideolivemiracles.jpg" style="width:200px;height:100px;"
                     alt="African Pride Olive Miracles">
            </a>

            <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                <img class="trans-04" src="images/logos/imancosmetics.png" style="width:200px;height:100px;"
                     alt="Iman Cosmetics">
            </a>

            <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                <img class="trans-04" src="images/logos/mizani.jpg" style="width:200px;height:100px;" alt="Mizani">
            </a>

            <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                <img class="trans-04" src="images/logos/nexsheenarganics.jpg" style="width:200px;height:100px;"
                     alt="Nexsheen Arganics">
            </a>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg0">
    <div class="container">
        <div class="wrap-footer flex-w p-t-83 p-b-12">
            <div class="footer-col1 p-b-50">
                <div class="p-b-36">
						<span class="txt-m-109 cl3">
							Contact us
						</span>
                </div>

                <ul>
                    <li class="txt-s-101 cl6 flex-t p-b-10">
							<span class="size-w-11">
								<img src="images/icons/icon-mail.png" alt="ICON-MAIL">
							</span>

                        <span class="size-w-12 p-t-1">
								gracious.parlour@gmail.com
							</span>
                    </li>

                    <li class="txt-s-101 cl6 flex-t p-b-10">
							<span class="size-w-11">
								<img src="images/icons/icon-pin.png" alt="ICON-MAIL">
							</span>

                        <span class="size-w-12 p-t-1">
                                1 Cranko road, Lower Main road, Observatory, Cape Town, Western Cape
							</span>
                    </li>

                    <li class="txt-s-101 cl6 flex-t p-b-10">
							<span class="size-w-11">
								<img src="images/icons/icon-phone.png" alt="ICON-MAIL">
							</span>

                        <span class="size-w-12 p-t-1">
								+27 83 940 5608
							</span>
                    </li>
                </ul>
            </div>

            <div class="footer-col2 p-b-50">
                <div class="p-b-36">
						<span class="txt-m-109 cl3">
							Information
						</span>
                </div>

                <ul>
                    <li class="p-b-16">
                        <a href="aboutus.php" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                            About Gracious Hair Parlour
                        </a>
                    </li>

                </ul>
            </div>

            <div class="footer-col3 p-b-50">
                <div class="p-b-36">
						<span class="txt-m-109 cl3">
							Account Activity
						</span>
                </div>

                <ul>
                    <li class="p-b-16">
                        <a href="client_reg_login.php" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                            My account
                        </a>
                    </li>

                    <li class="p-b-16">
                        <a href="#" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                            Order history
                        </a>
                    </li>
                </ul>
            </div>

            <div class="footer-col4 p-t-8 p-b-50">
                <div class="bo-all-3 bocl17 flex-col-c-m p-rl-28 p-t-17 p-b-20">
                    <a href="welcome.php" class="wrap-pic-max-s">
                        <img src="images/logos/logo.png" style="width:200px;height:100px;" alt="LOGO">
                    </a>

                    <p class="txt-s-101 cl6 txt-center p-t-23">
                        Your One-stop destination for all your hair care (Braiding, Weaving, Relaxing), Nails,
                        Facials, Waxing, Massages, Hair & Cosmetics.
                    </p>

                    <div class="flex-w flex-c-m p-t-20">
                        <a href="#" class="wrap-pic-max-s pos-relative lh-00 hov6 size-h-4 m-all-6">
                            <img class="hov6-child1 trans-04" src="images/icons/icon-instagram.png" alt="instagram">
                            <img class="ab-t-l hov6-child2 trans-04" src="images/icons/icon-instagram2.png"
                                 alt="instagram">
                        </a>

                        <a href="#" class="wrap-pic-max-s pos-relative lh-00 hov6 size-h-4 m-all-6">
                            <img class="hov6-child1 trans-04" src="images/icons/icon-twitter.png" alt="twitter">
                            <img class="ab-t-l hov6-child2 trans-04" src="images/icons/icon-twitter2.png" alt="twitter">
                        </a>

                        <a href="#" class="wrap-pic-max-s pos-relative lh-00 hov6 size-h-4 m-all-6">
                            <img class="hov6-child1 trans-04" src="images/icons/icon-google.png" alt="google">
                            <img class="ab-t-l hov6-child2 trans-04" src="images/icons/icon-google2.png" alt="google">
                        </a>

                        <a href="https://www.facebook.com/Gracious-Beauty-Parlour-and-Boutique-1703658159892820/"
                           class="wrap-pic-max-s pos-relative lh-00 hov6 size-h-4 m-all-6">
                            <img class="hov6-child1 trans-04" src="images/icons/icon-facebook.png" alt="facebook">
                            <img class="ab-t-l hov6-child2 trans-04" src="images/icons/icon-facebook2.png"
                                 alt="facebook">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-w flex-sb-m bo-t-1 bocl14 p-tb-14" style="background-color:#333333;">
				<span class="txt-s-101 cl9 p-tb-10 p-r-29" style="color:#ffffff;">
					Copyright © 2018 Gracious Beauty Parlour & Boutique. All rights reserved.
				</span><br />
            <span class="txt-s-101 cl9 p-tb-10 p-r-29" style="color:#ffffff;">
					<small>Site by <a href="#" style="color:#ffffff">BytePro Solutions</a></small>
				</span>

            <div class="flex-w flex-m">
                <a href="#" class="m-r-29 m-tb-10">
                    <img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-r-29 m-tb-10">
                    <img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-r-29 m-tb-10">
                    <img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-r-29 m-tb-10">
                    <img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
                </a>

                <a href="#">
                    <img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
                </a>
            </div>
        </div>
    </div>
</footer>


<!-- Back to top -->
<div style="color:#4d0099;" class="btn-back-to-top bg0-hov" id="myBtn">
		<span style="color:#4d0099;" class="symbol-btn-back-to-top">
			<span style="color:#ffffff;" class="lnr lnr-chevron-up"></span>
		</span>
</div>

<script>
    function validateForm() {

        var validatedPwd = validatePwd();

        if ((validatedPwd === true)) {

            document.resetFrm.submit();
            document.resetFrm.reset();
        }
    }

    function validatePwd() {

        var firstPwd = document.resetFrm.newPwd.value;
        var secondPwd = document.resetFrm.verPwd.value;
        var action;

        if (firstPwd === "") {
            document.getElementById("newPwd").style.borderColor = "#ff0000";
            action = false;
        }
        else if (secondPwd === "") {
            document.getElementById("verPwd").style.borderColor = "#ff0000";
            action = false;
        }
        else if (!(firstPwd === secondPwd)) {
            document.getElementById("newPwd").style.borderColor = "#ff0000";
            document.getElementById("verPwd").style.borderColor = "#ff0000";
            action = false;
        }
        else {
            document.getElementById("newPwd").style.borderColor = "";
            document.getElementById("verPwd").style.borderColor = "";
            action = true;
        }

        return action;
    }
</script>
<!--===============================================================================================-->
<script src="resources/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="resources/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="resources/bootstrap/js/popper.js"></script>
<script src="resources/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="resources/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="resources/daterangepicker/moment.min.js"></script>
<script src="resources/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="resources/slick/slick.min.js"></script>
<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
<script src="resources/parallax100/parallax100.js"></script>
<!--===============================================================================================-->
<script src="resources/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script src="resources/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="resources/sweetalert/sweetalert.min.js"></script>
<!--===============================================================================================-->
<script src="resources/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
