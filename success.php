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