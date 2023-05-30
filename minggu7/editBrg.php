<?php
//memasukkan file koneksi.php yang berisi informasi untuk menghubungkan ke database
include "koneksi.php";

//mendapatkan nilai parameter 'id' dari URL menggunakan metode GET
$id=$_GET['id'];

//membuat query untuk memilih semua data barang dari tabel 'barang' yang memiliki ID yang sama dengan nilai 'id' yang didapatkan sebelumnya
$sql="select * from barang where id='$id'";

//menjalankan query menggunakan objek koneksi dan menyimpan hasilnya di variabel 'hasil'
$hasil=$conn->query($sql); 

//melakukan pengulangan sebanyak data yang ditemukan pada variabel 'hasil' dan menyimpan nilai setiap kolom ke variabel masing-masing
while ($row=$hasil->fetch_assoc()) {
    $nama=$row['nama'];
    $hrg=$row['hrg'];
    $jml=$row['jml'];
    $keterangan=$row['keterangan'];
    $foto=$row['foto']; }
?>

<html>
<head></head>
<body> 
<h1>Edit Data barang</h1>

<!-- membuat form HTML untuk mengupdate data barang yang telah dipilih sebelumnya dengan menggunakan metode POST dan tipe encoding 'multipart/form-data' karena terdapat file foto yang akan diupload -->
<form action='updBrg.php' method='post' enctype="multipart/form-data">

<!-- menampilkan ID barang yang tidak dapat diubah oleh pengguna -->
ID = <input type='text' name='tid' value="<?= $id;?>" readonly> <br/>

<!-- menampilkan nilai awal dari kolom 'nama', 'hrg', 'jml', dan 'keterangan' yang telah dipilih sebelumnya dan dapat diubah oleh pengguna -->
nama barang = <input type='text' name='tnama' value="<?= $nama;?>"> <br/>
Harga = <input type='text' name='thrg' value="<?= $hrg;?>"> <br/>
Jml Stok = <input type='text' name='tjml' value="<?= $jml;?>"> <br/>
Keterangan = <input type='text' name='tket' value="<?= $keterangan;?>"> <br/> 
Foto = <input type='file' name='foto'> <br/> 

<!-- menampilkan foto barang yang telah dipilih sebelumnya dan tidak dapat diubah oleh pengguna -->
<input type='hidden' name='foto_lama' value="<?= $foto;?>"> 
<img src="img/<?php echo $foto; ?>" width="150px" height="120px" /></br>

<!-- menampilkan opsi untuk mengubah foto barang dengan menggunakan checkbox -->
<input type="checkbox" name="ubah foto" value="true">Ceklis jika ingin mengubah foto<br>

<!-- tombol submit untuk mengirimkan form ke updBrg.php -->
<input type='submit' value='Update'>
</form>
</body>
</html>