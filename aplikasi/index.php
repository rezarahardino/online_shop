<?php 
include "koneksi.php";
include "../header/header.php";

$batas   = 10;
// $halaman = $_GET['halaman'];
if(isset($_GET['halaman'])) { 
	$halaman = $_GET['halaman']; 
} else { 
	$halaman = ""; 
}

if(empty($halaman)){ 
    $posisi=0; 
    $halaman=1; 
} 
else{ 
    $posisi = ($halaman-1) * $batas; 
}
$sql = mysql_query("select * from product where status = 2 limit $posisi,$batas");
?>
<table width="70%" bgcolor="#E6E6E6" align="center">
	<?php while ($r=mysql_fetch_array($sql)) { ?>
	<tr class="list">
		<td><center>
		<?php if (!empty($r['image'])): ?>				
			<a href="detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo $r['image']; ?>" width="100px" height="120px"></a><br/>
		<?php else : ?>
			<a href="detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/no-image.jpg' ?>" width="100px" height="120px"></a><br/>
		<?php endif ?>
			<?php echo $r["name"]; ?><br/>
			<?php echo $r["price"]; ?><br/>
			<?php echo "<a href='detail.php?id_product=$r[0]'><input type=button value='Detail Product'></a>"; ?>
		</center></td>
	</tr>
	<?php } ?>
	<tr>
		<td align="right">		
			<?php
				echo "<br>Halaman : ";

				$tampil2="select * from product where status = 2"; 
				$hasil2=mysql_query($tampil2); 
				$jmldata=mysql_num_rows($hasil2); 
				$jmlhalaman=ceil($jmldata/$batas);

				for($i=1;$i<=$jmlhalaman;$i++) {
					if($i>=($halaman-3) && $i <= ($halaman+3)){
						if ($i != $halaman) 
						{ 
						    echo " <a href=$_SERVER[PHP_SELF]?halaman=$i><font color='#00F'>$i</font></a> | "; 
						} 
						else 
						{ 
						    echo " <b>$i</b> | "; 
						}
					}
				}
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php include "../footer/footer.php"; ?>	
		</td>
	</tr>
</table>