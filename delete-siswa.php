<?php
include('conect.php');
$query="DELETE from siswa where id='".$_GET['id']."'";
mysqli_query($koneksi, $query);
header("location:data-siswa.php");
?>