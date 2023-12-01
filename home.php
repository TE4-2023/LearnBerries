<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ef1241843c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="kurser_style.css">
    <link rel="stylesheet" href="home_style.css">
    <title>Document</title>
</head>

<body>
        <nav>
            <div class="navbar">
                <ul>
                    <li><img class="bild" src="logga.png" alt="logga" /></li>
                    <li>
                        <h1 class="header">Hem</h1>
                    </li>

                    <div class="left-nav">
                        <li><a href="login.html"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logga ut</a></li>
                    </div>
                </ul>
            </div>
        </nav>

        <nav>
            <div class="vert-nav">
                <ul>
                    <li class="active"><a href="home.php"><i class="fa-solid fa-house"></i> Hem</a></li>
                    <li><a href="kurser.php"><i class="fa-solid fa-scroll"></i> Kurser</a></li>
                    <li><a href=""><i class="fa-regular fa-calendar-days"></i> Scheman</a></li>
                    <li><a href=""><i class="fa-solid fa-file-pen"></i> Närvaro</a></li>
                    <li><a href="nyheter.php"><i class="fa-solid fa-newspaper"></i> Nyheter</a></li>
                    <li><a href="kontakter.php"><i class="fa-solid fa-address-book"></i> Kontakter</a></li>
                </ul>
            </div>
        </nav>

        <div class="home-container">

        <div class="nyheter">
            <div class="nyhet nyhet-1">
            <h2>Rubrik</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto animi fuga maiores cumque modi sed voluptates optio quasi deleniti ab?</p>
        <span>2023-01-24 - Tis 00:00</span>
        </div>
        <hr>
        <div class="nyhet nyhet-2">
            <h2>Rubrik</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto animi fuga maiores cumque modi sed voluptates optio quasi deleniti ab?</p>
        <span>2023-01-24 - Tis 00:00</span>
        </div>
        <hr>
        <div class="nyhet nyhet-3">
            <h2>Rubrik</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto animi fuga maiores cumque modi sed voluptates optio quasi deleniti ab?</p>
        <span>2023-01-24 - Tis 00:00</span>
        </div>
        <hr>
        <div class="nyhet nyhet-3">
            <h2>Rubrik</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto animi fuga maiores cumque modi sed voluptates optio quasi deleniti ab?</p>
        <span>2023-01-24 - Tis 00:00</span>
        </div>

        </div>

        <div class="schema">
            <img src="Screenshot_1.png" alt="Schema">
        </div>

        <div class="todo-list">
            <h2 class="todo-title">Att göra lista</h2>

            <div class="list-item item-1" style="background-color: #86B867;">
                <span>Argumenterande tal</span>
                <span>Svenska</span>
                <span style="font-weight: bold;">V42 Tisdag 12:00 - 13:00</span>
            </div>

            <div class="list-item item-2" style="background-color: #B86767;">
            <span>Argumenterande tal</span>
                <span>Svenska</span>
                <span style="font-weight: bold;">V42 Tisdag 12:00 - 13:00</span>
            </div>

            <div class="list-item item-3" style="background-color: #B88A67;">
            <span>Argumenterande tal</span>
                <span>Svenska</span>
                <span style="font-weight: bold;">V42 Tisdag 12:00 - 13:00</span>
            </div>

            <div class="list-item item-3" style="background-color: #86B867;">
            <span>Argumenterande tal</span>
                <span>Svenska</span>
                <span style="font-weight: bold;">V42 Tisdag 12:00 - 13:00</span>
            </div>
        </div>

        <div class="todo-prov-list">

            <h2 class="prov-title">Kommande prov</h2>

        <div class="prov-item item-1" style="background-color: #86B867;">
                <span>Kapiteltest - Aritmetik Ma1a</span>
                <span>Matte 1A</span>
                <span style="font-weight: bold;">V42 Tisdag 12:00 - 13:00</span>
            </div>

            <div class="prov-item item-2" style="background-color: #86B867;">
                <span>Kapiteltest - Procent Ma1a</span>
                <span>Matte 1A</span>
                <span style="font-weight: bold;">V45 Tisdag 12:00 - 13:00</span>
            </div>

            <div class="prov-item item-3" style="background-color: #86B867;">
                <span>Kapiteltest - Algebra Ma1a</span>
                <span>Matte 1A</span>
                <span style="font-weight: bold;">V47 Tisdag 12:00 - 13:00</span>
            </div>
            </div>

        </div>
</body>
</html>