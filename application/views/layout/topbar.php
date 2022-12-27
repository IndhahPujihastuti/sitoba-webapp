<style>
    .circleProfile {
        border-radius: 50%;
        background-color: #F1F2F3;
        width: 40px;
        height: 40px;
    }
    .profileUser {
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 24px;
        color: #5A6474;
        position: absolute;
        left: 132px;
        top: 15px;
        padding: 9px 8px;
        
    }
</style>
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            
            <!-- Page Heading -->
            <h4 class="mb-2 text-gray-800">
                <?php
                    $jam = date('H:i');

                    if ($jam > '05:30' && $jam < '10:00') {
                        $salam = 'Pagi';
                    } elseif ($jam >= '10:00' && $jam < '15:00') {
                        $salam = 'Siang';
                    } elseif ($jam < '18:00') {
                        $salam = 'Sore';
                    } else {
                        $salam = 'Malam';
                    }
                    
                    //tampilkan pesan
                    echo 'Selamat ' . $salam . ', ';
                ?>
                <?= $pengguna['nama']; ?>
            </h4>
            
            <!-- Topbar Navbar -->
            <!--
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $pengguna['nama']; ?> </span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/user/') . $pengguna['gambar']; ?>">
                    </a>
                </li>
            </ul>
            -->
        </nav>
        <!-- End of Topbar -->