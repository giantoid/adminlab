<?php
// Load file koneksi.php
include "../conf/config.php";

if(isset($_POST['provinsi'])){
	// Ambil data ID Provinsi yang dikirim via ajax post
	$id_provinsi = $_POST['provinsi'];

	// Buat query untuk menampilkan data kota dengan provinsi tertentu (sesuai yang dipilih user pada form)
	$sqldor = mysqli_query($konek, "SELECT * FROM kabupaten WHERE id_propinsi = '".$id_provinsi."' ORDER BY nm_kabupaten");

	// Buat variabel untuk menampung tag-tag option nya
	// Set defaultnya dengan tag option Pilih
	$html = "<option value=''>Pilih Kabupaten/Kota</option>";

	while($dataxxx = mysqli_fetch_array($sqldor)){ // Ambil semua data dari hasil eksekusi $sql
		$html .= "<option value='".$dataxxx['id_kabupaten']."'>".$dataxxx['nm_kabupaten']."</option>"; // Tambahkan tag option ke variabel $html
	}

	$callback = array('data_kota'=>$html); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota

	echo json_encode($callback); // konversi varibael $callback menjadi JSON
	
	
	
}else if(isset($_POST['kabupaten'])){
	// Ambil data ID Provinsi yang dikirim via ajax post
	$id_kabupaten = $_POST['kabupaten'];

	// Buat query untuk menampilkan data kota dengan provinsi tertentu (sesuai yang dipilih user pada form)
	$sqldor2 = mysqli_query($konek, "SELECT * FROM kecamatan WHERE id_kabupaten = '".$id_kabupaten."' ORDER BY nm_kecamatan");

	// Buat variabel untuk menampung tag-tag option nya
	// Set defaultnya dengan tag option Pilih
	$html2 = "<option value=''>Pilih Kecamatan</option>";

	while($dataxxx2 = mysqli_fetch_array($sqldor2)){ // Ambil semua data dari hasil eksekusi $sql
		$html2 .= "<option value='".$dataxxx2['id_kecamatan']."'>".$dataxxx2['nm_kecamatan']."</option>"; // Tambahkan tag option ke variabel $html
	}

	$callback2 = array('data_kecamatan'=>$html2); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota

	echo json_encode($callback2); // konversi varibael $callback menjadi JSON
	
	
}else if(isset($_POST['kecamatan'])){
	// Ambil data ID Provinsi yang dikirim via ajax post
	$id_kecamatan = $_POST['kecamatan'];

	// Buat query untuk menampilkan data kota dengan provinsi tertentu (sesuai yang dipilih user pada form)
	$sqldor3 = mysqli_query($konek, "SELECT * FROM kelurahan WHERE id_kecamatan = '".$id_kecamatan."' ORDER BY nm_kelurahan");

	// Buat variabel untuk menampung tag-tag option nya
	// Set defaultnya dengan tag option Pilih
	$html3 = "<option value=''>Pilih Kelurahan</option>";

	while($dataxxx3 = mysqli_fetch_array($sqldor3)){ // Ambil semua data dari hasil eksekusi $sql
		$html3 .= "<option value='".$dataxxx3['id_kelurahan']."'>".$dataxxx3['nm_kelurahan']."</option>"; // Tambahkan tag option ke variabel $html
	}

	$callback3 = array('data_kelurahan'=>$html3); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota

	echo json_encode($callback3); // konversi varibael $callback menjadi JSON
}else if(isset($_POST['id_jenis'])){
	// Ambil data ID Provinsi yang dikirim via ajax post
	$id_jenis = $_POST['id_jenis'];

	// Buat query untuk menampilkan data kota dengan provinsi tertentu (sesuai yang dipilih user pada form)
	$sqldor4 = mysqli_query($konek, "SELECT * FROM jenjang WHERE id_jenis = '".$id_jenis."' ORDER BY urutan");

	// Buat variabel untuk menampung tag-tag option nya
	// Set defaultnya dengan tag option Pilih
	$html4 = "<option value=''> - Pilih Jenjang - </option>";

	while($dataxxx4 = mysqli_fetch_array($sqldor4)){ // Ambil semua data dari hasil eksekusi $sql
		$html4 .= "<option value='".$dataxxx4['id_jenjang']."'>".$dataxxx4['nm_jenjang']."</option>"; // Tambahkan tag option ke variabel $html
	}

	$callback4 = array('data_jenjang'=>$html4); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota

	echo json_encode($callback4); // konversi varibael $callback menjadi JSON
}
?>
