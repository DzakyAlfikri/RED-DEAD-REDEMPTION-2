<?php 
include 'koneksi.php';
$id = $_GET['id'];

try {
    $hasil = mysqli_query($conn,"delete from petualangan where misi='$id'");
    echo "<script> alert('Data berhasil dihapus')";
    header("Location: dashboardstory.php");
} catch (\Throwable $th) {
    echo $th;
}


?>