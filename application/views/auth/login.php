<style>
    html, body {
        font-family: 'Poppins', sans-serif;
        color: #000000;
    }
    h4 {
        font-style: normal;
        font-weight: 600;
        font-size: 32px;
        line-height: 36px;
        color: #3E3E3E;
    }

    .form-control {
        font-size: 14px;
    }

    .eye{
        position: absolute;
        top: 215px; 
        right: 45px;
    }

    #hide1{
        display: none;
    }

</style>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
            <img class="mx-auto d-block" src="<?= base_url('assets/img/logo-sitoba.png'); ?>">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger alert-message" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php }?>
            <?= $this->session->flashdata('pesan'); ?>
                <div class="card o-hidden my-2" style="border-top: 5px solid #858796;">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-4">
                                    <div class="text-center pb-4">
                                        <h4>Login</h4>
                                    </div>
                                    <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" id="email" placeholder="Masukkan Email" name="email" value="<?= set_value('email'); ?>" autocomplete="off"> 
                                            <!--<small class="text-danger"><?= form_error('email'); ?> </small>--> 
                                        </div>
                                        <div class="form-group">
                                            <label>Kata Sandi</label>
                                            <input type="password" class="form-control" id="inputPassword" placeholder="Masukkan Kata Sandi" name="password" autocomplete="off">
                                            <!--<small class="text-danger"><?= form_error('password'); ?> </small>-->
                                            <span class="eye" onclick="myFunction()" style="cursor: pointer">
                                                <i id="hide2" class="fa fa-eye"></i>
                                                <i id="hide1" class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                        <button type="submit" class="btn btn-secondary w-100">Masuk</button>
                                    </form>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a class="small" href="<?=base_url('auth/registrasi'); ?>" style="text-decoration: none;">Daftar Akun!</a>
                                            </div>
                                            <div class="col-lg-6 text-right">
                                                <a class="small" href="<?=base_url('auth/resetPassword'); ?>" style="text-decoration: none;">Lupa Password ?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="text-center pt-2">
                                        Belum punya akun? <a class="small" href="<?=base_url('auth/registrasi'); ?>" style="text-decoration: none;">Daftar Akun!</a>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function myFunction(){
        var x = document.getElementById("inputPassword");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");

        if(x.type === 'password'){
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        } else {
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
</script>