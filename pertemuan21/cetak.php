<?php
// Memanggil Library 
require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
// tampilkan seluruh mahasiswa 
$mahasiswa = query("SELECT *FROM mahasiswa" );



//  Memanggl librar Mpdf
$mpdf = new \Mpdf\Mpdf();
// Buat string html
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/print.css">
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellpadding="10" ceelSpacing="0">

    <tr>
        <!-- blok kemudian ctrl + D -->
        <th>No.</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>';
    
    $i =1;
    foreach($mahasiswa as $row){
        $html.='<tr>
            <td>'. $i++ .'</td>
            <td><img src="img/'. $row["gambar"] .'" width="50"></td>
            <td>'.$row["nrp"].'</td> 
            <td>'.$row["nama"].'</td> 
            <td>'.$row["email"].'</td>
            <td>'.$row["jurusan"].'</td>  
        </tr>';
    }
$html .= ' </table>
   
</body>
</html>

';
// Untuk Mencetak Html nya
$mpdf->WriteHTML($html);

// Keluar dari libray mpdf
// $mpdf->Output('daftar-mahasiswa.pdf', \Mpdf\Output\Destination::DOWNLOAD);
// $mpdf->Output('daftar-mahasiswa.pdf', 'D');
$mpdf->Output('daftar-mahasiswa.pdf', 'I');

?>
