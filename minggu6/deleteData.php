<?php
    include "koneksi.php";
    $sql = "delete from barang where id='1'";

    if ($conn->query($sql) === TRUE) { 
        echo "record deleted successfully<br/>";
    } else {
        echo "Error: ".$sql."<br>".$conn->error;
    } 
    $conn->close();

    include "selectData.php";
?>