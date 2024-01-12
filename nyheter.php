<?php
require 'Includes/connect.php';
require 'Includes/functions.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ef1241843c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="nyheter.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@300&display=swap');
        body {
            font-family: 'Source Sans 3', sans-serif;
        }
    </style>
    <title>Nyheter</title>
   <script>
    function confirmDelete() {
    return confirm("Är du säker att du vill radera nyheten?");
}
   </script>
   <script>
    
function openEditModal(postID, currentTitle, currentDescription) {
    // Populate the edit modal with current news details
    document.getElementById('editTitle').value = currentTitle;
    document.getElementById('editDescription').value = currentDescription;
    document.getElementById('editPostID').value = postID;

    // Show the edit modal
    document.getElementById('EditNewsModal').style.display = 'block';
}

function closeEditModal() {
    // Close the edit modal
    document.getElementById('EditNewsModal').style.display = 'none';
}


   </script>
</head>

<body>
    <div class="container">
        <nav>
            <div class="navbar">
                <ul>
                    <li><img class="bild" src="logga.png" alt="logga" /></li>
                    <li>
                        <h1 class="header">Nyheter</h1>
                    </li>

                    <div class="left-nav">
                        <li><a href="Includes/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logga ut</a></li>
                    </div>
                </ul>
            </div>
        </nav>

        


      <button onclick="openNewsModal()" class="skapa-nyhet" id="myBtn"><i class="fa-solid fa-file-circle-plus"></i> Skapa Nyhet</button>


        <div id="NewsModal" class="modal">

                        <!-- News Modal  -->
                <div class="modal-content">
                    <form id="form" action="Includes/add-news.php" method="post">
                        <div class="header-pop">
                            <h2>Skapa nyhet</h2>
                            <span class="close" onclick="closeNewsModal()">&times;</span>
                        </div>

                        <div class="input-container">
                            <label for="title">Rubrik:</label>
                            <input name="title" id="title" class="kurs-titel" type="text" placeholder="Skriv rubrik här" required>
                        </div>

                        <div class="input-container">
                            <label for="description">Beskrivning:</label>
                            <textarea name="description" id="description" class="kurs-titel" placeholder="Skriv beskrivning här" required></textarea>
                        </div>

                        <input type="submit" class="c-btn" value="Publicera">
                    </form>
                </div>


       </div>

        <!-- Edit News Modal -->
        <div id="EditNewsModal" class="modal">
                <div class="modal-content">
                    <form id="editForm" action="Includes/edit-news.php" method="post">
                        <div class="header-pop">
                            <h2>Redigera nyhet</h2>
                            <span class="close" onclick="closeEditModal()">&times;</span>
                        </div>

                        <div class="input-container">
                            <label for="editTitle">Ny Rubrik:</label>
                            <input name="editTitle" id="editTitle" class="kurs-titel" type="text" required>
                        </div>

                        <div class="input-container">
                            <label for="editDescription">Ny Beskrivning:</label>
                            <textarea name="editDescription" id="editDescription" class="kurs-titel" required></textarea>
                        </div>

                        <input type="hidden" id="editPostID" name="editPostID" value="">
                        <input type="submit" class="c-btn" value="Uppdatera">
                    </form>
                </div>
            </div>

      
            <?php
            // Fetch news from the database
            $newsQuery = "SELECT * FROM news";
            $newsResult = $pdo->query($newsQuery); 
                ?>
        <div class="nyheter-grid">

        <?php
             //Displays news
                while ($row = $newsResult->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="nyheter">';
                    echo '<h2>' . $row['title'] . '</h2>';
                    echo '<p class="description">' . $row['description'] . '</p>';
                    echo '<button onclick="openEditModal(' . $row['post_ID'] . ', \'' . htmlspecialchars($row['title'], ENT_QUOTES) . '\', \'' . htmlspecialchars($row['description'], ENT_QUOTES) . '\')" class="edit-btn"><i class="fa-solid fa-pencil"></i></button>';
                    echo '<form action="Includes/delete-news.php" method="post" onsubmit="return confirmDelete()">';
                    echo '<input type="hidden" name="post_ID" value="' . $row['post_ID'] . '">';
                    echo '<button type="submit" class="delete-btn"><i class="fa-solid fa-trash"></i></button>';
                    echo '</form>';
                    echo '</div>';
                }
                ?>



        </div>

        <nav>
            <div class="vert-nav">
                <ul>
                    <li><a href="home.php"><i class="fa-solid fa-house"></i> Hem</a></li>
                    <li><a href="kurser.php"><i class="fa-solid fa-scroll"></i> Kurser</a></li>
                    <li><a href=""><i class="fa-regular fa-calendar-days"></i> Scheman</a></li>
                    <li><a href=""><i class="fa-solid fa-file-pen"></i> Närvaro</a></li>
                    <li class="active"><a href="nyheter.php"><i class="fa-solid fa-newspaper"></i> Nyheter</a></li>
                    <li><a href="kontakter.php"><i class="fa-solid fa-address-book"></i> Kontakter</a></li>
                </ul>
            </div>
        </nav>

    </div>


            
            <script src="news-modal.js"></script>

</body>

</html>
