<?php
$tglauto	= date("y.md");
$blnauto	= date("ym");
$thnauto	= date("y");

$romatahun	= date("Y");
$romawi		= tgl_romawi(date('Y-m-d'));
/* 
-- -----------------------------------------------------------
-- -----------------------------------------------------------
-- Nama File 	: autonumber.php  							--
-- Author    	: Firman Santosa 							--
-- Email     	: admin@sifirman.com						--
-- Website   	: https://sifirman.com						--
-- Call		 	: 08121858819								--
-- Started on	: Sabtu, 01 Desember 2018, 10.16 WIB		--
-- Copyright [c] 2018 Firman Santosa. All right reserved.	--
-- -----------------------------------------------------------
-- -----------------------------------------------------------
*/

//AUTO PERMOHONAN
// $aa_permohonan 	= mysqli_query($konek,"SELECT MAX(RIGHT(no_permohonan, 5)) as max_id FROM permohonan WHERE MID(no_permohonan,4,6) = '$tglauto'");
// $hh_permohonan		= mysqli_num_rows($aa_permohonan);
// if($hh_permohonan > 0){
	// $xx_permohonan			= mysqli_fetch_array($aa_permohonan);
	// $id_max_permohonan		= $xx_permohonan['max_id'];
	// $sort_permohonan 		= (int) substr($id_max_permohonan, 1, 5);
	// $sort_permohonan++;
	// $new_permohonan 		= "PND".$tglauto."-".sprintf("%05s", $sort_permohonan);
// }else{
	// $new_permohonan		= "PND".$tglauto."-00001";
// }



//AUTO 
$sformate	= mysqli_query($konek,"select * from prodi where id_prodi = '1'");
$dformate	= mysqli_fetch_array($sformate);

$aa_surat 	= mysqli_query($konek,"SELECT MAX(LEFT(no_surat, 3)) as max_id FROM permohonan WHERE RIGHT(no_surat, 4) = '$romatahun'");
$hh_surat		= mysqli_num_rows($aa_surat);
if($hh_surat > 0){
	$xx_surat			= mysqli_fetch_array($aa_surat);
	$id_max_surat		= $xx_surat['max_id'];
	$sort_surat 		= (int) substr($id_max_surat, 1, 3);
	$sort_surat++;
	$new_surat 			= sprintf("%03s", $sort_surat).$dformate['format'].$romawi;
}else{
	$new_surat			= "001".$dformate['format'].$romawi;
}


//AUTO PENDUDUK
$aa_penduduk 	= mysqli_query($konek,"SELECT MAX(RIGHT(no_register, 7)) as max_id FROM penduduk WHERE LEFT(no_register,7) = '$tglauto'");
$hh_penduduk		= mysqli_num_rows($aa_penduduk);
if($hh_penduduk > 0){
	$xx_penduduk			= mysqli_fetch_array($aa_penduduk);
	$id_max_penduduk		= $xx_penduduk['max_id'];
	$sort_penduduk 		= (int) substr($id_max_penduduk, 1, 7);
	$sort_penduduk++;
	$new_penduduk 		= $tglauto.".".sprintf("%07s", $sort_penduduk);
}else{
	$new_penduduk		= $tglauto."."."0000001";
}

//AUTO PENDUDUK SEMENTARA
$aa_penduduksem 	= mysqli_query($konek,"SELECT MAX(RIGHT(no_register, 7)) as max_id FROM penduduksem WHERE MID(no_register,4,7) = '$tglauto'");
$hh_penduduksem		= mysqli_num_rows($aa_penduduksem);
if($hh_penduduksem > 0){
	$xx_penduduksem			= mysqli_fetch_array($aa_penduduksem);
	$id_max_penduduksem		= $xx_penduduksem['max_id'];
	$sort_penduduksem 		= (int) substr($id_max_penduduksem, 1, 7);
	$sort_penduduksem++;
	$new_penduduksem 		= "PS.".$tglauto.".".sprintf("%07s", $sort_penduduksem);
}else{
	$new_penduduksem		= "PS.".$tglauto."."."0000001";
}

//AUTO MUTASI
$aa_mutasi 	= mysqli_query($konek,"SELECT MAX(RIGHT(no_mutasi, 7)) as max_id FROM mutasi WHERE MID(no_mutasi,4,7) = '$tglauto'");
$hh_mutasi		= mysqli_num_rows($aa_mutasi);
if($hh_mutasi > 0){
	$xx_mutasi			= mysqli_fetch_array($aa_mutasi);
	$id_max_mutasi		= $xx_mutasi['max_id'];
	$sort_mutasi 		= (int) substr($id_max_mutasi, 1, 7);
	$sort_mutasi++;
	$new_mutasi 		= "MP.".$tglauto.".".sprintf("%07s", $sort_mutasi);
}else{
	$new_mutasi		= "MP.".$tglauto."."."0000001";
}

	  
	  
//AUTO KELURAHAN
$sfor_kelurahan	= mysqli_query($konek,"SELECT MAX(RIGHT(id_kelurahan,3)) AS daleman FROM kelurahan WHERE LEFT(id_kelurahan,7) = '1402010'");
$hfor_kelurahan	= mysqli_num_rows($sfor_kelurahan);
if($hfor_kelurahan > 0){
	$xx_kelurahan		= mysqli_fetch_array($sfor_kelurahan);
	$id_max_kelurahan	= $xx_kelurahan['daleman'];
	$sort_kelurahan 	= (int) substr($id_max_kelurahan, 1, 3);
	$sort_kelurahan++;
	$new_kelurahan 		= "1402010".sprintf("%03s", $sort_kelurahan);
}else{
	$new_kelurahan		= "1402010001";
}


$sformate	= mysqli_query($konek,"select * from prodi where id_prodi = '1'");
$dformate	= mysqli_fetch_array($sformate);

$aa_surat 	= mysqli_query($konek,"SELECT MAX(LEFT(no_surat, 3)) as max_id FROM permohonan WHERE RIGHT(no_surat, 4) = '$romatahun'");
$hh_surat		= mysqli_num_rows($aa_surat);
if($hh_surat > 0){
	$xx_surat			= mysqli_fetch_array($aa_surat);
	$id_max_surat		= $xx_surat['max_id'];
	$sort_surat 		= (int) substr($id_max_surat, 1, 3);
	$sort_surat++;
	$new_surat 			= sprintf("%03s", $sort_surat).$dformate['format'].$romawi;
}else{
	$new_surat			= "001".$dformate['format'].$romawi;
}

?>