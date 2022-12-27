<style>
        .laporan ul {
            position: absolute;
            top: 30%;
            left: 30%;
            transform: translate(-50%, -50%);
            margin: 0;
            padding: 0;
            display: flex;
            position: absolute;
            
        }

        .laporan ul li{
            list-style: none;
        }

        .laporan ul li a{
            position: relative;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #858796;
        }

        .laporan ul li a.active{
            color: #858796;
            border-bottom: 4px solid #858796;
        }

        a.active {
            color: red;
        }

        .laporan ul li a:hover {
            color: #858796;
        }
</style>

<div class="container">
        
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light topbar static-top border-bottom" style="height: 5.5vh;">
            
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
         
            </button>
            
            <!-- Page Heading -->
            <div class="laporan">
                <ul>
                <li><a href="<?php echo base_url('laporan/barangkeluar'); ?>" <?php if($this->uri->uri_string() == 'laporan/barangkeluar'){echo 'class="active"';}?>>Semua Barang Keluar</a></li>
                    <li><a href="<?php echo base_url('laporan/barangkeluar_lengkap'); ?>" <?php if($this->uri->uri_string() == 'laporan/barangkeluar_lengkap'){echo 'class="active"';}?>>Barang Keluar Sudah Dikirim</a></li>
                    <li><a href="<?php echo base_url('laporan/barangkeluar_belum'); ?>" <?php if($this->uri->uri_string() == 'laporan/barangkeluar_belum'){echo 'class="active"';}?>>Barang Keluar Belum Dikirim</a></li>
                </ul>
            </div>
        </nav>
        </div>

 