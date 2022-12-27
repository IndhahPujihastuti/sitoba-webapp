<div class="container-fluid">
    <div class="card mb-4">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card-header bg-white">
            <h4>Data Pengguna</h4>
        </div>
        <?php
            $level = $this->session->userdata('level');
        ?>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Pengguna</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tanggal Bergabung</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Status</th>
                        <?php if ($level == 'Admin') { ?>
                        <th scope="col">Aksi</th>
                        <?php } else { ?>
    
                        <?php } ?>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($user as $u) { ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $u['kd_pengguna']; ?></td>
                        <td>
                            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/user/') . $u['gambar']; ?>" width="30" height="30"> 
                            <?= $u['nama']; ?>
                        </td>
                        <td><?= $u['email']; ?></td>
                        <td><?= date('d F Y H:i', strtotime($u['tgl_masuk'])); ?></td>
                        <td><?= $u['level']; ?></td>
                        <td>
                            <?php if ($u['status'] == 'Aktif') { ?>
                                <p  style="background: #F7F7F7; color: #2F80ED; border-radius: 3px; font-size: 11px; text-align: center; weight: 600; padding: 2px 8px;">Aktif</p>
                            <?php } else { ?>
                                <p style="background: #F7F7F7; color: #A9A9A9; border-radius: 3px; font-size: 11px; text-align: center; weight: 600; padding: 2px 8px;">Tidak Aktif</p>
                            <?php } ?>
                        </td>
                        <?php if ($level == 'Admin') { ?>
                        <td>
                            <div class="btn-group dropleft">
                                <i class="fas fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                <div class="dropdown-menu">
                                <!-- Dropdown menu links -->
                                    <a class="dropdown-item" href="<?= base_url('user/editUser/').$u['kd_pengguna']; ?>" style="color: #7E7E7E;">Ubah</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deletePengguna<?= $u['kd_pengguna'] ?>" style="color: #7E7E7E;">Hapus</a>
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

<!--Modal Delete User-->
<?php $no = 0;
foreach ($user as $u) : $no++; ?>
<div class="modal fade" id="deletePengguna<?= $u['kd_pengguna']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus data '<?= $u['nama']; ?>' ?</p>
      </div>
      <div class="ml-3 mr-3 mb-3">
        <div class="row">
            <div class="col-lg-6">
                <button type="button" class="btn w-100" style="border: 1px solid #DADCE0; border-radius: 8px;" data-dismiss="modal">Batal</button>
            </div>
            <div class="col-lg-6">
                <a href="<?= base_url('user/deleteUser/').$u['kd_pengguna'];?>"><button type="button" class="btn btn-secondary w-100">Hapus</button></a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach  ?>
<!--End Modal Delete User-->