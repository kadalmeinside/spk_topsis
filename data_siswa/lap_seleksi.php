<?php
/// koneksi database 
require_once("seleksi.php");

$query = mysql_query("
SELECT siswa.nis, siswa.nama_siswa,
		nilai.fisika,nilai.matematika,nilai.b_inggris,nilai.geografi,nilai.ekonomi,nilai.b_indonesia, nilai.total
FROM siswa, nilai
WHERE 
siswa.nis=nilai.nis
ORDER BY total desc;
 ") or die(mysql_error());
 $no=1;
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Data Siswa </h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div style="float:right">
					<a href="#"><button class='btn btn-outline btn-primary'><i class='fa fa-download'> </i> Export to PDF</button></a>
					<a href="hasilcetak.php" target="_blank"><button class='btn btn-outline btn-primary'><i class='fa fa-print'> </i> Print</button></a>
				</div>
				<h4>Hasil Selesksi Jurusan</h4>
				
			</div>
			
			<div class="panel-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#hasil" data-toggle="tab">hasil</a>
					</li>
					
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane fade" id="hasil">
						<?php include "data_siswa/seleksi.php"; ?>
					</div>
				</div>
			</div>
            <!-- /.panel-body -->
		</div>
	</div>
</div>


	