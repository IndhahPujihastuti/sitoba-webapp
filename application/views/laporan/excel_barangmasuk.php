<?php
header("Content-type: application/vnd-ms-excel");
haeder("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<h3><center>Laporan Data Barang Masuk</center></h3>
<br>
<table class="table-data">
<thead>
 <tr>
 <th>No</th>
 <th>Nama Barang</th>
 <th>Nama Suplier</th>
 <th>Tanggal Masuk</th>
 <th>Jumlah</th>
 <th>Harga</th>
 <th>Status</th>
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
                        <td><?= $lbm['harga']; ?></td>
                        <td>
                            <?php if ($lbm['status_pay'] == 'Lunas') { ?>
                                <p  style="background: #E3FCEF; color: #006644; border-radius: 3px; font-size: 12px; text-align: center; weight: 600; padding: 4px 8px;">Lunas</p>
                            <?php } else { ?>
                                <p style="background: #FFEBE6; color: #BF2600; border-radius: 3px; font-size: 12px; text-align: center; weight: 600; padding: 4px 8px;">Belum Lunas</p>
                            <?php } ?>
                        </td>
 </tr>
 <?php
 }
 ?>
</tbody>
</table>