<?php 
include 'koneksi.php';
$id = $_GET['id'];

$hasil = mysqli_query($conn,"select * from user where username='$id'");
$hasil2 = mysqli_fetch_assoc($hasil);

// var_dump($hasil2);

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
            <table>
                <tr>
                    <td>Name </td>
                    <td><input type="text" value="<?= $hasil2['name'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Username </td>
                    <td><input type="text" value="<?= $hasil2['username'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Birthday </td>
                    <td><input type="text" value="<?= $hasil2['birthday'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Password </td>
                    <td><input type="text" value="<?= $hasil2['password'] ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="centered">
                        <button>BACK</button>
                    </td>
                </tr>
            </table>
        </div>

        
    </div>
</div>
</body>
</html>