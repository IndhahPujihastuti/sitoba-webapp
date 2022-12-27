
<div class="container-fluid">
    <div class="ml-2 mt-4">
        <span><a href="<?php echo base_url('supplier'); ?>" style="text-decoration: none;"></i>Data Supplier</a></span>
        <span> > </span>
        <span> Ubah Data Supplier</span>
    </div>
    <div class="card mt-3 mb-5">
            <div class="card-body">
            <?php foreach ($editsupplier as $es) { ?>
            <?= form_open_multipart('supplier/editSupplier'); ?>
                
                <div class="form-group">
                    <label>Kode Supplier<sup class="text-danger">*</sup></label>
                    <input type="text" name="kd_suplier" value="<?= $es['kd_suplier']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Supplier<sup class="text-danger">*</sup></label>
                    <input type="text" name="nm_suplier" value="<?= $es['nm_suplier']; ?>" class="form-control" placeholder="Masukkan Nama Supplier" autocomplete="off" required oninvalid="this.setCustomValidity('Nama Supplier Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label>Alamat<sup class="text-danger">*</sup></label>
                    <input type="text" name="alamat" value="<?= $es['alamat']; ?>" class="form-control" placeholder="Masukkan Alamat" autocomplete="off" required oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label>Nomor Telepon<sup class="text-danger">*</sup></label>
                    <input type="number" name="no_telp" value="<?= $es['no_telp']; ?>" class="form-control" placeholder="Masukkan Nomor Telepon" autocomplete="off" required oninvalid="this.setCustomValidity('Nomor Telepon Tidak Boleh Kosong')" oninput="setCustomValidity('')"> 
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