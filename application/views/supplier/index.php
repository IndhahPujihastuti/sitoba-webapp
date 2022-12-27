<div class="container-fluid">
    <div class="card mb-4">
    <?php if(validation_errors()){?>
        <div class="alert alert-danger alert-message" role="alert">
        <?= validation_errors();?>
        </div>
        <?php }?>
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card-header bg-white">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="mt-2 mr-5 pr-2">Data Suplier</h4>
                </div>
                <?php
                    $level = $this->session->userdata('level');
                ?>
                <?php if ($level == 'Admin') { ?>
                    <div class="col-lg-6">
                        <a class="btn float-right" href="<?php echo base_url('supplier/createSupplier'); ?>" style="background: #858796; border-radius: 8px; color: #FFFFFF; text-align: center;">Tambah Baru</a>
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
                        <th scope="col">Kode Supplier</th>
                        <th scope="col">Nama Supplier</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telepon</th>
                        <?php if ($level == 'Admin') { ?>
                            <th scope="col">Aksi</th>
                        <?php } else { ?>
    
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($supplier as $su) { ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $su['kd_suplier']; ?></td>
                        <td>
                            <?= $su['nm_suplier']; ?>
                        </td>
                        <td><?= $su['alamat']; ?></td>
                        <td><?= $su['no_telp']; ?></td>
                        <?php if ($level == 'Admin') { ?>
                            <td>
                                <div class="btn-group dropleft">
                                    <i class="fas fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                    <div class="dropdown-menu">
                                    <!-- Dropdown menu links -->
                                        <a class="dropdown-item" href="<?= base_url('supplier/formEdit/').$su['kd_suplier']; ?>" style="color: #7E7E7E;">Ubah</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteSupplier<?= $su['kd_suplier'] ?>" style="color: #7E7E7E;">Hapus</a>
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
                        <?php if ($level == 'Admin') { ?>
                            <td></td>
                        <?php } else { ?>
    
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>
            </div>
        </div>
    </div>
</div>

<!--Modal Delete Supplier-->
<?php $no = 0;
foreach ($supplier as $su) : $no++; ?>
<div class="modal fade" id="deleteSupplier<?= $su['kd_suplier']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Suplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus data supplier '<?= $su['nm_suplier']; ?>' ?</p>
      </div>
      <div class="ml-3 mr-3 mb-3">
        <div class="row">
            <div class="col-lg-6">
                <button type="button" class="btn w-100" style="border: 1px solid #DADCE0; border-radius: 8px;" data-dismiss="modal">Batal</button>
            </div>
            <div class="col-lg-6">
                <a href="<?= base_url('supplier/deleteSupplier/').$su['kd_suplier'];?>"><button type="button" class="btn btn-secondary w-100">Hapus</button></a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach  ?>
<!--End Modal Delete Supplier-->