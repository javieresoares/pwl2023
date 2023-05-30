<?php

//fungsi upload_foto ($ft) diinisialisasi dengan parameter $ft yang akan digunakan untuk mengambil informasi file foto yang akan diupload
function upload_foto ($ft) {

    //variable $target_dir akan menentukan lokasi direktori file foto yang diupload. Dalam kasus ini, file foto akan diupload ke direktori "img/"
    $target_dir = "img/";

    //variable $target_file akan menentukan nama file foto yang akan diupload. Nama file akan disimpan dalam variabel $ft["name"] dan digabungkan dengan direktori target untuk membuat path lengkap ke file
    $target_file = $target_dir. basename($ft["name"]);

    //variable $uploadOk diinisialisasi dengan nilai 1 yang akan digunakan untuk menentukan apakah file bisa diupload atau tidak
    $uploadOk = 1;

    //variable $imageFileType akan menentukan tipe file foto yang akan diupload
    //ini dilakukan dengan memeriksa ekstensi file dengan menggunakan fungsi pathinfo () dan mengubah semua huruf besar menjadi huruf kecil menggunakan fungsi strtolower ().
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //Check if file already exists
    //kondisi ini akan memeriksa apakah file yang akan diupload sudah ada di direktori target
    //jika file sudah ada, maka pesan "Sorry, file already exists." akan ditampilkan dan nilai variabel $uploadOk akan diubah menjadi 0, yang menandakan bahwa file tidak dapat diupload
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0; 
    }

    //Check file size
    //kondisi ini akan memeriksa ukuran file foto
    //jika ukuran file lebih besar dari 500000 byte (500 kilobyte), maka pesan "Sorry, your file is too large." akan ditampilkan dan nilai variabel $uploadOk akan diubah menjadi 0, yang menandakan bahwa file tidak dapat diupload.
    if ($ft["size"] > 500000) { 
        echo "Sorry, your file is too large.";
        $uploadOk = 0; 
    }

    //Allow certain file formats
    //kondisi ini akan memeriksa tipe file foto
    //jika tipe file foto tidak sama dengan "jpg", "jpeg", "png", atau "gif", maka pesan "Sorry, only JPG, JPEG, PNG & GIF files are allowed." akan ditampilkan dan nilai variabel $uploadOk akan diubah menjadi 0, yang menandakan bahwa file tidak dapat diupload.
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0; 
    }

    //Check if $uploadOk is set to 0 by an error
    //kondisi ini akan memerika  apakah variabel $uploadOk bernilai 0. 
    //jika iya, artinya terdapat error dalam proses upload, maka pesan "Sorry, your file was not uploaded." kan ditampilkan dan file tidak berhasil diupload ke server.
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {

        //if everything is ok, try to upload file
        //jika nilai $uploadOk tidak sama dengan 0, maka script akan melanjutkan ke blok ini.
        //mMencoba untuk memindahkan file dari temporary folder ke folder yang dituju di server. Fungsi move_uploaded_file() digunakan untuk memindahkan file.
        if (move_uploaded_file($ft["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["foto"]["name"]))." has been uploaded."; 
            return true;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
}
?>