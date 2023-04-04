<?php 
// Array Asosiative
// Definisinya sama sepperti array numerik, kecuali
// key-nya adalah string yang kita buat sendiri
$mahasiswa =[

    [
    "nama" => "Khoerul Mutaqin",
    "nrp" => "1708026011",
    "email" => "khoerulmutaqin@gmail.com",
    "jurusan" => "Fisika",
    "gambar" => "Aku.jpg"
    ],
    [
    "nama" => "sukarno",
    "nrp" => "2008026011",
    "email" => "soekarno@gmail.com",
    "jurusan" => "sosiologi",
    "gambar" => "Kamu.jpg"
    ]
]



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) :?>
    <ul>
        <li>
            <img src="img/<?= $mhs["gambar"]; ?> ">
        </li>
        <li>Nama    : <?php echo $mhs["nama"]; ?></li>
        <li>NRP     : <?php echo $mhs["nrp"]; ?></li>
        <li>Jurusan : <?php echo $mhs["jurusan"]; ?></li>
        <li>Email   : <?php echo $mhs["email"]; ?></li>
    </ul>
    <?php endforeach; ?>
    
</body>
</html>