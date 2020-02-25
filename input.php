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

	<button><a href="index.php">Lihat Semua Data</a></button>

	<br/>
	<h3>Input data baru</h3>
	<form action="input-aksi.php" method="post">		
		<table>
			<tr>
				<td>Propinsi</td>
				<td><?php 
					include "koneksi.php";
					$propinsi = mysqli_query($db,"SELECT * FROM list_propinsi")or die(mysqli_error());?>
					<select>
					<?php while($data = mysqli_fetch_array($propinsi)){?>			
					<option value="<?php echo $data['Id_Propinsi']; ?>"><?php echo $data['Nama_Propinsi']; ?></option>
                    <?php } ?> 
                	</select>
                </td>					
			</tr>
                        
			<tr>
				<td>Alat Kontrasepsi</td>
				<td><?php 
				$kontrasepsi  = mysqli_query($db,"SELECT * FROM list_kontrasepsi")or die(mysqli_error());?>
					<select>
					<?php while($data = mysqli_fetch_array($kontrasepsi)){?>			
					<option value="<?php echo $data['Id_kontrasepsi ']; ?>"><?php echo $data['Nama_Kontrasepsi']; ?></option>
                    <?php } ?> 
                	</select>
                </td></td>					
			</tr>
			<tr>
				<td>Jumlah Pemakai</td>
				<td><input type="text" name="Nama_Kontrasepsi"></td>					
			</tr>	
				
				<td></td>
				<td><input type="submit" value="Simpan"></td>					
			</tr>				
		</table>
	</form>
	</center>
</body>
</html>