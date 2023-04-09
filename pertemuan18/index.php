<?php 
session_start();
if ( !isset ($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'functions.php';

// | pagination
// | Konfigurasi
$jumlahDataPerHalaman =2;
$jumlahData = count(query("SELECT *FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData /$jumlahDataPerHalaman);

// if (isset ($_GET["halaman"])){
//     $halamanAktif = $_GET["halaman"];    
// } else{
//     $halamanAktif = 1;
// }

$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1 ; //Operator ternari pengganti operator atas
// halaman 2, awal data =2
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

// var_dump($halamanAktif);

// $jumlahData = mysqli_num_rows($result);
// tampilkan seluruh mahasiswa 
$mahasiswa = query("SELECT *FROM mahasiswa LIMIT $awalData,$jumlahDataPerHalaman" );

// Tombol Cari tekan
if (isset ($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <a href="logout.php">logout</a>

<h1>Daftar Mahasiswa</h1>
<a href="tambah.php"> Tambah Data Mahasiswa</a>
<br><br>

<!-- GET menampilkan data di url -->
<!-- POST data tidak tampil di url -->


<form action="" method="post">
    <input type="text" name="keyword" size="30" autofocus 
    placeholder="Masukan keyword pencarian" autocomplete="off">
    <button type="submit" name="cari"> Cari!!</button>
</form>
<br><br>
<!-- Navigasi -->
<?php if($halamanAktif > 1) :?>
  <a href="?halaman=<?= $halamanAktif-1; ?>">&laquo;</a>
<?php endif; ?>

<?php for($i =1; $i<= $jumlahHalaman; $i++) : ?>
    <?php if($i == $halamanAktif) : ?>
        <a href="?halaman=<?= $i;?>" Style="font-weight: bold; color: red;
        "><?= $i ?></a>
    <?php else : ?>
        <a href="?halaman=<?= $i;?>"><?= $i ?></a>
    <?php endif; ?>
<?php endfor; ?>

<?php if($halamanAktif < $jumlahHalaman) :?>
  <a href="?halaman=<?= $halamanAktif+1; ?>">&raquo;</a>
<?php endif; ?>

<table border="1" cellpadding="10" ceelSpacing="0">

    <tr>
        <!-- blok kemudian ctrl + D -->
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>
    <?php $i =1 ?>
    <?php foreach ($mahasiswa as $row) : ?>

    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="
            return confirm('yakin?');">hapus</a>
        </td>
        <td>
            <img src="img/<?php echo $row["gambar"]; ?>" width="50"></a>
        </td>
        <td><?= $row["nrp"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["jurusan"]; ?></td>
    </tr>
    <?php $i++; ?>

    <?php endforeach; ?>

    </table>

</body>
</html>