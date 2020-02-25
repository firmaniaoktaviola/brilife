<?php 
include 'koneksi.php';
$Nama_Kontrasepsi = $_POST['Nama_Kontrasepsi'];


mysqli_query($db,"INSERT INTO list_pemakai_kontrasepsi VALUES('Id_Propinsi','Id_Kontrasepsi','Jumlah_Pemakai')");

header("location:index.php?pesan=input");
?>