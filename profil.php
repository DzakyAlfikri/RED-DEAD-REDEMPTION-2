<?php 
include "koneksi.php";
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
}
$id = $_SESSION["username"];

$query = "
select user.*,pencapaian.idkarakter from user join pencapaian on user.username = pencapaian.iduser where user.username = '$id'";

$hasil = mysqli_query($conn,$query);
$hasil2 = array();
while ($x = mysqli_fetch_assoc($hasil)) {
    array_push($hasil2,$x);
}


// var_dump($hasil2);
if (count($hasil2) == 0) {
    $query = "
    select * from user where username = '$id'";
    $hasil = mysqli_query($conn,$query);
}

while ($x = mysqli_fetch_assoc($hasil)) {
    array_push($hasil2,$x);
}

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
                            <td> <?= $hasil2[0]["name"] ?> </td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><?= $hasil2[0]["username"] ?></td>
                        </tr>
                        <tr>
                            <td>Birthday</td>
                            <td>:</td>
                            <td><?= $hasil2[0]["birthday"] ?></td>
                        </tr>
                    </table>
                    <div class="tombol">
                        <a href="home.php">HOME</a>
                        <a href="profiledit.php?username=<?=$id ?>">EDIT</a>
                    </div>
                </div>
            </div>
            <p class="judul">ACHIEVEMENT</p>
        </div>

        <div class="bawah">
            <div class="achivement">



                <?php if(count($hasil2)>1): ?>            
                    <?php foreach ($hasil2 as $x): ?>    
                        <img src="asset/<?=$x["idkarakter"]?>.png" alt="">
                    <?php endforeach; ?>
                    <?php for ($i = 0; $i < 5 - count($hasil2); $i++): ?>
                        <img src="asset/kosong.png" alt="">
                    <?php endfor; ?>
                <?php endif?>
                    
                    
                <?php for ($i = 0; $i < 5 ; $i++): ?>
                    <img src="asset/kosong.png" alt="">
                <?php endfor; ?>

                
                    

            </div>
        </div>
    </div>
</body>
</html>