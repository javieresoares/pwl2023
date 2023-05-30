<?php
include "koneksi.php";
include "uploadFoto.php";

//mengambil nilai id barang yang diambil dari form input dengan method POST dengan nama input "tid"
$id=$_POST['tid'];

$nama=$_POST['tnama'];
$hrg=$_POST['thrg'];
$ket=$_POST['tket'];
$jml=$_POST['tjml'];
$foto_lama=$_POST['foto_lama'];

//membuat variabel $qry yang bernilai true sebagai penanda apakah query berhasil dijalankan atau tidak
$qry=true;

//membuat variabel $flagFoto yang bernilai true sebagai penanda apakah ada perubahan foto atau tidak
$flagFoto=true;

//jika input "ubah_foto" dari form di-set atau bernilai true, maka menjalankan blok kode berikutnya
if (isset($_POST['ubah_foto'])){

    //menjalankan fungsi upload_foto() dari file uploadFoto.php untuk mengupload foto barang yang baru
    if (upload_foto ($_FILES["foto"])){ 

        //mengambil nilai nama file foto barang yang baru yang diupload
        $foto=$_FILES["foto"]["name"];

        //membuat query SQL untuk mengupdate data barang dengan nama, harga, jumlah, keterangan, dan foto baru, dengan kondisi id barang
        $sql = "update barang set nama='$nama', hrg='$hrg', jml='$jml', keterangan='$ket', foto='$foto' where id='$id'";
    } else {

        //set variabel $qry menjadi false, karena query gagal dijalankan
        $qry=false;

        //menampilkan pesan kesalahan bahwa foto gagal diupload
        echo "foto gagal diupload"; 
    }
} else {

    //membuat query SQL untuk mengupdate data barang dengan nama, harga, jumlah, dan keterangan, tanpa mengubah foto, dengan kondisi id barang
    $sql = "update barang set nama='$nama', hrg='$hrg', jml='$jml', keterangan='$ket' where id='$id'";

    //set variabel $flagFoto menjadi false, karena tidak ada perubahan foto
    $flagFoto=false;
}

//jika variabel $qry bernilai true, maka akan menjalankan blok kode berikutnya
if ($qry==true) {
    if ($conn->query($sql) === TRUE) {
        if (is_file("img/".$foto_lama) && ($flagFoto==true)) { //jika gambar ada
            unlink("img/".$foto_lama);
        }
        $conn->close();
        header("location:index.php");
    } else {
        $conn->close();
        echo "New records failed"; 
    }
}
?>