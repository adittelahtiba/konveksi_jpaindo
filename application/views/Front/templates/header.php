<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Akbarindo</title>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/front/') ?>/favicon.ico">

    <!-- Google Webfont -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,300italic,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/front/') ?>css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?= base_url('assets/front/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/front/') ?>js/vendors/isotope/isotope.css">
    <link rel="stylesheet" href="<?= base_url('assets/front/') ?>js/vendors/slick/slick.css">
    <link rel="stylesheet" href="<?= base_url('assets/front/') ?>js/vendors/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="<?= base_url('assets/front/') ?>js/vendors/select/jquery.selectBoxIt.css">
    <link rel="stylesheet" href="<?= base_url('assets/front/') ?>css/subscribe-better.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('assets/front/') ?>css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.all.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="<?= base_url('assets/front/') ?>https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="<?= base_url('assets/front/') ?>https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->

</head>

<body>

    <!-- PRELOADER -->
    <div id="loader"></div>

    <div class="body">

        <!-- TOPBAR -->
        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="tb_left pull-left">
                            <p>Selamat Datang di Website Kami !</p>
                        </div>
                        <div class="tb_center pull-left">
                            <ul>
                                <li>
                                    <i class="fa fa-phone"></i> Telepon: <a href="<?= base_url('assets/front/') ?>#">(+800) 2307 2509 8988</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i><a href="<?= base_url('assets/front/') ?>#">akbarindo@konveksi.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tb_right pull-right">
                            <ul>
                                <li>
                                    <div class="tbr-info">
                                        <?php if ($pegawai) { ?>
                                            <a href="#"><span>Login <i class="fa fa-caret-down"></i></span></a>
                                            <div class="tbr-inner">
                                                <a href="<?= base_url('pegawai') ?>">Akun Saya</a>
                                                <a href="<?= base_url('pegawai/dasboard') ?>">Dashboard</a>
                                                <a href="<?= base_url('auth/logout') ?>">Logout</a>
                                            </div>
                                        <?php } else { ?>
                                            <a href="<?= base_url('auth/masuk') ?>"><span>Login <i class="fa fa-lock"></i></span></a>
                                        <?php } ?>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- HEADER -->
        <header>
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="row">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- Logo -->
                            <a class="navbar-brand" href="<?= base_url('Front') ?>"><img src="<?= base_url('assets/front/') ?>images/basic/logo.png" class="img-responsive" alt="" /></a>
                        </div>
                        <!-- Cart & Search -->
                        <div class="header-xtra pull-right">
                            <div class="topcart">
                                <a href="<?= base_url('Front/daftar') ?>"><span><i class="fa fa-shopping-cart"></i></span></a>

                            </div>
                        </div>
                        <!-- Navmenu -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">



                                <li>
                                    <a href="<?= base_url('Front'); ?>">Beranda</a>

                                </li>


                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pesan</a>
                                    <ul class="dropdown-menu submenu" role="menu">

                                        <?php foreach ($jnspkian as $pj) { ?>
                                            <li>
                                                <a href="<?= base_url('pesanpakaian/pola/') . $pj['KodeJenis']; ?>"><?= $pj['NamaJenis']; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <li>
                                    <a href="<?= base_url('Front/panduan') ?>">Panduan</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('Front/kontak') ?>">Kontak</a>
                                </li>






                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>