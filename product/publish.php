<?php  
include "../aplikasi/koneksi.php";
$query = mysql_query("SELECT * FROM product WHERE id_product = '$_GET[id_product]'");
$data = mysql_fetch_array($query);

if ($data[8]==1) {
	$sql = mysql_query("UPDATE product SET publish = 2 WHERE id_product = '$_GET[id_product]'");
} elseif ($data[8]==2) {
	$sql = mysql_query("UPDATE product SET publish = 1 WHERE id_product = '$_GET[id_product]'");
}

if ($sql) {
	echo "<script>window.location = 'view_product.php';</script>";
}

// mysql_query("delete from product where id_product = '$_POST[id]'");
// echo "<script>window.alert('Data Berhasil Dihapus');</script>";
// echo "<script>window.location = 'view_product.php';</script>";
?>