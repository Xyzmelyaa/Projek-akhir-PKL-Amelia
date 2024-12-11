<?php
include 'header.php';
include 'koneksi.php';

// Start the session
session_start();

// Check if the user ID is provided
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Fetch visitor data from the database
    $stmt = $koneksi->prepare("SELECT * FROM tamu WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $tamu = $result->fetch_assoc();
    $stmt->close();
    
    if (!$tamu) {
        echo "<script>alert('Data tidak ditemukan');document.location='admin.php'</script>";
        exit;
    }
} else {
    echo "<script>alert('ID tidak diberikan');document.location='admin.php'</script>";
    exit;
}

// Check if the form is submitted
if (isset($_POST['update'])) {
    $tanggal = date('Y-m-d');
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $asal = htmlspecialchars($_POST['asal'], ENT_QUOTES);
    $tujuan = htmlspecialchars($_POST['tujuan'], ENT_QUOTES);
    $keperluan = htmlspecialchars($_POST['keperluan'], ENT_QUOTES);
    $no = htmlspecialchars($_POST['no'], ENT_QUOTES);

    // Prepare and bind the SQL statement for update
    $stmt = $koneksi->prepare("UPDATE tamu SET tanggal = ?, nama = ?, asal = ?, tujuan = ?, keperluan = ?, no = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $tanggal, $nama, $asal, $tujuan, $keperluan, $no, $id);
    
    
    // Execute the statement and check if it is successful
    if ($stmt->execute()) {
        echo "<script>alert('Update data sukses');document.location='admin.php'</script>";
    } else {
        echo "<script>alert('Update data gagal');document.location='admin.php'</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Tamu - BPSDM PROVINSI JAWA BARAT</title>
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .center-table {
            margin: 0 auto;
            float: none;
        }
        .card {
            margin: 20px auto;
            float: none;
        }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Tamu</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label for="nama">Nama:</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($tamu['nama']) ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="asal">Instansi:</label>
                                            <input type="text" class="form-control" id="asal" name="asal" value="<?= htmlspecialchars($tamu['asal']) ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tujuan">Tujuan:</label>
                                            <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?= htmlspecialchars($tamu['tujuan']) ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="keperluan">Keperluan:</label>
                                            <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?= htmlspecialchars($tamu['keperluan']) ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no">No. HP:</label>
                                            <input type="text" class="form-control" id="no" name="no" value="<?= htmlspecialchars($tamu['no']) ?>" required>
                                        </div>
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                        <a href="admin.php" class="btn btn-secondary">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Page Content -->

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
                            <div class="modal-body">Klik "Logout" jika sudah yakin.</div>
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
                <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>
                <script src="asset/js/sb-admin-2.min.js"></script>
            </div>
        </div>
    </div>
</body>
</html>

<?php include 'footer.php'; ?>
