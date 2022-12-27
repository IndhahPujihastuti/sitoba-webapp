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

</style>
<body>
<?php date_default_timezone_set("Asia/Jakarta"); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
            <img class="mx-auto d-block" src="<?= base_url('assets/img/logo-sitoba.png'); ?>">
                <div class="card o-hidden my-2" style="border-top: 5px solid #858796;">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-4">
                                    <div class="text-center pb-4">
                                        <h4>Registrasi</h4>
                                    </div>
                                   
                                    <form class="user" method="post" action="<?= base_url('auth/registrasi'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="kd_pengguna" placeholder="Kode Pengguna" name="kd_pengguna" value="<?php echo kodePelangganOtomatis(); ?>" readonly>  
                                        </div>
                                        <input type="hidden" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?= date('Y-m-d H:i:s') ?>">
                                        <input type="hidden" class="form-control" id="status" name="status" value="Aktif">
                                        <input type="hidden" class="form-control" id="level" name="level" value="Karyawan">
                                        <input type="hidden" class="form-control-user" id="gambar" name="gambar">
                                        <div class="form-group">
                                            <label>Nama<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="<?= set_value('nama'); ?>" autocomplete="off">  
                                            <small class="text-danger"><?= form_error('nama'); ?> </small> 
                                        </div>
                                        <div class="form-group">
                                           <label>Email<sup class="text-danger">*</sup></label>
                                            <input type="email" class="form-control" id="email" placeholder="Masukkan Email" name="email" value="<?= set_value('email'); ?>" autocomplete="off"> 
                                            <small class="text-danger"><?= form_error('email'); ?> </small> 
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Telepon<sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" id="no_telp" placeholder="Masukkan Nomor Telepon" name="no_telp" value="<?= set_value('no_telp'); ?>" autocomplete="off">  
                                            <small class="text-danger"><?= form_error('no_telp'); ?> </small> 
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat<sup class="text-danger">*</sup></label>
                                            <textarea class="form-control" placeholder="Masukkan Alamat Rumah" id="alamat" name="alamat" rows="3" value="<?= set_value('alamat'); ?>" autocomplete="off"><?php echo set_value('alamat'); ?></textarea>
                                            <small class="text-danger"><?= form_error('alamat'); ?> </small> 
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>Kata Sandi<sup class="text-danger">*</sup></label>
                                                    <input type="password" class="form-control" id="password1" placeholder="Masukkan Kata Sandi" name="password1" autocomplete="off">
                                                    <small class="text-danger"><?= form_error('password1'); ?> </small> 
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Konfirmasi Kata Sandi<sup class="text-danger">*</sup></label>
                                                    <input type="password" class="form-control" id="password2" placeholder="Konfirmasi Kata Sandi" name="password2" autocomplete="off">
                                                    <small class="text-danger"><?= form_error('password2'); ?> </small> 
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-secondary w-100">Daftar</button>
                                    </form>
                                    <div class="text-center pt-2">
                                        Sudah punya akun? <a class="small" href="<?=base_url('auth'); ?>" style="text-decoration: none;">Silahkan Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>