<?php date_default_timezone_set("Asia/Jakarta"); ?>
<div class="container-fluid">
    <div class="card mb-4 mt-4">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card-header bg-white">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="mt-2 mr-5 pr-2">Laporan Barang Keluar</h4>
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
                        <th scope="col">Tujuan</th> 
                        <th scope="col">Tanggal Keluar</th> 
                        <th scope="col">Jumlah</th>
                        <th scope="col">Satuan</th>
                        <!--<th scope="col">Harga</th>-->
                        <th scope="col">Status Pengiriman</th>
                        <th scope="col">Rencana Tanggal Pengiriman</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($laporanbarangkeluar as $lbk) { ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $lbk['nama_brg']; ?></td>
                        <td><?= $lbk['tujuan']; ?></td>
                        <td><?=date('d F Y H:i', strtotime($lbk['tgl_keluar'])); ?></td>
                        <td><?= $lbk['jml']; ?></td>
                        <td><?= $lbk['satuan']; ?></td>
                        <!--<td><?= 'Rp. ' .number_format($lbk['harga'], 0, '', '.'); ?></td>-->
                        <td>
                            <?php if ($lbk['status_krm'] == 'Sudah Dikirim') { ?>
                                <p  style="background: #FFFAE6; color: #FF8B00; border-radius: 3px; font-size: 11px; text-align: center; weight: 600; padding: 2px;">Sudah Dikirim</p>
                            <?php } else { ?>
                                <p style="background: #F7F7F7; color: #A9A9A9; border-radius: 3px; font-size: 11px; text-align: center; weight: 600; padding: 2px;">Belum Dikirim</p>
                            <?php } ?>
                        </td>
                        
                        <td>
                            <?php 
                                $tgl = '0000-00-00 00:00:00';
                                
                                if ($lbk['tgl_pengiriman'] == $tgl) { ?>
                                <p>Tidak Ada</p>
                            <?php } else { ?>
                                <?= date('d F Y H:i', strtotime($lbk['tgl_pengiriman'])); ?>
                            <?php } ?>
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
                        <!--<td></td>-->
                    </tr>
                </tfoot>
            </table>
            Total Barang Keluar : 
            <?php
                foreach ($laporanbarangkeluar as $lbk)

                    $where = ['jml != 0'];
                    $totalbarangkeluarlengkap = $this->ModelSitoba->total_barang_keluar_lengkap('jml', $where);
                    $totalbarangkeluarbelum = $this->ModelSitoba->total_barang_keluar_belum('jml', $where);

                    if ($lbk['status_krm'] == 'Sudah Dikirim') {
                        echo $totalbarangkeluarlengkap;
                    } else {
                        echo $totalbarangkeluarbelum;
                    }
            ?>
            <br>
        </div>
            </div>
    </div>
</div>