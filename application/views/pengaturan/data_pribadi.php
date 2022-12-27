<!-- Begin Page Content -->
<div class="container-fluid">
<div class="mt-3">
<?= $this->session->flashdata('pesan'); ?>
</div>
<div class="card mt-3 mb-5">
  <div class="card-header bg-white"><h4 class="ml-3 mt-2">Data Pribadi</h4></div>

  <div class="card-body">
    <div class="col-lg-5">
        <?= form_open_multipart('pengaturan/editData'); ?>
        <input type="hidden" class="form-control" id="kd_pengguna" name="kd_pengguna" placeholder="Masukkan Kode Pengguna" value="<?= $pengguna['kd_pengguna']; ?>">
        <div class="form-group">
        <label>Photo Profil<sup class="text-danger">*</sup></label><br>
                    <?php
                    if (isset($pengguna['gambar'])) { ?>

                        <input type="hidden" name="old_pict" id="old_pict" value="<?= $pengguna['gambar']; ?>">

                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/user/') . $pengguna['gambar']; ?>" class="rounded mx-auto mb-3 d-blok edit" alt="..." width="100" height="100">
                            </picture>

                        <?php } ?>
                        <br>

                        <input type="file" id="gambar" name="gambar">
                </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" value="<?= $pengguna['nama']; ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Nama Lengkap Tidak Boleh Kosong')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">Nomor Telepon<sup class="text-danger">*</sup></label>
                <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan nomor Telepon" value="<?= $pengguna['no_telp']; ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Nama Telepon Tidak Boleh Kosong')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= $pengguna['alamat']; ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')">
            </div>
    </div>
    <div class="float-right mt-4">
        <div class="d-flex mt-3">
            <button type="button" class="btn mr-2" onclick="window.history.go(-1)" style="border: 1px solid #DADCE0; border-radius: 8px;">Batal</button>
            <button type="submit" class="btn" style="background: #858796; border-radius: 8px; color: #FFFFFF; text-align: center; padding-top: 6px;">Simpan</button>
        </div>
    </div>
    <?= form_close(); ?>
    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->