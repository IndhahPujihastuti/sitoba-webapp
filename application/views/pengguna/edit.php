
<div class="container-fluid">
    <div class="ml-2 mt-4">
    <span><a href="<?php echo base_url('user'); ?>" style="text-decoration: none;"></i>Data Pengguna</a></span>
        <span> > </span>
        <span> Ubah Data Pengguna</span>
    </div>
    <div class="card mt-3 mb-5">
            <div class="card-body">
            <?php foreach ($edituser as $e) { ?>
            <?= form_open_multipart('user/editUser'); ?>
                
                <div class="form-group">
                    <label>Kode Pengguna<sup class="text-danger">*</sup></label>
                    <input type="text" name="kd_pengguna" value="<?= $e['kd_pengguna']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Lengkap<sup class="text-danger">*</sup></label>
                    <input type="text" name="username" value="<?= $e['nama']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Email<sup class="text-danger">*</sup></label>
                    <input type="text" name="email" value="<?= $e['email']; ?>" class="form-control" readonly>
                </div>
                <div class="mb-3">
                <label for="level" class="form-label">Tipe Pengguna<sup class="text-danger">*</sup></label>
                    <div><input type="radio" name="level" value="Admin" <?php if($e['level']=='Admin') echo 'checked' ?>>Admin</div>
                    <div><input type="radio" name="level" value="Karyawan" <?php if($e['level']=='Karyawan') echo 'checked' ?>>Karyawan</div>
                </div>
                <div class="mb-3">
                <label for="status" class="form-label">Status<sup class="text-danger">*</sup></label>
                    <div><input type="radio" name="status" value="Aktif" <?php if($e['status']=='Aktif') echo 'checked' ?>>Aktif</div>
                    <div><input type="radio" name="status" value="Tidak Aktif" <?php if($e['status']=='Tidak Aktif') echo 'checked' ?>>Tidak Aktif</div>
                </div>
                
                <div class="float-right mb-3 mt-3">
                    <div class="d-flex mt-3">
                        <button type="button" class="btn mr-2" onclick="window.history.go(-1)" style="border: 1px solid #DADCE0; border-radius: 8px;">Batal</button>
                        <button type="submit" class="btn" style="background: #858796; border-radius: 8px; color: #FFFFFF; text-align: center; padding-top: 6px;">Simpan</button>
                    </div>
                </div>
            </div> 
    </div>
    
  <?= form_close(); ?>
  <?php } ?>
</div>