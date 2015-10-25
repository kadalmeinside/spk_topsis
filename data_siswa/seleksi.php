<?php
/// koneksi database 


$q = mysql_query("
SELECT * FROM nilai;
 ") or die(mysql_error());
$query = mysql_query("
SELECT siswa.nis, siswa.nama_siswa,
		nilai.fisika,nilai.matematika,nilai.b_inggris,nilai.geografi,nilai.ekonomi,nilai.b_indonesia, nilai.total
FROM siswa, nilai
WHERE 
siswa.nis=nilai.nis;
 ") or die(mysql_error());
?>
<div class="table-responsive">
<br><br>
Tabel Data Awal
 <table class="table table-striped table-bordered table-hover" >
	<thead>
		<tr>
			<td>kriteria</td><td>C1</td><td>C2</td><td>C3</td><td>C4</td><td>C5</td><td>C6</td>
		</tr>
	</thead>
	<tbody>
	<?php while ($row = mysql_fetch_object($query)) { ?>
		<tr>
			<td><?php echo $row->nama_siswa ?></td>
			<td><?php echo $row->fisika ?></td>
			<td><?php echo $row->matematika ?></td>
			<td><?php echo $row->b_inggris ?></td>
			<td><?php echo $row->geografi ?></td>
			<td><?php echo $row->ekonomi ?></td>
			<td><?php echo $row->b_indonesia ?></td>
		</tr>
	<?php } ?>
	</tbody>

 <?php
//insialisasi bobot
$stotal=0;

$bobot1=5;
$bobot2=3;
$bobot3=4;
$bobot4=4;
$bobot5=2;
$bobot6=2;


$n=0;$la=1;$p1=0;$p2=0;$p3=0;$p4=0;$p5=0;$p6=0;
while ($r = mysql_fetch_object($q)) {	
	$nisa[$la]=$r->nis;
	$s1= exp(2 *log($r->fisika));
	$p1=$p1+$s1;
	$s2= exp(2 *log($r->matematika));
	$p2=$p2+$s2;
	$s3= exp(2 *log($r->b_inggris));
	$p3=$p3+$s3;
	$s4= exp(2 *log($r->geografi));
	$p4=$p4+$s4;
	$s5= exp(2 *log($r->ekonomi));
	$p5=$p5+$s5;
	$s6= exp(2 *log($r->b_indonesia));
	$p6=$p6+$s6;
	$n++;
	$la++;
	}
//inisialisasi pembagi	
$pembagi1=sqrt($p1);
$pembagi2=sqrt($p2);
$pembagi3=sqrt($p3);
$pembagi4=sqrt($p4);
$pembagi5=sqrt($p5);
$pembagi6=sqrt($p6);
?>
<tr class='success'><td>Pembagi </td>
	<td><?php echo round($pembagi1, 3); ?></td>
	<td><?php echo round($pembagi2, 3); ?></td>
	<td><?php echo round($pembagi3, 3); ?></td>
	<td><?php echo round($pembagi4, 3); ?></td>
	<td><?php echo round($pembagi5, 3); ?></td>
	<td><?php echo round($pembagi6, 3); ?></td>
</tr>
</table>

<?php
//normalisasi & terbobot
$i = 1;
$qu = mysql_query("SELECT * FROM nilai;") or die(mysql_error());
while ($ro = mysql_fetch_object($qu)){
	$nf=$ro->fisika;
	$nfisika[$i]=$nf/$pembagi1;
	$tfisika[$i]=$nfisika[$i]*$bobot1;
	
	$nm=$ro->matematika;
	$nmatematika[$i]=$nm/$pembagi2;
	$tmatematika[$i]=$nmatematika[$i]*$bobot2;
	
	$nbing=$ro->b_inggris;
	$ninggris[$i]=$nbing/$pembagi3;
	$tinggris[$i]=$ninggris[$i]*$bobot3;
	
	$ngeo=$ro->geografi;
	$ngeografi[$i]=$ngeo/$pembagi4;
	$tgeografi[$i]=$ngeografi[$i]*$bobot4;
	
	$neko=$ro->ekonomi;
	$nekonomi[$i]=$neko/$pembagi5;
	$tekonomi[$i]=$nekonomi[$i]*$bobot5;
	
	$nbind=$ro->b_indonesia;
	$nindonesia[$i]=$nbind/$pembagi6;
	$tindonesia[$i]=$nindonesia[$i]*$bobot6;
	
	$i++;
}
?>
<br>
Normalisasi
<table class="table table-striped table-bordered table-hover" >
	<thead>
		<tr>
			<td>kriteria</td><td>C1</td><td>C2</td><td>C3</td><td>C4</td><td>C5</td><td>C6</td>
		</tr>
	</thead>
	<tbody>
<?php
for($j=1;$j<$i;$j++){ ?>
		<tr>
			<td><?php echo round($j, 3); ?></td>
			<td><?php echo round($nfisika[$j], 3); ?></td>
			<td><?php echo round($nmatematika[$j], 3); ?></td> 
			<td><?php echo round($ninggris[$j], 3); ?></td>
			<td><?php echo round($ngeografi[$j], 3); ?></td>
			<td><?php echo round($nekonomi[$j], 3); ?></td> 
			<td><?php echo round($nindonesia[$j], 3); ?></td> 
		</tr>
<?php
}
?>
	</tbody>
</table>

<br>
Normalisai Terbobot
<table class="table table-striped table-bordered table-hover" >
	<thead>
		<tr>
			<td>kriteria</td><td>C1</td><td>C2</td><td>C3</td><td>C4</td><td>C5</td><td>C6</td>
		</tr>
	</thead>
	<tbody>
<?php
for($k=1;$k<$i;$k++){ ?>
	<tr>
		<td><?php echo round($k , 3); ?></td>
		<td><?php echo round($tfisika[$k], 3); ?></td>
		<td><?php echo round($tmatematika[$k], 3); ?></td> 
		<td><?php echo round($tinggris[$k], 3); ?></td>
		<td><?php echo round($tgeografi[$k], 3); ?></td> 
		<td><?php echo round($tekonomi[$k], 3); ?></td> 
		<td><?php echo round($tindonesia[$k], 3); ?></td>
	</tr>
<?php
}


//max
$maxfisika = $tfisika[1];
$maxmtk = $tmatematika[1];
$maxbing= $tinggris[1];
$maxgeo = $tgeografi[1];
$maxeko = $tekonomi[1];
$maxbind = $tindonesia[1];
for ($x = 1; $x < $i; $x++) {
	if ($tfisika[$x] > $maxfisika) {
		$maxfisika = $tfisika[$x];
	}
	if ($tmatematika[$x] > $maxmtk) {
		$maxmtk = $tmatematika[$x];
	}
	if ($tinggris[$x] > $maxbing) {
		$maxbing = $tinggris[$x];
	}
	if ($tgeografi[$x] > $maxgeo) {
		$maxgeo = $tgeografi[$x];
	}
	if ($tekonomi[$x] > $maxeko) {
		$maxeko = $tekonomi[$x];
	}
	if ($tindonesia[$x] > $maxbind) {
		$maxbind = $tindonesia[$x];
	}
}

//min
$minfisika = $tfisika[1];
$minmtk = $tmatematika[1];
$minbing= $tinggris[1];
$mingeo = $tgeografi[1];
$mineko = $tekonomi[1];
$minbind = $tindonesia[1];
for ($y = 1; $y < $i; $y++) {
	if ($tfisika[$y] < $minfisika) {
		$minfisika = $tfisika[$y];
	}
	if ($tmatematika[$y] < $minmtk) {
		$minmtk = $tmatematika[$y];
	}
	if ($tinggris[$y] < $minbing) {
		$minbing = $tinggris[$y];
	}
	if ($tgeografi[$y] < $mingeo) {
		$mingeo = $tgeografi[$y];
	}
	if ($tekonomi[$y] < $mineko) {
		$mineko = $tekonomi[$y];
	}
	if ($tindonesia[$y] < $minbind) {
		$minbind = $tindonesia[$y];
	}
}
?>
		<tr class='success'>
			<td> MAX </td>
			<td><?php echo round($maxfisika, 3); ?></td> 
			<td><?php echo round($maxmtk , 3); ?></td>
			<td><?php echo round($maxbing , 3); ?></td>
			<td><?php echo round($maxgeo, 3); ?></td> 
			<td><?php echo round($maxeko, 3); ?></td> 
			<td><?php echo round($maxbind, 3); ?></td> 
		</tr>
		<tr class='success'>
			<td> MIN </td>
			<td><?php echo round($minfisika, 3); ?></td>  
			<td><?php echo round($minmtk, 3); ?></td>  
			<td><?php echo round($minbing, 3); ?></td> 
			<td><?php echo round($mingeo, 3); ?></td> 
			<td><?php echo round($mineko, 3); ?></td> 
			<td><?php echo round($minbind, 3); ?></td> 
		</tr>
	</tbody>
</table>

<br>
Dx+ & Dx-

<table class="table table-striped table-bordered table-hover">
<?php
//D+ & D-
for ($z = 1; $z < $i; $z++) {
	//d+
	$d1plus=exp(2*log($maxfisika-$tfisika[$z]));
	$d2plus=exp(2*log($maxmtk-$tmatematika[$z]));
	$d3plus=exp(2*log($maxbing-$tinggris[$z]));
	$d4plus=exp(2*log($maxgeo-$tgeografi[$z]));
	$d5plus=exp(2*log($maxeko-$tekonomi[$z]));
	$d6plus=exp(2*log($maxbind-$tindonesia[$z]));
	//d-
	$d1min=exp(2*log($tfisika[$z]-$minfisika));
	$d2min=exp(2*log($tmatematika[$z]-$minmtk));
	$d3min=exp(2*log($tinggris[$z]-$minbing));
	$d4min=exp(2*log($tgeografi[$z]-$mingeo));
	$d5min=exp(2*log($tekonomi[$z]-$mineko));
	$d6min=exp(2*log($tindonesia[$z]-$minbind));
	//hasil
	$dplus[$z]=sqrt($d1plus+$d2plus+$d3plus+$d4plus+$d5plus+$d6plus);
	$dmin[$z]=sqrt($d1min+$d2min+$d3min+$d4min+$d5min+$d6min);
	?>
	<tr>
		<td><?php echo "D <sub> $z </sub> + ";?></td><td><?php echo round($dplus[$z], 3);?></td>
		<td><?php echo "D <sub> $z </sub> -  ";?></td><td><?php echo round($dmin[$z], 3);?></td>
	</tr>
<?php
}
?> 
</table>
<br>
V
<table class="table table-striped table-bordered table-hover" >

<?php
for ($aa = 1; $aa < $i; $aa++){
	$v[$aa]=$dmin[$aa]/($dmin[$aa]+$dplus[$aa]); ?>
	<tr>
		<td><?php echo "V <sub>$aa</sub"; ?></td><td><?php echo round($v[$aa], 4);?></td>
	</tr>
<?php
}
for ($ab = 1; $ab < $la; $ab++){
mysql_query(" UPDATE nilai SET `total`='$v[$ab]' WHERE nis='$nisa[$ab]'")or die(mysql_error());
}
?> 
</table>
</div>
<?php
echo "<br><br>";
rsort($v);
print_r($v);
?>
