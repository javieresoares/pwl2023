<?php
include "koneksi.php";

//mengambil nilai parameter 'id' dari URL yang digunakan untuk mengidentifikasi data barang yang akan dihapus
$id = $_GET['id'];

//membuat query SQL untuk mengambil nama file gambar terkait dengan barang yang akan dihapus
$sql = "select foto from barang where id='$id'";

//mengeksekusi query SQL pada database dan menyimpan hasilnya dalam variabel $hasil
$hasil = $conn->query($sql);

//menginisialisasi variabel $foto dengan nilai kosong
$foto = "";

//mengambil nama file gambar dari hasil query SQL dan menyimpannya dalam variabel $foto
//jika ada lebih dari satu file gambar terkait dengan barang tersebut, maka loop while akan dijalankan untuk mengambil semua nama file gambar.
while ($row = $hasil->fetch_assoc()) {
    $foto = $row['foto'];
}

//menghapus file gambar terkait dengan barang tersebut dari server
//jika variabel $foto tidak kosong, maka fungsi unlink() akan dipanggil untuk menghapus file gambar dari direktori 'img' pada server.
if ($foto != "") {
    unlink("img/" . $foto);
}

//membuat query SQL untuk menghapus data barang dari database berdasarkan nilai parameter 'id' yang diberikan
$sql = "delete from barang where id='$id'";

//mengeksekusi query SQL pada database untuk menghapus data barang. Jika query berhasil dijalankan, maka user akan di-redirect ke halaman index.php menggunakan fungsi header().
if ($conn->query($sql) === TRUE) {
    header("location:index.php");

//jika query SQL gagal dijalankan dan akan menampilkan pesan "New records failed"
} else {
    echo "New records failed";
}
$conn->close();
?>