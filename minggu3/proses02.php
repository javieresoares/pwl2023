<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengolahan Form ~ Text</title>
</head>
<body>
<?php 
    //proses textBox
    $namaDpn = $_POST['namaDpn']; 
    $namaBlk = $_POST['namaBlk']; 
    $email = $_POST['email']; 
    echo "Nama anggota : $namaDpn $namaBlk <br />"; 
    echo "Email : $email <br />"; 	
    
    //proses  checkBox
    $jenis="";
    if (isset($_POST['cPengHobby'])){
        $pengHobby = $_POST['cPengHobby']; 
        $jenis.=$pengHobby." ";}
    if (isset($_POST['cPetani'])){
        $petani = $_POST['cPetani']; 
        $jenis.=$petani." ";}
    if (isset($_POST['cPedagang'])){
        $pedagang = $_POST['cPedagang']; 
        $jenis.=$pedagang." ";}		
    if (isset($_POST['cSales'])){
        $sales = $_POST['cSales']; 
        $jenis.=$sales." ";}			
    if (isset($_POST['cPengamat'])){
    $pengamat = $_POST['cPengamat']; 
    $jenis.=$pengamat." ";}			
    $jenis=trim($jenis);
    echo "Jenis member :  $jenis <br />";
    
    //proses combobox
    $pendidikan = $_POST['cbPendidikan']; 
    echo "Pendidikan : $pendidikan<br />";
    
    //proses radio
    $gender = $_POST['rGender'];
    
    //nl2br : untuk menyisipkan <br /> pd string yg tdp \n	
    echo nl2br("Gender : $gender \n"); 	
    $saran = nl2br($_POST['saran']); 
    echo "Saran : $saran";		
?>
</body>
</html>