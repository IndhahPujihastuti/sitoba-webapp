<?php date_default_timezone_set("Asia/Jakarta"); ?>
<div class="container-fluid">
    <div class="card mb-4">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card-header bg-white">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="mt-2 mr-5 pr-2">Data Barang Keluar</h4>
                </div>
                <div class="col-lg-6">
                    <a class="btn float-right" href="<?php echo base_url('barangkeluar/formBarangKeluar'); ?>" style="background: #858796; border-radius: 8px; color: #FFFFFF; text-align: center;">Tambah Baru</a>
                </div>
            </div>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Barang Keluar</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Satuan</th>
                        <!--<th scope="col">Harga</th>-->
                        <th scope="col">Tanggal Keluar</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Penginput</th>
                        <th scope="col">Status Pengiriman</th>
                        <th scope="col">Rencana Tanggal Pengiriman</th>
                        <!--<th scope="col">Status Pembayaran</th>-->
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($barangkeluar as $bk) { ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $bk['kd_bk']; ?></td>
                        <td>
                            <?= $bk['nama_brg']; ?>
                        </td>
                        <td><?= $bk['jml']; ?></td>
                        <td><?= $bk['satuan']; ?></td>
                        <!--<td><?= $bk['harga']; ?></td>-->
                        <td><?= date('d F Y H:i', strtotime($bk['tgl_keluar'])); ?></td>
                        <td><?= $bk['tujuan']; ?></td>
                        <td><?= $bk['penginput']; ?></td>
                        <td>
                            <?php if ($bk['status_krm'] == 'Sudah Dikirim') { ?>
                                <p  style="background: #FFFAE6; color: #FF8B00; border-radius: 3px; font-size: 11px; text-align: center; weight: 600; padding: 2px;">Sudah Dikirim</p>
                            <?php } else { ?>
                                <p style="background: #F7F7F7; color: #A9A9A9; border-radius: 3px; font-size: 11px; text-align: center; weight: 600; padding: 2px;">Belum Dikirim</p>
                            <?php } ?>
                        </td>
                        <!--
                        <td>
                            <?php if ($bk['status_pay'] == 'Lunas') { ?>
                                <p  style="background: #E3FCEF; color: #006644; border-radius: 3px; font-size: 11px; text-align: center; weight: 600; padding: 2px;">Lunas</p>
                            <?php } else { ?>
                                <p style="background: #FFEBE6; color: #BF2600; border-radius: 3px; font-size: 11px; text-align: center; weight: 600; padding: 2px;">Belum Lunas</p>
                            <?php } ?>
                        </td>
                        -->
                        
                        <td>
                            <?php
                                $tgl = '0000-00-00 00:00:00';
                                 if ($bk['tgl_pengiriman'] == $tgl) { ?>
                                <p>Tidak Ada</p>
                            <?php } else { ?>
                                <?= date('d F Y H:i', strtotime($bk['tgl_pengiriman'])); ?>
                            <?php } ?>
                        </td>
                        
                        <td>
                            <div class="btn-group dropleft">
                                <i class="fas fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                <div class="dropdown-menu">
                                <!-- Dropdown menu links -->
                                    <a class="dropdown-item" href="<?= base_url('barangkeluar/formEditBarangKeluar/').$bk['kd_bk']; ?>" style="color: #7E7E7E;">Ubah</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cetakBarangKeluar<?= $bk['kd_bk'] ?>" style="color: #7E7E7E;">Cetak</a>
                                    <?php
                                    $level = $this->session->userdata('level');
                                    ?>

                                    <?php if ($level == 'Admin') { ?>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteBarangKeluar<?= $bk['kd_bk'] ?>" style="color: #7E7E7E;">Hapus</a>
                                    <?php } else { ?>
    
                                    <?php } ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <!--<td></td>-->
                        <!--<td></td>-->
                    </tr>
                </tfoot>
            </table>
        </div>
        </div>
    </div>
</div>

<!--Modal Delete Barang Keluar-->
<?php $no = 0;
foreach ($barangkeluar as $bk) : $no++; ?>
<div class="modal fade" id="deleteBarangKeluar<?= $bk['kd_bk']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Barang Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus barang keluar dengan nomor transaksi '<?= $bk['kd_bk']; ?>' ?</p>
      </div>
      <div class="ml-3 mr-3 mb-3">
        <div class="row">
            <div class="col-lg-6">
                <button type="button" class="btn w-100" style="border: 1px solid #DADCE0; border-radius: 8px;" data-dismiss="modal">Batal</button>
            </div>
            <div class="col-lg-6">
                <a href="<?= base_url('barangkeluar/deleteBarangKeluar/').$bk['kd_bk'];?>"><button type="button" class="btn btn-secondary w-100">Hapus</button></a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach  ?>
<!--End Modal Delete Barang Keluar-->

<!--Modal Cetak Barang Keluar-->
<?php $no = 0;
foreach ($barangkeluar as $bk) : $no++; ?>
<div class="modal fade" id="cetakBarangKeluar<?= $bk['kd_bk']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cetak Barang Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin cetak barang keluar dengan nomor transaksi '<?= $bk['kd_bk']; ?>' ?</p>
      </div>
      <div class="ml-3 mr-3 mb-3">
        <div class="row">
            <div class="col-lg-6">
                <button type="button" class="btn w-100" style="border: 1px solid #DADCE0; border-radius: 8px;" data-dismiss="modal">Batal</button>
            </div>
            <div class="col-lg-6">
                <a href="<?= base_url('barangkeluar/cetakBarangKeluar/').$bk['kd_bk'];?>" target="_blank"><button type="button" class="btn btn-secondary w-100" target="_blank">Cetak</button></a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach  ?>
<!--End Modal Delete Barang Keluar-->