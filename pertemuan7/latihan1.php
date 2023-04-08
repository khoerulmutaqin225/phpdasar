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
    "nama" => "Silvia Raudha",
    "nrp" => "2008026011",
    "email" => "silviaraudha@gmail.com",
    "jurusan" => "Sosiologi Agama",
    "gambar" => "Kamu.jpg"
    ]
    ];

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
<ul> 
<?php  foreach ($mahasiswa as $mhs ) : ?>
    <li>
       <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nrp=<?= $mhs["nrp"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?=
       $mhs["jurusan"];?>&gambar=<?= $mhs["gambar"]; ?>"> <?= $mhs["nama"]; ?></a>
    </li> 

<?php endforeach; ?>
</ul>        
    
</body>
</html>