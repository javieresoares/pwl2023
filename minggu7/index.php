<?php

//menghubungkan file koneksi
include "koneksi.php";      

//mengambil seluruh data dari tabel barang yang diurutkan berdasarkan ID
$sql = "SELECT * from barang ORDER BY id";      
$hasil=$conn->query ($sql);

//menampilkan hyperlink "Tambah Data" dengan URL menuju ke file addBrg.php
echo "<a href='addBrg.php'>Tambah Data</a>";  

//melakukan pengecekan apakah terdapat data yang dihasilkan dari perintah SQL
if ($hasil->num_rows>0) {   

    echo "<table border='1' cellpadding='7' cellspacing='0'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Foto</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>";

    while ($row=$hasil->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["nama"]."</td>";
        echo "<td>".$row["hrg"]."</td>";
        echo "<td>".$row["jml"]."</td>";
        echo "<td>".$row["keterangan"]."</td>";
        echo "<td><img src='img/".$row["foto"]."' style='width:100px;height:100px;'></img></td>";
        echo "<td><a href='editBrg.php?id=".$row["id"]."'>Edit</a></td>";
        echo "<td><a href='delBrg.php?id=".$row["id"]."'>Hapus</a></td>";
        echo "</tr>";
    }
    
    echo "</tbody>
        </table>";

//kode yang akan dijalankan jika tidak terdapat data dari perintah SQL.
} else {         
    echo "Jumlah data: 0";
}

//menutup koneksi ke database setelah seluruh perintah SQL telah dieksekusi dan data telah ditampilkan pada halaman web
$conn->close();
?>