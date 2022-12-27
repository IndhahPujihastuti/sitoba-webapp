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
                <li><a href="<?php echo base_url('laporan'); ?>" <?php if($this->uri->uri_string() == 'laporan'){echo 'class="active"';}?>>Semua Barang Masuk</a></li>
                    <li><a href="<?php echo base_url('laporan/barangmasuk'); ?>" <?php if($this->uri->uri_string() == 'laporan/barangmasuk'){echo 'class="active"';}?>>Barang Masuk Lengkap</a></li>
                    <li><a href="<?php echo base_url('laporan/barang_masuk'); ?>" <?php if($this->uri->uri_string() == 'laporan/barang_masuk'){echo 'class="active"';}?>>Barang Masuk Kurang Lengkap</a></li>
                </ul>
            </div>
        </nav>
        </div>

 