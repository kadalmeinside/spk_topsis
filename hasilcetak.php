<?php 
include "koneksi.php";
?>
<html>
<Title>Laporan Penjurusan Siswa</title>
<head>
<style type="text/css">@import url(css/reset.css);</style>
    <style type="text/css">@import url(css/style.css);</style> 
	<LINK rel="stylesheet" type="text/css" href="css/print.css" media="print">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> <!--jQuery-->
	
	<!-- sweetAlert -->
	<script src="lib/sweet-alert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="lib/sweet-alert.css">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
</head>
<body onLoad="window.print();">
<font size='3'>
<div class="container">
<?php
/// koneksi database 
require_once("data_siswa/prosesseleksi.php");

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
					<div class="tab-pane fade in active" id="hasil">
						<div class="panel-body">
							<div class="table-responsive">
								<table cellpadding=5>
									<thead>
										<tr class='active'>
											<th>No </th>
											<th>NIS </th>
											<th>Nama Siswa </th>
											<th>fisika </th>
											<th>mtk</th>
											<th>B. Ingg </th>
											<th>Geo </th>
											<th>Eko </th>
											<th>B. Ind</th>
											<th>Skor</th>
											<th>Jurusan</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while ($row = mysql_fetch_object($query)) {
											if ($no<40){
												$trhead='success';
											}
											else{
												$trhead='';
											}
											?>
											<tr class="<?php echo $trhead; ?>">
												<td><?php echo "$no."; ?></td>
												<td><?php echo $row->nis ?></td>
												<td><?php echo $row->nama_siswa ?></td>
												<td><?php echo $row->fisika ?></td>
												<td><?php echo $row->matematika ?></td>
												<td><?php echo $row->b_inggris ?></td>
												<td><?php echo $row->geografi ?></td>
												<td><?php echo $row->ekonomi ?></td>
												<td><?php echo $row->b_indonesia ?></td>
												<td><?php echo round($row->total, 4) ?></td>
												<td><?php  ?></td>
											</tr>
											<?php
											$no++;
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- /.panel-body -->
		</div>
	</div>
</div>
</font>
</body>
</html>

	