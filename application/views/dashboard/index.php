<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- row ux-->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-dark text-uppercase mb-1">Jumlah Pengguna</div>
                            <div class="h1 mb-0 font-weight-bold text-dark"><?= $this->ModelSitoba->getUser()->num_rows(); ?></div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('user') ?>"><i class="fas fa-users fa-3x text-dark"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-dark text-uppercase mb-1">Stok Barang</div>
                            <div class="h1 mb-0 font-weight-bold text-dark">
                            <?php
                                $where = ['stok != 0'];
                                $totalstokbarang = $this->ModelSitoba->stok_barang('stok', 
                                $where);
                                echo number_format($totalstokbarang, 0, '', '.');
                            ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('barang') ?>"><i class="fas fa-folder fa-3x text-dark"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-dark text-uppercase mb-1">Barang Masuk</div>
                            <div class="h1 mb-0 font-weight-bold text-dark">
                                <?php
                                    $where = ['jml != 0'];
                                    $totalbarangmasuk = $this->ModelSitoba->total_barang_masuk('jml', 
                                    $where);
                                    echo number_format($totalbarangmasuk, 0, '', '.');
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('barangmasuk') ?>"><i class="fas fa-arrow-right fa-3x text-dark"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-dark text-uppercase mb-1">Barang Keluar</div>
                            <div class="h1 mb-0 font-weight-bold text-dark">
                                <?php
                                    $where = ['jml != 0'];
                                    $totalbarangkeluar = $this->ModelSitoba->total_barang_keluar('jml', 
                                    $where);
                                    echo number_format($totalbarangkeluar, 0, '', '.');
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('barangkeluar') ?>"><i class="fas fa-arrow-left fa-3x text-dark"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-lg-6">
        <div class="card mb-4">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card-header bg-white">
                <i class="fas fa-warning text-danger"><span class="text-danger ml-2">Stok Barang Mencapai Batas Minimum</span></i>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($barang as $brg) { ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $brg['kd_barang']; ?></td>
                                <td><?= $brg['nama_brg']; ?></td>
                                <td><?= $brg['stok']; ?></td>
                                <td><?= $brg['satuan']; ?></td>
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
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card mb-4">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card-header bg-white">
                <i class="fas fa-warning text-danger"><span class="text-danger ml-2">Barang Yang Belum Dikirim</span></i>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Rencana Pengiriman Barang</th>
                                <th scope="col">Tujuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($barangkeluar as $bk) { ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $bk['kd_bk']; ?></td>
                                <td><?= $bk['nama_brg']; ?></td>
                                <td><?= date('d F Y H:i', strtotime($bk['tgl_pengiriman'])); ?></td>
                                <td><?= $bk['tujuan']; ?></td>
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
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->




