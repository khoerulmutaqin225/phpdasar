<?php 
session_start();
if ( !isset ($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'functions.php';
// tampilkan seluruh mahasiswa 
$mahasiswa = query("SELECT *FROM mahasiswa" );

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
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/script.js"></script>

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
    placeholder="Masukan keyword pencarian" autocomplete="off" id="keyword">
    <button type="submit" name="cari" id="tombol-cari"> Cari!!</button>

</form>
<br><br>

<div id="container">
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
</div>

</body>
</html>