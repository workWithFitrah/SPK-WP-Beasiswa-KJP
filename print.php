<?php include "conect.php";

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
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

    <title>SPK Beasiswa KJP | SMAN 98 Jakarta</title>
    <link rel = "icon" href = "img/LOGO SMAN 98 JAKARTA.png" type = "image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top p-3">

    <!-- Page Wrapper -->
    <div id="wrapper">



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- isi Content -->
                    <!-- <h1 class="h3 mb-4 text-gray-800">Data-siswa</h1>
                    <p>Berikut data siswa</p> -->

                    <!-- DataTales -->
                    

                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <div class="sidebar-brand-icon rotate-n-15">
                                <img class="img-profile rounded-circle" src="img/LOGO SMAN 98 JAKARTA.png" style="width: 10%">
                            </div>
                            <h1 class="sidebar-brand-text mx-3">SMAN 98 Jakarta</h1>
                            <h1 class="m-0 font-weight-bold text-primary">Hasil Perhitungan</h1>
                        </div> -->
                        <h1 class="m-0 font-weight-bold text-primary">Hasil Perhitungan</h1>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped"  width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                        <th>N0</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody name="setVektorV">
                                    <?php
                                        // $queri="Select * From penilaian";
                                        $queri="SELECT * FROM hasil order by total desc";
                                        $hasil=mysqli_query ($koneksi,$queri); 
                                        $no=0;
                                        // print_r($vektorS_obj_Array);
                                        $i=0;

                                        while ($data = mysqli_fetch_array ($hasil)){
                                        $no++;


                                        echo "      
                                        <tr>  
                                        <td>".$no."</td>
                                        <td>".$data[1]."</td>
                                        <td>".$data[2]."</td>
                                        <td>".$data[3]."</td>
                                        </tr>";

                                        $i = $i + 1;

                                        }

                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div>

                        </div>
                    </div>

                    <!-- end isi Content -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
                    <h5 class="modal-title" id="exampleModalLabel">Ingin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Silahkan pilih tombol keluar untuk keluar dari website.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <form action="" method="POST" class="login-email">
                        <a class="btn btn-primary" href="logout.php">Keluar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
        window.print();
    </script>

</body>

</html>