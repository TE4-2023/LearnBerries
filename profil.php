<?php

require 'Includes/connect.php';

session_start();
$_SESSION['uid'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <script src="https://kit.fontawesome.com/ef1241843c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="profil.css">
</head>

<body>
<div class="container">
    <nav>
        <div class="navbar">
        <ul>
            <li><img class="bild" src="logga.png" alt="logga" /></li>
            <li>
                <h1 class="header">Alla dina kurser</h1>
            </li>

            <div class="left-nav">
                <li><a href=""><i class="fa-solid fa-arrow-right-from-bracket"></i> Logga ut</a></li>
            </div>
        </ul>
        </div>
    </nav>

<div class="kurser-grid">

    <div class="profil">
        <br>
        <img class="profilbild" src="logga.png">
        <br>
        <h2><?php 
        require 'Includes/connect.php';
        $loggedInUserID = $_SESSION['uid'];

        try {
            $query = $pdo->prepare('
                SELECT * FROM `name`
                JOIN users 
                ON name.name_ID = users.name_ID
                WHERE ssn = :uid
            ');

            $data = array(
                ':uid' => $loggedInUserID
            );

            $query->execute($data);

            // Fetch and display the results
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $username = $row['name'] . ' ' . $row['name'];
                echo $username . '<br>';
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            // Handle the exception or redirect as needed
            // header('Location: login.html');
        }
        
        ?>
        </h2>
        <hr class="hr">

        <div class="info">
            <span>Mailadress: exempel@gmail.com</span>
            <br>
            <br>        
            <span> Telnr: xxx xxx xxx xx </span>
            <button style="margin-left:95px">Ändra</button>
        </div>

    </div>

</div>

    <nav>
        <div class="vert-nav">
            <ul>
                <li><a href=""><i class="fa-solid fa-house"></i> Hem</a></li>
                <li><a href=""><i class="fa-solid fa-scroll"></i> Kurser</a></li>
                <li><a href=""><i class="fa-regular fa-calendar-days"></i> Scheman</a></li>
                <li><a href=""><i class="fa-solid fa-file-pen"></i> Närvaro</a></li>
                <li><a href=""><i class="fa-solid fa-newspaper"></i> Nyheter</a></li>
                <li><a href=""><i class="fa-solid fa-address-book"></i> Kontakter</a></li>
            </ul>
        </div>
    </nav>

</div>

</body>


</html>