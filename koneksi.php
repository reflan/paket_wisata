<?php
    $host = "localhost:3307";
    $user   = "root";
    $pass   = "";
    $db     = "db_pariwisata";

    $connect = mysqli_connect($host, $user, $pass, $db);

   	if(!$connect){
   		echo "Database tidak terhubung";
   	}else{
   		// echo "Database terhubung";
   	}


?>