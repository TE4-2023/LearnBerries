<?php
require 'Includes/connect.php';
session_start();

if (!isset($_SESSION['uid'])) { //switch this out
    //Going back to login page
    header("location: index.php"); // This will redirect
    // differently depending on where you use the code, if you include
    // it in a file thats in a folder it will not find index.php.
    // This is because the code is still executed from the original
    // script.
} else {
    //echo($_SESSION['uid']." ");

}
include 'Includes/courseview.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursvy</title>
    <link rel="stylesheet" href="kursvy.css">
    <script src="https://kit.fontawesome.com/ef1241843c.js" crossorigin="anonymous"></script>
</head>
<body>
<nav>
            <div class="navbar">
                <ul>
                    <li><img class="bild" src="logga.png" alt="logga" /></li>
                    <li>
                        <h1 class="header">Kontakter</h1>
                    </li>

                    <div class="left-nav">
                        <li><a href=""><i class="fa-solid fa-arrow-right-from-bracket"></i> Logga ut</a></li>
                    </div>
                </ul>
            </div>
</nav>

<nav>
            <div class="vert-nav">
                <ul>
                    <li><a href="home.php"><i class="fa-solid fa-house"></i> Hem</a></li>
                    <li class="active"><a href="kurser.php"><i class="fa-solid fa-scroll"></i> Kurser</a></li>
                    <li><a href=""><i class="fa-regular fa-calendar-days"></i> Scheman</a></li>
                    <li><a href=""><i class="fa-solid fa-file-pen"></i> Närvaro</a></li>
                    <li><a href="nyheter.php"><i class="fa-solid fa-newspaper"></i> Nyheter</a></li>
                    <li><a href="kontakter.php"><i class="fa-solid fa-address-book"></i> Kontakter</a></li>
                </ul>
            </div>
</nav>

<div class="kurs" style="background-color:<?php getCourseColor(); ?>;">
        <h1 style="color:white;text-decoration:none !important;"><?php getCourseName(); ?></h1><br>
        <p style="color:white;text-decoration:none !important;">Lärare A</p>
</div>
    
</head>

<body>

    <div class="pane"
        style="width:100%;height:100%;display:flex;flex-direction:column;flex-wrap:wrap; align-items:center;">

        <?php

        // Fetch and display posts
        try {
            $query = $pdo->prepare('
            SELECT posts.*, name.name 
            FROM posts 
            INNER JOIN name 
            ON posts.name_ID = name.name_ID 
            WHERE posts.course_ID = :courseID 
            ORDER BY posts.publishingDate DESC;'
            );
            $data = array(':courseID' => $_GET['kursid']);

            $query->execute($data);

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                echo '<div style="width: 50%; display:flex; flex-direction:column; flex-wrap:wrap; border-top-left-radius:1vh; border-bottom-right-radius:1vh; height: 10%; margin-top:5%; background-color:white;border:1px solid black;">';
                if ($row['name'] == "") {
                    echo '<p>Meddelande</p>';
                } else {
                    echo '<p>Uppgiftsnamn: ' . $row['name'] . '</p>';
                }

                if ($row['deadlineDate'] == '0000-00-00 00:00:00') {
                    echo '<p>Deadline: Ingen</p>';
                } else {
                    echo '<p>Deadline: ' . $row['deadlineDate'] . '</p>';
                }

                // Add more fields as needed
                echo '<hr>';
                echo '<p>Description: ' . $row['description'] . '</p>';
                echo '</div>';
                echo '<br>';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }


        ?>

    </div>

    <div class="users">
        <h2 class="elev-titel">Deltagare</h2>
        <table>
        <tr>
                <td>Användare</td>
                <td>Email</td>
                <td>Roll</td>
                <td>Telefon</td>
                <td>Ta bort från kurs</td>
        </tr>
        <tr>
                <td>Oliver Hedman</td>
                <td>oliver@mail.com</td>
                <td>Elev</td>
                <td>+46 123 123 12</td>

                <td>
                <a class="del-user" href="#"><i class="fa-solid fa-trash"></i></a>
              </td>


        </tr>

        <tr>
                <td>Oliver Hedman</td>
                <td>oliver@mail.com</td>
                <td>Elev</td>
                <td>+46 123 123 12</td>

                <td>
                <a class="del-user" href="#"><i class="fa-solid fa-trash"></i></a>
              </td>


        </tr>
        <tr>
                <td>Oliver Hedman</td>
                <td>oliver@mail.com</td>
                <td>Elev</td>
                <td>+46 123 123 12</td>

                <td>
                <a class="del-user" href="#"><i class="fa-solid fa-trash"></i></a>
              </td>


        </tr>
        <tr>
                <td>Oliver Hedman</td>
                <td>oliver@mail.com</td>
                <td>Elev</td>
                <td>+46 123 123 12</td>

                <td>
                <a class="del-user" href="#"><i class="fa-solid fa-trash"></i></a>
              </td>


        </tr>
        <tr>
                <td>Oliver Hedman</td>
                <td>oliver@mail.com</td>
                <td>Elev</td>
                <td>+46 123 123 12</td>

                <td>
                <a class="del-user" href="#"><i class="fa-solid fa-trash"></i></a>
              </td>


        </tr>
        <tr>
                <td>Oliver Hedman</td>
                <td>oliver@mail.com</td>
                <td>Elev</td>
                <td>+46 123 123 12</td>

                <td>
                <a class="del-user" href="#"><i class="fa-solid fa-trash"></i></a>
              </td>


        </tr>
        <tr>
                <td>Oliver Hedman</td>
                <td>oliver@mail.com</td>
                <td>Elev</td>
                <td>+46 123 123 12</td>

                <td>
                <a class="del-user" href="#"><i class="fa-solid fa-trash"></i></a>
              </td>


        </tr>

</table>
    </div>

    <a class="skapa-kurs" id="myBtn"><i class="fa-solid fa-user-plus"></i> Bjud in deltagare</a>

    </div>

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <form id="form" action="#" method="post">
            <span class="close">&times;</span>
                <input type="radio" id="uppgift" name="typAv" value="Uppgift" checked="checked">
                <label for="uppgift">Uppgift</label>
                <input type="radio" id="meddelande" name="typAv" value="Meddelande">
                <label for="meddelande">Meddelande</label>
                <div class="header-pop">
                    <h2>Skapa uppgift</h2>
                </div>
                <input name="name" id="name" class="upp-titel" type="text" placeholder="Titel på uppgift" required>
                <textarea name="name" id="name" class="upp-besk" type="text"
                    placeholder="Beskrivning av uppgift..."></textarea>

                    <a class="bifoga-filer" href="#"><i class="fa-solid fa-plus"></i> Bifoga filer (0/9)</a>
                <input type="submit" class="c-btn" value="Skapa uppgift">
            </form>
        </div>

    </div>


</body>

</html>

<!-- SCRIPTS -->

<script src="homescript.js"></script>
<script src="modal.js"></script>
<script src="interactiveCreate.js"></script>
<!-- div for members and leader? -->