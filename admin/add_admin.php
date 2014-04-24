<?php 
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} elseif ($_SESSION['level'] == "co-admin") {
		echo "<script>window.alert('Maaf Anda Tidak Memiliki Hak Akses');</script>";
		echo "<script>window.location = '../product/view_product.php';</script>";
	} else {
include "../header/header_admin.php";
?>
<script>
	function validasi(form) {
		if (form.username.value == ""){
			alert("Anda belum mengisikan Username.");
			form.username.focus();
			return (false);
		}
		if (form.first_name.value == ""){
			alert("Anda belum mengisikan Nama Depan.");
			form.first_name.focus();
			return (false);
		}
		if (form.last_name.value == ""){
			alert("Anda belum mengisikan Nama Belakang.");
			form.last_name.focus();
			return (false);
		}
		if (form.password.value == ""){
			alert("Anda belum mengisikan Password.");
			form.password.focus();
			return (false);
		}
	}
</script>
<form action="save_admin.php" method="post" onsubmit="return validasi(this)" id="form">
	<table width="70%" align="center" bgcolor="#E6E6E6">
		<tr>
			<td colspan="3"><center><h2>ADD ADMIN</h2></center></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td width="27%"></td>
			<td width="8%">Username &nbsp;</td>
			<td width="35%">
				<input autofocus type="text" name="username" placeholder="Username" maxlength="30">
			</td>
		</tr>
		<tr>
			<td></td>
			<td>First Name &nbsp;</td>
			<td>
				<input type="text" name="first_name" placeholder="First Name" maxlength="20">
			</td>
		</tr>
		<tr>
			<td></td>
			<td>Last Name &nbsp;</td>
			<td>
				<input type="text" name="last_name" placeholder="Last Name" maxlength="30">
			</td>
		</tr>
		<tr>
			<td></td>
			<td>Password &nbsp;</td>
			<td>
				<input type="text" name="password" placeholder="Password">
			</td>
		</tr>
		<tr>
			<td></td>
			<td>Status &nbsp;</td>
			<td>
				<input type="radio" name="status" value="admin">Admin
				<input type="radio" name="status" value="co-admin">Co-Admin
			</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" name="submit" value="Submit"> <input type="reset" name="reset" value="Reset">
				<a href="view_admin.php"><input type="button" name="button" value="Back"></a>
			</td>
		</tr>
		<tr>
			<td colspan="3"><?php include "../footer/footer.php"; ?></td>
		</tr>
	</table>
</form>
<?php } ?>