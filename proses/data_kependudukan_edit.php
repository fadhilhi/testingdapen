<?php 
	include 'konfig/koneksi.php';
	// ambil data yang sudah diinput
	if (isset($_POST['rubah'])) {

		$nokk = $_POST["nokk"];
		$nik = $_POST["nik"];
		$nama = $_POST["nama"];
		$hubkel = $_POST["hubkel"];
		$nort = $_POST["nort"];
		$tgl = date('Y-m-d H:i:s');

		// ubah dan simpan ke database
		$rubah = $conn->query("UPDATE data_penduduk SET no_kk = '".$nokk."', nik = '".$nik."', nama_lengkap = '".$nama."', id_stat_hbkel = '".$hubkel."', no_rt = '".$nort."', tanggal_update = '".$tgl."'  WHERE nik = '".$_GET['id']."'");

			if ($rubah) {
				// jika berhasil munculkan notifikasi dan alihkan ke halaman Data Penduduk
				echo "<script>
				alert('Data Berhasil Dirubah')
				window.location.href='?menu=data_kependudukan';</script>";
			}else{
				// jika gagal munculkan notifikasi dan alihkan ke halaman Data Penduduk
				echo "<script>
				alert('Data Gagal Dirubah!')
				window.location.href='?menu=data_kependudukan';</script>";
			}
	}
?>