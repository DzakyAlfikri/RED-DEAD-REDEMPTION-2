<?php 
include 'koneksi.php';

$hasil = mysqli_query($conn,"select * from user where username='$id'");
$hasil2 = mysqli_fetch_assoc($hasil);
$nama = $hasil2["name"];
$username = $hasil2["username"];
$birthday = $hasil2["birthday"];
$password = $hasil2["password"];

if(isset($_POST["form"])){
    try {
        $nama = $_POST["nama"];
        $username = $_POST["username"];
        $birthday = $_POST["birthday"];
        $password = $_POST["password"];
        echo $nama;
        $query = "UPDATE user SET 
                    birthday = '$birthday'
                  WHERE username = '$id'";
        mysqli_query($conn, $query);
    } catch (\Throwable $th) {
        echo "<script> alert ('$th') </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="dashboardedit.css">
</head>
<body>
<div class="container">
    <div class="kiri">
        <div class="atas">
            <div class="img">
                <img src="asset/judul.png" alt="">
            </div>
            <div class="kotak">
                <table>
                    <tr>
                        <td><img src="asset/icon/person.png" alt=""></td>
                        <td>User</td>
                    </tr>
                </table>
            </div>
            <div class="kotak">
                <table>
                    <tr>
                        <td><img src="asset/icon/character.png" alt=""></td>
                        <td>Character</td>
                    </tr>
                </table>
            </div>
            <div class="kotak">
                <table>
                    <tr>
                        <td><img src="asset/icon/mission.png" alt=""></td>
                        <td>Story</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="bawah">
            <div class="kotak-bawah">Logout</div>
        </div>
    </div>
    <div class="kanan">
        <div class="garis"></div>
        <div class="kanan-atas">
            <button>ADD</button>
        </div>
        <div class="table">
            <form action="dashboardedit.php" method="post" name="form">
                <table>
                    <tr>
                        <td>Name </td>
                        <td><input type="text" placeholder="<?= $hasil2['name'] ?>" name="nama">
                        </td>
                    </tr>
                    <tr>
                        <td>Username </td>
                        <td><input type="text" placeholder="<?= $hasil2['username'] ?>" name="username">
                        </td>
                    </tr>
                    <tr>
                        <td>Birthday </td>
                        <td><input type="text" placeholder="<?= $hasil2['birthday'] ?>" name="birthday">
                        </td>
                    </tr>
                    <tr>
                        <td>Password </td>
                        <td><input type="text" placeholder="<?= $hasil2['password'] ?>" name="password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="centered">
                            <button type="submit">Save</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        
    </div>
</div>
</body>
</html>