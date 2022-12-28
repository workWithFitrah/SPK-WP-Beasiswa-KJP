<?php include "conect.php";

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

mysqli_query($koneksi," DELETE FROM hasil");

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
                            <center>
                                <h6 class="m-0 font-weight-bold text-primary">Matriks Perbandingan</h6>
                                <p>Matriks Perbandingan antara data Alternatif dan Kriteria</p>
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Penghasilan Orangtua</th>
                                            <th>Tanggungan Orangtua</th>
                                            <th>Absensi</th>
                                            <th>Nilai Raport</th>
                                            <th>Kepribadian</th>
                                            <th>Kondisi Rumah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        // $queri="Select * From penilaian";
                                        $queri="SELECT penilaian.*, siswa.nis, siswa.nama FROM penilaian INNER JOIN siswa ON penilaian.id_siswa=siswa.id order by penilaian.id asc";
                                        $hasil=mysqli_query ($koneksi,$queri);
                                        $no=0;  

                                        while ($data = mysqli_fetch_array ($hasil)){
                                            // print_r($data);
                                            $no++;  
                                            $id_siswa=$data[0];

                                            if ($data[2] < 999999) {
                                                $kon_penghasilan_ortu = 1;
                                            } elseif($data[2] >= 1000000 && $data[2] < 1999999){
                                                $kon_penghasilan_ortu = 2;
                                            } elseif($data[2] >= 2000000 && $data[2] < 2999999){
                                                $kon_penghasilan_ortu = 3;
                                            } elseif($data[2] >= 3000000 && $data[2] < 3999999){
                                                $kon_penghasilan_ortu = 4;
                                            } elseif($data[2] >= 4000000){
                                                $kon_penghasilan_ortu = 5;
                                            }

                                            if ($data[3] == "1 Anak") {
                                                $kon_tanggungan_ortu = 1;
                                            } elseif($data[3] == "2 Anak"){
                                                $kon_tanggungan_ortu = 2;
                                            } elseif($data[3] == "3 Anak") {
                                                $kon_tanggungan_ortu = 3;
                                            } elseif($data[3] == "4 Anak"){
                                                $kon_tanggungan_ortu = 4;
                                            } elseif($data[3] == ">= 5 Anak") {
                                                $kon_tanggungan_ortu = 5;
                                            }

                                            if ($data[4] == "Tidak pernah alpa") {
                                                $kon_absensi = 1;
                                            } elseif($data[4] == 1){
                                                $kon_absensi = 2;
                                            } elseif($data[4] == 2){
                                                $kon_absensi = 3;
                                            } elseif($data[4] == 3){
                                                $kon_absensi = 4;
                                            } elseif($data[4] == "> 3"){
                                                $kon_absensi = 5;
                                            }

                                            if ($data[5] == 0 && $data[5] < 60) {
                                                $kon_nilai_raport = 1;
                                            } elseif($data[5] >= 61 && $data[5] <= 70){
                                                $kon_nilai_raport = 2;
                                            } elseif($data[5] >= 71 && $data[5] <= 80){
                                                $kon_nilai_raport = 3;
                                            } elseif($data[5] >= 81 && $data[5] <= 90){
                                                $kon_nilai_raport = 4;
                                            } elseif($data[5] >= 91){
                                                $kon_nilai_raport = 5;
                                            }

                                    
                                            if ($data[6] == "Sangat Kurang") {
                                                $kon_kepribadian = 1;
                                            } elseif($data[6] == "Kurang"){
                                                $kon_kepribadian = 2;
                                            } elseif($data[6] == "Cukup"){
                                                $kon_kepribadian = 3;
                                            } elseif($data[6] == "Baik"){
                                                $kon_kepribadian = 4;
                                            } elseif($data[6] == "Sangat Baik"){
                                                $kon_kepribadian = 5;
                                            }

                                            if ($data[7] == "Sangat Kurang") {
                                                $kon_kondisi_rumah = 1;
                                            } elseif($data[7] == "Kurang"){
                                                $kon_kondisi_rumah = 2;
                                            } elseif($data[7] == "Cukup"){
                                                $kon_kondisi_rumah = 3;
                                            } elseif($data[7] == "Baik"){
                                                $kon_kondisi_rumah = 4;
                                            } elseif($data[7] == "Sangat Baik"){
                                                $kon_kondisi_rumah = 5;
                                            }

                                            $nama_siswa=$data[9]." | ".$data[8];



                                        echo "      
                                        <tr>  
                                        <td>".$no."</td>
                                        <td>".$nama_siswa."</td>
                                        <td>".$kon_penghasilan_ortu."</td>  
                                        <td>".$kon_tanggungan_ortu."</td>
                                        <td>".$kon_absensi."</td>
                                        <td>".$kon_nilai_raport."</td>
                                        <td>".$kon_kepribadian."</td>
                                        <td>".$kon_kondisi_rumah."</td>
                                        </tr>";
                                        
                                        //   my sqli_query($koneksi," INSERT into konversi values('$id_siswa','$kon_penghasilan_ortu','$kon_tanggungan_ortu','$kon_absensi','$kon_nilai_raport','$kon_kepribadian','$kon_kondisi_rumah')");
                                        }

                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br>

                        <div class="card-header py-4">
                            <center>
                                <h6 class="m-0 font-weight-bold text-primary">Vektor S</h6>
                                <p>Menghitung nilai Vektor S</p>
                            </center>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead name="setVektorS">
                                        <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                        <th>C6</th>
                                        <th>Nilai Vektor S</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php
                                        $queri="SELECT penilaian.*, siswa.nis, siswa.nama FROM penilaian INNER JOIN siswa ON penilaian.id_siswa=siswa.id order by penilaian.id asc";
                                        // $queri="Select * From penilaian";
                                        $hasil=mysqli_query ($koneksi,$queri);  
                                        $pangkat =[];
                                        $no=0;
                                        
                                        //hitung conv bobot
                                        $queriBobot="Select * From bobot2";
                                        $hasilBobot=mysqli_query ($koneksi,$queriBobot);
                                        $hasilLagi=mysqli_query ($koneksi,$queriBobot);

                                        $i = 0;
                                    
                                        while ($cariTotalBobot = mysqli_fetch_array ($hasilBobot)){
                                            $totalSementara[] = $cariTotalBobot['b_nilai'];
                                            // echo "ini print r : ";
                                            // print_r($totalSementara);
                                            // echo "<br>";


                                        }
                            
                                        $totalSeluruh = array_sum($totalSementara);
                                        // echo "totalSeluruh : $totalSeluruh <br>";


                                        while ($dataVektorS = mysqli_fetch_array ($hasilLagi)){
                                            $prioritasBobot = round($dataVektorS[3] / $totalSeluruh,9);

                                            if ($dataVektorS[2] == "cost"){
                                                $bencos = -1;
                                            } else{
                                                $bencos = 1;
                                            }

                                            $bencos_Conv = $dataVektorS[3] * $bencos;
                                            $pangkat[$i] = $prioritasBobot * $bencos;

                                            $i = $i+1;  
                                        }

                                        while ($data = mysqli_fetch_array ($hasil)){
                                            $i=0;
                                            $id_siswa=$data[0];
                                            $no++;

                                            if ($data[2] < 999999) {
                                                $kon_penghasilan_ortu = 1;
                                            } elseif($data[2] >= 1000000 && $data[2] <= 1999999){
                                                $kon_penghasilan_ortu = 2;
                                            } elseif($data[2] >= 2000000 && $data[2] <= 2999999){
                                                $kon_penghasilan_ortu = 3;
                                            } elseif($data[2] >= 3000000 && $data[2] <= 3999999){
                                                $kon_penghasilan_ortu = 4;
                                            } elseif($data[2] >= 4000000){
                                                $kon_penghasilan_ortu = 5;
                                            }

                                            if ($data[3] == "1 Anak") {
                                                $kon_tanggungan_ortu = 1;
                                            } elseif($data[3] == "2 Anak"){
                                                $kon_tanggungan_ortu = 2;
                                            } elseif($data[3] == "3 Anak") {
                                                $kon_tanggungan_ortu = 3;
                                            } elseif($data[3] == "4 Anak"){
                                                $kon_tanggungan_ortu = 4;
                                            } elseif($data[3] == ">= 5 Anak") {
                                                $kon_tanggungan_ortu = 5;
                                            }

                                            if ($data[4] == "Tidak pernah alpa") {
                                                $kon_absensi = 1;
                                            } elseif($data[4] == 1){
                                                $kon_absensi = 2;
                                            } elseif($data[4] == 2){
                                                $kon_absensi = 3;
                                            } elseif($data[4] == 3){
                                                $kon_absensi = 4;
                                            } elseif($data[4] == "> 3"){
                                                $kon_absensi = 5;
                                            }


                                            if ($data[5] == 0 && $data[5] < 60) {
                                                $kon_nilai_raport = 1;
                                            } elseif($data[5] >= 61 && $data[5] <= 70){
                                                $kon_nilai_raport = 2;
                                            } elseif($data[5] >= 71 && $data[5] <= 80){
                                                $kon_nilai_raport = 3;
                                            } elseif($data[5] >= 81 && $data[5] <= 90){
                                                $kon_nilai_raport = 4;
                                            } elseif($data[5] >= 91){
                                                $kon_nilai_raport = 5;
                                            }

                                            if ($data[6] == "Sangat Kurang") {
                                                $kon_kepribadian = 1;
                                            } elseif($data[6] == "Kurang"){
                                                $kon_kepribadian = 2;
                                            } elseif($data[6] == "Cukup"){
                                                $kon_kepribadian = 3;
                                            } elseif($data[6] == "Baik"){
                                                $kon_kepribadian = 4;
                                            } elseif($data[6] == "Sangat Baik"){
                                                $kon_kepribadian = 5;
                                            }

                                            if ($data[7] == "Sangat Kurang") {
                                                $kon_kondisi_rumah = 1;
                                            } elseif($data[7] == "Kurang"){
                                                $kon_kondisi_rumah = 2;
                                            } elseif($data[7] == "Cukup"){
                                                $kon_kondisi_rumah = 3;
                                            } elseif($data[7] == "Baik"){
                                                $kon_kondisi_rumah = 4;
                                            } elseif($data[7] == "Sangat Baik"){
                                                $kon_kondisi_rumah = 5;
                                            }

                                            //vektor s
                                            $vektorS_penghasilan =  round(pow($kon_penghasilan_ortu, $pangkat[0]),9);
                                            $vektorS_tanggungan =  round(pow($kon_tanggungan_ortu, $pangkat[1]), 9);
                                            $vektorS_absensi =  round(pow($kon_absensi, $pangkat[2]),9);
                                            $vektorS_nilai =  round(pow($kon_nilai_raport, $pangkat[3]),9);
                                            $vektorS_kepribadian =  round(pow($kon_kepribadian, $pangkat[4]),9);
                                            $vektorS_rumah =  round(pow($kon_kondisi_rumah, $pangkat[5]),9);
                                            $vektorS_tes =  pow(4,-0.227272727272727);

                                            $vektorS_obj = $vektorS_penghasilan * $vektorS_tanggungan * $vektorS_absensi * $vektorS_nilai * $vektorS_kepribadian * $vektorS_rumah;
                                            $vektorS_obj_Array[] = $vektorS_penghasilan * $vektorS_tanggungan * $vektorS_absensi * $vektorS_nilai * $vektorS_kepribadian * $vektorS_rumah;

                                            $i = $i++;

                                            // echo "<br> vektorS_penghasilan : $vektorS_penghasilan <br> ";
                                            // echo "vektorS_tanggungan : $vektorS_tanggungan <br> ";
                                            // echo "vektorS_all : $vektorS_all <br> ";
                                            // echo "kon_penghasilan_ortu : $kon_penghasilan_ortu pangkat dengan $pangkat[0]<br> ";
                                            // echo "kon_tanggungan_ortu : $kon_tanggungan_ortu pangkat dengan $pangkat[1]<br> ";
                                            // echo "vektorS_rumah : $vektorS_rumah pangkat dengan $pangkat[5]<br> ";
                                            // echo "vektorS_tes : $vektorS_tes <br> ";
                                            // echo "";

                                            
                                            //end vektor s

                                            $nama_siswa=$data[9]." | ".$data[8];

                                            echo "      
                                            <tr>  
                                            <td>".$no."</td>
                                            <td>".$nama_siswa."</td>
                                            <td>".$kon_penghasilan_ortu."</td>  
                                            <td>".$kon_tanggungan_ortu."</td>
                                            <td>".$kon_absensi."</td>
                                            <td>".$kon_nilai_raport."</td>
                                            <td>".$kon_kepribadian."</td>
                                            <td>".$kon_kondisi_rumah."</td>
                                            <td>".$vektorS_obj."</td>
                                            </tr>";

                                            $id_siswa_Array[]=$id_siswa;
                                            $kon_penghasilan_ortu_Array[]=$kon_penghasilan_ortu;
                                            $kon_tanggungan_ortu_Array[]=$kon_tanggungan_ortu;
                                            $kon_absensi_Array[]=$kon_absensi;
                                            $kon_nilai_raport_Array[]=$kon_nilai_raport;
                                            $kon_kepribadian_Array[]=$kon_kepribadian;
                                            $kon_kondisi_rumah_Array[]=$kon_kondisi_rumah;

                                        }

                                        $vektorS_sum = array_sum($vektorS_obj_Array);
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br>

                        <div class="card-header py-3">
                            <center>
                                <h6 class="m-0 font-weight-bold text-primary">Vektor V</h6>
                                <p>Menghitung nilai Vektor V</p>
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>N0</th>
                                        <th>Nama Siswa</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                        <th>C6</th>
                                        <th>Nilai Vektor V</th>
                                        </tr>
                                    </thead>
                                    <tbody name="setVektorV" method="POST">
                                    <?php
                                        $queriNis="Select * From hasil";
                                        $hasilNis=mysqli_query ($koneksi,$queriNis); 
                                        while ($dataNis = mysqli_fetch_array ($hasilNis)){
                                            $dataNisHasil = $dataNis[1];
                                            //  echo "dataNisHasil : $dataNisHasil <br>";
                                            $dataNisHasil2[] = $dataNisHasil;
                                        }
                                        
                                        // echo "testing <br>";
                                        // print_r($dataNisHasil[$i]);


                                        $queri="SELECT penilaian.*, siswa.nis, siswa.nama FROM penilaian INNER JOIN siswa ON penilaian.id_siswa=siswa.id order by penilaian.id asc";
                                        // $queri="SELECT penilaian.*, siswa.nis, siswa.nama, hasil.nis FROM penilaian, siswa, hasil WHERE penilaian.id_siswa=siswa.id AND siswa.id=hasil.id";
                                        $hasil=mysqli_query ($koneksi,$queri); 
                                        $no=0;
                                        $i=0;


                                        while ($data = mysqli_fetch_array ($hasil)){
                                        $no++;

                                        $vektorV_all = $vektorS_obj_Array[$i]/$vektorS_sum;
                                        // $kon_penghasilan_ortu_encode = json_encode($kon_penghasilan_ortu_Array);
                                        // echo "kon_penghasilan_ortu_encode : $kon_penghasilan_ortu_encode <br>";


                                        $nama_siswa=$data[9]." | ".$data[8];

                                        // echo "<br> vektorS_penghasilan : $vektorS_penghasilan <br> ";
                                        // echo "vektorS_tanggungan : $vektorS_tanggungan <br> ";
                                        // echo "vektorS_all : $vektorS_all <br> ";
                                        // echo "kon_penghasilan_ortu : $kon_penghasilan_ortu pangkat dengan $pangkat[0]<br> ";
                                        // echo "<br>vektorS_obj : $vektorS_obj_Array[$i] bagi dengan $vektorS_sum<br> ";
                                        // echo "vektorV_all : $vektorV_all <br> ";
                                        // echo "vektorS_sum : $vektorS_sum <br> ";

                                        echo "      
                                        <tr>  
                                        <td>".$no."</td>
                                        <td>".$nama_siswa."</td>
                                        <td>".$kon_penghasilan_ortu_Array[$i]."</td>  
                                        <td>".$kon_tanggungan_ortu_Array[$i]."</td>
                                        <td>".$kon_absensi_Array[$i]."</td>
                                        <td>".$kon_nilai_raport_Array[$i]."</td>
                                        <td>".$kon_kepribadian_Array[$i]."</td>
                                        <td>".$kon_kondisi_rumah_Array[$i]."</td>
                                        <td>".$vektorV_all."</td>
                                        </tr>";

                                        $i = $i + 1;
                                        $nama = $data[8];
                                        $nis = $data[9];


                                        // mysqli_query($koneksi," INSERT INTO hasil VALUES('$nama','$nis','$vektorV_all')");

                                            // if($data[8] != $dataNisHasil2 ){
                                                mysqli_query($koneksi," INSERT INTO hasil (nis, nama, total) VALUES('$data[8]','$data[9]','$vektorV_all')");
                                            // } else{
                                            //     mysqli_query($koneksi,"UPDATE hasil SET nis='$data[8]', nama='$data[9]', total='$vektorV_all' WHERE nis='$data[8]'");
                                            // }

                                            // echo "<br>data ke8 : $data[8] data nis : $dataNisHasil2[$i]";
                                            // print_r($dataNisHasil2);
                                            // echo "<br><br>";


                                            // echo "kon_penghasilan_ortu_Array : <br>";
                                            // print_r($kon_penghasilan_ortu_Array);

                                        }

                                    ?>
                                    </tbody>
                                </table>
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

</body>

</html>