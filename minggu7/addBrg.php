<html>
<head></head>
<body>
<h1>Input Data barang</h1>

<!-- membuat form, yang mana ketika tombol submit ditekan maka data yang dimasukkan akan dikirim ke file insBrg.php, method yang digunakan adalah POST dan enctype digunakan untuk mengirim data file dalam bentuk binary -->
<form action='insBrg.php' method='post' enctype="multipart/form-data"> 

<!-- menampilkan label "ID" dan kolom input text untuk mengisi nilai ID barang dengan atribut name "tid" -->
ID = <input type='text' name='tid'> <br/>
nama barang = <input type='text' name='tnama '> <br/>
Harga = <input type='text' name='thrg'> <br/>
Jml Stok = <input type='text' name='tjml'> <br/>
Keterangan = <input type='text' name='tket'> <br/>
Foto = <input type='file' name='foto'> <br/>

<!-- membuat tombol submit dengan label "Simpan" -->
<input type='submit' value='Simpan '>
</form>
</body>
</html>