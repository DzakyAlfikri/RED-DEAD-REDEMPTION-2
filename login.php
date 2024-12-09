<?php 
include 'koneksi.php';
    
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Capture the password input

    // Prepare query to find the user
    $query = "SELECT password FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $result2 = mysqli_fetch_assoc($result); // Fetch result as an associative array
        
        if ($result2) {
            // Check if the password matches
            if ($result2["password"] == $password) {
                header("Location: index.html");
                exit(); // Ensure script stops execution after redirect
            } else {
                echo "<script> alert('Invalid password!'); </script>";
            }
        } else {
            echo "<script> alert('Username not found!'); </script>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body style="background-color: white;">
    <div class="login">
        <div class="gambar1">
            <img src="asset/login.png">
        </div>
        <div class="input">
            <img src="asset/judul.png">
            <h2><span> WELCOME TO THE WEST. </span>ITS TIME TO MAKE YOUR MARK</h2>
            <div class="garisbawah"></div>
            <form action="" method="post">
                <input type="text" placeholder="USERNAME" class="isi" name="username">
                <input type="password" placeholder="PASSWORD" class="isi" name="password">
                
                <button type="submit" class="tombol" name="login">LOGIN</button>
                
                <a href="register.html" class="buat-akun">CREATE ACCOUNT</a>
            </form>
        </div>
    </div>
</body>
</html>