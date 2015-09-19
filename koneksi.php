<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host="localhost";
$user="root";
$password="";
$database="u480769354_topsi";

$koneksi=mysql_connect($host,$user,$password);
mysql_select_db($database,$koneksi);
if($koneksi){
	//echo "berhasil koneksi";
}else{
	echo "gagal koneksi";
}

?>