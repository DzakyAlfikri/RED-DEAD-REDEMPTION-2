<?php 
include 'koneksi.php';
$id = $_GET['id'];

try {
    $hasil = mysqli_query($conn,"delete from karakter where nama='$id'");
    echo "<script> alert('Data berhasil dihapus')";
    header("Location: dashboardkarakter.php");
} catch (\Throwable $th) {
    echo $th;
}


?>