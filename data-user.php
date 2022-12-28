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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img class="img-profile rounded-circle" src="img/LOGO SMAN 98 JAKARTA.png" style="width: 70%">
                </div>
                <div class="sidebar-brand-text mx-3">SMAN 98 Jakarta</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="data-siswa.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Siswa</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="data-bobot.php" >
                    <i class="fas fa-fw fa-table"></i>
                    <span>Bobot Indikator</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="data-penilaian.php">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Penilaian</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Metode WP</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="proses-perhitungan.php">Proses Perhitungan</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="hasil-perhitungan.php">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Hasil</span>
                </a>
            </li>

            <?php
                $queri ="SELECT * From user";
                $hasil = mysqli_query($koneksi, $queri);

                while($data = mysqli_fetch_array($hasil)){

                    if($_SESSION['username'] == $data[1]){
                        if($data[4] == "admin"){
                            echo '
                            <hr class="sidebar-divider">
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="data-user.php">
                                    <i class="fas fa-fw fa-cog"></i>
                                    <span>User</span>
                                </a>
                            </li>
                            ';
                        }else if($data[4] == "kesiswaan"){
                            echo "";
                        }
    
                    }

                }
            ?>

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
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'] ?></span>
                                <!-- <i class="fas fa-user img-profile rounded-circle" -->
                                <img class="img-profile rounded-circle"
                                    src="img/user-icon.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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

                    <!-- isi Content -->
                    <!-- <h1 class="h3 mb-4 text-gray-800">Data-siswa</h1>
                    <p>Berikut data siswa</p> -->

                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>N0</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $queri="Select * From user";
                                        $hasil=mysqli_query ($koneksi,$queri);
                                        $no=0;

                                        while ($data = mysqli_fetch_array ($hasil)){ 
                                        $no++; 
                                            
                                        echo "      
                                        <tr>  
                                        <td>".$no."</td>
                                        <td>".$data[1]."</td>  
                                        <td>".$data[2]."</td>
                                        <td>".$data[4]."</td>
                                        <td>
                                        <a href=edit-data-user.php?id=".$data[0]."><input type=button value=edit class=btn btn-success btn-block style=background-color:#f6c23e;color:#fff;></a>
                                        <a href=delete-user.php?id=".$data[0]." onclick='return checkDelete()'><input type=button value=hapus class=btn btn-success btn-block style=background-color:#e74a3b;color:#fff;></a></td>
                                        
                                        </tr>";      
                                        }

                                        // <input type="submit" name ="submit" value="Simpan" class="btn btn-success"  onclick="return checkInput()">
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-3" style="padding-right: 0.8rem">
                                   <a href="input-user.php"><input type="button2" value="Masukan Data Baru" class="btn btn-success btn-block"></a>
                                </div>
                            </div>    

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
        function checkDelete(){
            return confirm('Apakah yakin ingin menghapus data?');
        }
    </script>

</body>

</html>