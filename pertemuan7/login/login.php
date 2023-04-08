<?php
//Cek apakah tombol submit udah ditekan
if (isset($_POST["submit"])){
    if($_POST["username"] == "admin" && $_POST["password"] == 
    "123"){
    
    //jika benar redirek ke admin
    header("location: admin.php");
    exit;
    } else{
    //Jika salah, tampilkan pesan kesalahan
    $error = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1> Login Admin</h1>
    
    <?php if(isset($error) ) :?>

        <p style="color :red; font-style: italic;">username / password error</p>
    
    <?php endif; ?>
    
    <ul>
    <form action="" method="post">
        <li>
            <label for="username">username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
        <label for="password">password :</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <button type="submit" name="submit">Login</button>
        </li>


    </form>
    </ul>
</body>
</html>