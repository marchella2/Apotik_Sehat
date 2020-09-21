<?php 
error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Distributor</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
 
	<center>
 
		<h2>Laporan Data Distributor</h2>
 
 
		<?php 
		include '../config/koneksi.php';
		?>
 
		<table border="1">
			<tr>
				<th>ID Distributor</th>
				<th>Nama Distributor</th>
				<th>Nama Perusahaan</th>
			</tr>
			<?php 
			$no = 1;
			$sql = mysqli_query($con,"select * from tb_distributor");
			while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $data['id_distributor'] ?></td>
				<td><?php echo $data['nama_distributor']; ?></td>
				<td><?php echo $data['nama_perusahaan']; ?></td>
			</tr>
			<?php 
			}
			?>
		</table>
		<br/>
 
		<script>
			window.print();
		</script>
	</center>
</body>
</html>