<?php
include('conect.php');
$query="DELETE from user where id='".$_GET['id']."'";
mysqli_query($koneksi, $query);
header("location:data-user.php");
?>