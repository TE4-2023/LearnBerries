<?php
// Inkludera filer för att ansluta till databasen och använda funktioner
require 'Includes/connect.php';
require 'Includes/functions.php';

// Starta en sessionshantering
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta-taggarna för teckenuppsättning och vyport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Inkludera Font Awesome-ikoner och stilmall -->
    <script src="https://kit.fontawesome.com/ef1241843c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="nyheter.css">

    <!-- Importera Google Fonts för sidans typsnitt -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@300&display=swap');
        body {
            font-family: 'Source Sans 3', sans-serif;
        }
    </style>

    <!-- Sidans titel -->
    <title>Nyheter</title>

    <!-- JavaScript-funktioner för bekräftelse och redigering av nyheter -->
    <script>
        // Funktion för att bekräfta radering av nyhet
        function confirmDelete() {
            return confirm("Är du säker att du vill radera nyheten?");
        }
    </script>

    <script>
        // Funktion för att öppna redigeringsmodalen och fylla i befintliga nyhetsdetaljer
        function openEditModal(postID, currentTitle, currentDescription) {
            // Fyll i redigeringsmodalen med aktuella nyhetsdetaljer
            document.getElementById('editTitle').value = currentTitle;
            document.getElementById('editDescription').value = currentDescription;
            document.getElementById('editPostID').value = postID;

            // Visa redigeringsmodalen
            document.getElementById('EditNewsModal').style.display = 'block';
        }

        // Funktion för att stänga redigeringsmodalen
        function closeEditModal() {
            // Stäng redigeringsmodalen
            document.getElementById('EditNewsModal').style.display = 'none';
        }
    </script>
</head>

<body>
    <!-- Sidans huvudcontainer -->
    <div class="container">
        <!-- Navigationssektion -->
        <nav>
            <div class="navbar">
                <!-- Logotyp och sidrubrik -->
                <ul>
                    <li><img class="bild" src="logga.png" alt="logga" /></li>
                    <li>
                        <h1 class="header">Nyheter</h1>
                    </li>

                    <!-- Logga ut-länk -->
                    <div class="left-nav">
                        <li><a href="Includes/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logga ut</a></li>
                    </div>
                </ul>
            </div>
        </nav>

        <!-- Knapp för att skapa nyhet -->
        <button onclick="openNewsModal()" class="skapa-nyhet" id="myBtn"><i class="fa-solid fa-file-circle-plus"></i> Skapa Nyhet</button>

        <!-- Modal för att skapa nyhet -->
        <div id="NewsModal" class="modal">
            <!-- Innehåll i skapa nyhet-modalen -->
            <div class="modal-content">
                <form id="form" action="Includes/add-news.php" method="post">
                    <div class="header-pop">
                        <h2>Skapa nyhet</h2>
                        <span class="close" onclick="closeNewsModal()">&times;</span>
                    </div>

                    <!-- Inmatningsfält för rubrik -->
                    <div class="input-container">
                        <label for="title">Rubrik:</label>
                        <input name="title" id="title" class="kurs-titel" type="text" placeholder="Skriv rubrik här" required>
                    </div>

                    <!-- Inmatningsfält för beskrivning -->
                    <div class="input-container">
                        <label for="description">Beskrivning:</label>
                        <textarea name="description" id="description" class="kurs-titel" placeholder="Skriv beskrivning här" required></textarea>
                    </div>

                    <!-- Knapp för att publicera nyhet -->
                    <input type="submit" class="c-btn" value="Publicera">
                </form>
            </div>
        </div>

        <!-- Modal för att redigera nyhet -->
        <div id="EditNewsModal" class="modal">
            <!-- Innehåll i redigera nyhet-modalen -->
            <div class="modal-content">
                <form id="editForm" action="Includes/edit-news.php" method="post">
                    <div class="header-pop">
                        <h2>Redigera nyhet</h2>
                        <span class="close" onclick="closeEditModal()">&times;</span>
                    </div>

                    <!-- Inmatningsfält för ny rubrik -->
                    <div class="input-container">
                        <label for="editTitle">Ny Rubrik:</label>
                        <input name="editTitle" id="editTitle" class="kurs-titel" type="text" required>
                    </div>

                    <!-- Inmatningsfält för ny beskrivning -->
                    <div class="input-container">
                        <label for="editDescription">Ny Beskrivning:</label>
                        <textarea name="editDescription" id="editDescription" class="kurs-titel" required></textarea>
                    </div>

                    <!-- Dolt fält för att hålla reda på post-ID vid uppdatering -->
                    <input type="hidden" id="editPostID" name="editPostID" value="">

                    <!-- Knapp för att uppdatera nyhet -->
                    <input type="submit" class="c-btn" value="Uppdatera">
                </form>
            </div>
        </div>

        <!-- PHP-kod för att hämta och visa nyheter från databasen -->
        <?php
        $newsQuery = "SELECT * FROM news";
        $newsResult = $pdo->query($newsQuery);
        ?>

        <!-- Grid för att visa nyheter -->
        <div class="nyheter-grid">
            <?php
            // Loop för att visa nyheter
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

        <!-- Navigationssektion för vertikal navigering -->
        <nav>
            <div class="vert-nav">
                <ul>
                    <!-- Länkar till andra sidor -->
                    <li><a href="home.php"><i class="fa-solid fa-house"></i> Hem</a></li>
                    <li><a href="kurser.php"><i class="fa-solid fa-scroll"></i> Kurser</a></li>
                    <li><a href=""><i class="fa-regular fa-calendar-days"></i> Scheman</a></li>
                    <li><a href="närvaro.php"><i class="fa-solid fa-file-pen"></i> Närvaro</a></li>
                    <li class="active"><a href="nyheter.php"><i class="fa-solid fa-newspaper"></i> Nyheter</a></li>
                    <li><a href="kontakter.php"><i class="fa-solid fa-address-book"></i> Kontakter</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Importera JavaScript-fil för modalhantering -->
    <script src="news-modal.js"></script>
</body>

</html>
