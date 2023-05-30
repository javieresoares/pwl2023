<?php

//mengimpor file "koneksi.php" dan "uploadFoto.php", yang berisi fungsi-fungsi koneksi database dan fungsi upload foto.
include "koneksi.php";
if (file_exists("uploadFoto.php")) {
include "uploadFoto.php";

    //mendeklarasikan beberapa variabel dari data input yang dikirim melalui form, yaitu id, nama, harga, keterangan, dan jumlah.
    $id = $_POST['tid']; 
    $nama = $_POST['tnama'];
    $hrg = $_POST['thrg'];
    $ket = $_POST['tket'];
    $jml = $_POST['tjml'];

  //memanggil fungsi upload_foto untuk memeriksa apakah file gambar yang diunggah memiliki format yang sesuai dengan kebutuhan. fungsi ini akan mengembalikan nilai boolean true jika file gambar valid dan false jika tidak.
  //jika upload_foto mengembalikan nilai true, maka kita akan mendapatkan nama file gambar dari variabel $_FILES["foto"]["name"] pada baris ke 19
  //sedangkan jika upload_foto mengembalikan nilai false, maka program akan menampilkan pesan kesalahan saat proses upload file gambar
  if (upload_foto ($_FILES["foto"])){
      $foto = $_FILES["foto"]["name"];
      
      //membuat query SQL untuk menyimpan data ke dalam tabel "barang" pada database
      $sql = "INSERT INTO barang (id, nama, hrg, jml, keterangan, foto) VALUES ('$id', '$nama', '$hrg', '$jml', '$ket', '$foto')";
      if ($conn->query($sql) === TRUE) { 
          $conn->close();
          header("location:index.php");
      }
      else {
          $conn->close();
          echo "New records failed";
      } 
  } else {
      echo "Sorry, there was an error uploading your file.";
  }
} else {
  echo "Failed to import uploadFoto.php";
}
?>
