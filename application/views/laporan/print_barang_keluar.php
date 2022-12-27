<?php date_default_timezone_set("Asia/Jakarta"); ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<style type="text/css">
    .table-data{
        width: 100%;
        border-collapse: collapse;
    }
    .table-data tr th,
    .table-data tr td{
        border:1px solid black;
        font-size: 11pt;
        font-family:Verdana;
        padding: 10px 10px 10px 10px;
    }
    h3{
        font-family:Verdana;
    }
</style>
<h2><center>TB. BAROKAH JAYA GROUP</center></h2>
<span><center>Villa Gading Harapan Blok M 10 No. 16 Bekasi Utara</center></span>
<span><center>HP. 0878 8995 5056 / 0812 9593 522</center></span>
<center>
<table>
    <tr>
        <td>
            <?php
             $line = 0;
             for ($a=$line; $a<=193 ; $a++) { 
                 echo "-";
             }
            ?>
        </td>
    </tr>
</table>
</center>
<h4 class="pb-2">LAPORAN DATA BARANG KELUAR</h4>
<table>
    <tr>
        <td>Pencetak</td>
        <td>:</td>
        <td><?= $pengguna['nama']; ?></td>
    </tr>
    <tr>
        <td>Tanggal Cetak</td>
        <td>:</td>
        <td><?= date('d F Y H:i', strtotime('now')); ?></td>
    </tr>
    <!--
    <tr>
        <td>Jumlah barang keluar yang sudah dikirim</td>
        <td>:</td>
        <td>
            <?php
                foreach ($laporanbarangkeluar as $lbk)

                $where = ['jml != 0'];
                $totalbarangkeluarlengkap = $this->ModelSitoba->total_barang_keluar_lengkap('jml', $where);

                echo $totalbarangkeluarlengkap;
                
            ?>
        </td>
    </tr>
    <tr>
        <td>Jumlah barang keluar yang belum dikirim</td>
        <td>:</td>
        <td>
            <?php
                foreach ($laporanbarangkeluar as $lbk)

                $where = ['jml != 0'];
                $totalbarangkeluarbelum = $this->ModelSitoba->total_barang_keluar_belum('jml', $where);

                echo $totalbarangkeluarbelum;
                
            ?>
        </td>
    </tr>
    <tr>
        <td>Total barang keluar</td>
        <td>:</td>
        <td>
            <?php
                foreach ($laporanbarangkeluar as $lbk)

                $where = ['jml != 0'];
                $totalbarangkeluar = $this->ModelSitoba->total_barang_keluar('jml', $where);

                echo $totalbarangkeluar;
                
            ?>
        </td>
    </tr>
    -->
</table>
<br>
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Tujuan</th>
            <th>Tanggal Keluar</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <!--<th>Harga</th>-->
            <th>Status Pengiriman</th>
            <th>Rencana Tanggal Pengiriman</th>
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
                <td><?= date('d F Y H:i', strtotime($lbk['tgl_keluar'])); ?></td>
                <td><?= $lbk['jml']; ?></td>
                <td><?= $lbk['satuan']; ?></td>
                <!--<td><?= $lbk['harga']; ?></td>-->
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
        <?php
            }
        ?>
    </tbody>
</table>
<br>
<script type="text/javascript">
window.print();
</script>
</body>
</html>
