<?php
include 'koneksi.php';

// Get the current page number (default to 1 if not set)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perpage = 7; // Number of items per page
$offset = ($page - 1) * $perpage; // Offset for the query

// Get the search query if provided
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// Construct the SQL query with the search condition
$sql = "SELECT * FROM user";
if ($search != '') {
    // Add a WHERE clause if there's a search query
    $sql .= " WHERE username LIKE '%$search%' OR name LIKE '%$search%'";
}
$sql .= " LIMIT $offset, $perpage";

// Execute the query
$hasil = mysqli_query($conn, $sql);
    
// Fetch the results
$hasil3 = array();
while ($hasil2 = mysqli_fetch_assoc($hasil)) {
    array_push($hasil3, $hasil2);
}

// Count total results to calculate total pages
$totalResultQuery = "SELECT COUNT(*) FROM user";
if ($search != '') {
    // Add a WHERE clause for counting with the search query
    $totalResultQuery .= " WHERE username LIKE '%$search%' OR name LIKE '%$search%'";
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
            <form action="dashboard.php" method="get">
                <input type="search" name="search" placeholder="masukan username">
            </form>
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
                        
                for ($i = 0; $i < count($hasil3); $i++) { 
                    $id = $hasil3[$i]["username"];
                    echo '<tr>
                        <td>' . ($i + 1) . '</td>
                        <td>' . $hasil3[$i]["username"] . '</td>
                        <td>' . $hasil3[$i]["name"] . '</td>
                        <td>' . $hasil3[$i]["birthday"] . '</td>
                        <td>' . $hasil3[$i]["password"] . '</td>
                        <td> 
                            <a href="dashboardedit.php?id=' . $id . '"><img src="asset/icon/edit.png"></a>
                            <a href ="dashboardhapus.php?id='.$id.'" id="cek"> <img src="asset/icon/delete.png"></a>
                        </td>
                    </tr>';
                }
            ?>
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
    function navigateToPage(page) {
        window.location.href = '?page=' + page;
    }

    function confirmDelete(id) {
        // JavaScript confirmation dialog
        let confirmDelete = confirm("Apakah Anda ingin menghapus data ini?");
        if (confirmDelete) {
            // If confirmed, redirect to the PHP page to delete the data
            window.location.href = "dashboardhapus.php?id=" + id + "&delete=true";
        } else {
            // If canceled, no action taken (stay on the same page)
            return false;
        }
    }
</script>

<script>
    function confirmDelete(id) {
        // JavaScript confirmation dialog
        let confirmDelete = confirm("Apakah Anda ingin menghapus data ini?");
        if (confirmDelete) {
            // If confirmed, redirect to the PHP page to delete the data
            window.location.href = "dashboardhapus.php?id=" + id + "&delete=true";
        } else {
            // If canceled, no action taken (stay on the same page)
            return false;
        }
    }
</script>
</body>
</html>
