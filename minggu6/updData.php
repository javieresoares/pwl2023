<?php

    include "koneksi.php"; 
    $sql = "update barang set jml=50 where id='1'";

    if ($conn->query($sql)===TRUE){
        echo "record updated successfully<br/>";
    } else {
        echo "Error: ".$sql."<br>". $conn->error;
    }
    $conn->close();
    
    include "selectData.php";
?>