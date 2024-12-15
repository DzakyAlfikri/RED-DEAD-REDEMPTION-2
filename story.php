<?php 
include "koneksi.php";
session_start();
$username = $_SESSION["username"];
$id = $_GET["id"];       // Fetch 'id' from URL
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 0; // Fetch 'page', default to 0 if not set
$page = $_GET["page"];       // Fetch 'id' from URL

$hasil = mysqli_query($conn, "SELECT * FROM petualangan WHERE idkarakter='$id'");
$hasil2 = array();

while ($a = mysqli_fetch_assoc($hasil)) {
    array_push($hasil2, $a);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story</title>
    <link rel="stylesheet" href="story.css">
</head>
<body>
    
    <div class="background">
        <div class="atas">
            <div class="kertas">
                <div class="gambar">
                    <img src="asset/misi/<?= $hasil2[$page]["gambar"]?>">
                </div>
                
                <div class="deskripsi">
                    <h5><?= $hasil2[$page]["misi"] ?></h5>
                    <p><?= $hasil2[$page]["cerita"] ?></p>
                </div>
            </div>
        </div>

        <div class="tombol">
            <a href="#" id="prev-link">BACK</a>
            <a href="#" id="next-link">NEXT</a>
        </div>
    </div>

    <script>
        // Fetch current page from PHP
        let currentPage = <?= $page ?>; 
        let username = "<?= $username ?>"; 
        const id = "<?= $id ?>"; // Dynamically pass 'id' value from PHP

        const prevLink = document.getElementById('prev-link'); // Previous button
        const nextLink = document.getElementById('next-link'); // Next button

        // Function to update href values for Next and Previous links
        function updateLinks() {
            if (currentPage == 2) {
                nextLink.href = `successtory.php?id=${id}&username=${username}`;
            } else {

                nextLink.href = `story.php?id=${id}&page=${currentPage < 2 ? currentPage + 1 : 2}`;
            }
            prevLink.href = `story.php?id=${id}&page=${currentPage > 0 ? currentPage - 1 : 0}`; // Prevent going below page 0
        }

        // Set the initial href values
        updateLinks();

        // Event listener for "Next" button
        nextLink.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default link behavior
            // currentPage++; // Increment page
            updateLinks(); // Update links
            window.location.href = nextLink.href; // Redirect
        });

        // Event listener for "Previous" button
        prevLink.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default link behavior
            if (currentPage > 0) { // Ensure the page doesn't go below 0
                // currentPage--; // Decrement page
                updateLinks(); // Update links
                window.location.href = prevLink.href; // Redirect
            }
        });
    </script>
</body>
</html>
