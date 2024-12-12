<?php 
include 'koneksi.php';
$id = $_GET['id'];

try {
    $hasil = mysqli_query($conn,"delete from user where username='$id'");
    echo "<script> alert('Data berhasil dihapus')";
    header("Location: dashboard.php");
} catch (\Throwable $th) {
    echo $th;
}

?>