<!DOCTYPE html>
<html>
<head>
	<title>SOAL UJIAN PROGRAMMER MODEL 1</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body><center>
	<div class="judul">		
		<h1>SOAL UJIAN PROGRAMMER MODEL 1</h1>
		<h2>FIRMANIA OKTAVIOLA</h2>
	</div>
	<br/>

	<?php 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}else if($pesan == "update"){
			echo "Data berhasil di update.";
		}else if($pesan == "hapus"){
			echo "Data berhasil di hapus.";
		}
	}
	?>
	<br/>
	<button> <a class="tombol" href="input.php">+ Tambah Data Baru</a></button>

	<h3>Data user</h3>
	<table border="1" class="table">
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">Propinsi</th>
			<th colspan="3">Pemakaian Alat Kontrasepsi</th>
			<th rowspan="2">Jumlah</th>
		</tr>
		<tr>
			
			<th>Pil</th>
			<th>Kondom</th>
			<th>IUD</th>
		
		</tr>
		<?php 
		include "koneksi.php";
		$query_mysqli = mysqli_query($db,"SELECT * FROM list_propinsi")or die(mysqli_error());
		$nomor = 1;
		$jumlahpil = 0;
		$jumlahkondom = 0;
		$jumlahiud = 0;
		$jumlah_total_alat_kontrasepsi = 0;
		while($data = mysqli_fetch_array($query_mysqli)){
		?>
		<tr>
			<td><?php echo $nomor++; ?></td>
			<td><?php echo $data['Nama_Propinsi']; ?></td>

			<?php 
			$jumlahperpropinsi = 0;
			$idpropinsi = $data['Id_Propinsi'];
			$query = mysqli_query($db,"SELECT Jumlah_Pemakai FROM list_pemakai_kontrasepsi where Id_Propinsi = '$idpropinsi' && Id_Kontrasepsi  = 1 ")or die(mysqli_error()); 
			if (mysqli_num_rows($query)==1){
				while($row = mysqli_fetch_array($query)){?>
					<td><?php echo $row['Jumlah_Pemakai']; ?></td><?php
					$jumlahperpropinsi += (int)$row['Jumlah_Pemakai'];
					$jumlahpil += (int)$row['Jumlah_Pemakai'];
				}
			}else if (mysqli_num_rows($query)>1){
				$jumlah = 0 ;
				while($row = mysqli_fetch_array($query)){
					$jumlah += (int)$row['Jumlah_Pemakai'] ;}?>
					
				<td><?php echo $jumlah ?></td><?php
				$jumlahperpropinsi += $jumlah;
				$jumlahpil += $jumlah;
			}else{?>
				<td><?php echo "0"; ?></td><?php
			}?>

			<?php $query = mysqli_query($db,"SELECT Jumlah_Pemakai FROM list_pemakai_kontrasepsi where Id_Propinsi = '$idpropinsi' && Id_Kontrasepsi  = 2 ")or die(mysqli_error()); 
			if (mysqli_num_rows($query)==1){
				while($row = mysqli_fetch_array($query)){?>
					<td><?php echo $row['Jumlah_Pemakai']; ?></td><?php
					$jumlahperpropinsi += (int)$row['Jumlah_Pemakai'];
					$jumlahkondom += (int)$row['Jumlah_Pemakai'];
				}
			} else if (mysqli_num_rows($query)>1){
				$jumlah = 0 ;
				while($row = mysqli_fetch_array($query)){
					$jumlah += (int)$row['Jumlah_Pemakai'] ;}?>
					<td><?php echo $jumlah ?></td><?php
				$jumlahperpropinsi += $jumlah;
				$jumlahkondom += $jumlah;
			}else{?>
				<td><?php echo "0"; ?></td><?php
			}?>
			<?php $query = mysqli_query($db,"SELECT Jumlah_Pemakai FROM list_pemakai_kontrasepsi where Id_Propinsi = '$idpropinsi' && Id_Kontrasepsi  = 3 ")or die(mysqli_error()); 
			if (mysqli_num_rows($query)==1){
				while($row = mysqli_fetch_array($query)){?>
					<td><?php echo $row['Jumlah_Pemakai']; ?></td><?php
					$jumlahperpropinsi += (int)$row['Jumlah_Pemakai'];
					$jumlahiud += (int)$row['Jumlah_Pemakai'];
				}
			}else if (mysqli_num_rows($query)>1){
				$jumlah = 0 ;
				while($row = mysqli_fetch_array($query)){
					$jumlah += (int)$row['Jumlah_Pemakai'];}?>
					<td><?php echo $jumlah ?></td><?php
				$jumlahperpropinsi += $jumlah;
				$jumlahiud += $jumlah;
			}
			else{?>
				<td><?php echo "0"; ?></td><?php
			} 
			$jumlah_total_alat_kontrasepsi += $jumlahperpropinsi;
			?>
			<td><?php echo $jumlahperpropinsi ; ?></td>
		</tr>
		<?php } ?>
		<tr>
			<td></td>
			<th>Jumlah</th>
			<th><?php echo $jumlahpil; ?></th>
			<th><?php echo $jumlahkondom; ?></th>
			<th><?php echo $jumlahiud; ?></th>
			<th><?php echo $jumlah_total_alat_kontrasepsi; ?></th>
		</tr>

	</table>
	</center>
</body>
</html>