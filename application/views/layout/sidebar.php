<style>
    .sidebar .sidebar-brand .sidebar-brand-icon i {
        font-size: 18px;
    }
    /*
    .sidebar .nav-item .nav-link span.active{
        color: #FFFFFF;
        font-weight: 600;
        font-size: 12px;
        line-height: 26px;
    }
    */

    .sidebar .nav-item .nav-link .fas.fa-home.active{
        color: #FFFFFF;
        font-weight: 600;
        font-size: 12px;
        line-height: 26px;
    }
</style>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <img class="mx-auto d-block" src="<?= base_url('assets/img/logo-sitoba.png'); ?>" width="100" height="100">
    </a>

    <?php
    $level = $this->session->userdata('level');
    ?>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link p-2 ml-2" href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-home" <?php if($this->uri->segment(1)=="dashboard"){echo 'class="active"';}?>></i>
            <span <?php if($this->uri->segment(1)=="dashboard"){echo 'class="active"';}?>>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading" style="font-size: 14px;">
        Data Master
    </div>
            
    <!-- Nav Item - Pengguna -->
    <li class="nav-item">
        <a class="nav-link p-1 ml-2" href="<?= base_url('user'); ?>">
            <i class="fas fa-user" <?php if($this->uri->segment(1)=="user"){echo 'class="active"';}?>></i>
            <span <?php if($this->uri->segment(1)=="user"){echo 'class="active"';}?>>Data Pengguna</span>
        </a>
    </li>

    <!-- Nav Item - Suplier -->
    <li class="nav-item">
        <a class="nav-link p-1 ml-2" href="<?= base_url('supplier') ?>">
            <i class="fas fa-user-md" <?php if($this->uri->segment(1)=="supplier"){echo 'class="active"';}?>></i>
            <span <?php if($this->uri->segment(1)=="supplier"){echo 'class="active"';}?>>Data Suplier</span>
        </a>
    </li>

    <!-- Nav Item - Kategori Barang -->
    <li class="nav-item">
        <a class="nav-link p-1 ml-2" href="<?= base_url('barang/kategoriBarang'); ?>">
            <i class="fas fa-list-alt" <?php if($this->uri->uri_string() =="barang/kategoriBarang"){echo 'class="active"';}?>></i>
            <span <?php if($this->uri->uri_string() =="barang/kategoriBarang"){echo 'class="active"';}?>>Data Kategori Barang</span>
        </a>
    </li>

    <!-- Nav Item - Suplier -->
    <li class="nav-item">
        <a class="nav-link p-1 ml-2" href="<?= base_url('barang'); ?>">
            <i class="fas fa-folder" <?php if($this->uri->segment(1)=="barang"){echo 'class="active"';}?>></i>
            <span <?php if($this->uri->segment(1)=="barang"){echo 'class="active"';}?>>Data Barang</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading" style="font-size: 14px;">
        Transaksi
    </div>
            
    <!-- Nav Item - Pengguna -->
    <li class="nav-item">
        <a class="nav-link p-1 ml-2" href="<?= base_url('barangmasuk'); ?>">
            <i class="fas fa-arrow-right" <?php if($this->uri->segment(1)=="barangmasuk"){echo 'class="active"';}?>></i>
            <span <?php if($this->uri->segment(1)=="barangmasuk"){echo 'class="active"';}?>>Barang Masuk</span>
        </a>
    </li>

    <!-- Nav Item - Suplier -->
    <li class="nav-item">
        <a class="nav-link p-1 ml-2" href="<?= base_url('barangkeluar'); ?>">
            <i class="fas fa-arrow-left" <?php if($this->uri->segment(1)=="barangkeluar"){echo 'class="active"';}?>></i>
            <span <?php if($this->uri->segment(1)=="barangkeluar"){echo 'class="active"';}?>>Barang Keluar</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

   
    <?php if ($level == 'Admin') { ?>
    <!-- Heading -->
    <div class="sidebar-heading" style="font-size: 14px;">
        Laporan
    </div>
            
    <!-- Nav Item - Pengguna -->
    <li class="nav-item">
        <a class="nav-link p-1 ml-2" href="<?= base_url('laporan') ?>">
            <i class="fas fa-book" <?php if($this->uri->segment(1)=="laporan"){echo 'class="active"';}?>></i>
            <span <?php if($this->uri->segment(1)=="laporan"){echo 'class="active"';}?>>Laporan Barang Masuk</span>
        </a>
    </li>

    <!-- Nav Item - Suplier -->
    <li class="nav-item">
        <a class="nav-link p-1 ml-2" href="<?= base_url('laporan/barangkeluar') ?>">
            <i class="fas fa-book" <?php if($this->uri->segment(2)=="laporan/barangkeluar"){echo 'class="active"';}?>></i>
            <span <?php if($this->uri->segment(2)=="laporan/barangkeluar"){echo 'class="active"';}?>>Laporan Barang Keluar</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php } else { ?>
    
    <?php } ?>

    <!-- Heading -->
    <div class="sidebar-heading" style="font-size: 14px;">
        Akun
    </div>
            
    <!-- Nav Item - Pengguna -->
    <li class="nav-item">
        <a class="nav-link p-1 ml-2" href="<?= base_url('pengaturan'); ?>">
            <i class="fas fa-cog" <?php if($this->uri->segment(1)=="pengaturan"){echo 'class="active"';}?>></i>
            <span <?php if($this->uri->segment(1)=="pengaturan"){echo 'class="active"';}?>>Pengaturan</span>
        </a>
    </li>

    <!-- Nav Item - Pengguna -->
    <li class="nav-item">
        <a class="nav-link p-1 ml-2" href="#" data-toggle="modal" data-target="#logout">
            <i class="fa fa-arrow-circle-o-left"></i>
            <span>Keluar</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->

<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Keluar akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>Yakin ingin keluar dari halaman ini ?</span>
      </div>
      <div class="ml-3 mr-3 mb-3">
        <div class="row">
            <div class="col-lg-6">
                <button type="button" class="btn w-100" style="border: 1px solid #DADCE0; border-radius: 8px;" data-dismiss="modal">Batal</button>
            </div>
            <div class="col-lg-6">
                <a href="<?= base_url('auth/logout'); ?>"><button type="button" class="btn btn-secondary w-100">Keluar</button></a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>