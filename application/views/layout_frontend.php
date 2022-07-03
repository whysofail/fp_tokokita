<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/admin/assets/img/stisla-fill.svg">
    <title>Layout &rsaquo; Top Navigation &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/components.css">
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="<?= site_url('frontend') ?>" class="navbar-brand sidebar-gone-hide">Tokokita 1637</a>
                <div class="navbar-nav">
                    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                </div>
                <div class="nav-collapse">
                    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item active"><a href="#" class="nav-link">Tentang Tokokita</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Cara Belanja</a></li>
                        <li class="nav-item"><a href="<?php echo site_url('frontend/feedback'); ?>" class="nav-link">Kirim Feedback</a></li>
                    </ul>
                </div>
                <form class="form-inline ml-auto">
                    <ul class="navbar-nav">
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <select data-width="150" class="form-control">
                            <?php foreach ($kategori as $key) : ?>
                                <option class="form-control" value="<?= $key->idkat; ?>"> <?= $key->namakat; ?> </option>
                            <?php endforeach ?>
                        </select>
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="300">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>

                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php if (!empty($this->session->userdata('Username'))) { ?>
                        <li class="nav-item"><a class="btn btn-outline-light" href="<?php echo site_url('user'); ?>" class="nav-link">MENU MEMBER</a></li> &nbsp; &nbsp; &nbsp;
                        <li class="nav-item"><a class="btn btn-outline-light" href="<?php echo site_url('login_user/logout'); ?>" class="nav-link">LOGOUT</a></li>

                    <?php } else { ?>
                        <li class="nav-item"><a class="btn btn-outline-light" href="<?php echo site_url('login_user'); ?>" class="nav-link">LOGIN</a></li> &nbsp; &nbsp; &nbsp;
                        <li class="nav-item"><a class="btn btn-outline-light" href="<?php echo site_url('frontend/daftar'); ?>" class="nav-link">DAFTAR</a></li>
                    <?php } ?>

                </ul>
            </nav>

            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        <!-- <?php foreach ($kategori as $key) : ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><span><?= $key->namakat ?></span></a>
                            </li>
                        <?php endforeach ?> -->
                    </ul>
                </div>
            </nav>
            <!-- Main Content -->
            <?= $contents ?>

            <footer class="main-footer">
                <div class="footer-left">
                Copyright &copy; 2018 - 2022 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
                    <div class="bullet"></div> Edit By <a href="https://www.instagram.com/fajargap4699/">Fajar Guritna Ananto Putra</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>assets/alert/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>assets/alert/alert.js"></script>

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/admin/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/custom.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/jquery.min.js"></script>
</body>

</html>