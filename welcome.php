<!-- Author: Nathan Shava
     Date created: 15 JUNE 2018
     Description: Landing page
     Filename: welcome.php
-->
<?php
require 'connect.php'; //File used to establish connection to the database
session_start();

if (isset($_SESSION['custLoggedIn'])) {

    $firstName = $_SESSION['clientfirstname'];
    $lastName = $_SESSION['clientlastname'];
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
    <title>Gracious Hair Parlour</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Theme imports and animation -->
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
    <link rel="stylesheet" type="text/css" href="resources/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="resources/revolution/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="resources/revolution/css/settings.css">
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
                        <a href="welcome.php"><img src="images/logos/logo.jpg" style="width:100px;height:250px;"
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
                                <a href="bookings.php">Appointments</a>
                            </li>
                            <li>
                                <a href="aboutus.php">About Us</a>
                            </li>
                            <li>
                                <a href="contactus.php">Contact Us</a>
                            </li>
                            <li>
                                <?php
                                if (isset($_SESSION['custLoggedIn'])) {
                                    ?>
                                    <a href="#"><?php echo $firstName . ' ' . $lastName; ?></a>
                                    <ul class="sub-menu">
                                        <li><a href="client_logout.php">Logout</a></li>
                                    </ul>
                                    <?php
                                } else {
                                    ?>
                                    <a href="#">Customer Portal</a>
                                    <ul class="sub-menu">
                                        <li><a href="client_reg_login.php">Sign Up/Login</a></li>
                                    </ul>
                                    <?php
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="right-header">
                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click p-t-8">

                        <div class="wrap-cart-header h-full flex-m m-l-10 menu-click">
                            <div class="icon-header-item flex-c-m trans-04 icon-header-noti">
                                <img src="images/icons/icon-cart-3.png" alt="CART">
                            </div>

                            <div class="cart-header menu-click-child trans-04">
                                <?php

                                if (isset($_POST["btnAddCartItem"])) {

                                    if (isset($_SESSION["shoppingCart"])) //Keeps track of the shopping cart
                                    {
                                        $array_item_id = array_column($_SESSION["shoppingCart"], "product_item"); //creates sequential array for matching array keys to products id's

                                        if (!in_array($_GET["cartProd"], $array_item_id)) {

                                            $count = count($_SESSION["shoppingCart"]); //Products in cart

                                            $array_item = array(
                                                'product_item' => $_GET["cartProd"],
                                                'brand_name' => $_POST["hiddenprodbrand"],
                                                'product_img' => $_POST["hiddenprodimg1"],
                                                'product_name' => $_POST["hiddenprodname"],
                                                'product_tax' => $_POST["hiddenprodtax"],
                                                'product_price' => $_POST["hiddenprodprice"],
                                                'product_qty' => $_POST["hiddenprodqty"]
                                            );

                                            $_SESSION["shoppingCart"][$count] = $array_item;

                                            ?>
                                            <script>
                                                window.location.href = "welcome.php"; //Refresh page
                                            </script>
                                            <?php
                                        } else { //product already exists, increase quantity

                                            //match array key to id of the product being added to the cart
                                            for ($i = 0; $i < count($array_item_id); $i++) {
                                                if ($array_item_id[$i] == $_GET["cartProd"]) {
                                                    //add item quantity to the existing product in the array
                                                    $_SESSION['shoppingCart'][$i]['product_qty'] += $_POST["hiddenprodqty"];
                                                }
                                            }
                                        }
                                    } else //Nothing to add
                                    {
                                        $array_item = array(
                                            'product_item' => $_GET["cartProd"],
                                            'brand_name' => $_POST["hiddenprodbrand"],
                                            'product_img' => $_POST["hiddenprodimg1"],
                                            'product_name' => $_POST["hiddenprodname"],
                                            'product_tax' => $_POST["hiddenprodtax"],
                                            'product_price' => $_POST["hiddenprodprice"],
                                            'product_qty' => $_POST["hiddenprodqty"]
                                        );

                                        $_SESSION["shoppingCart"][0] = $array_item;
                                    }
                                }
                                if (isset($_GET["action"])) //Customer removes item from cart
                                {
                                    if ($_GET["action"] == "remove") //When customer clicks on the delete icon in the cart
                                    {
                                        foreach ($_SESSION["shoppingCart"] as $items => $values) {
                                            if ($values["product_item"] == $_GET["removeFromCart"]) {
                                                unset($_SESSION["shoppingCart"][$items]); //Removes product from car
                                                ?>
                                                <script>
                                                    window.location.href = "welcome.php"; //Refresh
                                                </script>
                                                <?php
                                            }
                                        }
                                    }
                                }
                                ?>
                                <form action="shopcart.php" target="_self" id="submitCartForm" name="submitCartForm">
                                    <div class="bo-b-1 bocl15">
                                        <!-- Navbar cart header -->
                                        <?php
                                        if (!empty($_SESSION['shoppingCart'])) {

                                            $total = 0;

                                            foreach ($_SESSION['shoppingCart'] as $key => $product) {
                                                ?>
                                                <div class="size-h-2 js-pscroll m-r--15 p-r-15">
                                                <div class="flex-w flex-str m-b-25">
                                                    <div class="size-w-15 flex-w flex-t">
                                                        <a href="singleproduct.php?action=add&product_id=<?php echo $product['product_item']; ?>"
                                                           class="wrap-pic-w bo-all-1 bocl12 size-w-16 hov3 trans-04 m-r-14">
                                                            <img src="<?php echo $product['product_img']; ?>"
                                                                 alt="PRODUCT">
                                                        </a>

                                                        <div class="size-w-17 flex-col-l">
                                                            <a href="singleproduct.php?action=add&product_id=<?php echo $product['product_item']; ?>"
                                                               class="txt-s-108 cl3 hov-cl10 trans-04">
                                                                <?php echo $product['brand_name'] ?>
                                                                , <?php echo $product['product_name'] ?>
                                                            </a>

                                                            <span class="txt-s-101 cl9">
															<?php echo $product['product_price'] ?>
														</span>

                                                            <span class="txt-s-109 cl12">
                                                                <?php
                                                                if ($product['product_qty'] < 1) {
                                                                    $product['product_qty'] = 1;
                                                                    ?>
                                                                    <?php echo $product['product_qty'] ?>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <?php echo $product['product_qty'] ?>
                                                                    <?php
                                                                }
                                                                ?>
														</span>
                                                        </div>
                                                    </div>

                                                    <div class="size-w-14 flex-b">
                                                        <a href="welcome.php?action=remove&removeFromCart=<?php echo $product['product_item']; ?>">
                                                            <span class="text-danger">
                                                                X
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php
                                                $total = $total + ($product['product_qty'] * $product['product_price']);
                                            }
                                            ?>

                                            </div>
                                            <div class="flex-w flex-sb-m p-t-22 p-b-12">
                                                <span class="txt-m-103 cl3 p-r-20">
                                                    Subtotal
                                                </span>

                                                <span class="txt-m-111 cl6">
                                                    ZAR <?php echo number_format($total, 2); ?>
                                                </span>
                                            </div>

                                            <button name="cartSummary" id="cartSummary" type="button"
                                                    onclick="submitCart()"
                                                    class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
                                                View Cart
                                            </button>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

</header>

<!-- Page Banner slider -->
<section class="sec-slider">
    <div class="rev_slider_wrapper fullwidthbanner-container">
        <div id="rev_slider_3" class="rev_slide fullwidthabanner" data-version="5.4.5" style="display:none">
            <ul>
                <!-- Slide 1 -->
                <li data-transition="fade">
                    <!--Page Banner -->
                    <img src="images/salon_img/salon_chairs.jpg" alt="Salon Banner" class="rev-slidebg">
                </li>
                <!-- Slide 2 -->
                <li data-transition="fade">
                    <!--Page Banner -->
                    <img src="images/salon_img/salon_basins.jpg" alt="Salon Basins" class="rev-slidebg">
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- Featured Hair Products -->
<section class="sec-specical-product bg0 p-t-145 p-b-80 p-rl-60 p-rl-0-xl">
    <div class="size-a-1 flex-col-c-m p-b-55">
        <div style="font-size:28pt;color:#4d0099" class="txt-center txt-m-201 cl10 how-pos1-parent m-b-14">
            Featured Hair Products
        </div>

    </div>

    <!-- Featured Products block -->
    <div class="wrap-slick5">
        <div class="slick5">
            <!-- Featured Category 1 -->
            <div class="item-slick5 p-all-15">
                <!-- Hair Food -->
                <?php
                //Featured hair food product
                $featuredHF = "SELECT * FROM `featuredhairfood`;";
                $hairFoodFeatured = $connect->query($featuredHF);
                if (mysqli_num_rows($hairFoodFeatured) > 0) { //Row exists
                    while ($hairfoodfeature = mysqli_fetch_array($hairFoodFeatured)) //Fetch details
                    {
                        ?>
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hairfoodfeature['product_id']; ?>">
                                    <img src="<?php echo $hairfoodfeature["product_img1"]; ?>"
                                         alt="Hair Food Feature"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="welcome.php?action=add&cartProd=<?php echo $hairfoodfeature['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hairfoodfeature['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hairfoodfeature['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hairfoodfeature['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hairfoodfeature['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hairfoodfeature['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hairfoodfeature['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hairfoodfeature['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hairfoodfeature['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hairfoodfeature['product_img3']; ?>">

                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hairfoodfeature["product_price"]; ?></b>
                                                <label for="hiddenprodqty">
                                                    Quantity
                                                </label>
                                                <input style="margin-left:30%;border:solid 1px #4d0099;" type="number" name="hiddenprodqty" id="hiddenprodqty"
                                                       min="1" max="99" value="1"></p>
                                            <button style="margin-top:2em;margin-left:4em;" type="submit"
                                                    onclick="addToCart()"
                                                    id="btnAddCartItem"
                                                    name="btnAddCartItem"
                                                    class="btn btn-outline-warning btn-lg">
                                                <span class="glyphicon glyphicon-shopping-cart">Add to cart</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <!-- Featured Category 2 -->
            <div class="item-slick5 p-all-15">
                <?php
                //Featured oil moisturizer product
                $featuredOM = "SELECT * FROM `featuredoilmoisturizer`;";
                $oilMoistFeatured = $connect->query($featuredOM);
                if (mysqli_num_rows($oilMoistFeatured) > 0) { //Row exists
                    while ($oilmoistfeature = mysqli_fetch_array($oilMoistFeatured)) //Fetch details
                    {
                        ?>
                        <!-- Oil Moisturizer -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $oilmoistfeature['product_id']; ?>">
                                    <img src="<?php echo $oilmoistfeature["product_img1"]; ?>"
                                         alt="Hair Food Feature"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="welcome.php?action=add&cartProd=<?php echo $oilmoistfeature['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $oilmoistfeature['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $oilmoistfeature['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $oilmoistfeature['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $oilmoistfeature['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $oilmoistfeature['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $oilmoistfeature['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $oilmoistfeature['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $oilmoistfeature['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $oilmoistfeature['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $oilmoistfeature["product_price"]; ?></b>
                                                <label for="hiddenprodqty">
                                                    Quantity
                                                </label>
                                                <input style="margin-left:30%;border:solid 1px #4d0099;" type="number" name="hiddenprodqty" id="hiddenprodqty"
                                                       min="1" max="99" value="1"></p>
                                            <button style="margin-top:2em;margin-left:4em;" type="submit"
                                                    onclick="addToCart()"
                                                    id="btnAddCartItem"
                                                    name="btnAddCartItem"
                                                    class="btn btn-outline-warning btn-lg">
                                                <span class="glyphicon glyphicon-shopping-cart">Add to cart</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <!-- Featured Category 3 -->
            <div class="item-slick5 p-all-15">
                <?php
                //Featured relaxer product
                $featuredR = "SELECT * FROM `featuredrelaxer`;";
                $relaxerFeatured = $connect->query($featuredR);
                if (mysqli_num_rows($relaxerFeatured) > 0) { //Row exists
                    while ($relaxerfeature = mysqli_fetch_array($relaxerFeatured)) //Fetch details
                    {
                        ?>
                        <!-- Hair Relaxer -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $relaxerfeature['product_id']; ?>">
                                    <img src="<?php echo $relaxerfeature["product_img1"]; ?>"
                                         alt="Hair Food Feature"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="welcome.php?action=add&cartProd=<?php echo $relaxerfeature['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $relaxerfeature['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $relaxerfeature['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $relaxerfeature['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $relaxerfeature['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $relaxerfeature['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $relaxerfeature['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $relaxerfeature['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $relaxerfeature['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $relaxerfeature['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $relaxerfeature["product_price"]; ?></b>
                                                <label for="hiddenprodqty">
                                                    Quantity
                                                </label>
                                                <input style="margin-left:30%;border:solid 1px #4d0099;" type="number" name="hiddenprodqty" id="hiddenprodqty"
                                                       min="1" max="99" value="1">
                                            </p>
                                            <button style="margin-top:2em;margin-left:4em;" type="submit"
                                                    onclick="addToCart()"
                                                    id="btnAddCartItem"
                                                    name="btnAddCartItem"
                                                    class="btn btn-outline-warning btn-lg">
                                                <span class="glyphicon glyphicon-shopping-cart">Add to cart</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <!-- Featured Category 4 -->
            <div class="item-slick5 p-all-15">
                <?php
                //Featured natural product
                $featuredN = "SELECT * FROM `featurednatural`;";
                $naturalFeatured = $connect->query($featuredN);
                if (mysqli_num_rows($naturalFeatured) > 0) { //Row exists
                    while ($naturalfeature = mysqli_fetch_array($naturalFeatured)) //Fetch details
                    {
                        ?>
                        <!-- Natural Hair Product -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $naturalfeature['product_id']; ?>">
                                    <img src="<?php echo $naturalfeature["product_img1"]; ?>"
                                         alt="Hair Food Feature"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="welcome.php?action=add&cartProd=<?php echo $naturalfeature['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $naturalfeature['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $naturalfeature['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $naturalfeature['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $naturalfeature['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $naturalfeature['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $naturalfeature['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $naturalfeature['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $naturalfeature['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $naturalfeature['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $naturalfeature["product_price"]; ?></b>
                                                <label for="hiddenprodqty">
                                                    Quantity
                                                </label>
                                                <input style="margin-left:30%;border:solid 1px #4d0099;" type="number" name="hiddenprodqty" id="hiddenprodqty"
                                                       min="1" max="99" value="1"></p>
                                            <button style="margin-top:2em;margin-left:4em;" type="submit"
                                                    onclick="addToCart()"
                                                    id="btnAddCartItem"
                                                    name="btnAddCartItem"
                                                    class="btn btn-outline-warning btn-lg">
                                                <span class="glyphicon glyphicon-shopping-cart">Add to cart</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <!-- Featured Category 5 -->
            <div class="item-slick5 p-all-15">
                <?php
                //Featured treatment product
                $featuredT = "SELECT * FROM `featuredtreatment`;";
                $treatmentFeatured = $connect->query($featuredT);;
                if (mysqli_num_rows($treatmentFeatured) > 0) { //Row exists
                    while ($treatmentfeature = mysqli_fetch_array($treatmentFeatured)) //Fetch details
                    {
                        ?>
                        <!-- Oil Treatment -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $treatmentfeature['product_id']; ?>">
                                    <img src="<?php echo $treatmentfeature["product_img1"]; ?>"
                                         alt="Hair Food Feature"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="welcome.php?action=add&cartProd=<?php echo $treatmentfeature['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $treatmentfeature['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $treatmentfeature['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $treatmentfeature['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $treatmentfeature['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $treatmentfeature['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $treatmentfeature['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $treatmentfeature['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $treatmentfeature['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $treatmentfeature['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $treatmentfeature["product_price"]; ?></b>
                                                <label for="hiddenprodqty">
                                                    Quantity
                                                </label>
                                                <input style="margin-left:30%;border:solid 1px #4d0099;" type="number" name="hiddenprodqty" id="hiddenprodqty"
                                                       min="1" max="99" value="1"></p>
                                            <button style="margin-top:2em;margin-left:4em;" type="submit"
                                                    onclick="addToCart()"
                                                    id="btnAddCartItem"
                                                    name="btnAddCartItem"
                                                    class="btn btn-outline-warning btn-lg">
                                                <span class="glyphicon glyphicon-shopping-cart">Add to cart</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <!-- Featured Category 6 -->
            <div class="item-slick5 p-all-15">
                <?php
                //Featured cosmetics product
                $featuredC = "SELECT * FROM `featuredcosmetics`;";
                $cosmeticsFeatured = $connect->query($featuredC);
                if (mysqli_num_rows($cosmeticsFeatured) > 0) { //Row exists
                    while ($cosmeticsfeature = mysqli_fetch_array($cosmeticsFeatured)) //Fetch details
                    {
                        ?>
                        <!-- Cosmetics -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $cosmeticsfeature['product_id']; ?>">
                                    <img src="<?php echo $cosmeticsfeature["product_img1"]; ?>"
                                         alt="Hair Food Feature"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="welcome.php?action=add&cartProd=<?php echo $cosmeticsfeature['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $cosmeticsfeature['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $cosmeticsfeature['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $cosmeticsfeature['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $cosmeticsfeature['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $cosmeticsfeature['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $cosmeticsfeature['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $cosmeticsfeature['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $cosmeticsfeature['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $cosmeticsfeature['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $cosmeticsfeature["product_price"]; ?></b>
                                                <label for="hiddenprodqty">
                                                    Quantity
                                                </label>
                                                <input style="margin-left:30%;border:solid 1px #4d0099;" type="number" name="hiddenprodqty" id="hiddenprodqty"
                                                       min="1" max="99" value="1"></p>
                                            <button style="margin-top:2em;margin-left:4em;" type="submit"
                                                    onclick="addToCart()"
                                                    id="btnAddCartItem"
                                                    name="btnAddCartItem"
                                                    class="btn btn-outline-warning btn-lg">
                                                <span class="glyphicon glyphicon-shopping-cart">Add to cart</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <!-- Featured Category 7 -->
            <div class="item-slick5 p-all-15">
                <?php
                //Featured spray product
                $featuredS = "SELECT * FROM `featuredspray`;";
                $sprayFeatured = $connect->query($featuredS);
                if (mysqli_num_rows($sprayFeatured) > 0) { //Row exists
                    while ($spraysfeature = mysqli_fetch_array($sprayFeatured)) //Fetch details
                    {
                        ?>
                        <!-- Hair Spray -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $spraysfeature['product_id']; ?>">
                                    <img src="<?php echo $spraysfeature["product_img1"]; ?>"
                                         alt="Hair Food Feature"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="welcome.php?action=add&cartProd=<?php echo $spraysfeature['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $spraysfeature['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $spraysfeature['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $spraysfeature['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $spraysfeature['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $spraysfeature['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $spraysfeature['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $spraysfeature['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $spraysfeature['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $spraysfeature['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $spraysfeature["product_price"]; ?></b>
                                                <label for="hiddenprodqty">
                                                    Quantity
                                                </label>
                                                <input style="margin-left:30%;border:solid 1px #4d0099;" type="number" name="hiddenprodqty" id="hiddenprodqty"
                                                       min="1" max="99" value="1"></p>
                                            <button style="margin-top:2em;margin-left:4em;" type="submit"
                                                    onclick="addToCart()"
                                                    id="btnAddCartItem"
                                                    name="btnAddCartItem"
                                                    class="btn btn-outline-warning btn-lg">
                                                <span class="glyphicon glyphicon-shopping-cart">Add to cart</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>

        <div class="wrap-dot-slick5 p-rl-15 p-t-40"></div>
    </div>
</section>

<!-- Services -->
<section class="sec-whychose bg12 p-t-120">
    <div class="container">
        <div class="row">
            <div class="col-md-7 order-md-2">
                <div class="p-l-50 p-t-60 p-l-0-lg">
                    <div class="size-a-1 flex-col-l-m p-b-65">

                        <h5 class="txt-l-101 cl3 respon1">
                            Why choose Gracious Products & Services
                        </h5>
                    </div>

                    <div>
                        <div class="flex-w p-b-50">
                            <div class="size-w-22 wrap-pic-max-s flex-t-l p-t-5">
                                <img src="images/logos/africanpride.png" style="width:500px;height:150px;"
                                     alt="AP logo">
                            </div>

                            <div class="size-w-23">
									<span style="margin-left:5%;" class="txt-m-101 cl3">
										Natural Hair Care products
									</span>

                                <p style="margin-left:5%;" class="txt-s-101 cl6 p-t-12">
                                    100% organic made from natural ingredients containing no additives or colourants
                                </p>
                            </div>
                        </div>

                        <div class="flex-w p-b-50">
                            <div class="size-w-22 wrap-pic-max-s flex-t-l p-t-5">
                                <img src="images/nails/mani3.jpg" style="width:500px;height:150px;" alt="Salon Ads">
                            </div>

                            <div class="size-w-23">
									<span style="margin-left:5%;" class="txt-m-101 cl3">
										Nail bar
									</span>

                                <p style="margin-left:5%;" class="txt-s-101 cl6 p-t-12">
                                    For all your professional manicure and pedicure needs
                                </p>
                            </div>
                        </div>

                        <div class="flex-w p-b-50">
                            <div class="size-w-22 wrap-pic-max-s flex-t-l p-t-5">
                                <img src="images/salon_img/salon_entr.jpg" style="width:500px;height:150px;"
                                     alt="Salon Banner">
                            </div>

                            <div class="size-w-23">
									<span style="margin-left:5%;" class="txt-m-101 cl3">
										Convenient location
									</span>

                                <p style="margin-left:5%;" class="txt-s-101 cl6 p-t-12">
                                    You can find us in the heart of the Southern Suburbs of Cape Town <br/>(See the <a
                                            href="contactus.php">Gracious map</a> for directions)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 order-md-1">
                <div class="flex-b h-full">
                    <div class="wrap-pic-max-w"><img src="images/salon_img/salon_ads.jpg" alt="IMG"></div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                    <a href="#" class="wrap-pic-max-s">
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
				</span><br/>
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


<!--===============================================================================================-->
<script src="resources/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="resources/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="resources/bootstrap/js/popper.js"></script>
<script src="resources/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="resources/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="resources/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="resources/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="resources/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="resources/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="resources/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="resources/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="resources/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="resources/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="resources/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="resources/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="js/revo-custom.js"></script>
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
<!--===============================================================================================-->
<script type="text/javascript" language="JavaScript">

    /**
     * When user clicks Add to Cart button
     */
    function addToCart() {

        /**
         * Add the product to the navbar cart
         */
        document.cartBtnFrm.submit();
    }

    /**
     * When user clicks View Cart button
     */
    function submitCart() {

        /**
         * Redirects to shopcart.php
         */
        document.submitCartForm.submit();
    }
</script>

</body>
</html>