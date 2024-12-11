<?php include "header.php"; ?>
        
<?php 
//uji jika tombol sistem diklik
if(isset($_POST['simpan'])){
    $tanggal = date('Y-m-d');

    //htmlspecialchars agar inputan lebih aman
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
    $tujuan = htmlspecialchars($_POST['tujuan'], ENT_QUOTES);
    $no = htmlspecialchars($_POST['no'], ENT_QUOTES);

    $simpan = mysqli_query($koneksi, "INSERT INTO tamu VALUES ('','$tanggal', '$nama', '$alamat', '$tujuan','$no')");

    //uji jika simpan data sukses
    if ($simpan){
       echo "<script>alert('simpan data sukses terimakasih');document.location='?'</script>";
    }else {
        echo "<script>alert('simpan data gagal');document.location='?'</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BPSDM PROVINSI JAWA BARAT</title>

    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>
        
            <li class="nav-item">
                <a class="nav-link" href="rekap.php">
                    <i class="fa fa-table"></i>
                    <span>Rekapitulasi</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="statistik.php">
                    <i class="fa fa-list"></i>
                    <span>Statistik</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Liaa Company</span>
                                <img src="asset/img/logo.png " width="25">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Statistik pengunjung</h1>
                            </div>
                            <?php 
                            //deklarasi tanggal
                            $tglsekarang = date('Y-m-d');

                            $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));

                            $seminggu = date('Y-m-d h:i:s', strtotime('-1 week +1 day', strtotime($tglsekarang)));

                            $sekarang = date('Y-m-d h:i:s');

                            $tglsekarang = mysqli_fetch_array(mysqli_query
                            ($koneksi,
                             "SELECT count(*) FROM tamu where tanggal like '%$tglsekarang%'"
                            ));

                            $kemarin = mysqli_fetch_array(mysqli_query
                            ($koneksi,
                             "SELECT count(*) FROM tamu where tanggal like '%$kemarin%'"
                            ));

                            $seminggu = mysqli_fetch_array(mysqli_query
                            ($koneksi,
                             "SELECT count(*) FROM tamu where tanggal BETWEEN '$seminggu' and '$sekarang'"
                            ));

                            $bulan_ini =date('m');

                            $sebulan = mysqli_fetch_array(mysqli_query(
                                $koneksi,
                             "SELECT count(*) FROM tamu where month(tanggal) = '$bulan_ini'"
                            ));

                            $keseluruhan = mysqli_fetch_array(mysqli_query
                            ($koneksi,
                             "SELECT count(*) FROM tamu "
                            ));




                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Hari ini</td>
                                    <td>: <?= $tglsekarang[0] ?></td>
                                </tr>
                                <tr>
                                    <td>Kemarin</td>
                                    <td>: <?= $kemarin[0] ?></td>
                                </tr>
                                <tr>
                                    <td>Minggu Ini</td>
                                    <td>: <?= $seminggu[0] ?></td>
                                </tr>
                                <tr>
                                    <td>Bulan ini</td>
                                    <td>: <?= $sebulan[0] ?></td>
                                </tr>
                                <tr>
                                    <td>Keseluruhan</td>
                                    <td>: <?= $keseluruhan[0] ?></td>
                                </tr>
                            </table>
         </div>       
     </div>
</div>
</div>
</div>
                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                              
                            
                  

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah kamu yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">klik "Logout" jika sudah yakin</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="home.php">Logout</a>
                </div>
            </div>
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

</body>

</html>
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
    }
       


                </div>
                <?php include "footer.php"; ?>
   