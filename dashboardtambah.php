<?php 
include 'koneksi.php';


// var_dump($hasil2);
if (isset($_POST["submit"])) {
    try {
        $nama = $_POST["nama"];
        $username = $_POST["username"];
        $birthday = $_POST["birthday"];
        $password = $_POST["password"];
        mysqli_query($conn,"insert into user values('$username','$nama','$birthday','$password')");
        echo "<script> alert ('berhasil menambahkan data') </script>";
    } catch (\Throwable $th) {
        echo $th;
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
            <form action="dashboardtambah.php" method="post" name="submited">
            <table>

                    <tr>
                        <td>Name </td>
                        <td><input type="text" placeholder="nama" name="nama">
                    </td>
                </tr>
                <tr>
                    <td>Username </td>
                    <td><input type="text" placeholder="username" name="username">
                    </td>
                </tr>
                <tr>
                    <td>Birthday </td>
                    <td><input type="text" placeholder="birthday (YYYY-MM-DD)" name="birthday">
                </td>
            </tr>
            <tr>
                <td>Password </td>
                <td><input type="text" placeholder="password" name="password">
            </td>
        </tr>
                <tr>
                    <td colspan="2" class="centered">
                        <button type="submit" name="submit">BACK</button>
                    </td>
                </tr>
            </table>
        </form>
        </div>
        
        
    </div>
</div>
</body>
</html>