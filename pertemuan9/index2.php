<?php 
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// Ambil Data Tabel Mahasiswa / Query Mahasiswa
$result = mysqli_query($conn, "SELECT *FROM mahasiswa");

// var_dump ($result);

// Ambil Data (fetch) dari Objek result
// mysqli_fetch_row();    // Mengembalikan array numerik
// mysqli_fetch_assoc();  // Mengembalikan array Assosiative // string
// mysqli_fetch_array();  // Mengebalikan numerik dan string
// mysqli_fetch_object(); //

// while( $mhs = mysqli_fetch_assoc($result)){
//     var_dump($mhs);
// }


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

<h1>Daftar Mahasiswa</h1>
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
    <?php while($row = mysqli_fetch_assoc($result) ) : ?>

    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="">ubah</a> I
            <a href="">hapus</a>
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

    <?php endwhile; ?>

    </table>

</body>
</html>