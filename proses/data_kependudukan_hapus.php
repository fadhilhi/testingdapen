<?php
	include 'konfig/koneksi.php';
	// ambil data dengan id yang dipilih dan hapus 
	if (isset($_GET['id'])) {
		$nik = $_GET['id'];
		$hapusdata = $conn->query("DELETE FROM data_penduduk WHERE nik = '".$nik."'");
		if($hapusdata){
			// jika berhasil munculkan notif dan alihkan ke Halaman Data Penduduk
			echo "<script>
                        alert('Data Berhasil Di Hapus !')
                        window.location.href='?menu=data_kependudukan'; </script>";
		}else{
			// jika gagal munculkan notif dan alihkan ke Halaman Data Penduduk
			echo "<script>
                        alert('Data Gagal Di Hapus !')
                        window.location.href='?menu=data_kependudukan'; </script>";
		}
	}else{
		// jika belum memilih data, munculkan notif dan alihkan ke halaman sebelumnya
		echo "<script>alert('Anda Belum memilih data !');history.go(-1);</script>";
	}
?>