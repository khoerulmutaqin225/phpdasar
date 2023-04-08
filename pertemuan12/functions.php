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
    $gambar  = htmlspecialchars($data["gambar"]);


    // query insert data
    $query = "INSERT INTO mahasiswa
    VALUES
    ('', '$nrp', '$nama', '$email','$jurusan','$gambar')
    ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
        
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
    $gambar  = htmlspecialchars($data["gambar"]);


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