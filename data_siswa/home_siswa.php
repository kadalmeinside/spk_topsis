<?php
/// koneksi database 

$x = 0;

$query = mysql_query("
SELECT * FROM siswa ORDER BY `nis` DESC ;
 ") or die(mysql_error());
$no = $x + 1;
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
				<a href="#" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user" title="add"></i>Tambah Siswa</a>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No </th>
								<th>Nama Siswa </th>
								<th>Nis </th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							while ($row = mysql_fetch_object($query)) {
								?>
								<tr>
									<td><?php echo "$no."; ?></td>
									<td><?php echo $row->nama_siswa ?></td>
									<td><?php echo $row->nis ?></td>
									<td>
										<ul class="dropdown">
											<a class="dropdown-toggle" data-toggle="dropdown" href="#">
												<i class="fa fa-edit fa-fw"></i><i class="fa fa-caret-down"></i>
											</a>
											<ul class="dropdown-menu">
												<li></li>
												<li><a href="index.php?mod=data_siswa&func=view&nis=<?php echo $row->nis ?>"><i class='fa fa-file-image-o' title="Details"></i>View</a></li>
												<li><a href="index.php?mod=data_siswa&func=update&nis=<?php echo $row->nis ?>&m=Update"><i class='fa fa-edit' title="Edit"></i>Edit</a></li> 
												<li><a href="index.php?mod=data_siswa&func=delete&nis=<?php echo $row->nis ?>"><i class='fa fa-trash-o' title="Delete"></i>Delete</a></li>
											</ul>
										</ul>
									</td>
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

<?php
include "data_siswa/modaltest.php";
?>