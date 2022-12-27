
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<div class="container-fluid">
    <div class="ml-2 mt-4">
        <span><a href="<?php echo base_url('barangkeluar'); ?>" style="text-decoration: none;"></i>Data Barang Keluar</a></span>
        <span> > </span>
        <span> Ubah Barang Keluar</span>
    </div>
    <div class="card mt-3 mb-5">
            <div class="card-body">
            <?php foreach ($editbarangkeluar as $ebk) { ?>
            <?= form_open_multipart('barangkeluar/editBarangKeluar'); ?>
                
                <div class="form-group">
                    <label>Kode Barang Keluar<sup class="text-danger">*</sup></label>
                    <input type="text" name="kd_bk" value="<?= $ebk['kd_bk']; ?>" class="form-control" readonly>
                    <small class="text-danger"><?= form_error('kd_bk'); ?> </small> 
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Barang Keluar<sup class="text-danger">*</sup></label>
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
                -->
                <!--
                <div class="form-group">
                    <label>Tujuan<sup class="text-danger">*</sup></label>
                    <textarea name="tujuan" value="" class="form-control" placeholder="Masukkan Tujuan Pengiriman" required oninvalid="this.setCustomValidity('Tujuan Pengiriman Tidak Boleh Kosong')" oninput="setCustomValidity('')"><?php echo $ebk['tujuan']; ?></textarea>
                    <small class="text-danger"><?= form_error('tujuan'); ?> </small> 
                </div>
                -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status Pengiriman<sup class="text-danger">*</sup></label>
                    <select name="status_krm" class="form-control" id="status_brg">
                        <option value="<?= $ebk['status_krm']; ?>" selected="selected" required><?= $ebk['status_krm']; ?></option>
                        <option value="Sudah Dikirim" required>Sudah Dikirim</option>
                        <option value="Belum Dikirim" required>Belum Dikirim</option>
                    </select>
                </div>
                
                <!--
                <?php if ($ebk['status_krm'] == 'Belum Dikirim') { ?>
                    <div class="form-group">
                        <label>Rencana Pengiriman Barang<sup class="text-danger">*</sup></label>
                        <input type="datetime-local" name="tgl_pengiriman" value="<?php echo date("c", strtotime($ebk['tgl_pengiriman'])); ?>" id="tgl_pengiriman" class="form-control" placeholder="Select Date" autocomplete="off">
                    </div> 
                <?php } else { ?>
                
                <?php } ?>
                -->
            
                <!--
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status Pembayaran<sup class="text-danger">*</sup></label>
                    <select name="status_pay" class="form-control" id="status_pay">
                        <option value="<?= $ebk['status_pay']; ?>" selected="selected" required><?= $ebk['status_pay']; ?></option>
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