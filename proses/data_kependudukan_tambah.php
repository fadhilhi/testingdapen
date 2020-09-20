<?php 
	include '../konfig/koneksi.php';
	// ambil data yang sudah diinput
	if (isset($_POST['simpan'])) {

		$nokk = $_POST["nokk"];
		$nik = $_POST["nik"];
		$nama = $_POST["nama"];
		$hubkel = $_POST["hubkel"];
		$nort = $_POST["nort"];
		$tgl = date('Y-m-d H:i:s');

		// simpan ke database
		$simpan = $conn->query("INSERT INTO data_penduduk 
			(no_kk,nik,nama_lengkap,id_stat_hbkel,no_rt,tanggal_create,tanggal_update) 
			VALUES 
			('".$nokk."','".$nik."','".$nama."','".$hubkel."','".$nort."','".$tgl."','".$tgl."')");
				if ($simpan) {
					// jika berhasil munculkan notifikasi dan alihkan ke halaman Data Penduduk
					echo "<script>
					alert('Data Berhasil Ditambahkan!')
					window.location.href='../?menu=data_kependudukan';</script>";
				}else{
					// jika gagal munculkan notifikasi dan alihkan ke halaman Data Penduduk
					echo "<script>
					alert('Data Gagal Ditambahkan!')
					window.location.href='../?menu=data_kependudukan';</script>";
				}

	}
?>