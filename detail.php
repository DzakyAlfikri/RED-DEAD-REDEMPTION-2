<?php 
include 'koneksi.php';
$id = $_GET['nama'];

$hasil = mysqli_query($conn,"select * from karakter where nama='$id'");
$hasil3 = array();

while ($hasil2 = mysqli_fetch_assoc($hasil)) {
    array_push($hasil3,$hasil2);
}

var_dump($hasil3);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charakter Info</title>
    <link rel="stylesheet" href="arthur.css">
</head>
<body>
    <div class="background">
        
        <div class="gambar"> 
            <img src="asset/CHAR-INFO/<?php echo $hasil3[0]["poto"];?>">
        </div>

        <div class="deskripsi">
            <h3><?php echo $hasil3[0]["nama"];?></h3>
            <p><?php echo $hasil3[0]["description"];?></p>
            <a href="home.php">BACK</a>
            
        </div>

    </div>
</body>
</html>