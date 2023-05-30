<?php
//pendefinisian variabel koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$myDB = "db_aldo";

$conn = new mysqli($servername, $username, $password, $myDB);  
//cek koneksi gagal atau tidak
if ($conn->connect_error) 
    die("Connection failed: ".$conn->connect_error);
//program menampilkan konfirmasi bahwa koneksi berhasil
echo "Connected to DataBase successfully";
?>