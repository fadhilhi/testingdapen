<?php
	// kondisi untuk mengalihkan ke halaman dashboard
if(isset($_GET["menu"]) AND ($_GET["menu"]=="beranda")){
	include "halaman/dashboard.php";
}
	// alhkan halaman data penduduk
	elseif(isset($_GET["menu"]) AND ($_GET["menu"]=="data_kependudukan")){
	include "halaman/data_kependudukan.php";
}
	// alihkan Halaman Edit data penduduk
	elseif(isset($_GET["menu"]) AND ($_GET["menu"]=="data_kependudukan_edit_halaman")){
	include "halaman/data_kependudukan_edit.php";
}
	// alihkan Edit data penduduk
	elseif(isset($_GET["menu"]) AND ($_GET["menu"]=="data_kependudukan_edit")){
	include "proses/data_kependudukan_edit.php";
}
	// alihkan hapus data penduduk
	elseif(isset($_GET["menu"]) AND ($_GET["menu"]=="data_kependudukan_hapus")){
	include "proses/data_kependudukan_hapus.php";
}
	// kondisi untuk mengalihkan ke halaman dashboard jika halaman yang dicari tidak ada
else {
	include	"halaman/dashboard.php";
}


?>