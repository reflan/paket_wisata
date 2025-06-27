<?php 
	include 'layouts/top.php';

	@$page=$_REQUEST['hal'];
	if($page == ''){
		include "views/home.php";
	}else if($page == 'pesan'){
		include "views/pesan.php";
	} if($page == 'daftar_pesanan'){
		include "views/daftarPesanan.php";
	}

	include 'layouts/bottom.php';
?>