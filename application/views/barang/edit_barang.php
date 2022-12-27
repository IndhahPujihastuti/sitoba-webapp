
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<div class="container-fluid">
    <div class="ml-2 mt-4">
        <span><a href="<?php echo base_url('barang'); ?>" style="text-decoration: none;"></i>Data Barang</a></span>
        <span> > </span>
        <span> Ubah Data Barang</span>
    </div>
    <div class="card mt-3 mb-5">
        <div class="card-header bg-white"><h4 class="ml-3 mt-2">Edit Barang</h4></div>
            <div class="card-body">
            <?php foreach ($editbarang as $eb) { ?>
            <?= form_open_multipart('barang/editBarang'); ?>
                
                <div class="form-group">
                    <label>Kode Barang<sup class="text-danger">*</sup></label>
                    <input type="text" name="kd_barang" value="<?= $eb['kd_barang']; ?>" class="form-control" readonly>
                    <small class="text-danger"><?= form_error('kd_barang'); ?> </small> 
                </div>
                <div class="form-group">
                    <label>Nama Barang<sup class="text-danger">*</sup></label>
                    <input type="text" name="nama_brg" value="<?= $eb['nama_brg']; ?>" class="form-control" placeholder="Masukkan Nama Barang" required oninvalid="this.setCustomValidity('Nama Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')" autocomplete="off">
                    <small class="text-danger"><?= form_error('nama_brg'); ?> </small> 
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Kategori<sup class="text-danger">*</sup></label>
                    <select name="kategori" class="form-control" id="kategori">
                        <option value="<?= $kd_kat; ?>" selected="selected" required><?= $k; ?></option>
                        <?php
                        foreach ($kategori as $k) { ?>
                        <option value="<?= $k['kd_kategori']; ?>" required><?= $k['nm_kategori']; ?></option>
                        <?php } ?>
                    </select>
                    <small class="text-danger"><?= form_error('kategori'); ?> </small> 
                </div>
                <div class="form-group">
                    <label>Satuan<sup class="text-danger">*</sup></label>
                    <input type="text" name="satuan" value="<?= $eb['satuan']; ?>" class="form-control" placeholder="Masukkan Satuan Barang" required oninvalid="this.setCustomValidity('Satuan Tidak Boleh Kosong')" oninput="setCustomValidity('')" autocomplete="off">
                    <small class="text-danger"><?= form_error('satuan'); ?> </small> 
                </div>
                <div class="form-group">
                    <label>Harga<sup class="text-danger">*</sup></label>
                    <input type="text" id="harga" name="harga" value="<?= $eb['harga']; ?>" class="form-control" placeholder="Masukkan Harga Barang" required oninvalid="this.setCustomValidity('Harga Tidak Boleh Kosong')" oninput="setCustomValidity('')" autocomplete="off">
                    <small class="text-danger"><?= form_error('harga'); ?> </small> 
                </div>
                <!--
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Supplier<sup class="text-danger">*</sup></label>
                    <select name="nm_suplier" class="form-control" id="nm_suplier">
                        <option value="<?= $kd_sup; ?>" selected="selected" required><?= $s; ?></option>
                        <?php
                        foreach ($supplier as $s) { ?>
                        <option value="<?= $s['kd_suplier']; ?>" required><?= $s['nm_suplier']; ?></option>
                        <?php } ?>
                    </select>
                    <small class="text-danger"><?= form_error('nm_suplier'); ?> </small> 
                </div>
                -->
                <div class="form-group">
                    <label>Stok<sup class="text-danger">*</sup></label>
                    <input type="text" name="stok" value="<?= $eb['stok']; ?>" class="form-control" placeholder="Masukkan Stok Barang" required oninvalid="this.setCustomValidity('Stok Tidak Boleh Kosong')" oninput="setCustomValidity('')" readonly>
                    <small class="text-danger"><?= form_error('stok'); ?> </small> 
                </div>
                <div class="form-group">
                    <label>Tanggal Input<sup class="text-danger">*</sup></label>
                    <input type="text" name="tgl_input" value="<?= $eb['tgl_input']; ?>" class="form-control" readonly>
                    <small class="text-danger"><?= form_error('tgl_input'); ?> </small> 
                </div>
                <div class="form-group">
                    <label>Nama Penginput<sup class="text-danger">*</sup></label>
                    <input type="text" name="nm_penginput" value="<?= $eb['nm_penginput']; ?>" class="form-control" readonly>
                    <small class="text-danger"><?= form_error('nm_penginput'); ?> </small> 
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

<script src="<?= base_url('assets/'); ?>autonumeric/autoNumeric.min.js"></script>
<script>
    new AutoNumeric('#harga', {
        decimalPlaces: '0',
        decimalCharacter: ',',
        digitGroupSeparator: '.',
        modifyValueOnWheel: 'false'
    })
</script>