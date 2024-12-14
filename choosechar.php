<?php
session_start(); // Start the session

// Check if an ID is passed in the URL and store it in the session
if (isset($_GET['id'])) {
    $_SESSION['selected_id'] = $_GET['id'];
}

// When the "GO" button is clicked, fetch the stored ID
if (isset($_GET['action']) && $_GET['action'] == 'go') {
    if (isset($_SESSION['selected_id'])) {
        $selected_id = $_SESSION['selected_id'];
        echo "<script>alert('You selected ID: $selected_id');</script>";
    } else {
        echo "<script>alert('No image selected');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Charakter</title>
    <link rel="stylesheet" href="choosechar.css">
</head>
<body>
    <div class="background">

        <div class="judul">
            <p>CHOOSE CHARACTER</p>
        </div>

        <div class="konten">
            <div class="grid">   
                <img src="asset/arthur.png" class="karakter" id="arthur">
                <img src="asset/dutch.png" class="karakter" id="dutch">
                <img src="asset/jack.png" class="karakter" id="jack">
                <img src="asset/abigail.jpg" class="karakter" id="abigail">
                <img src="asset/josiah.jpg" class="karakter" id="josiah">
            </div>
        </div>

        <div class="bawah">
            <a href="#" id="go-link">GO</a>
        </div>

    </div>
</body>
<script>
    const characters = document.querySelectorAll('.karakter');
    const goLink = document.getElementById('go-link');
    characters.forEach(character => {
        character.addEventListener('click', () => {
            characters.forEach(c => c.classList.remove('pilih')); 
            character.classList.add('pilih'); 
            let id = character.getAttribute('id');
            goLink.href = `story.php?id=${id}&page=0`;
        });
    });
    
</script>
</html>