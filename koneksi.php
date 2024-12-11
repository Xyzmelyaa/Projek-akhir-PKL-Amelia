<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'bpsdm';

    $koneksi = mysqli_connect($server,$username, $password, $database) or die ('gagal terhubung ke database');
?>