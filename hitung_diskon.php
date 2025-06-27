<h3>BELANJA</h3>
<form action="" method="POST">
	<label for="belanja">Total Belanja</label>
	<input type="text" name="total">
	<input type="submit" value="Submit" name="submit">

</form>
<?php
if (isset($_POST['submit']))
{
	$totalbelanja = $_POST['total'];;
	
	function hitungdiskon($totalbelanja)
	{
		if ($totalbelanja >= 100000)
		{
			$diskon = 0.1 * $totalbelanja;
		}elseif (($totalbelanja >= 50000) && ($totalbelanja < 100000))
		{
			$diskon = 0.05 * $totalbelanja;
		}else
		{
			$diskon=0;
		}
	echo "Total belanja Rp. ".$totalbelanja."<br/>";
	echo "Diskon Rp. ".$diskon."<br/>";
	echo "Total yang harus dibayar Rp. ".($totalbelanja-$diskon);
	} 
	$diskon = hitungdiskon($totalbelanja);
}
?>