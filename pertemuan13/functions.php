<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query){
    global $conn; 
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;

    }
    return $rows;

}


function tambah($data){
    global $conn;

    // Ambil data elemen dalam form
    $nrp     = htmlspecialchars($data["nrp"]);
    $nama    = htmlspecialchars($data["nama"]);
    $email   = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // Upload Gambar
    $gambar= upload();

    // If not gambar
    if ( !$gambar ){
        return false;
    }

    // $gambar  = htmlspecialchars($data["gambar"]);


    // query insert data
    $query = "INSERT INTO mahasiswa
    VALUES
    ('', '$nama', '$nrp', '$email','$jurusan','$gambar')
    ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
        
}

function upload(){

    $namaFile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName= $_FILES['gambar']['tmp_name'];


    // Cek apakah tidak ada gambar di upload
    if ($error === 4) {
        echo "  <script>
                    alert('pilih gambar dahulu');
                </script>
        ";
        return false;
    }


    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile);   // (Delimiter(titik), nama)
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "  <script>
                    alert('yang anda pilih bukan gambar ');
                </script>
        ";
        return false;
    }


    // Cek jika Ukurannya terlalu besar
    if($ukuranfile > 1000000){
        echo "  <script>
                    alert('Ukuran gambar terlalu besar ');
                </script>";
                return false;
    }

    // lolos Pengecekan, gambar siap upload
    // generate nama baru

    $namaFileBaru = uniqid();
    $namaFileBaru .=  '.';
    $namaFileBaru .= $ekstensiGambar;
    // var_dump($namaFileBaru); die; // Untuk debugging

    move_uploaded_file($tmpName, 'img/'.$namaFileBaru);

    return $namaFileBaru;




}

function hapus($id){
    global $conn;

    // query delete data
    $query = "DELETE FROM mahasiswa WHERE id =$id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
        
}

function ubah($data){
    global $conn;

    $id = $data["id"];

    // Ambil data elemen dalam form
    $nrp     = htmlspecialchars($data["nrp"]);
    $nama    = htmlspecialchars($data["nama"]);
    $email   = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama  = htmlspecialchars($data["gambarLama"]);

    // Cek apakah user pilih gambar baru atau tidak

    if ($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    } else {
        $gambar  = upload();
    }

    // query insert data
    $query = "UPDATE mahasiswa SET
              nrp  = '$nrp',
              nama = '$nama',
              email = '$email',
              jurusan ='$jurusan',
              gambar = '$gambar'
              WHERE id = $id
              ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
        
}

function cari($keyword){
        // query delete data
        $query = "SELECT *FROM mahasiswa 
                 WHERE 
                nama LIKE '$keyword%' OR
                nrp  LIKE '$keyword%' OR
                email  LIKE '$keyword%' OR
                jurusan  LIKE '$keyword%' 
                
                ";
    return query($query);       
}


?>