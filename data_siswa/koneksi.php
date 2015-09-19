<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host="mysql.idhostinger.com";
$user="u480769354_topsi";
$password="0217398024";
$database="u480769354_topsi";

$koneksi=mysql_connect($host,$user,$password);
mysql_select_db($database,$koneksi);
if($koneksi){
	//echo "berhasil koneksi";
}else{
	echo "gagal koneksi";
}

?>