
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<div class="container-fluid">
    <div class="ml-2 mt-4">
        <span><a href="<?php echo base_url('barang'); ?>" style="text-decoration: none;"></i>Data Barang</a></span>
        <span> > </span>
        <span> Tambah Data Barang</span>
    </div>
   
    <div class="card mt-3 mb-5">
        
            <div class="card-body">
            <form action="<?= base_url('barang/addBarang'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Kode Barang<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="kd_barang" placeholder="Kode Barang" name="kd_barang" value="<?php echo kodeBarangOtomatis(); ?>" readonly>  
                </div>
                <div class="form-group">
                    <label>Nama Barang<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="nama_brg" placeholder="Masukkan Nama Barang" name="nama_brg" value="<?= set_value('nama_brg'); ?>" autocomplete="off">  
                    <small class="text-danger"><?= form_error('nama_brg'); ?> </small> 
                </div>
                <div class="form-group">
                    <label>Kategori<sup class="text-danger">*</sup></label>
                    <select name="kategori" class="form-control form-control-user">
                        <option value="">--Pilih Kategori--</option>
                        <?php
                        foreach ($kategori as $k) { ?>
                        <option value="<?= $k['kd_kategori'];?>"><?=$k['nm_kategori'];?></option>
                        <?php } ?>
                    </select>
                    <small class="text-danger"><?= form_error('kategori'); ?> </small> 
                </div>
                <div class="form-group">
                    <label>Stok<sup class="text-danger">*</sup></label>
                    <input type="number" class="form-control" id="stok" placeholder="Masukkan Stok Barang" name="stok" value="<?= set_value('stok'); ?>" autocomplete="off">  
                    <small class="text-danger"><?= form_error('stok'); ?> </small> 
                </div> 
                <div class="form-group">
                    <label>Satuan<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="satuan" placeholder="Masukkan Satuan Barang" name="satuan" value="<?= set_value('satuan'); ?>" autocomplete="off">  
                    <small class="text-danger"><?= form_error('satuan'); ?> </small> 
                </div> 
                <div class="form-group">
                    <label>Harga<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="harga" placeholder="Masukkan Harga Satuan" name="harga" value="<?= set_value('harga'); ?>" autocomplete="off">  
                    <small class="text-danger"><?= form_error('harga'); ?> </small> 
                </div>
                <!-- 
                <div class="form-group">
                    <label>Nama Supplier<sup class="text-danger">*</sup></label>
                    <select name="nm_suplier" class="form-control form-control-user">
                        <option value="">--Pilih Supplier--</option>
                        <?php
                        foreach ($supplier as $s) { ?>
                        <option value="<?= $s['kd_suplier'];?>"><?=$s['nm_suplier'];?></option>
                        <?php } ?>
                    </select>
                    <small class="text-danger"><?= form_error('nm_suplier'); ?> </small> 
                </div> 
                -->
                <div class="form-group">
                    <label>Tanggal Input<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="tgl_input" placeholder="Masukkan Tanggal Penginputan Barang" name="tgl_input" value="<?= date('Y-m-d H:i:s') ?>" readonly>  
                    <small class="text-danger"><?= form_error('tgl_input'); ?> </small> 
                </div> 
                <div class="form-group">
                    <label>Nama Penginput<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="nm_penginput" placeholder="Masukkan Nama Penginput" name="nm_penginput" value="<?= $pengguna['nama']; ?>" readonly>  
                    <small class="text-danger"><?= form_error('nm_penginput'); ?> </small> 
                </div> 
                <div class="float-right mb-3 mt-3">
                    <div class="d-flex mt-3">
                        <button type="button" class="btn mr-2" onclick="window.history.go(-1)" style="border: 1px solid #DADCE0; border-radius: 8px;">Batal</button>
                        <button type="submit" class="btn" style="background: #858796; border-radius: 8px; color: #FFFFFF; text-align: center; padding-top: 6px;">Tambah</button>
                    </div>
                </div>
            </div> 
    </div>
    
</form>
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