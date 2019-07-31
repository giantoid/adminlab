<?php


/* 
-- -----------------------------------------------------------
-- -----------------------------------------------------------
-- Nama File 	: autonumber.php  							--
-- Author    	: Gianto 							--
-- Website   	: https://sifirman.com						--
-- Call		 	: 081328066333								--
-- Copyright [c] 2018 Gianto. All right reserved.	--
-- -----------------------------------------------------------
-- -----------------------------------------------------------
*/


error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));



include "tanggal.php";
$konek 		= mysqli_connect("localhost", "geente", "*Geente1908", "db_labkom");


if (mysqli_connect_errno()) {
	echo 'Gagal melakukan koneksi ke Database : ' . mysqli_connect_error();
} else { }


include "autonumber.php";
require "enkrip.php";

$firex = new FirexGanteng;

function youtube($url)
{
	$value 		= explode("v=", $url);
	$data 		= $value[1];
	$imgurl		= "https://img.youtube.com/vi/" . $data . "/hqdefault.jpg";
	return $imgurl;
}

function enkrip($stringxxxx22, $actionxxxx22 = 'e')
{

	$secret_keyxxx22 	= 'FIREX-2018-12-01';
	$secret_ivxxx22 	= 'FIREX-SECRET-CODE-JUDUL';

	$outputxxxxx22 	= false;
	$methodxxxx22 	= "AES-256-CBC";
	$keyxxxxx22 = hash('sha256', $secret_keyxxx22);
	$ivxxxx22 = substr(hash('sha256', $secret_ivxxx22), 0, 16);

	if ($actionxxxx22 == 'e') {
		$outputxxxxx22 = base64_encode(openssl_encrypt($stringxxxx22, $methodxxxx22, $keyxxxxx22, 0, $ivxxxx22));
	} else if ($actionxxxx22 == 'd') {
		$outputxxxxx22 = openssl_decrypt(base64_decode($stringxxxx22), $methodxxxx22, $keyxxxxx22, 0, $ivxxxx22);
	}

	return $outputxxxxx22;
}


$recaptcha_site_key 	= '6LdcPTMUAAAAALKqb3qsE8bWKNadr6ih3Zq9B8sw';
$recaptcha_secret_key 	= '6LdcPTMUAAAAADj5JcDrzlLhggc8msyQ5Far9wzw';

$mapapi					= "AIzaSyD0O1DkiE6jMs_m-goJrUKiqeWFDuuL4Ac";

// Function to get the client IP address
function get_client_ip()
{
	$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP'))
		$ipaddress = getenv('HTTP_CLIENT_IP');
	else if (getenv('HTTP_X_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	else if (getenv('HTTP_X_FORWARDED'))
		$ipaddress = getenv('HTTP_X_FORWARDED');
	else if (getenv('HTTP_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	else if (getenv('HTTP_FORWARDED'))
		$ipaddress = getenv('HTTP_FORWARDED');
	else if (getenv('REMOTE_ADDR'))
		$ipaddress = getenv('REMOTE_ADDR');
	else
		$ipaddress = 'UNKNOWN';
	return $ipaddress;
}





function antixss($data)
{
	// Fix &entity\n;
	$data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $data);
	$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
	$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
	$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

	// Remove any attribute starting with "on" or xmlns
	$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

	// Remove javascript: and vbscript: protocols
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

	// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

	// Remove namespaced elements (we do not need them)
	$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

	do {
		// Remove really unwanted tags
		$old_data = $data;
		$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
	} while ($old_data !== $data);

	// we are done...
	return $data;
}



function tgl_indo($tunggulin)
{
	$belendung = array(
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkandong = explode('-', $tunggulin);

	// variabel pecahkandong 0 = tanggal
	// variabel pecahkandong 1 = bulan
	// variabel pecahkandong 2 = tahun

	return $pecahkandong[2] . ' ' . $belendung[(int) $pecahkandong[1]] . ' ' . $pecahkandong[0];
}

function hari_indo($tunggulin)
{
	$hari_indo = array(
		'Sun' => 'Minggu',
		'Mon' => 'Senin',
		'Tue' => 'Selasa',
		'Wed' => 'Rabu',
		'Thu' => 'Kamis',
		'Fri' => 'Jumat',
		'Sat' => 'Sabtu'
	);
	$namahari = date('D', strtotime($tunggulin));
	return $hari_indo[$namahari];
}


//Kebutuhan Nomor Surat
function tgl_romawi($tunggulin)
{
	$belendung = array(
		1 =>   'I',
		'II',
		'III',
		'IV',
		'V',
		'VI',
		'VII',
		'VIII',
		'IX',
		'X',
		'XI',
		'XII'
	);
	$pecahkandong = explode('-', $tunggulin);

	// variabel pecahkandong 0 = tanggal
	// variabel pecahkandong 1 = bulan
	// variabel pecahkandong 2 = tahun

	return $belendung[(int) $pecahkandong[1]] . '/' . $pecahkandong[0];
}

function rupiah($galonterbang)
{
	$arfannangis = number_format($galonterbang, 0, ',', '.');
	return $arfannangis;
}

$menu	= trim($_GET['menu_hot']);
$id1	= trim($_GET['firhot1']);
$id2	= trim($_GET['firhot2']);
$id3	= trim($_GET['firhot3']);
$id4	= trim($_GET['firhot4']);
$id5	= trim($_GET['firhot5']);
$id6	= trim($_GET['firhot6']);
$id7	= trim($_GET['firhot7']);


$docroot 	= "http://192.168.100.25/adminlab/android/";
$docandro	= "http://192.168.100.25/adminlab/android/";
$judulweb	= "Universitas Abdurrab";
$judulweb2	= "Fakultas Teknik";
$nm_kelor	= "Teknik Informatika";

include "current_url.php";
