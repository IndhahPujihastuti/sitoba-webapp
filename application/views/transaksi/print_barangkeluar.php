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
    .garis_tepi1 {
    border: 2px dashed #858796;
    width: max-content;
    padding: 20px;
    
    }
</style>
<center>
<div class="garis_tepi1">

<h2><center>Kwitansi Pengeluaran Barang</center></h2>

<table>
    <tr>
        <td>
            <?php
             $line = 0;
             for ($a=$line; $a<=129 ; $a++) { 
                 echo "-";
             }
            ?>
        </td>
    </tr>
</table>

<table>
    <tr>
        <td>Kode Barang Keluar</td>
        <td>:</td>
        <td><?= $laporanbarangkeluar['kd_bk']; ?></td>
    </tr>
    <tr>
        <td>Nama Barang</td>
        <td>:</td>
        <td><?= $laporanbarangkeluar['nama_brg']; ?></td>
    </tr>
    <tr>
        <td>Jumlah</td>
        <td>:</td>
        <td><?= $laporanbarangkeluar['jml']; ?></td>
    </tr>
    <tr>
        <td>Satuan</td>
        <td>:</td>
        <td><?= $laporanbarangkeluar['satuan']; ?></td>
    </tr>
    <tr>
        <td>Harga</td>
        <td>:</td>
        <td><?= 'Rp. ' .number_format($laporanbarangkeluar['harga'], 0, '', '.'); ?></td>
    </tr>
    <tr>
        <td>Tujuan Pengiriman</td>
        <td>:</td>
        <td><?= $laporanbarangkeluar['tujuan']; ?></td>
    </tr>
</table>
</div>
</center>
<br>
<br>
<script type="text/javascript">
window.print();
</script>
</body>
</html>
