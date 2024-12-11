<?php
include "koneksi.php";

header("content-type: application/vnd-ms-excel");
header("content-Disposition: attachment; filename=Export Excel Data Pengunjung.xls");
header("pragma: no-cache");
header("Expires:0");

?>

<table border="1">
    <thead>
        <tr>
            <th colspan="6">Rekapitulasi Data Pengunjung</th>
        </tr>
        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pengunjung</th>
                                            <th>Instansi</th>
                                            <th>Tujuan</th>
                                            <th>Keperluan</th>
                                            <th>No.HP</th>
                                        </tr>
    </thead>
    <tbody>
                                        <?php 
                                       $tanggal1 = $_POST['tanggala'];
                                       $tanggal2 = $_POST['tanggalb'];


                                        $tampil = mysqli_query($koneksi, "SELECT * FROM tamu 
                                        where tanggal BETWEEN '$tanggal1' and '$tanggal2' order by tanggal asc");
                                        $no = 1;
                                        while ($data = mysqli_fetch_array($tampil)){
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?> </td>
                                            <td><?= $data['tanggal'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['asal'] ?></td>
                                            <td><?= $data['tujuan'] ?></td>
                                            <td><?= $data['keperluan'] ?></td>
                                            <td><?= $data['no'] ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
</table>