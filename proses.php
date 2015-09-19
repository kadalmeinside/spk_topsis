
<?php
include "koneksi.php";
//inisialisasi 
$id=$_POST['id'];
$fisika=$_POST['fisika'];
$mtk=$_POST['matematika'];
$bing=$_POST['b_inggris'];
$geo=$_POST['geografi'];
$eko=$_POST['ekonomi'];
$bindo=$_POST['b_indonesia'];


//masukan ke databse nilai
if (isset($_POST['Simpan'])) {
mysql_query("
        INSERT INTO nilai(`nis`,`fisika`,`matematika`,`b_inggris`,`geografi`,`ekonomi`,`b_indonesia`,`total`) 
        VALUES('$id','$fisika','$mtk','$bing','$geo','$eko','$bindo','0')
		") or die(mysql_error());

echo "<script language='javascript'>window.location='index.php?mod=data_siswa&func=view&nis=$id'</script>";
}
else{}

if (isset($_POST['Update'])) {
    mysql_query("
        UPDATE nilai
		SET `nis`='$id',`fisika`='$fisika',`matematika`='$mtk',`b_inggris`='$bing',`geografi`='$geo',`ekonomi`='$eko',`b_indonesia`='$bindo',`total`='0'
        WHERE nis='$id'
     ") or die(mysql_error());
    echo "<script language='javascript'>window.location = 'index.php?mod=data_siswa&func=view&nis=$id'</script>";
}
else {}
?>

