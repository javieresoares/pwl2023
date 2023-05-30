<?php
    include "koneksi.php";
    //sql to create table
    $sql = "CREATE TABLE barang_baru (
        id int(11) NOT NULL,
        nama varchar(40) DEFAULT NULL,
        hrg double DEFAULT NULL,
        keterangan varchar(100) DEFAULT NULL,
        foto varchar(200) DEFAULT NULL,
        PRIMARY KEY(id)
    )";
    if($conn->query($sql)===TRUE){
        echo "Table user created successfully"; } else{
        echo "Error creating table:" . $conn->error; }
    $conn->close();
?>