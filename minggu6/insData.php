<?php
    include "koneksi.php";
    $sql = "insert into barang (id,nama,hrg,jml,keterangan,foto)values
        (1,'aglonema Suksom',40000,10,'-','aglonemaSuksom.jpg')";
    if($conn->query($sql)===TRUE){
        echo "New records created succesfully";
    } else {
        echo "Error:".$sql."<br>".$conn->error;
    }
    $conn->close();
?>