<?php
/**
 *  
 */
if(!empty($_GET['id'])){
	$id=$_GET['id'];

	$pesan= new PesanController;
	$result= $pesan->Delete($id); 

	if($result){
		echo"<script>
			alert('Data Berhasil Dihapus');
			document.location= '../?hal=daftar_pesanan';
		</script>
		";
	}

}

class PesanController
{

	public function Add($params){
		global $connect;

		
		foreach ($params[4] as $key => $value) {
			$arrLayanan[] = $key;	
		}

		$layanan = implode('|', $arrLayanan);

		$queryAdd = "
		INSERT INTO 
			`pesanan`
		SET
			`id` = null
			, `nama_pemesanan` = '$params[0]'
			, `no_hp` = '$params[1]'
			, `tanggal` = '$params[2]'
			, `waktu_pelaksanaan` = '$params[3]'
			, `pelayanan` = '$layanan'
			, `jumlah` = '$params[5]'
			, `harga_paket` = '$params[6]'
			, `jumlah_tagihan` = '$params[7]'
		";
		$result = $connect->query($queryAdd);

		return $result;
	}

	public function View(){
		global $connect;

		$query="select * from pesanan";
		$result = $connect->query($query);

        return $result;     
	}

	public function Delete($id){
		include "../koneksi.php";

		$query = "Delete from pesanan where id='$id'";

		$result= $connect->query($query);
		return $result;
	}

	public function Update($params){
		global $connect;
	
		foreach ($params[4] as $key => $value) {
			$arrLayanan[] = $key;	
		}

		$layanan = implode('|', $arrLayanan);

		$queryAdd = "
		UPDATE 
			`pesanan`
		SET
			`nama_pemesanan` = '$params[0]'
			, `no_hp` = '$params[1]'
			, `tanggal` = '$params[2]'
			, `waktu_pelaksanaan` = '$params[3]'
			, `pelayanan` = '$layanan'
			, `jumlah` = '$params[5]'
			, `harga_paket` = '$params[6]'
			, `jumlah_tagihan` = '$params[7]'
		WHERE 
			id = '$params[8]'
		";

		$result = $connect->query($queryAdd);

		return $result;
	}
}


?>