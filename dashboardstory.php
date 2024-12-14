<?php

session_start();
$id = $_SESSION["username"];
if ($id != "admin") {
    header("Location: home.php");
}
include 'koneksi.php';

// Get the current page number (default to 1 if not set)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perpage = 7; // Number of items per page
$offset = ($page - 1) * $perpage; // Offset for the query

// Get the search query if provided
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// Construct the SQL query with the search condition
$sql = "SELECT * FROM petualangan";
if ($search != '') {
    // Add a WHERE clause if there's a search query
    $sql .= " WHERE idkarakter LIKE '%$search%' OR misi LIKE '%$search%'";
}
$sql .= " LIMIT $offset, $perpage";

// Execute the query
$hasil = mysqli_query($conn, $sql);
    
// Fetch the results
$hasil3 = array();
while ($hasil2 = mysqli_fetch_assoc($hasil)) {
    array_push($hasil3, $hasil2);
}

$nomor = 0;

// Count total results to calculate total pages
$totalResultQuery = "SELECT COUNT(*) FROM petualangan";
if ($search != '') {
    // Add a WHERE clause for counting with the search query
    $totalResultQuery .= " WHERE idkarakter LIKE '%$search%' OR misi LIKE '%$search%'";
}
$totalResult = mysqli_fetch_row(mysqli_query($conn, $totalResultQuery))[0];
$totalPages = ceil($totalResult / $perpage);

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
                <a href="home.php">  <img src="asset/judul.png" alt=""> </a>
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
            <form action="dashboard.php" method="get">
                <input type="search" name="search" placeholder="masukan username">
            </form>
            <a href="dashboardstorytambah.php"><button style="cursor: pointer;">ADD</button></a> 
        </div>
        <table>
            <tr>
                <td>No</td>
                <td>Karakter</td>
                <td>Misi</td>
                <td>Cerita</td>
                <td>Gambar</td>
                <td>Action</td>
            </tr>

            <?php foreach ($hasil3 as $x): ?>     
                <tr>
                    <td><?= ++$nomor; ?></td>
                    <td><?= $x["idkarakter"] ?></td>
                    <td><?= $x["misi"] ?></td>
                    <td><?= $x["cerita"] ?></td>
                    <td><?= $x["gambar"] ?></td>
                    <td>
                        <a href="dashboardstoryedit.php?id=<?= $x["misi"] ?>"><img src="asset/icon/edit.png"></a>
                        <a href="javascript:void(0)" onclick="confirmDelete('dashboardstoryhapus.php?id=<?=$x['misi']?>')"> 
                            <img src="asset/icon/delete.png">
                        </a>
                    </td>
                </tr>           
            <?php endforeach; ?>
            
            
        </table>

        <!-- Pagination buttons -->
        <div class="kanan-bawah">
            <?php if ($page > 1): ?>
                <button class="page" id="prev" name="prev" onclick="navigateToPage(<?php echo $page - 1; ?>)">Prev</button>
            <?php endif; ?>

            <?php if ($page < $totalPages): ?>
                <button class="page" id="next" name="next" onclick="navigateToPage(<?php echo $page + 1; ?>)">Next</button>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
function confirmDelete(url) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        window.location.href = url; // Redirect ke URL jika user memilih "OK"
    }
}

function navigateToPage(page) {
    const searchParams = new URLSearchParams(window.location.search);
    searchParams.set('page', page); // Update the 'page' parameter
    window.location.search = searchParams.toString(); // Reload the page with the updated query string
}
</script>

</body>
</html>
