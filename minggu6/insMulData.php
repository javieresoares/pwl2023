<?php
    include "koneksi.php";

    //$sql = "INSERT INTO barang (id, nama, hrg, jml, keterangan, foto)VALUES
      //  (3,'aglonemaRoDudAnjamani',65000,10,'-','aglonemaRoDudAnjamani.jpg')";
    //$sql = "INSERT INTO barang (id, nama, hrg, jml, keterangan, foto)VALUES
      //  (4,'aglonemaVenus',65000,10,'-','aglonemaVenus.jpg')";

    $sql = "INSERT INTO barang (id, nama, hrg, jml, keterangan, foto) VALUES
      (10,'aglonemaRoDudAnjamani',65000,10,'-','aglonemaRoDudAnjamani.jpg')";
    $sql2 = "INSERT INTO barang (id, nama, hrg, jml, keterangan, foto) VALUES
      (9,'aglonemaVenus',65000,10,'-','aglonemaVenus.jpg')";

    if ($conn->multi_query($sql . ";" . $sql2) === TRUE) {
    echo "New records created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    /* if($conn->multi_query($sql)===TRUE){
        echo "New record created successfully";
    } else {
        echo "Error:".$sql."<br>".$conn->error;
    } */

    $conn = mysqli_connect("localhost", "root", "", "db_aldo");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $conn->close();
?>