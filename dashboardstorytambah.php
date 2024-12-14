<?php 
include 'koneksi.php'; // Database connection

if (isset($_POST["submit"])) {
    try {
        // Retrieve and sanitize user input
        $idkarakter = $_POST["idkarakter"];
        $misi = $_POST["misi"];
        $cerita = $_POST["cerita"];
        $gambar = $_POST["gambar"];

        // Use prepared statements to insert data
        $stmt = mysqli_prepare($conn, "INSERT INTO petualangan (idkarakter, misi, cerita, gambar) VALUES (?, ?, ?, ?)");

        // Bind parameters to the query
        mysqli_stmt_bind_param($stmt, "ssss", $idkarakter, $misi, $cerita, $gambar);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Berhasil menambahkan data');</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data');</script>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
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
            <form action="dashboardstorytambah.php" method="post" name="submited">
            <table>

                    <tr>
                        <td>Name </td>
                        <td><input type="text" placeholder="nama" name="idkarakter">
                    </td>
                </tr>
                <tr>
                    <td>Username </td>
                    <td><input type="text" placeholder="username" name="misi">
                    </td>
                </tr>
                <tr>
                    <td>Birthday </td>
                    <td><input type="text" placeholder="birthday (YYYY-MM-DD)" name="cerita">
                </td>
            </tr>
            <tr>
                <td>Password </td>
                <td><input type="text" placeholder="password" name="gambar">
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