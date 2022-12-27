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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
            <!--
            <?php if(validation_errors()){?>
                <div class="alert alert-danger alert-message" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php }?>
            -->
            <div class="mt-2"><?= $this->session->flashdata('pesan'); ?></div>
                <div class="card o-hidden my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-4">
                                    <div class="text-center pb-4">
                                        <h5>Atur Ulang Kata Sandi</h5>
                                    </div>
                                    <form class="user" method="post" action="<?= base_url('auth/resetPassword'); ?>">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" id="email" placeholder="Masukkan Email" name="email" value="<?= set_value('email'); ?>" autocomplete="off"> 
                                            <small class="text-danger"><?= form_error('email'); ?> </small>
                                        </div>
                                        <div class="form-group">
                                            <label>Kata Sandi Baru</label>
                                            <input type="password" class="form-control" id="password1" placeholder="Masukkan Kata Sandi Baru" name="password1" value="<?= set_value('password1'); ?>" autocomplete="off"> 
                                            <small class="text-danger"><?= form_error('password1'); ?> </small>
                                        </div>
                                        <div class="form-group">
                                            <label>Ulangi Kata Sandi</label>
                                            <input type="password" class="form-control" id="password2" placeholder="Ulangi Kata Sandi" name="password2" value="<?= set_value('password2'); ?>" autocomplete="off"> 
                                            <small class="text-danger"><?= form_error('password2'); ?> </small>
                                        </div>
                                        <button type="submit" class="btn btn-secondary w-100">Atur Ulang</button>
                                    </form>
                                    <div class="col-lg-12 text-center">
                                        <a class="small" href="<?=base_url('auth'); ?>" style="text-decoration: none;">Kembali ke Login</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>