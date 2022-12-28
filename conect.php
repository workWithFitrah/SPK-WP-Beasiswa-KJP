<?php    
  $host = 'localhost';  
  $user = 'root';        
  $password = '';        
  $database = 'db_spkbeasiswakjp';    
      
  $koneksi = mysqli_connect($host, $user, $password, $database);      

  // Check connection
if (mysqli_connect_errno()){
	echo "Koneksi gagal " . mysqli_connect_error();
}

?>