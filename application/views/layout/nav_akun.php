<style>
        .article ul {
            position: absolute;
            top: 30%;
            left: 12%;
            transform: translate(-50%, -50%);
            margin: 0;
            padding: 0;
            display: flex;
            position: absolute;
            
        }

        .article ul li{
            list-style: none;
        }

        .article ul li a{
            position: relative;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #858796;
        }

        .article ul li a.active{
            color: #858796;
            border-bottom: 4px solid #858796;
        }

        a.active {
            color: red;
        }

        .article ul li a:hover {
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
            <div class="article">
                <ul>
                    <li><a href="<?php echo base_url('pengaturan'); ?>" <?php if($this->uri->uri_string() == 'pengaturan'){echo 'class="active"';}?>>Data Pribadi</a></li>
                    <li><a href="<?php echo base_url('pengaturan/security'); ?>" <?php if($this->uri->uri_string() == 'pengaturan/security'){echo 'class="active"';}?>>Kata Sandi</a></li>
                </ul>
            </div>
        </nav>
        </div>

 