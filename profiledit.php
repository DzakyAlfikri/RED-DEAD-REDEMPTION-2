<?php 
include "koneksi.php";
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
}
$id = $_SESSION["username"];

$query = "select * from user where username = '$id'";
$hasil = mysqli_query($conn,$query);
$hasil2 = array();

while ($x = mysqli_fetch_assoc($hasil)) {
    array_push($hasil2,$x);
}

if (isset($_POST['submit'])) {
    // Ambil nilai dari input form
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $birthday = $_POST['birthday'];
    $password = $_POST['password'];

    // Query untuk mengupdate data di database
    $query = "UPDATE user SET 
                name = '$nama', 
                username = '$username', 
                birthday = '$birthday', 
                password = '$password' 
              WHERE username = '$id'";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil diperbarui!');
            window.location.href = 'profiledit.php';
          </script>";
        exit();
    } else {
        echo "<script>alert('Terjadi kesalahan saat memperbarui data.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="profil.css">

<style>
    input {
        width: 100%;
        height: 100%;
        font-family: 'ChineseRock';
        font-size: 34px;
        background-color: transparent;
        outline: none;
        border: none;
        color: white;
    }

    button{
        width: 100%;
        height: 100%;
        font-family: 'ChineseRock';
        font-size: 34px;
        /* background-color: transparent; */
        outline: none;
        border: none;
        color: white;
    }
</style>
</head>
<body>
    <div class="semua">
        <div class="atas">
            <div class="tabel">
                <div class="kanan">
                    <img src="asset/imgprofil.png">
                </div>

                <div class="tengah">
                    <p>YOUR PROFILE</p>
                </div>

                <div class="kiri">
                    <form action="profiledit.php" method="post">
                        <table>
                            <tr>
                                <td>Nama</td>  
                                <td>:</td>
                                <td> 
                                    <input type="text" value="<?= $hasil2[0]["name"] ?>" name="nama">
                                </td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td> 
                                    <input type="text" value="<?= $hasil2[0]["username"] ?>" name="username">
                                </td>
                            </tr>
                            <tr>
                                <td>Birthday</td>
                                <td>:</td>
                                <td> 
                                    <input type="text" value="<?= $hasil2[0]["birthday"] ?>" name="birthday">
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td> 
                                    <input type="text" value="<?= $hasil2[0]["password"] ?>" name="password">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: center;"><button type="submit" name="submit">SAVE</button></td>
                            </tr>
                    </table>
                </form>
                    <div class="tombol">
                        <a href="home.php">HOME</a>
                        <a href="logout.php">LOGOUT</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>