<div class="container-fluid">
    <div class="card mb-4">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card-header bg-white">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="mt-2 mr-5 pr-2">Data Barang</h4>
                </div>
                <?php
                    $level = $this->session->userdata('level');
                ?>
                <?php if ($level == 'Admin') { ?>
                    <div class="col-lg-6">
                        <a class="btn float-right" href="<?php echo base_url('barang/addBarang'); ?>" style="background: #858796; border-radius: 8px; color: #FFFFFF; text-align: center;">Tambah Baru</a>
                    </div>
                <?php } else { ?>
    
                <?php } ?>
            </div>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Harga</th>
                        <!--<th scope="col">Nama Suplier</th>-->
                        <th scope="col">Tanggal Input</th>
                        <th scope="col">Nama Penginput</th>
                        <?php if ($level == 'Admin') { ?>
                            <th scope="col">Aksi</th>
                        <?php } else { ?>
    
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($barang as $b) { ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $b['kd_barang']; ?></td>
                        <td>
                            <?= $b['nama_brg']; ?>
                        </td>
                        <td><?= $b['nm_kategori']; ?></td>
                        <td><?= $b['stok']; ?></td>
                        <td><?= $b['satuan']; ?></td>
                        <td><?= 'Rp. ' .number_format($b['harga'], 0, '', '.'); ?></td>
                        <!--<td><?= $b['nm_suplier']; ?></td>-->
                        <td><?= date('d F Y', strtotime($b['tgl_input'])); ?></td>
                        <td><?= $b['nm_penginput']; ?></td>
                        <?php if ($level == 'Admin') { ?>
                        <td>
                            <div class="btn-group dropleft">
                                <i class="fas fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer"></i>
                                <div class="dropdown-menu">
                                <!-- Dropdown menu links -->
                                    <a class="dropdown-item" href="<?= base_url('barang/FormEditBarang/').$b['kd_barang']; ?>" style="color: #7E7E7E;">Ubah</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteBarang<?= $b['kd_barang'] ?>" style="color: #7E7E7E;">Hapus</a>
                                </div>
                            </div>
                        </td>
                        <?php } else { ?>
    
                        <?php } ?>
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
                        <?php if ($level == 'Admin') { ?>
                            <td></td>
                        <?php } else { ?>
    
                        <?php } ?>
                        <!--<td></td>-->
                    </tr>
                </tfoot>
            </table>
        </div>
        </div>
    </div>
</div>

<!--Modal Delete Barang-->
<?php $no = 0;
foreach ($barang as $b) : $no++; ?>
<div class="modal fade" id="deleteBarang<?= $b['kd_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus data barang '<?= $b['nama_brg']; ?>' ?</p>
      </div>
      <div class="ml-3 mr-3 mb-3">
        <div class="row">
            <div class="col-lg-6">
                <button type="button" class="btn w-100" style="border: 1px solid #DADCE0; border-radius: 8px;" data-dismiss="modal">Batal</button>
            </div>
            <div class="col-lg-6">
                <a href="<?= base_url('barang/deleteBarang/').$b['kd_barang'];?>"><button type="button" class="btn btn-secondary w-100">Hapus</button></a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach  ?>
<!--End Modal Delete Barang-->