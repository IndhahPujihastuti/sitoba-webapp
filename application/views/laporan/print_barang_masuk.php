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
        font-family: 'Poppins';
        padding: 10px 10px 10px 10px;
    }
    h3{
        font-family: 'Poppins';
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
<h4 class="pb-2">LAPORAN DATA BARANG MASUK</h4>
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
        <td>Jumlah barang masuk yang sudah lengkap</td>
        <td>:</td>
        <td>
            <?php
                foreach ($laporanbarangmasuk as $lbm)

                $where = ['jml != 0'];
                $totalbarangmasuklengkap = $this->ModelSitoba->total_barang_masuk_lengkap('jml', $where);

                echo $totalbarangmasuklengkap;
                
            ?>
        </td>
    </tr>
    <tr>
        <td>Jumlah barang masuk yang kurang lengkap</td>
        <td>:</td>
        <td>
            <?php
                foreach ($laporanbarangmasuk as $lbm)

                $where = ['jml != 0'];
                $totalbarangmasukbelum = $this->ModelSitoba->total_barang_masuk_belum('jml', $where);

                echo $totalbarangmasukbelum;
                
            ?>
        </td>
    </tr>
    <tr>
        <td>Jumlah Kekurangan barang masuk</td>
        <td>:</td>
        <td>
            <?php
                foreach ($laporanbarangmasuk as $lbm)

                $where = ['jml_kurang != 0'];
                $totalbarangmasukbelum = $this->ModelSitoba->total_barang_masuk_belum('jml_kurang', $where);

                echo $totalbarangmasukbelum;
                
            ?>
        </td>
    </tr>
    <tr>
        <td>Total barang masuk</td>
        <td>:</td>
        <td>
            <?php
                foreach ($laporanbarangmasuk as $lbm)

                $where = ['jml != 0'];
                $totalbarangmasuk = $this->ModelSitoba->total_barang_masuk('jml', $where);

                echo $totalbarangmasuk;
                
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
            <th>Nama Supplier</th>
            <th>Tanggal Masuk</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <!--<th>Harga</th>-->
            <th>Status Barang</th>
            <th>Jumlah Kekurangan Barang</th>
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
            <!--<td><?= $lbm['harga']; ?></td>-->
            <td>
                <?php if ($lbm['status_brg'] == 'Lengkap') { ?>
                    <p  style="background: #FFFAE6; color: #FF8B00; border-radius: 3px; font-size: 11px; text-align: center; weight: 600; padding: 2px;">Lengkap</p>
                <?php } else { ?>
                    <p style="background: #F7F7F7; color: #A9A9A9; border-radius: 3px; font-size: 11px; text-align: center; weight: 600; padding: 2px;">Kurang</p>
                <?php } ?>
            </td>
            <td><?= $lbm['jml_kurang']; ?></td>
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
