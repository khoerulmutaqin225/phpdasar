<?php
session_start();
require 'functions.php';

// cek cookies
if (isset ($_COOKIE['id']) && ($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key =$_COOKIE['key'];

    // ambil username berdasarkan id nya
    $result =mysqli_query($conn, "SELECT username FROM user WHERE
        id =$id");

    $row = mysqli_fetch_assoc($result);


    //cookies dan username

    if ($key === hash('sha256', $row['username'])){
        $_SESSION['login'] = true;
    }
}

// cek sesion
if(isset($_SESSION["login"])){
    header("location: index.php");
    exit;
}



// cek apakah submit sudah ditekan apa belum
if(isset ($_POST["login"]) ) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn," SELECT *FROM user WHERE 
            username ='$username'");

    //cek username
    if ( mysqli_num_rows($result) === 1){
        
        // cek password
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) ){
            
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset ($_POST['remember'])){
                //buat cookies
                // setcookie('login','true', time() +60);
                setcookie('id',$row['id'], time()+60);
                setcookie('key',hash('sha256', $row['username']),
                time()+30);
                
            }
            header("location: index.php");
            exit;
        }
    }
    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
    <h1>Halaman Login</h1>
    <?php if (isset($error)) :?>
        <p style="color: red" font-style: italic;> username / password salah </p>
    <?php endif; ?>
    
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password</label>
                <input type="text" name="password" id="password">
            </li>
            <li>
                <label for="remember">remember me:</label>
                <input type="checkbox" name="remember" id="remember">
            </li>
            <li>
                <button type="submit" name="login"> login !</button>
            </li>
        </ul>

    </form>


    
</body>
</html>