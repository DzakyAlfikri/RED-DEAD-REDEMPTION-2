<?php 
session_start();
$id ="";
if (isset($_SESSION["username"])) {
    $id = $_SESSION["username"];
}
include 'koneksi.php';

$hasil = mysqli_query($conn,"select * from karakter");
$hasil3 = array();
while ($hasil2 = mysqli_fetch_assoc($hasil)) {
    array_push($hasil3,$hasil2);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css"> 
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>

    <nav>
        <div class="kiri">
        <?php if ($id == "admin"): ?>
            <a href="dashboard.php">
                <div class="logo"></div>
            </a>
        <?php else: ?>
            <a href="profil.php?id=<?=$id?>">
                <div class="logo"></div>
            </a>
        <?php endif; ?>


        <?php if ($id == "admin"): ?>
            <a href="dashboard.php">
                <div class="username">
                    <p>Username</p>
                </div>
            </a>
        <?php else: ?>
            <a href="profil.php?id=<?=$id?>">
                <div class="username">
                    <?php if ($id != ""): ?>
                        <p><?= $id ?></p>
                    <?php else: ?>
                        <p>GUEST</p>
                    <?php endif; ?>
                </div>
            </a>
        <?php endif; ?>
              
                
        </div>

        <div class="kanan">
            <a href="choosechar.php">Story</a>
            <a href="#apanihnjr">Character</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="background1">
        <img src="asset/atas.png">
        <div class="judul">
            <img src="asset/judul.png">
        </div>
    </div>

    <div class="deret">
        <img src="asset/deret.png">
    </div>

    <div class="video">
        <video controls>
            <source src="asset/videohome.mp4">
        </video>
        <div class="play">
            <div class="bulet">
                <div class="segitiga"></div>
            </div>
        </div>
    </div>
    
    <div class="background2">
        <div class="gradasi">
            <div class="garisatas"></div>
            <div class="misi"><a href="choosechar.php"><p>START MISSIONS</p></a></div>
            <div class="garisbawah"></div>
        </div>
        <img src="asset/bgchararter.png" id="apanihnjr">
        <div class="konten">
            <div class="samping">
                <p data-text="THE VAN DER LINDE GANG">THE VAN DER LINDE GANG</p>
            </div>
            <div class="karaktergrid">
                <div class="grid">

                    <?php 
                    for ($i=0; $i < count($hasil3); $i++) { 
                        $character = $hasil3[$i]; 
                        $name = $character['nama'];  // Assuming 'name' is a key in your array
                        $image = $character['poto']; // Assuming 'image' is a key in your array

                        // Output the HTML dynamically for each character
                        echo '<a href="detail.php?nama='.$name.'">
                                <div class="karakter">
                                <div class="gambarkarakter">
                                <img src="asset/' . $image . '">
                                </div>
                                <p>' . strtoupper($name) . '</p>
                                </div>
                                </a>';
                    }
                    ?>
                </div>
            </div>
            <div class="judulending">
                <p>ENDINGS</p>
                <img src="asset/judul.png">
            </div>

            <div class="ending">
                <div class="goodend">
                    <div class="title">
                        <img src="asset/good.jpg">
                        <h3>GOOD ENDING</h3>
                        <p>In the ending where Arthur helps John, they try to escape a gun battle, with Arthur sacrificing himself for John's family. As Arthur, weakened by tuberculosis, draws the pursuers away, he faces Micah Bell in a final confrontation on the mountaintop. Dutch, unable to choose between them, ultimately leaves. If Arthur's Honor meter is high, he reflects on his attempt to become a better man before succumbing to his illness while watching the sunrise. With a low Honor meter, Arthur admits his and Bell's flaws, and Bell kills Arthur with a gunshot to the head.</p>
                    </div>
                </div>
    
                <div class="badend">
                    <div class="title">
                        <img src="asset/bad.jpg">
                        <h3>BAD ENDING</h3>
                        <p>If you choose to go back for the money, Arthur heads back to the burning camp of the Van der Linde gang. He gets the money, but Micah Bell ambushes him. The pair end up having a knife fight in the camp, with Micah gaining the upper hand and stabbing Arthur. Once again, Dutch appears and Arthur fingers Micah as the Pinkerton rat. Dutch leaves, stunned at how the gang turned out. Micah stabs a crawling Arthur in the back, finally killing him.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const playButton = document.querySelector('.play');
    const video = document.querySelector('video');

    playButton.addEventListener('click', function() {
        if (video.paused) {
            video.play();
            playButton.style.opacity = '0';
        } else {
            video.pause();
            playButton.style.opacity = '1';
        }
    });

    // Tampilkan tombol hanya saat cursor di atas tombol
    playButton.addEventListener('mouseenter', function() {
        if (!video.paused) {
            playButton.style.opacity = '1';
        }
    });

    // Sembunyikan tombol saat cursor meninggalkan tombol
    playButton.addEventListener('mouseleave', function() {
        if (!video.paused) {
            playButton.style.opacity = '0';
        }
    });

    // Tampilkan tombol kembali saat video selesai
    video.addEventListener('ended', function() {
        playButton.style.opacity = '1';
    });
</script>
</html>