<?php date_default_timezone_set("Asia/Jakarta"); ?>
<div class="container-fluid">
    <div class="card mb-4 mt-4">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card-header bg-white">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="mt-2 mr-5 pr-2">Laporan Barang Masuk</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Nama Supplier</th>
                        <th scope="col">Tanggal Masuk</th> 
                        <th scope="col">Jumlah</th>
                        <th scope="col">Satuan</th>
                        <!--<th scope="col">Harga</th>-->
                        <th scope="col">Status Barang</th>
                        <th scope="col">Jumlah Kekurangan Barang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($laporanbarangmasuk as $lbm) { ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $lbm['nama_brg']; ?></td>
                        <td><?= $lbm['nm_suplier']; ?></td>
                        <td><?= date('d F Y H:i', strtotime($lbm['tgl_masuk'])); ?></td>
                        <td><?= $lbm['jml']; ?></td>
                        <td><?= $lbm['satuan']; ?></td>
                        <!--<td><?= 'Rp. ' .number_format($lbm['harga'], 0, '', '.'); ?></td>-->
                        <td>
                            <?php if ($lbm['status_brg'] == 'Lengkap') { ?>
                                <p  style="background: #FFFAE6; color: #FF8B00; border-radius: 3px; font-size: 11px; text-align: center; weight: 600; padding: 2px;">Lengkap</p>
                            <?php } else { ?>
                                <p style="background: #F7F7F7; color: #A9A9A9; border-radius: 3px; font-size: 11px; text-align: center; weight: 600; padding: 2px;">Kurang</p>
                            <?php } ?>
                        </td>
                        <td><?= $lbm['jml_kurang']; ?></td>
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
                    </tr>    
                </tfoot>
            </table>
            Total Barang Masuk : 
            
            <?php 
 
                foreach ($laporanbarangmasuk as $lbm)

            
                    $where = ['jml != 0'];
                    $totalbarangmasuklengkap = $this->ModelSitoba->total_barang_masuk_lengkap('jml', $where);
                    $totalbarangmasukbelum = $this->ModelSitoba->total_barang_masuk_belum('jml', $where);

                    if ($lbm['status_brg'] == 'Lengkap') {
                        echo $totalbarangmasuklengkap;
                    } else {
                        echo $totalbarangmasukbelum;
                    }
               
            ?>
            <br>
            Jumlah Kekurangan Barang Masuk : 
            <?php
                foreach ($laporanbarangmasuk as $lbm)

                    $where = ['jml_kurang != 0'];
                    $totalbarangmasuklengkap = $this->ModelSitoba->total_barang_masuk_lengkap('jml_kurang', $where);
                    $totalbarangmasukbelum = $this->ModelSitoba->total_barang_masuk_belum('jml_kurang', $where);

                    if ($lbm['status_brg'] == 'Lengkap') {
                        echo $totalbarangmasuklengkap;
                    } else {
                        echo $totalbarangmasukbelum;
                    }
            ?>
            <br>
        </div>
      </div>
    </div>
</div>