<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from tamu where id='$id'");
header("location:admin.php");
?>