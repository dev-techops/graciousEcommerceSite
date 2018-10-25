<!-- Author: Nathan Shava
     Date created: 15 JUNE 2018
     Description: Gracious Store Home
     Filename: allproducts.php
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
    <title>Gracious Products</title>
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
    <link rel="stylesheet" type="text/css" href="resources/noui/nouislider.min.css">
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
                                    <!-- Script to fetch product category names -->
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
                                                window.location.href = "allproducts.php"; //Refresh page
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
                                                    window.location.href = "allproducts.php"; //Refresh
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
															<?php echo $product['product_qty'] ?>
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

<!-- Title page -->
<section class="how-overlay2 bg-img1" style="background-image: url(images/salon_img/salon_chairs.jpg);height:500px;">
    <div class="container">
        <div class="txt-center p-t-160 p-b-165">
            <h3 style="color:#ffffff;" class="txt-l-101 cl0 txt-center p-b-14 respon1">
                Gracious Hair Products
            </h3>
        </div>
    </div>
</section>

<!-- Content page -->
<div class="bg0 p-t-85 p-b-95">
    <div class="container">
        <!-- Gracious Shop grid -->
        <div class="shop-grid">
            <div class="row">
                <!-- Hair Food products view -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRFOOD1', 1);
                    $hairFoodQuery1 = "CALL productItem('" . HAIRFOOD1 . "');";
                    $hairFood1 = $connect->query($hairFoodQuery1);
                    while ($hf1 = mysqli_fetch_assoc($hairFood1)) {
                        ?>
                        <!-- HF 1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hf1['product_id']; ?>">
                                    <img src="<?php echo $hf1["product_img1"]; ?>"
                                         alt="Maroza"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hf1['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hf1['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hf1['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hf1['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hf1['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hf1['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hf1['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hf1['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hf1['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hf1['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hf1["product_price"]; ?></b>
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
                    mysqli_free_result($hairFood1);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HF 2 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRFOOD2', 2);
                    $hairFoodQuery2 = "CALL productItem('" . HAIRFOOD2 . "');";
                    $hairFood2 = $connect->query($hairFoodQuery2);
                    while ($hf2 = mysqli_fetch_assoc($hairFood2)) {
                        ?>
                        <!-- HF 2 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hf2['product_id']; ?>">
                                    <img src="<?php echo $hf2["product_img1"]; ?>"
                                         alt="Mizani"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hf2['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hf2['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hf2['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hf2['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hf2['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hf2['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hf2['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hf2['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hf2['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hf2['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hf2["product_price"]; ?></b>
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
                    mysqli_free_result($hairFood2);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HF 3 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRFOOD3', 3);
                    $hairFoodQuery3 = "CALL productItem('" . HAIRFOOD3 . "');";
                    $hairFood3 = $connect->query($hairFoodQuery3);
                    while ($hf3 = mysqli_fetch_assoc($hairFood3)) {
                        ?>
                        <!-- HF 3 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hf3['product_id']; ?>">
                                    <img src="<?php echo $hf3["product_img1"]; ?>"
                                         alt="Mizani"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hf3['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hf3['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hf3['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hf3['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hf3['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hf3['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hf3['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hf3['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hf3['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hf3['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hf3["product_price"]; ?></b>
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
                    mysqli_free_result($hairFood3);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HF 4 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRFOOD4', 4);
                    $hairFoodQuery4 = "CALL productItem('" . HAIRFOOD4 . "');";
                    $hairFood4 = $connect->query($hairFoodQuery4);
                    while ($hf4 = mysqli_fetch_assoc($hairFood4)) {
                        ?>
                        <!-- HF 4 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hf4['product_id']; ?>">
                                    <img src="<?php echo $hf4["product_img1"]; ?>"
                                         alt="Africa Magic"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hf4['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hf4['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hf4['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hf4['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hf4['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hf4['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hf4['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hf4['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hf4['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hf4['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hf4["product_price"]; ?></b>
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
                    mysqli_free_result($hairFood4);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HF 5 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRFOOD5', 5);
                    $hairFoodQuery5 = "CALL productItem('" . HAIRFOOD5 . "');";
                    $hairFood5 = $connect->query($hairFoodQuery5);
                    while ($hf5 = mysqli_fetch_assoc($hairFood5)) {
                        ?>
                        <!-- HF 5 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hf5['product_id']; ?>">
                                    <img src="<?php echo $hf5["product_img1"]; ?>"
                                         alt="Ganjalizer"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hf5['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hf5['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hf5['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hf5['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hf5['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hf5['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hf5['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hf5['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hf5['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hf5['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hf5["product_price"]; ?></b>
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
                    mysqli_free_result($hairFood5);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HF 6 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRFOOD6', 6);
                    $hairFoodQuery6 = "CALL productItem('" . HAIRFOOD6 . "');";
                    $hairFood6 = $connect->query($hairFoodQuery6);
                    while ($hf6 = mysqli_fetch_assoc($hairFood6)) {
                        ?>
                        <!-- HF 6 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hf6['product_id']; ?>">
                                    <img src="<?php echo $hf6["product_img1"]; ?>"
                                         alt="Black chic"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hf6['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hf6['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hf6['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hf6['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hf6['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hf6['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hf6['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hf6['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hf6['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hf6['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hf6["product_price"]; ?></b>
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
                    mysqli_free_result($hairFood6);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HF 7 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRFOOD7', 7);
                    $hairFoodQuery7 = "CALL productItem('" . HAIRFOOD7 . "');";
                    $hairFood7 = $connect->query($hairFoodQuery7);
                    while ($hf7 = mysqli_fetch_assoc($hairFood7)) {
                        ?>
                        <!-- HF 7 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hf7['product_id']; ?>">
                                    <img src="<?php echo $hf7["product_img1"]; ?>"
                                         alt="Ngoma"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hf7['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hf7['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hf7['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hf7['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hf7['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hf7['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hf7['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hf7['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hf7['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hf7['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hf7["product_price"]; ?></b>
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
                    mysqli_free_result($hairFood7);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- Hair Conditioner -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRCOND1', 8);
                    $hairConditionerQuery1 = "CALL productItem('" . HAIRCOND1 . "');";
                    $hairConditioner1 = $connect->query($hairConditionerQuery1);
                    while ($hc1 = mysqli_fetch_assoc($hairConditioner1)) {
                        ?>
                        <!-- HC 1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hc1['product_id']; ?>">
                                    <img src="<?php echo $hc1["product_img1"]; ?>"
                                         alt="Super Dax"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hc1['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hc1['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hc1['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hc1['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hc1['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hc1['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hc1['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hc1['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hc1['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hc1['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hc1["product_price"]; ?></b>
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
                    mysqli_free_result($hairConditioner1);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HC 2 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRCOND2', 9);
                    $hairConditionerQuery2 = "CALL productItem('" . HAIRCOND2 . "');";
                    $hairConditioner2 = $connect->query($hairConditionerQuery2);
                    while ($hc2 = mysqli_fetch_assoc($hairConditioner2)) {
                        ?>
                        <!-- HC 2 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hc2['product_id']; ?>">
                                    <img src="<?php echo $hc2["product_img1"]; ?>"
                                         alt="Kubi"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hc2['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hc2['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hc2['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hc2['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hc2['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hc2['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hc2['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hc2['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hc2['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hc2['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hc2["product_price"]; ?></b>
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
                    mysqli_free_result($hairConditioner2);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HC 3 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRCOND3', 10);
                    $hairConditionerQuery3 = "CALL productItem('" . HAIRCOND3 . "');";
                    $hairConditioner3 = $connect->query($hairConditionerQuery3);
                    while ($hc3 = mysqli_fetch_assoc($hairConditioner3)) {
                        ?>
                        <!-- HC 3 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hc3['product_id']; ?>">
                                    <img src="<?php echo $hc3["product_img1"]; ?>"
                                         alt="Ultimate Organic"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hc3['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hc3['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hc3['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hc3['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hc3['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hc3['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hc3['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hc3['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hc3['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hc3['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hc3["product_price"]; ?></b>
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
                    mysqli_free_result($hairConditioner3);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HC 4 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRCOND4', 11);
                    $hairConditionerQuery4 = "CALL productItem('" . HAIRCOND4 . "');";
                    $hairConditioner4 = $connect->query($hairConditionerQuery4);
                    while ($hc4 = mysqli_fetch_assoc($hairConditioner4)) {
                        ?>
                        <!-- HC 4 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hc4['product_id']; ?>">
                                    <img src="<?php echo $hc4["product_img1"]; ?>"
                                         alt="Long lasting"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hc4['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hc4['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hc4['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hc4['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hc4['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hc4['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hc4['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hc4['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hc4['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hc4['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hc4["product_price"]; ?></b>
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
                    mysqli_free_result($hairConditioner4);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HC 5 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRCOND5', 12);
                    $hairConditionerQuery5 = "CALL productItem('" . HAIRCOND5 . "');";
                    $hairConditioner5 = $connect->query($hairConditionerQuery5);
                    while ($hc5 = mysqli_fetch_assoc($hairConditioner5)) {
                        ?>
                        <!-- HC 5 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hc5['product_id']; ?>">
                                    <img src="<?php echo $hc5["product_img1"]; ?>"
                                         alt="Long lasting"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hc5['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hc5['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hc5['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hc5['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hc5['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hc5['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hc5['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hc5['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hc5['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hc5['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hc5["product_price"]; ?></b>
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
                    mysqli_free_result($hairConditioner5);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HC 6 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRCOND6', 13);
                    $hairConditionerQuery6 = "CALL productItem('" . HAIRCOND6 . "');";
                    $hairConditioner6 = $connect->query($hairConditionerQuery6);
                    while ($hc6 = mysqli_fetch_assoc($hairConditioner6)) {
                        ?>
                        <!-- HC 6 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hc6['product_id']; ?>">
                                    <img src="<?php echo $hc6["product_img1"]; ?>"
                                         alt="Nex Sheen Arganics"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hc6['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hc6['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hc6['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hc6['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hc6['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hc6['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hc6['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hc6['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hc6['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hc6['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hc6["product_price"]; ?></b>
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
                    mysqli_free_result($hairConditioner6);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HC 7 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRCOND7', 14);
                    $hairConditionerQuery7 = "CALL productItem('" . HAIRCOND7 . "');";
                    $hairConditioner7 = $connect->query($hairConditionerQuery7);
                    while ($hc7 = mysqli_fetch_assoc($hairConditioner7)) {
                        ?>
                        <!-- HC 7 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hc7['product_id']; ?>">
                                    <img src="<?php echo $hc7["product_img1"]; ?>"
                                         alt="Black chic"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hc7['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hc7['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hc7['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hc7['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hc7['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hc7['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hc7['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hc7['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hc7['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hc7['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hc7["product_price"]; ?></b>
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
                    mysqli_free_result($hairConditioner7);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HC 8 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRCOND8', 15);
                    $hairConditionerQuery8 = "CALL productItem('" . HAIRCOND8 . "');";
                    $hairConditioner8 = $connect->query($hairConditionerQuery8);
                    while ($hc8 = mysqli_fetch_assoc($hairConditioner8)) {
                        ?>
                        <!-- HC 8 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hc8['product_id']; ?>">
                                    <img src="<?php echo $hc8["product_img1"]; ?>"
                                         alt="Super Dax"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hc8['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hc8['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hc8['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hc8['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hc8['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hc8['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hc8['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hc8['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hc8['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hc8['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hc8["product_price"]; ?></b>
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
                    mysqli_free_result($hairConditioner8);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HC 9 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRCOND9', 16);
                    $hairConditionerQuery9 = "CALL productItem('" . HAIRCOND9 . "');";
                    $hairConditioner9 = $connect->query($hairConditionerQuery9);
                    while ($hc9 = mysqli_fetch_assoc($hairConditioner9)) {
                        ?>
                        <!-- HC 9 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hc9['product_id']; ?>">
                                    <img src="<?php echo $hc9["product_img1"]; ?>"
                                         alt="Ultimate Organic Therapy"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hc9['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hc9['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hc9['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hc9['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hc9['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hc9['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hc9['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hc9['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hc9['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hc9['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hc9["product_price"]; ?></b>
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
                    mysqli_free_result($hairConditioner9);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HC 10 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRCOND10', 17);
                    $hairConditionerQuery10 = "CALL productItem('" . HAIRCOND10 . "');";
                    $hairConditioner10 = $connect->query($hairConditionerQuery10);
                    while ($hc10 = mysqli_fetch_assoc($hairConditioner10)) {
                        ?>
                        <!-- HC 10 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hc10['product_id']; ?>">
                                    <img src="<?php echo $hc10["product_img1"]; ?>"
                                         alt="Ultimate Organic Therapy"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hc10['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hc10['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hc10['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hc10['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hc10['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hc10['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hc10['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hc10['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hc10['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hc10['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hc10["product_price"]; ?></b>
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
                    mysqli_free_result($hairConditioner10);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HR 1 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRREL1', 18);
                    $hairRelaxerQuery1 = "CALL productItem('" . HAIRREL1 . "');";
                    $hairRelaxer1 = $connect->query($hairRelaxerQuery1);
                    while ($hr1 = mysqli_fetch_assoc($hairRelaxer1)) {
                        ?>
                        <!-- HR 1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hr1['product_id']; ?>">
                                    <img src="<?php echo $hr1["product_img1"]; ?>"
                                         alt="Ladine"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hr1['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hr1['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hr1['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hr1['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hr1['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hr1['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hr1['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hr1['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hr1['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hr1['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hr1["product_price"]; ?></b>
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
                    mysqli_free_result($hairRelaxer1);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HR 2 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRREL2', 19);
                    $hairRelaxerQuery2 = "CALL productItem('" . HAIRREL2 . "');";
                    $hairRelaxer2 = $connect->query($hairRelaxerQuery2);
                    while ($hr2 = mysqli_fetch_assoc($hairRelaxer2)) {
                        ?>
                        <!-- HR 2 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hr2['product_id']; ?>">
                                    <img src="<?php echo $hr2["product_img1"]; ?>"
                                         alt="Dark & Lovely"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hr2['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hr2['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hr2['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hr2['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hr2['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hr2['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hr2['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hr2['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hr2['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hr2['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hr2["product_price"]; ?></b>
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
                    mysqli_free_result($hairRelaxer2);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HR 3 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRREL3', 20);
                    $hairRelaxerQuery3 = "CALL productItem('" . HAIRREL3 . "');";
                    $hairRelaxer3 = $connect->query($hairRelaxerQuery3);
                    while ($hr3 = mysqli_fetch_assoc($hairRelaxer3)) {
                        ?>
                        <!-- HR 3 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hr3['product_id']; ?>">
                                    <img src="<?php echo $hr3["product_img1"]; ?>"
                                         alt="Mizani"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hr3['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hr3['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hr3['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hr3['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hr3['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hr3['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hr3['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hr3['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hr3['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hr3['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hr3["product_price"]; ?></b>
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
                    mysqli_free_result($hairRelaxer3);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HR 4 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRREL4', 21);
                    $hairRelaxerQuery4 = "CALL productItem('" . HAIRREL4 . "');";
                    $hairRelaxer4 = $connect->query($hairRelaxerQuery4);
                    while ($hr4 = mysqli_fetch_assoc($hairRelaxer4)) {
                        ?>
                        <!-- HR 4 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hr4['product_id']; ?>">
                                    <img src="<?php echo $hr4["product_img1"]; ?>"
                                         alt="African Pride Olive oil"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hr4['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hr4['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hr4['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hr4['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hr4['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hr4['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hr4['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hr4['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hr4['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hr4['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hr4["product_price"]; ?></b>
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
                    mysqli_free_result($hairRelaxer4);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HR 5 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRREL5', 22);
                    $hairRelaxerQuery5 = "CALL productItem('" . HAIRREL5 . "');";
                    $hairRelaxer5 = $connect->query($hairRelaxerQuery5);
                    while ($hr5 = mysqli_fetch_assoc($hairRelaxer5)) {
                        ?>
                        <!-- HR 5 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hr5['product_id']; ?>">
                                    <img src="<?php echo $hr5["product_img1"]; ?>"
                                         alt="Dark & Lovely for kids"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hr5['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hr5['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hr5['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hr5['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hr5['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hr5['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hr5['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hr5['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hr5['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hr5['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hr5["product_price"]; ?></b>
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
                    mysqli_free_result($hairRelaxer5);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HR 6 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRREL6', 23);
                    $hairRelaxerQuery6 = "CALL productItem('" . HAIRREL6 . "');";
                    $hairRelaxer6 = $connect->query($hairRelaxerQuery6);
                    while ($hr6 = mysqli_fetch_assoc($hairRelaxer6)) {
                        ?>
                        <!-- HR 6 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hr6['product_id']; ?>">
                                    <img src="<?php echo $hr6["product_img1"]; ?>"
                                         alt="Soft n free"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hr6['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hr6['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hr6['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hr6['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hr6['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hr6['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hr6['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hr6['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hr6['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hr6['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hr6["product_price"]; ?></b>
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
                    mysqli_free_result($hairRelaxer6);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HR 7 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRREL7', 24);
                    $hairRelaxerQuery7 = "CALL productItem('" . HAIRREL7 . "');";
                    $hairRelaxer7 = $connect->query($hairRelaxerQuery7);
                    while ($hr7 = mysqli_fetch_assoc($hairRelaxer7)) {
                        ?>
                        <!-- HR 7 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hr7['product_id']; ?>">
                                    <img src="<?php echo $hr7["product_img1"]; ?>"
                                         alt="Blow out"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hr7['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hr7['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hr7['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hr7['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hr7['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hr7['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hr7['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hr7['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hr7['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hr7['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hr7["product_price"]; ?></b>
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
                    mysqli_free_result($hairRelaxer7);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HR 8 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRREL8', 25);
                    $hairRelaxerQuery8 = "CALL productItem('" . HAIRREL8 . "');";
                    $hairRelaxer8 = $connect->query($hairRelaxerQuery8);
                    while ($hr8 = mysqli_fetch_assoc($hairRelaxer8)) {
                        ?>
                        <!-- HR 8 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hr8['product_id']; ?>">
                                    <img src="<?php echo $hr8["product_img1"]; ?>"
                                         alt="Revlon"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hr8['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hr8['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hr8['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hr8['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hr8['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hr8['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hr8['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hr8['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hr8['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hr8['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hr8["product_price"]; ?></b>
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
                    mysqli_free_result($hairRelaxer8);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HR 9 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('HAIRREL9', 26);
                    $hairRelaxerQuery9 = "CALL productItem('" . HAIRREL9 . "');";
                    $hairRelaxer9 = $connect->query($hairRelaxerQuery9);
                    while ($hr9 = mysqli_fetch_assoc($hairRelaxer9)) {
                        ?>
                        <!-- HR 9 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hr9['product_id']; ?>">
                                    <img src="<?php echo $hr9["product_img1"]; ?>"
                                         alt="Dr Miracle"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hr9['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hr9['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hr9['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hr9['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hr9['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hr9['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hr9['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hr9['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hr9['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hr9['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hr9["product_price"]; ?></b>
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
                    mysqli_free_result($hairRelaxer9);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- NP 1 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('NATURAL1', 27);
                    $naturalQuery1 = "CALL productItem('" . NATURAL1 . "');";
                    $natural1 = $connect->query($naturalQuery1);
                    while ($n1 = mysqli_fetch_assoc($natural1)) {
                        ?>
                        <!-- NP 1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $n1['product_id']; ?>">
                                    <img src="<?php echo $n1["product_img1"]; ?>"
                                         alt="Afro Pride"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $n1['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $n1['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $n1['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $n1['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $n1['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $n1['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $n1['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $n1['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $n1['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $n1['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $n1["product_price"]; ?></b>
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
                    mysqli_free_result($natural1);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- OT 1 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('TREAT1', 28);
                    $treatmentQuery1 = "CALL productItem('" . TREAT1 . "');";
                    $treatment1 = $connect->query($treatmentQuery1);
                    while ($t1 = mysqli_fetch_assoc($treatment1)) {
                        ?>
                        <!-- OT 1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $t1['product_id']; ?>">
                                    <img src="<?php echo $t1["product_img1"]; ?>"
                                         alt="Black like me"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $t1['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $t1['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $t1['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $t1['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $t1['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $t1['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $t1['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $t1['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $t1['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $t1['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $t1["product_price"]; ?></b>
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
                    mysqli_free_result($treatment1);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- OT 2 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('TREAT2', 29);
                    $treatmentQuery2 = "CALL productItem('" . TREAT2 . "');";
                    $treatment2 = $connect->query($treatmentQuery2);
                    while ($t2 = mysqli_fetch_assoc($treatment2)) {
                        ?>
                        <!-- OT 2 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $t2['product_id']; ?>">
                                    <img src="<?php echo $t2["product_img1"]; ?>"
                                         alt="Original Root Stimulator"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $t2['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $t2['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $t2['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $t2['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $t2['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $t2['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $t2['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $t2['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $t2['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $t2['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $t2["product_price"]; ?></b>
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
                    mysqli_free_result($treatment2);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- C 1 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('COS1', 30);
                    $cosmeticsQuery1 = "CALL productItem('" . COS1 . "');";
                    $cosmetics1 = $connect->query($cosmeticsQuery1);
                    while ($c1 = mysqli_fetch_assoc($cosmetics1)) {
                        ?>
                        <!-- C 1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $c1['product_id']; ?>">
                                    <img src="<?php echo $c1["product_img1"]; ?>"
                                         alt="Kiss Beauty"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $c1['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $c1['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $c1['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $c1['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $c1['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $c1['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $c1['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $c1['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $c1['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $c1['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $c1["product_price"]; ?></b>
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
                    mysqli_free_result($cosmetics1);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- C 2 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('COS2', 31);
                    $cosmeticsQuery2 = "CALL productItem('" . COS2 . "');";
                    $cosmetics2 = $connect->query($cosmeticsQuery2);
                    while ($c2 = mysqli_fetch_assoc($cosmetics2)) {
                        ?>
                        <!-- C 2 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $c2['product_id']; ?>">
                                    <img src="<?php echo $c2["product_img1"]; ?>"
                                         alt="Kylie"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $c2['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $c2['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $c2['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $c2['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $c2['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $c2['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $c2['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $c2['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $c2['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $c2['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $c2["product_price"]; ?></b>
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
                    mysqli_free_result($cosmetics2);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- C 3 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('COS3', 32);
                    $cosmeticsQuery3 = "CALL productItem('" . COS3 . "');";
                    $cosmetics3 = $connect->query($cosmeticsQuery3);
                    while ($c3 = mysqli_fetch_assoc($cosmetics3)) {
                        ?>
                        <!-- C 3 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $c3['product_id']; ?>">
                                    <img src="<?php echo $c3["product_img1"]; ?>"
                                         alt="Kylie"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $c3['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $c3['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $c3['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $c3['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $c3['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $c3['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $c3['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $c3['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $c3['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $c3['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $c3["product_price"]; ?></b>
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
                    mysqli_free_result($cosmetics3);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- C 4 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('COS4', 33);
                    $cosmeticsQuery4 = "CALL productItem('" . COS4 . "');";
                    $cosmetics4 = $connect->query($cosmeticsQuery4);
                    while ($c4 = mysqli_fetch_assoc($cosmetics4)) {
                        ?>
                        <!-- C 4 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $c4['product_id']; ?>">
                                    <img src="<?php echo $c4["product_img1"]; ?>"
                                         alt="Black opal"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $c4['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $c4['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $c4['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $c4['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $c4['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $c4['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $c4['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $c4['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $c4['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $c4['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $c4["product_price"]; ?></b>
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
                    mysqli_free_result($cosmetics4);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- C 5 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('COS5', 34);
                    $cosmeticsQuery5 = "CALL productItem('" . COS5 . "');";
                    $cosmetics5 = $connect->query($cosmeticsQuery5);
                    while ($c5 = mysqli_fetch_assoc($cosmetics5)) {
                        ?>
                        <!-- C 5 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $c5['product_id']; ?>">
                                    <img src="<?php echo $c5["product_img1"]; ?>"
                                         alt="Iman foundation"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $c5['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $c5['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $c5['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $c5['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $c5['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $c5['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $c5['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $c5['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $c5['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $c5['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $c5["product_price"]; ?></b>
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
                    mysqli_free_result($cosmetics5);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- C 6 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('COS6', 35);
                    $cosmeticsQuery6 = "CALL productItem('" . COS6 . "');";
                    $cosmetics6 = $connect->query($cosmeticsQuery6);
                    while ($c6 = mysqli_fetch_assoc($cosmetics6)) {
                        ?>
                        <!-- C 6 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $c6['product_id']; ?>">
                                    <img src="<?php echo $c6["product_img1"]; ?>"
                                         alt="Sleek Pro conceal"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $c6['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $c6['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $c6['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $c6['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $c6['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $c6['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $c6['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $c6['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $c6['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $c6['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $c6["product_price"]; ?></b>
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
                    mysqli_free_result($cosmetics6);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- C 7 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('COS7', 36);
                    $cosmeticsQuery7 = "CALL productItem('" . COS7 . "');";
                    $cosmetics7 = $connect->query($cosmeticsQuery7);
                    while ($c7 = mysqli_fetch_assoc($cosmetics7)) {
                        ?>
                        <!-- C 7 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $c7['product_id']; ?>">
                                    <img src="<?php echo $c7["product_img1"]; ?>"
                                         alt="Kiss Beauty"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $c7['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $c7['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $c7['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $c7['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $c7['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $c7['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $c7['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $c7['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $c7['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $c7['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $c7["product_price"]; ?></b>
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
                    mysqli_free_result($cosmetics7);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- C 8 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('COS8', 37);
                    $cosmeticsQuery8 = "CALL productItem('" . COS8 . "');";
                    $cosmetics8 = $connect->query($cosmeticsQuery8);
                    while ($c8 = mysqli_fetch_assoc($cosmetics8)) {
                        ?>
                        <!-- C 8 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $c8['product_id']; ?>">
                                    <img src="<?php echo $c8["product_img1"]; ?>"
                                         alt="Kylie"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $c8['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $c8['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $c8['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $c8['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $c8['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $c8['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $c8['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $c8['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $c8['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $c8['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $c8["product_price"]; ?></b>
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
                    mysqli_free_result($cosmetics8);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- C 9 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('COS9', 38);
                    $cosmeticsQuery9 = "CALL productItem('" . COS9 . "');";
                    $cosmetics9 = $connect->query($cosmeticsQuery9);
                    while ($c9 = mysqli_fetch_assoc($cosmetics9)) {
                        ?>
                        <!-- C 9 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $c9['product_id']; ?>">
                                    <img src="<?php echo $c9["product_img1"]; ?>"
                                         alt="Make up"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $c9['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $c9['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $c9['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $c9['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $c9['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $c9['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $c9['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $c9['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $c9['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $c9['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $c9["product_price"]; ?></b>
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
                    mysqli_free_result($cosmetics9);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HS 1 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('SPRAY1', 39);
                    $hairSprayQuery1 = "CALL productItem('" . SPRAY1 . "');";
                    $hairSpray1 = $connect->query($hairSprayQuery1);
                    while ($hs1 = mysqli_fetch_assoc($hairSpray1)) {
                        ?>
                        <!-- HS 1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hs1['product_id']; ?>">
                                    <img src="<?php echo $hs1["product_img1"]; ?>"
                                         alt="Sta-Soft-Fro"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hs1['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hs1['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hs1['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hs1['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hs1['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hs1['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hs1['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hs1['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hs1['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hs1['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hs1["product_price"]; ?></b>
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
                    mysqli_free_result($hairSpray1);
                    mysqli_next_result($connect);
                    ?>
                </div>

                <!-- HS 2 -->
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-30">
                    <?php
                    DEFINE('SPRAY2', 40);
                    $hairSprayQuery2 = "CALL productItem('" . SPRAY2 . "');";
                    $hairSpray2 = $connect->query($hairSprayQuery2);
                    while ($hs2 = mysqli_fetch_assoc($hairSpray2)) {
                        ?>
                        <!-- HS 2 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <a href="singleproduct.php?action=add&product_id=<?php echo $hs2['product_id']; ?>">
                                    <img src="<?php echo $hs2["product_img1"]; ?>"
                                         alt="Kubi"
                                         style="width:250px;height:250px">
                                </a>

                                <form method="post" name="cartBtnFrm" id="cartBtnFrm"
                                      action="allproducts.php?action=add&cartProd=<?php echo $hs2['product_id']; ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="hiddenprodbrand" id="hiddenprodbrand"
                                               value="<?php echo $hs2['brand_name']; ?>">
                                        <input type="hidden" name="hiddenprodname" id="hiddenprodname"
                                               value="<?php echo $hs2['product_name']; ?>">
                                        <input type="hidden" name="hiddenprodingre" id="hiddenprodingre"
                                               value="<?php echo $hs2['product_ingredients']; ?>">
                                        <input type="hidden" name="hiddenproddir" id="hiddenproddir"
                                               value="<?php echo $hs2['directions']; ?>">
                                        <input type="hidden" name="hiddenprodtax" id="hiddenprodtax"
                                               value="<?php echo $hs2['tax']; ?>">
                                        <input type="hidden" name="hiddenprodprice" id="hiddenprodprice"
                                               value="<?php echo $hs2['product_price']; ?>">
                                        <input type="hidden" name="hiddenprodimg1" id="hiddenprodimg1"
                                               value="<?php echo $hs2['product_img1']; ?>">
                                        <input type="hidden" name="hiddenprodimg2" id="hiddenprodimg2"
                                               value="<?php echo $hs2['product_img2']; ?>">
                                        <input type="hidden" name="hiddenprodimg3" id="hiddenprodimg3"
                                               value="<?php echo $hs2['product_img3']; ?>">
                                        <div style="padding-bottom:15%;background-color:#ffffff;">
                                            <p style="text-align:center;margin-top:2%;font-size:22pt;color:#4d0099;">
                                                <b>ZAR <?php echo $hs2["product_price"]; ?></b>
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
                    mysqli_free_result($hairSpray2);
                    mysqli_next_result($connect);
                    ?>
                </div>
            </div>
        </div>
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
<script src="resources/noui/nouislider.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" language="JavaScript">

    //When user clicks Add to Cart button
    function addToCart() {
        //Add the product to the navbar cart
        document.cartBtnFrm.submit();
    }

    //When user clicks View Cart button
    function submitCart() {
        //Redirects to shopcart.php
        document.submitCartForm.submit();
    }
</script>

</body>
</html>