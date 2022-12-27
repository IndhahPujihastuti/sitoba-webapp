<style>
    .eye1{
        position: absolute;
        top: 37px; 
        right: 28px;
    }

    .eye2{
        position: absolute;
        top: 117px; 
        right: 28px;
    }

    .eye3{
        position: absolute;
        top: 197px; 
        right: 28px;
    }

    #hidecp1{
        display: none;
    }

    #hidenp1{
        display: none;
    }

    #hidecnp1{
        display: none;
    }

    p{
        font-size: 12px;
        color: #E01A21;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
<div class="mt-3">
<?= $this->session->flashdata('pesan'); ?>
<!--
<?php if(validation_errors()){?>
            <div class="alert alert-danger alert-message" role="alert">Field (*) is required</div>
        <?php }?>
-->
</div>
<div class="card mt-3 mb-5">

  <div class="card-header bg-white"><h4 class="ml-3 mt-2">Ubah Kata Sandi</h4></div>

  <div class="card-body">
    <div class="col-lg-5">
        <form action="<?= base_url('pengaturan/security'); ?>" method="post">
            <div class="mb-3">
                <label for="cp" class="form-label">Kata Sandi Saat Ini<sup class="text-danger">*</sup></label>
                <input type="password" class="form-control" id="cp" name="current_password" placeholder="Masukkan Kata Sandi Saat Ini" autocomplete="off">
                <small class="text-danger"><?= form_error('current_password'); ?> </small> 
                <span class="eye1" onclick="currentPassword()">
                    <i id="hidecp2" class="fa fa-eye"></i>
                    <i id="hidecp1" class="fa fa-eye-slash"></i>
                </span>
            </div>
            <div class="mb-3">
                <label for="np" class="form-label">Kata Sandi Baru<sup class="text-danger">*</sup></label>
                <input type="password" class="form-control" id="np" name="new_password" placeholder="Masukkan Kata Sandi Baru" autocomplete="off">
                <small class="text-danger"><?= form_error('new_password'); ?> </small> 
                <span class="eye2" onclick="newPassword()">
                    <i id="hidenp2" class="fa fa-eye"></i>
                    <i id="hidenp1" class="fa fa-eye-slash"></i>
                </span>
            </div>
            <div class="mb-3">
                <label for="confirmpass" class="form-label">Konfirmasi Kata Sandi Baru<sup class="text-danger">*</sup></label>
                <input type="password" class="form-control" id="cnp" name="confirm_password" placeholder="Konfirmasi Kata Sandi Baru" autocomplete="off">
                <small class="text-danger"><?= form_error('confirm_password'); ?> </small> 
                <span class="eye3" onclick="confirmNewPassword()">
                    <i id="hidecnp2" class="fa fa-eye"></i>
                    <i id="hidecnp1" class="fa fa-eye-slash"></i>
                </span>
            </div>
        
    </div>
    <div class="float-right mt-4">
        <div class="d-flex mt-3">
            <button type="button" class="btn mr-2" onclick="window.history.go(-1)" style="border: 1px solid #DADCE0; border-radius: 8px;">Batal</button>
            <button type="submit" class="btn" style="background: #858796; border-radius: 8px; color: #FFFFFF; text-align: center; padding-top: 6px;">Simpan</button>
        </div>
    </div>
    </form>
    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

<script>
    function currentPassword(){
        var x = document.getElementById("cp");
        var y = document.getElementById("hidecp1");
        var z = document.getElementById("hidecp2");

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

    function newPassword(){
        var x = document.getElementById("np");
        var y = document.getElementById("hidenp1");
        var z = document.getElementById("hidenp2");

        if(x.type === 'password') {
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        } else {
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }

    function confirmNewPassword(){
        var x = document.getElementById("cnp");
        var y = document.getElementById("hidecnp1");
        var z = document.getElementById("hidecnp2");

        if(x.type === 'password') {
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