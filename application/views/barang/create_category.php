
<div class="container-fluid">
    <div class="ml-2 mt-4">
        <a href="<?php echo base_url('barang/kategoriBarang'); ?>"><i class="fas fa-less-than mr-2"></i> Back</a>
    </div>
    <div class="card mt-3 mb-5">
        <div class="card-header bg-white"><h4 class="ml-3 mt-2">Tambah Data Kategori</h4></div>
            <div class="card-body">
            <form action="<?= base_url('barang/createCategory'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Kode Kategori<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="kd_kategori" placeholder="Kode Kategori" name="kd_kategori" value="<?php echo kodeKategoriOtomatis(); ?>" readonly>  
                </div>
                <div class="form-group">
                    <label>Nama Kategori<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="nm_kategori" placeholder="Masukkan Nama Kategori" name="nm_kategori" value="<?= set_value('nm_kategori'); ?>">  
                    <small class="text-danger"><?= form_error('nm_kategori'); ?> </small> 
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