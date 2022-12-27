
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<div class="container-fluid">
    <div class="ml-2 mt-4">
        <span><a href="<?php echo base_url('barangmasuk'); ?>" style="text-decoration: none;"></i>Data Barang Masuk</a></span>
        <span> > </span>
        <span> Ubah Barang Masuk</span>
    </div>
    <div class="card mt-3 mb-5">
            <div class="card-body">
            <?php foreach ($editbarangmasuk as $ebm) { ?>
            <?= form_open_multipart('barangmasuk/editBarangMasuk'); ?>
                
                <div class="form-group">
                    <label>Kode Barang Masuk<sup class="text-danger">*</sup></label>
                    <input type="text" name="kd_bm" value="<?= $ebm['kd_bm']; ?>" class="form-control" readonly>
                    <small class="text-danger"><?= form_error('kd_bm'); ?> </small> 
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Barang Masuk<sup class="text-danger">*</sup></label>
                    <select name="barang" class="form-control" id="barang" readonly>
                        <option value="<?= $kd_brg; ?>" selected="selected"><?= $b; ?></option>
                    </select>
                    <small class="text-danger"><?= form_error('barang'); ?> </small> 
                </div>
                <!--
                <div class="form-group">
                    <label>Jumlah<sup class="text-danger">*</sup></label>
                    <input type="text" name="jml" value="<?= $ebm['jml']; ?>" class="form-control" placeholder="Masukkan Jumlah Barang" required oninvalid="this.setCustomValidity('Jumlah Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                    <small class="text-danger"><?= form_error('jml'); ?> </small> 
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Supplier<sup class="text-danger">*</sup></label>
                    <select name="suplier" class="form-control" id="suplier">
                        <option value="<?= $kd_sup; ?>" selected="selected" required><?= $s; ?></option>
                        <?php
                        foreach ($supplier as $s) { ?>
                        <option value="<?= $s['kd_suplier']; ?>" required><?= $s['nm_suplier']; ?></option>
                        <?php } ?>
                    </select>
                    <small class="text-danger"><?= form_error('suplier'); ?> </small> 
                </div>
                -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status Barang<sup class="text-danger">*</sup></label>
                    <select name="status_brg" class="form-control" id="status_brg">
                        <option value="<?= $ebm['status_brg']; ?>" selected="selected" required><?= $ebm['status_brg']; ?></option>
                        <option value="Lengkap" required>Lengkap</option>
                        <option value="Kurang Lengkap" required>Kurang Lengkap</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="jml_kurang" value="<?= $ebm['jml_kurang']; ?>" class="form-control" placeholder="Masukkan Jumlah Barang" required oninvalid="this.setCustomValidity('Jumlah Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                    <small class="text-danger"><?= form_error('jml_kurang'); ?> </small> 
                </div>
                <!--
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status Pembayaran<sup class="text-danger">*</sup></label>
                    <select name="status_pay" class="form-control" id="status_pay">
                        <option value="<?= $ebm['status_pay']; ?>" selected="selected" required><?= $ebm['status_pay']; ?></option>
                        <option value="Lunas" required>Lunas</option>
                        <option value="Belum Lunas" required>Belum Lunas</option>
                    </select>
                </div>
                -->
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