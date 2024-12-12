<?php 
include 'koneksi.php';
$offset = 0;
$hasil = mysqli_query($conn,"select * from user limit $offset,7");

$hasil3 = array();

while ($hasil2 = mysqli_fetch_assoc($hasil)) {
    array_push($hasil3,$hasil2);
}
var_dump(count($hasil3));

$totalresult = count($hasil3);
$perpage = 7;
$totalpage = round($totalresult/$perpage);
$page = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<div class="container">
    <div class="kiri">
        <div class="atas">
            <div class="img">
                <img src="asset/judul.png" alt="">
            </div>
            <div class="kotak">
                <table>
                    <tr>
                        <td><img src="asset/icon/person.png" alt=""></td>
                        <td>User</td>
                    </tr>
                </table>
            </div>
            <div class="kotak">
                <table>
                    <tr>
                        <td><img src="asset/icon/character.png" alt=""></td>
                        <td>Character</td>
                    </tr>
                </table>
            </div>
            <div class="kotak">
                <table>
                    <tr>
                        <td><img src="asset/icon/mission.png" alt=""></td>
                        <td>Story</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="bawah">
            <div class="kotak-bawah">Logout</div>
        </div>
    </div>
    <div class="kanan">
        <div class="garis"></div>
        <div class="kanan-atas">
            <input type="search" name="" id="">
            <button>ADD</button>
        </div>
        <table>
            <?php
                echo '<tr>
                        <td> No</td>
                        <td> Username</td>
                        <td> Nama</td>
                        <td> Birthday</td>
                        <td> Password</td>
                        <td> Action</td>
                        </tr>';
                        
                        for ($i=0; $i < count($hasil3); $i++) { 
                            $id=$hasil3[$i]["username"];
                            echo '<tr>
                            <td>'.($i+1).'</td>
                            <td>'.$hasil3[$i]["username"]. '</td>
                            <td>'.$hasil3[$i]["name"].'</td>
                            <td>'.$hasil3[$i]["birthday"]. '</td>
                            <td>'.$hasil3[$i]["password"]. '</td>
                            <td> 
                                <a href="dashboardedit.php?id='.$id.'"><img src="asset/icon/edit.png"></a>
                                <a href="dashboardhapus.php?id='.$id.'"> <img src="asset/icon/delete.png"></a>
                            </td>
                    </tr>';
                }
            
            ?>
        </table>

        <div class="kanan-bawah">
            <button class="page" id="prev" name="prev" onclick="navigateToPage(<?php echo $page - 1; ?>)">Prev</button>
            <button class="page" id="next" name="next" onclick="navigateToPage(<?php echo $page + 1; ?>)">Next</button>
        </div>
    </div>
</div>

<script>
        function navigateToPage(page) {
            window.location.href = '?page=' + page;
        }
    </script>
</body>
</html>