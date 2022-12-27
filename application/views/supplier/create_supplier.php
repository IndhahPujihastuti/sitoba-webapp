
<div class="container-fluid">
    <div class="ml-2 mt-4">
        <span><a href="<?php echo base_url('supplier'); ?>" style="text-decoration: none;"></i>Data Supplier</a></span>
        <span> > </span>
        <span> Tambah Data Supplier</span>
    </div>
    <div class="card mt-3 mb-5">
       
            <div class="card-body">
            <form action="<?= base_url('supplier/createSupplier'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Kode Supplier<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="kd_suplier" placeholder="Kode Supplier" name="kd_suplier" value="<?php echo kodeSupplierOtomatis(); ?>" readonly>  
                </div>
                <div class="form-group">
                    <label>Nama Supplier<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="nm_suplier" placeholder="Masukkan Nama Supplier" name="nm_suplier" value="<?= set_value('nm_suplier'); ?>" autocomplete="off">  
                    <small class="text-danger"><?= form_error('nm_suplier'); ?> </small> 
                </div>
                <div class="form-group">
                    <label>Alamat<sup class="text-danger">*</sup></label>
                    <textarea class="form-control" placeholder="Masukkan Alamat Supplier" id="alamat" name="alamat" value="" rows="3" autocomplete="off"><?php echo set_value('alamat'); ?></textarea> 
                    <small class="text-danger"><?= form_error('alamat'); ?> </small> 
                </div>
                <div class="form-group">
                    <label>Nomor Telepon<sup class="text-danger">*</sup></label>
                    <input type="number" class="form-control" id="no_telp" placeholder="Masukkan Nomor Telepon Supplier" name="no_telp" value="<?= set_value('no_telp'); ?>" autocomplete="off">  
                    <small class="text-danger"><?= form_error('no_telp'); ?> </small> 
                </div> 
                <div class="float-right mb-3 mt-3">
                    <div class="d-flex mt-3">
                        <button type="button" class="btn mr-2" onclick="window.history.go(-1)" style="border: 1px solid #DADCE0; border-radius: 8px;">Batal</button>
                        <button type="submit" class="btn" style="background: #858796; border-radius: 8px; color: #FFFFFF; text-align: center; padding-top: 6px;">Simpan</button>
                    </div>
                </div>
            </div> 
    </div>
    
</form>
</div>