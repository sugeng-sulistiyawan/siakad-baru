<?php

use yii\helpers\Url;

?>

<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">

                <a href="index.html" class="logo">
                    <img src="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/images/logo-sm.png" alt="" class="logo-small">
                    <img src="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/images/logo-light.png" alt="" class="logo-large">
                </a>

            </div>

            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <ul class="navbar-right list-inline float-right mb-0">
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <form role="search" class="app-search">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" placeholder="Search..">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </li>

                    <!-- language-->
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/images/flags/us_flag.jpg" class="mr-2" height="12" alt="" /> English
                            <span class="mdi mdi-chevron-down"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right language-switch">
                            <a class="dropdown-item" href="#"><img src="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/images/flags/germany_flag.jpg" alt="" height="16" /><span> German </span></a>
                            <a class="dropdown-item" href="#"><img src="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/images/flags/italy_flag.jpg" alt="" height="16" /><span> Italian </span></a>
                            <a class="dropdown-item" href="#"><img src="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/images/flags/french_flag.jpg" alt="" height="16" /><span> French </span></a>
                            <a class="dropdown-item" href="#"><img src="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/images/flags/spain_flag.jpg" alt="" height="16" /><span> Spanish </span></a>
                            <a class="dropdown-item" href="#"><img src="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/images/flags/russia_flag.jpg" alt="" height="16" /><span> Russian </span></a>
                        </div>
                    </li>

                    <!-- full screen -->
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link" href="#" id="btn-fullscreen">
                            <i class="mdi mdi-fullscreen noti-icon"></i>
                        </a>
                    </li>

                    <!-- notification -->
                    <li class="dropdown notification-list list-inline-item">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell-outline noti-icon"></i>
                            <span class="badge badge-pill badge-danger noti-icon-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                            <!-- item-->
                            <h6 class="dropdown-item-text">
                                Notifications (258)
                            </h6>
                            <div class="slimscroll notification-item-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details">Your order is placed<span class="text-muted">Dummy
                                            text of the printing and typesetting industry.</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning"><i class="mdi mdi-message-text-outline"></i>
                                    </div>
                                    <p class="notify-details">New Message received<span class="text-muted">You have
                                            87 unread messages</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="mdi mdi-glass-cocktail"></i></div>
                                    <p class="notify-details">Your item is shipped<span class="text-muted">It is a
                                            long established fact that a reader will</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details">Your order is placed<span class="text-muted">Dummy
                                            text of the printing and typesetting industry.</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i>
                                    </div>
                                    <p class="notify-details">New Message received<span class="text-muted">You have
                                            87 unread messages</span></p>
                                </a>
                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>

                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <li class="dropdown notification-list list-inline-item">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/images/users/user-4.jpg" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5"></i>
                                        Profile</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5"></i> My Wallet</a>
                                    <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings m-r-5"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5"></i>
                                        Lock screen</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="<?php echo Url::to(['/site/logout']) ?>" data-method="post">
                                        <i class="mdi mdi-power text-danger"></i>
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </li>
                    <?php } ?>

                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <?php echo $this->render("menu.php") ?>

</header>
<!-- End Navigation Bar-->