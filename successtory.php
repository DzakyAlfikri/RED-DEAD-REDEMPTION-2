<?php 
include "koneksi.php";
session_start();
$username = $_SESSION["username"];
$id = $_GET["id"];

try {
    mysqli_query($conn,"insert into pencapaian values('$username','$id')");
} catch (\Throwable $th) {
    echo "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="successtory.css">
    <style>
    .bg{
        background-image: url('asset/suc_<?= $id?>.png');
        width: 100%;
        height: 100vh;
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat;
        display: flex;
        justify-content: right;
        position: relative;
    }
    </style>
</head>
<body>
    <div class="bg">
        <div class="tombol">
            <a href="home.php">HOME</a>
            <a href="choosechar.php">CHARACTER</a>
        </div>
    </div>
</body>
</html>