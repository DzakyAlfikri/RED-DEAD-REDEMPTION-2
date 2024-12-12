<?php 
    $username = '';
    $nama = '';
    $birthday = '';
    $password = '';
    $confirmpassword = '';
    $error = '';
    include 'koneksi.php';
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $birthday = $_POST['birthday'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        if($password == $confirmpassword){
            $query = "insert into user values('$username', '$nama', '$birthday', '$password')";
            try {
                mysqli_query($conn,$query);
                echo "<script>
                    alert('Berhasil registrasi akun');
                    let jawaban = confirm('Ingin lanjut ke menu utama?');
                    if (jawaban) {
                    window.location.href = 'home.php';
                    } else {
                    window.location.href = 'login.php';
                    }
                    </script>";
            } catch (\Throwable $th) {
                $error ="username sudah digunakan";
            }
        } else {
            $error ="password tidak sama";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="registrasi">
        <div class="input">
            <h2><span> YOUR ADVENTURE  </span> BEGINS HERE </h2>

            <form action="" method="post">
                <input type="text" placeholder="USERNAME" class="isi" name="username" value="<?= $username ?>">
                <input type="text" placeholder="NAME" class="isi" name="nama" value="<?= $nama ?>">
                <input type="text" placeholder="BIRTHDAY (YYYY-MM-DD) " class="isi" name="birthday" value="<?= $birthday ?>">
                <input type="password" placeholder="PASSWORD" class="isi" name="password" value="<?= $password ?>">
                <input type="password" placeholder="CONFIRM PASSWORD" class="isi" name="confirmpassword" value="<?= $confirmpassword ?>">

                <?php if (!empty($error)): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>
                
                <button type="submit" class="tombol" name="register">CREATE</button>
                
                <a href="login.php" class="balik-login">HAVE AN ACCOUNT</a>
            </form>
        </div>
        <div class="gambar">
            <img src="asset/register.png">
        </div>
    </div>
</body>
</html>