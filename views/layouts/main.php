<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);


\diecoding\toastr\ToastrFlash::widget();
\diecoding\DiecodingAsset::register($this);

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?php echo Yii::$app->charset ?>" />
    <?php echo Html::csrfMetaTags() ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>
        <?php
        $title = isset($this->title) ? Html::encode($this->title) . ' &mdash; ' . APP_NAME . ' ' . APP_UNIT_FULL :
            APP_NAME . ' &mdash; ' . APP_UNIT_FULL;
        echo $title;
        ?>
    </title>
    <link rel="shortcut icon" href="<?php echo Url::base(true) ?>/images/favicon.png">

    <link href="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/css/style.css" rel="stylesheet" type="text/css">

    <script src="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/js/jquery.min.js"></script>

    <?php $this->head() ?>

    <!-- <meta name="theme-color" content="#ffffff" /> -->
    <meta name="description" content="" />
    <meta name="author" content="Die Coding - Digital Startup Indonesia" />
    <meta property="og:title" content="<?php echo $title ?>" />
    <meta property="og:url" content="<?php echo Url::current([], true) ?>" />
    <meta property="og:image" content="<?php echo Url::base(true) ?>/images/og.png" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php $this->beginBody() ?>

    <?php echo $this->render('navbar.php') ?>

    <!-- page wrapper start -->
    <div id="main--content" class="wrapper">
        <div class="container-fluid">

            <?php echo $content ?>

        </div>
        <!-- end container-fluid -->

    </div>
    <!-- page wrapper end -->

    <?php echo $this->render("footer.php") ?>

    <!-- jQuery  -->
    <script src="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/plugins/sweet-alert2/sweetalert2.min.js"></script>
    <script src="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/js/jquery.slimscroll.js"></script>
    <script src="<?php echo Yii::$app->themeConfig->getPublishedUrl("veltrix") ?>/js/waves.min.js"></script>

    <!-- App js -->
    <script src="<?php echo Url::to("/js/app.js") ?>"></script>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>