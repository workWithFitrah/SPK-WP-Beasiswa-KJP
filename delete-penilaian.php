<?php
include('conect.php');
$query="DELETE from penilaian where id='".$_GET['id']."'";
mysqli_query($koneksi, $query);
header("location:data-penilaian.php");
?>