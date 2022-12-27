<?php date_default_timezone_set("Asia/Jakarta"); ?>
<div class="container-fluid">
    <div class="ml-2 mt-4">
        <span><a href="<?php echo base_url('barangkeluar'); ?>" style="text-decoration: none;"></i>Data Barang Keluar</a></span>
        <span> > </span>
        <span> Tambah Data Barang Keluar</span>
    </div>
    <div class="card mt-3 mb-5">
            <div class="card-body">
            <form action="<?= base_url('barangkeluar/formBarangKeluar'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Kode Barang Keluar<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="kd_bk" placeholder="Kode Barang Keluar" name="kd_bk" value="<?php echo kodeBarangKeluarOtomatis(); ?>" readonly>  
                </div>
                <div class="form-group">
                    <label>Nama Barang<sup class="text-danger">*</sup></label>
                    <select name="barang" id="barang" class="form-control form-control-user">
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
                    <label>Tujuan<sup class="text-danger">*</sup></label>
                    <textarea class="form-control" id="tujuan" placeholder="Masukkan Tujuan Pengiriman" name="tujuan" value="" autocomplete="off"><?php echo set_value('tujuan'); ?></textarea>
                    <small class="text-danger"><?= form_error('tujuan'); ?> </small> 
                </div> 
                <div class="form-group">
                    <label>Status Pengiriman Barang<sup class="text-danger">*</sup></label>
                    <select name="status_krm" class="form-control form-control-user">
                        <option value="">--Pilih Status Pengiriman--</option>
                        <option value="Sudah Dikirim">Sudah Dikirim</option>
                        <option value="Belum Dikirim">Belum Dikirim</option>
                    </select>
                    <small class="text-danger"><?= form_error('status_krm'); ?> </small> 
                </div> 
                
                <div class="form-group">
                    <label>Rencana Pengiriman Barang</sup></label>
                    <input type="datetime-local" name="tgl_pengiriman" id="tgl_pengiriman" class="form-control" placeholder="Select Date" autocomplete="off">
                    <small>Diisi Ketika Barang Belum Dikirim</small> 
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
                    <label>Tanggal Keluar Barang<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="tgl_keluar" placeholder="Masukkan Tanggal Keluar Barang" name="tgl_keluar" value="<?= date('Y-m-d H:i:s') ?>" readonly>  
                    <small class="text-danger"><?= form_error('tgl_keluar'); ?> </small> 
                </div> 
                <div class="form-group">
                    <label>Nama Penginput<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="penginput" placeholder="Masukkan Nama Penginput Barang" name="penginput" value="<?= $pengguna['nama']; ?>" readonly>  
                    <small class="text-danger"><?= form_error('penginput'); ?> </small> 
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