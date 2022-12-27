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
                    <h4 class="mt-2 mr-5 pr-2">Data Kategori</h4>
                </div>
                <?php
                    $level = $this->session->userdata('level');
                ?>
                <?php if ($level == 'Admin') { ?>
                  <div class="col-lg-6">
                      <a class="btn float-right" href="#" data-toggle="modal" data-target="#createCategory" style="background: #858796; border-radius: 8px; color: #FFFFFF; text-align: center;">Tambah Baru</a>
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
                        <th scope="col">Kode Kategori</th>
                        <th scope="col">Nama Kategori</th>
                        <?php if ($level == 'Admin') { ?>
                            <th scope="col">Aksi</th>
                        <?php } else { ?>
    
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($kategori as $k) { ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $k['kd_kategori']; ?></td>
                        <td>
                            <?= $k['nm_kategori']; ?>
                        </td>
                        <?php if ($level == 'Admin') { ?>
                          <td>
                              <div class="btn-group dropleft">
                                  <i class="fas fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer"></i>
                                  <div class="dropdown-menu">
                                  <!-- Dropdown menu links -->
                                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editCategory<?= $k['kd_kategori'] ?>" style="color: #7E7E7E;">Ubah</a>
                                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteCategory<?= $k['kd_kategori'] ?>" style="color: #7E7E7E;">Hapus</a>
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

<!--Modal Create Category-->
<div class="modal fade" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <?= form_open_multipart('barang/kategoriBarang'); ?>
        <div class="row">
          <div class="col-lg-12 mb-3">
            <label for="title" class="form-label">Kode Kategori<sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="kd_kategori" placeholder="Kode Kategori" name="kd_kategori" value="<?php echo kodeKategoriOtomatis(); ?>" readonly>  
          </div>
          <div class="col-lg-12 mb-3">
            <label for="title" class="form-label">Nama Kategori<sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="nm_kategori" placeholder="Masukkan Kategori" name="nm_kategori" value="<?= set_value('nm_kategori'); ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Nama Kategori Harus Diisi')" oninput="setCustomValidity('')">  
          </div>
        </div>
        <div class=" mr-3 mb-3">
          <div class="row">
              <div class="col-lg-6">
                  <button type="button" class="btn w-100" style="border: 1px solid #DADCE0; border-radius: 8px;" data-dismiss="modal">Batal</button>
              </div>
              <div class="col-lg-6">
                  <button type="submit" class="btn btn-secondary w-100">Tambah</button>
              </div>
          </div>
        </div>
        <?= form_close(); ?>
      </div>
     
   
    </div>
  </div>
</div>
<!--End Modal Create Category-->

<?php $no = 0;
foreach ($kategori as $k) : $no++; ?>
<!--Modal Edit Category-->
<div class="modal fade" id="editCategory<?= $k['kd_kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <?= form_open_multipart('barang/editCategory'); ?>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <label for="kd_kategori" class="form-label">Kode Kategori<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" name="kd_kategori" id="kd_kategori" value="<?php echo $k['kd_kategori']; ?>" readonly>
            </div>
            <div class="col-lg-12 mb-3">
                <label for="title" class="form-label">Nama Kategori<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" id="nm_kategori" name="nm_kategori" value="<?= $k['nm_kategori']; ?>" placeholder="Masukkan Kategori" autocomplete="off" required oninvalid="this.setCustomValidity('Nama Kategori Tidak Boleh Kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
        <div class=" mr-3 mb-3">
          <div class="row">
              <div class="col-lg-6">
                  <button type="button" class="btn w-100" style="border: 1px solid #DADCE0; border-radius: 8px;" data-dismiss="modal">Batal</button>
              </div>
              <div class="col-lg-6" id="editbtn">
                <button type="submit" class="btn btn-secondary w-100">Ubah</button>
              </div>
          </div>
        </div>
        <?= form_close(); ?>
     
      </div>
      
    </div>
  </div>
</div>
<?php endforeach  ?>
<!--End Modal Edit Topic-->

<!--Modal Delete Kategori-->
<?php $no = 0;
foreach ($kategori as $k) : $no++; ?>
<div class="modal fade" id="deleteCategory<?= $k['kd_kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus data kategori '<?= $k['nm_kategori']; ?>' ?</p>
      </div>
      <div class="ml-3 mr-3 mb-3">
        <div class="row">
            <div class="col-lg-6">
                <button type="button" class="btn w-100" style="border: 1px solid #DADCE0; border-radius: 8px;" data-dismiss="modal">Batal</button>
            </div>
            <div class="col-lg-6">
                <a href="<?= base_url('barang/deleteCategory/').$k['kd_kategori'];?>"><button type="button" class="btn btn-secondary w-100">Hapus</button></a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach  ?>
<!--End Modal Delete Kategori-->

<script>
 $(document).ready(function() {
    $('#dataTable').DataTable( {
        "ordering": false  
    } );
} );
</script>