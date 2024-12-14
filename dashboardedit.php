<?php
include 'koneksi.php';

// Ambil ID dari parameter URL
$id = $_GET['id'];

// Ambil data user dari database berdasarkan username
$hasil = mysqli_query($conn, "SELECT * FROM user WHERE username='$id'");
$hasil2 = mysqli_fetch_assoc($hasil);

$nama = $hasil2['name'];
$username = $hasil2['username'];
$birthday = $hasil2['birthday'];
$password = $hasil2['password'];

// Cek apakah form disubmit
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
        echo "<script>alert('Data berhasil diperbarui!');</script>";
        header("Location: dashboard.php");
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
                    <tr id="yuser">
                        <td><img src="asset/icon/person.png" alt=""></td>
                        <td>User</td>
                    </tr>
                </table>
            </div>
            <div class="kotak">
                <table>
                    <tr id="karakterr">
                        <td><img src="asset/icon/character.png" alt=""></td>
                        <td>Character</td>
                    </tr>
                </table>
            </div>
            <div class="kotak">
                <table>
                    <tr id="misyen">
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
        <form action="dashboardedit.php?id=<?= htmlspecialchars($id) ?>" method="post">
                <table>
                    <tr>
                        <td>Name </td>
                        <td><input type="text" value="<?= $hasil2['name'] ?>" name="nama">
                        </td>
                    </tr>
                    <tr>
                        <td>Username </td>
                        <td><input type="text" value="<?= $hasil2['username'] ?>" name="username">
                        </td>
                    </tr>
                    <tr>
                        <td>Birthday </td>
                        <td><input type="text" value="<?= $hasil2['birthday'] ?>" name="birthday">
                        </td>
                    </tr>
                    <tr>
                        <td>Password </td>
                        <td><input type="text" value="<?= $hasil2['password'] ?>" name="password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="centered">
                            <button type="submit" name="submit">Save</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        
    </div>
</div>

<script src="script.js"></script>
</body>
</html>