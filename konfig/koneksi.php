<?php 
$conn = new mysqli('localhost','root','','db_penduduk');
if (mysqli_connect_errno())
{
	echo "KONEKSI GAGAL" . mysqli_connect_error();
}
?>