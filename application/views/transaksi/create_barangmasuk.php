<?php date_default_timezone_set("Asia/Jakarta"); ?>
<div class="container-fluid">
    <div class="ml-2 mt-4">
        <span><a href="<?php echo base_url('barangmasuk'); ?>" style="text-decoration: none;"></i>Data Barang Masuk</a></span>
        <span> > </span>
        <span> Tambah Data Barang Masuk</span>
    </div>
    <div class="card mt-3 mb-5">
            <div class="card-body">
            <form action="<?= base_url('barangmasuk/formBarangMasuk'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Kode Barang<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="kd_bm" placeholder="Kode Barang Masuk" name="kd_bm" value="<?php echo kodeBarangMasukOtomatis(); ?>" readonly>  
                </div>
                <div class="form-group">
                    <label>Nama Barang<sup class="text-danger">*</sup></label>
                    <select data-live-search="true" name="barang" id="barang" class="form-control form-control-user">
                        <option value="">--Pilih Nama Barang--</option>
                        <?php
                        foreach ($barang as $b) { ?>
                        <option value="<?= $b['kd_barang'];?>"><?=$b['nama_brg'];?></option>
                        <?php } ?>
                    </select>
                    <small class="text-danger"><?= form_error('barang'); ?> </small> 
                </div>
                <div class="form-group">
                    <label>Jumlah<sup class="text-danger">*</sup></label>
                    <input type="number" class="form-control" id="jml" placeholder="Masukkan Jumlah Barang" name="jml" value="<?= set_value('jml'); ?>" autocomplete="off">  
                    <small class="text-danger"><?= form_error('jml'); ?> </small> 
                </div> 

                <div class="form-group">
                    <label>Nama Supplier<sup class="text-danger">*</sup></label>
                    <select name="suplier" class="form-control form-control-user">
                        <option value="">--Pilih Supplier--</option>
                        <?php
                        foreach ($supplier as $s) { ?>
                        <option value="<?= $s['kd_suplier'];?>"><?=$s['nm_suplier'];?></option>
                        <?php } ?>
                    </select>
                    <small class="text-danger"><?= form_error('suplier'); ?> </small> 
                </div>
                
                <div class="form-group">
                    <label>Status Barang<sup class="text-danger">*</sup></label>
                    <select name="status_brg" class="form-control form-control-user">
                        <option value="">--Pilih Status Barang--</option>
                        <option value="Lengkap">Barang Lengkap</option>
                        <option value="Kurang Lengkap">Barang Kurang Lengkap</option>
                    </select>
                    <small class="text-danger"><?= form_error('status_brg'); ?> </small> 
                </div> 
                <div class="form-group">
                    <label>Jumlah Kekurangan Barang</label>
                    <input type="text" class="form-control" id="jml_kurang" placeholder="Masukkan Jumlah Kekurangan Barang " name="jml_kurang" value="<?= set_value('jml_kurang'); ?>" autocomplete="off">  
                    <small class="text-secondary">Diisi ketika barang yang dikirim kurang</small> 
                </div> 
                <!--
                <div class="form-group">
                    <label>Status Pembayaran<sup class="text-danger">*</sup></label>
                    <select name="status_pay" class="form-control form-control-user">
                        <option value="">--Pilih Status Pembayaran--</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                    <small class="text-danger"><?= form_error('status_pay'); ?> </small> 
                </div> 
                -->
                <div class="form-group">
                    <label>Tanggal Masuk Barang<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="tgl_masuk" placeholder="Masukkan Tanggal Masuk Barang" name="tgl_masuk" value="<?= date('Y-m-d H:i:s') ?>" readonly>  
                    <small class="text-danger"><?= form_error('tgl_input'); ?> </small> 
                </div> 
                <div class="form-group">
                    <label>Nama Penerima<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="nm_penerima" placeholder="Masukkan Nama Penerima Barang" name="nm_penerima" value="<?= $pengguna['nama']; ?>" readonly>  
                    <small class="text-danger"><?= form_error('nm_penerima'); ?> </small> 
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

<script type="text/javascript">
    $(document).ready(function(){
        $('.search_select_box select').selectpicker();
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#barang').on('change', function(){
            
            var barang=$(this).val();
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('barang/ajaxBarang') ?>",
                dataType : "JSON",
                data : {barang: barang},
                cache : false,
                success : function(data){
                    $.each(data, function(barang, harga, suplier){
                        $('[name="harga"]').val(data.harga);
                        $('[name="suplier"]').val(data.suplier);
                    });
                }
            });
            return false;
        });
    });
</script>