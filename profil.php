<?php 
session_start();
$id = $_SESSION["username"];
include "koneksi.php";

$query = "select * from pencapaian where iduser='$id'";
$hasil = mysqli_query($conn,$query);
$hasil2 = array();

while ($x = mysqli_fetch_assoc($hasil)) {
    array_push($hasil2,$x["idkarakter"]);
}

var_dump($hasil2);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="profil.css">
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
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>Athaya Raihan</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td>Atha</td>
                        </tr>
                        <tr>
                            <td>Birthday</td>
                            <td>:</td>
                            <td>12 Desember 2024</td>
                        </tr>
                    </table>
                    <div class="tombol">
                        <a href="#">LOGOUT</a>
                        <a href="#">EDIT</a>
                    </div>
                </div>
            </div>
            <p class="judul">ACHIEVEMENT</p>
        </div>

        <div class="bawah">
            <div class="achivement">



                <?php foreach ($hasil2 as $x): ?>                
                    <img src="asset/<?=$x?>.png" alt="">
                <?php endforeach; ?>

                <?php for ($i = 0; $i < 5 - count($hasil2); $i++): ?>
                    <img src="asset/abigailabu.png" alt="">
                <?php endfor; ?>
                    

            </div>
        </div>
    </div>
</body>
</html>