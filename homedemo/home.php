<?php

include_once "../Includes/header.php";

?>



<!DOCTYPE html>
<html lang="se"> <!-- Change to "en" when translated -->
<head>
    <!-- WEBSITE INFORMATION -->
    <link rel="stylesheet" href="homestyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webschool</title>

    <!-- STYLES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Condensed&family=Roboto+Slab:wght@400;600&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>

    
</head>

<body>
    <nav>
      <ul>
        <li><img class="bild" src="../logga.png" alt="logga" /></li>
        <li>
          <h1 class="header">Logga in</h1>
        </li>
      </ul>
    </nav>


    <div class="head">
        <button onclick="toggleSidenavbar()" style="margin-left: 1%;"><ion-icon name="reorder-four" ></ion-icon></button>
    </div>

    <!-- Will contains links to useful pages making it easier to navigate compared to other websites -->
    <div class="sidenav" id="sidenavbar">
        <button onclick="toggleSidenavbar()" id="sidenavtoggle" style="margin-right: 1%; float: right;"><ion-icon name="close"></ion-icon></button><br><br><br>
        
        <a href="#"><img id="imgtoggle" src="../logga.png" alt="logga" /></a>

        <a href="#">Hem</a><br>
        <a href="#">Schema</a><br>
        <a href="#">Elevmatris</a><br>
        <a href="#">Inlämningar</a><br>

        <a href="../Includes/logout.php" style="vertical-align: bottom;">Logga ut</a><br>
    </div>

    <!-- Contains content for the landing page -->
    <div class="content">
        
    </div>
    <!-- END OF WEBSITE -->
</body>
</html>
<!-- SCRIPTS -->
   
<script src="homescript.js"></script>