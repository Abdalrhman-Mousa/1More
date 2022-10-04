<?php
if (!isset($_SESSION)) {

    session_start();
    require_once './config.php';
    require_once './functions.php';
}

$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];





// $userCart = getCartDetails($user_id);

?>

<header class="header-v2">
    <!-- Header desktop -->
    <div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop p-l-45">

                <!-- Logo desktop -->
                <a href="./index.php" class="logo">
                    <img src="./images/icons/1morelogo.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <?php if ($pageName == 'product') : ?>
                            <li>
                                <a href="index.php">Home</a>
                            </li>

                            <li class="active-menu">
                                <a href="product.php">Shop</a>
                            </li>
                        <?php elseif ($pageName == 'index') : ?>
                            <li class="active-menu">
                                <a href="index.php">Home</a>
                            </li>

                            <li>
                                <a href="product.php">Shop</a>
                            </li>
                        <?php else : ?>
                            <li>
                                <a href="index.php">Home</a>
                            </li>

                            <li>
                                <a href="product.php">Shop</a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m h-full">

                    <div class="flex-c-m h-full p-r-24">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11">
                            <?php if (isset($_SESSION["email"])) : ?>

                                <ul class="main-menu">
                                    <li>
                                        <a href="./profile.php">MyAccount</a>
                                        <ul class="sub-menu">
                                            <li><a href="./profile.php">Profile</a></li>
                                            <li><a href="./register/includes/logout.inc.php">Logout</a></li>
                                        </ul>
                                        <span class="arrow-main-menu-m">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </span>
                                    </li>
                                </ul>
                            <?php else : ?>
                                <ul class="main-menu">
                                    <li>
                                        <a href="registration.php">Register \ Login</a>
                                    </li>
                                </ul>
                            <?php endif; ?>

                        </div>
                    </div>


                    <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                        <?php if (isset($_SESSION["email"])) :
                            $activeUser = getOneByEmail('users', $_SESSION["email"]);
                            $user_id = $activeUser['id'];
                            $rows = getRowsNumber("cart", ["user_id" => $user_id]) ?? "";
                        ?>
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="<?= $rows ?>">
                                <a href="./cart.php" style="color:black">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </a>
                            </div>
                        <?php else : ?>
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="0">
                                <a href="./registration.php" style="color:black">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="./index.php"><img src="./images/icons/1morelogo.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">

            <div class="flex-c-m h-full p-r-24">
                <div class="icon-header-item-m cl2 hov-cl1 trans-04 p-lr-11">
                    <?php if (isset($_SESSION["email"])) : ?>

                        <ul class="main-menu">
                            <li>
                                <a href="./profile.php">MyAccount</a>
                                <ul class="sub-menu">
                                    <li><a href="./profile.php">Profile</a></li>
                                    <li><a href="./register/includes/logout.inc.php">Logout</a></li>
                                </ul>
                                <span class="arrow-main-menu-m">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </span>
                            </li>
                        </ul>
                    <?php else : ?>
                        <ul class="main-menu">
                            <li>
                                <a href="registration.php">Register \ Login</a>
                            </li>
                        </ul>
                    <?php endif; ?>

                </div>
            </div>


            <div class="flex-c-m h-full p-lr-10 bor5">
                <?php if (isset($_SESSION["email"])) :
                    $activeUser = getOneByEmail('users', $_SESSION["email"]);
                    $user_id = $activeUser['id'];
                    $rows = getRowsNumber("cart", ["user_id" => $user_id]) ?? "";
                ?>
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="<?= $rows ?>">
                        <a href="./cart.php">
                            <i class="zmdi zmdi-shopping-cart" style="color:black"></i>
                        </a>
                    </div>
                <?php else : ?>
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="0">
                        <a href="./registration.php">
                            <i class="zmdi zmdi-shopping-cart" style="color:black"></i>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="product.php">Shop</a>
            </li>
        </ul>
    </div>

</header>