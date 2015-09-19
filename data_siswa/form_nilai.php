
<?php
if (isset($_GET['nis'])) {
    $query = mysql_query("SELECT * FROM nilai WHERE nis=$_GET[nis]") or die(mysql_error());
    $row = mysql_fetch_object($query);
	$id=$_GET['nis'];
?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Form Nilai</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="#">Data Nilai</a>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
							<form method="post" action="proses.php" name="postform">
								<div class="form-group">
									<p>
										<label>Fisika</label>
										<input class="form-control" placeholder="Nilai fisika di Kelas X pada smester 2 " type="text" name="fisika" value="<?php echo isset($row->fisika) ? $row->fisika : '' ?>">
									</p>
								</div>
								<div class="form-group">
									<p>
										<label>Matematika</label>
										<input class="form-control" placeholder="Nilai matematika di Kelas X pada smester 2" type="text" name="matematika" value="<?php echo isset($row->matematika) ? $row->matematika : '' ?>">
									</p>
								</div>
								<div class="form-group">
									<p>
										<label>Bhs Inggris</label>
										<input class="form-control" placeholder="Nilai Bhs Inggris di Kelas X pada smester 2" type="text" name="b_inggris" value="<?php echo isset($row->b_inggris) ? $row->b_inggris : '' ?>">
									</p>
								</div>
								<div class="form-group">
									<p>
										<label>Geografi</label>
										<input class="form-control" placeholder="Nilai geografi di Kelas X pada smester 2" type="text" name="geografi" value="<?php echo isset($row->geografi) ? $row->geografi : '' ?>">
									</p>
								</div>
								<div class="form-group">
									<p>
										<label>Ekonomi</label>
										<input class="form-control" placeholder="Nilai ekonomi di Kelas X pada smester 2" type="text" name="ekonomi" value="<?php echo isset($row->ekonomi) ? $row->ekonomi : '' ?>">
									</p>
								</div>
								<div class="form-group">
									<p>
										<label>Bhs Indonesia</label>
										<input class="form-control" placeholder="Nilai fisika di Kelas X pada smester 2" type="text" name="b_indonesia" value="<?php echo isset($row->b_indonesia) ? $row->b_indonesia : '' ?>">
									</p>
								</div>
								<div class="form-group">
									<p>
										<label>&nbsp;</label>
										<input type="hidden"  value="<?php echo $id; ?>" name="id">
										<input class="btn btn-primary" type="submit" value="<?php echo isset($_GET['m']) ? $_GET['m'] : 'Simpan & Proses'; ?>" name="<?php echo isset($_GET['m']) ? $_GET['m'] : 'Simpan'; ?>">
										<input class="btn btn-default" type="reset"name="Reset">
									</p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>