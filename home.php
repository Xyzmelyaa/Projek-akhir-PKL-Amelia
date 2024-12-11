<?php include "header.php"; ?>
        
<?php 
//uji jika tombol sistem diklik
if(isset($_POST['simpan'])){
    $tanggal = date('Y-m-d');

    //htmlspecialchars agar inputan lebih aman
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $asal = htmlspecialchars($_POST['asal'], ENT_QUOTES);
    $tujuan = htmlspecialchars($_POST['tujuan'], ENT_QUOTES);
    $keperluan = htmlspecialchars($_POST['keperluan'], ENT_QUOTES);
    $no = htmlspecialchars($_POST['no'], ENT_QUOTES);

    $simpan = mysqli_query($koneksi, "INSERT INTO tamu VALUES ('','$tanggal', '$nama', '$asal', '$tujuan', '$keperluan', '$no')");

    //uji jika simpan data sukses
    if ($simpan){
       echo "<script>alert('simpan data sukses terimakasih');document.location='?'</script>";
    }else {
        echo "<script>alert('simpan data gagal');document.location='?'</script>";
    }
}

?>
<div class="bg-light ">
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

   
        
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">BPSDM PROVINSI JAWA BARAT</span>
            <img src="asset/img/logo.png " width="25">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="login.php">
                <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Login
            </a>
        </div>
    </li>

</ul>

</nav>
</div>


        <!--Head-->
    <div class="head text-center">
    <img src="asset/img/logo.png" width="100">
    <br>
    <h2 class="text-white">Sistem Informasi Buku Tamu <br>BPSDM PROVINSI JAWA BARAT</h2>
</div>

<!--awal row-->
<div class="row nt-2 justify-content-center">
    <div class="col-lg-7 nb-3">
        
            <div class="card-body">
            
            <div class="container-fluid">
              <div class="row justify-content-center">
           <div class="col-xl-6 col-lg-7">
            <!-- Card for the form -->
            <div class="card shadow-lg border-0 rounded-lg my-5">
                <div class="card-header text-center">
                    <h3 class="h4 text-gray-900 mb-4">Identitas Pengunjung</h3>
                </div>
                <div class="card-body">
                    <form class="user" method="POST" action="">
                        <!-- Nama Tamu -->
                        <div class="form-group">
                            <label for="nama" class="text-gray-900">Nama Tamu:</label>
                            <input type="text" class="form-control form-control-user" name="nama" placeholder="Masukkan Nama Tamu" required>
                        </div>

                        <!-- Instansi -->
                        <div class="form-group">
                            <label for="asal" class="text-gray-900">Instansi:</label>
                            <input type="text" class="form-control form-control-user" name="asal" placeholder="Masukkan Instansi" required>
                        </div>

                        <!-- Tujuan -->
                        <div class="form-group">
                            <label for="tujuan" class="text-gray-900">Tujuan:</label>
                            <select class="form-control form-control-user" name="tujuan" id="tujuan" required>
                                <option value="" disabled selected>Pilih Tujuan</option>
                                <option value="Sekretariat">Sekretariat</option>
                                <option value="Divisi Kepegawaian">divisi kepegawaian</option>
                                <option value="Divisi Keuangan">divisi keuangan</option>
                                <option value="Comand Center">Comand Center</option>
                                <option value="Tu Pimpinan">tu pimpinan</option>
                                <option value="Bidang 1 SKPK">Bidang 1 SKPK</option>
                                <option value="Bidang 2 PKTI">Bidang 2 PKTI</option>
                                <option value="Bidang 3 PKTU">Bidang 3 PKTU</option>
                                <option value="Bidang 4 PKM">Bidang 4 PKM</option>
                            </select>
                        </div>

                        <!-- Keperluan -->
                        <div class="form-group">
                            <label for="keperluan" class="text-gray-900">Keperluan / Maksud Tujuan:</label>
                            <input type="text" class="form-control form-control-user" name="keperluan" placeholder="Masukkan Keperluan" required>
                        </div>

                        <!-- No HP Tamu -->
                        <div class="form-group">
                            <label for="no" class="text-gray-900">Nomor HP Tamu:</label>
                            <input type="text" class="form-control form-control-user" name="no" placeholder="Masukkan Nomor HP Tamu" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" name="simpan" class="btn btn-primary btn-user btn-block">
                            Simpan Data
                        </button>
                    </form>
                </div>
            </div>

            <!-- Footer -->
     

            </div>
       
    </div>

<!-- Bootstrap core JavaScript-->
<script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="asset/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="asset/js/demo/chart-area-demo.js"></script>
    <script src="asset/js/demo/chart-pie-demo.js"></script>



<style>
    .table-responsive {
        overflow-x: auto;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }

    .table-bordered thead th,
    .table-bordered thead td {
        border-bottom-width: 2px;
    }

    .card {
        width: 100%;
    }

    .card-body {
       


                </div>
                <?php include "footer.php"; ?>
   