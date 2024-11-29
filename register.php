<?php 
    include 'koneksi.php';
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $birthday = $_POST['birthday'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        if($password == $confirmpassword){
            $query = "insert into user values('$username', '$nama', '$birthday', '$password')";
            try {
                mysqli_query($conn,$query);
            } catch (\Throwable $th) {
                echo "<script> alert ('username sudah digunakan')</script>";
            }
        } else {
            echo "<script> alert ('password tidak sama')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="registrasi">
        <div class="input">
            <h2><span> YOUR ADVENTURE  </span> BEGINS HERE </h2>

            <form action="" method="post">
                <input type="text" placeholder="USERNAME" class="isi" name="username">
                <input type="text" placeholder="NAME" class="isi" name="nama">
                <input type="text" placeholder="BIRTHDAY" class="isi" name="birthday">
                <input type="password" placeholder="PASSWORD" class="isi" name="password">
                <input type="password" placeholder="CONFIRM PASSWORD" class="isi" name="confirmpassword">
                
                <button type="submit" class="tombol" name="register">CREATE</button>
                
                <a href="login.html" class="balik-login">HAVE AN ACCOUNT</a>
            </form>
        </div>
        <div class="gambar">
            <img src="asset/register.png">
        </div>
    </div>
</body>
</html>