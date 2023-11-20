<!DOCTYPE html>
<html lang="se"> <!-- Change to "en" when translated -->
<head>
    <!-- WEBSITE INFORMATION -->
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S-Sentials</title>

    <!-- STYLES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Condensed&family=Roboto+Slab:wght@400;600&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>

    
</head>

<!--

    OBSERVE:
    Website will NOT have functionality except basic button clicking that redirects the user to new pages.
    This website is also made in swedish but translation to english would not be too hard to implement.

-->

<!--
    Needed features:
    Add a searhcbar in the topnav as well as quickactions such as viewing the next lesson,
    lunch, nearest beak, etc.

    For teachers add a attendance button that is extremely accessible!
-->


<body>
    <div class="head">
        <button onclick="toggleSidenavbar()" style="margin-left: 1%;"><ion-icon name="reorder-four" ></ion-icon></button>
    </div>

    <!-- Will contains links to useful pages making it easier to navigate compared to other websites -->
    <div class="sidenav" id="sidenavbar">
        <button onclick="toggleSidenavbar()" id="sidenavtoggle" style="margin-right: 1%; float: right;"><ion-icon name="close"></ion-icon></button>

        <a href="#"><button class="sidenav-button"><ion-icon name="home" class="sidenav-icon"></ion-icon>Home</button></a>
        <a href="#"><button class="sidenav-button"><ion-icon name="calendar" class="sidenav-icon"></ion-icon>Schedule</button></a>
        <a href="#"><button class="sidenav-button"><ion-icon name="pie-chart" class="sidenav-icon"></ion-icon>Grades</button></a>
        <a href="#"><button class="sidenav-button"><ion-icon name="document-text" class="sidenav-icon"></ion-icon>Assingment</button></a>
        <button class="sidenav-button" onclick="theme_toggle()"><ion-icon name="sunny" class="sidenav-icon"></ion-icon>Change theme</button>
    </div>

    
</body>
</html>
<!-- SCRIPTS -->
   
<script src="scripts/script.js"></script>