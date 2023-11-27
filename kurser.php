<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ef1241843c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="kurser_style.css">
    <title>Document</title>
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

        <div class="kurser-grid">

            <div class="kurs kurs-1">

                <h2>Kursnamn</h2>
                <span>Kurslärare</span>

                <div class="kurs-middle">
                    <i class="fa-regular fa-circle-user"></i>
                </div>

                <div class="kurs-bottom">
                    <span>Nästa lektion: 13:30</span>
                    <span>Klassrum: Sal 11</span>
                </div>

            </div>

            <div class="kurs kurs-2">

                <h2>Kursnamn</h2>
                <span>Kurslärare</span>

                <div class="kurs-middle">
                    <i class="fa-regular fa-circle-user"></i>
                </div>

                <div class="kurs-bottom">
                    <span>Nästa lektion: 13:30</span>
                    <span>Klassrum: Sal 11</span>
                </div>

            </div>

            <div class="kurs kurs-3">

                <h2>Kursnamn</h2>
                <span>Kurslärare</span>

                <div class="kurs-middle">
                    <i class="fa-regular fa-circle-user"></i>
                </div>

                <div class="kurs-bottom">
                    <span>Nästa lektion: 13:30</span>
                    <span>Klassrum: Sal 11</span>
                </div>

            </div>


        </div>
        <a class="skapa-kurs" id="myBtn"><i class="fa-solid fa-file-circle-plus"></i> Skapa kurs</a>

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>

                <input class="kurs-titel" type="text" placeholder="Kurstitel">
                <p>Välj färg</p>
                <div class="color-picker" id="colorPickerContainer">
                    <input class="color-wheel" type="color" value="#6026b8">
                    <i class="fa-solid fa-brush"></i>
                </div>
                <br>
                <a class="members-btn" href="#">Bjud in deltagare</a>
                <span class="members-amount">&nbsp;(0/100)</span>
                <div class="create-container">
                    <a class="c-btn" href="#">Skapa kurs</a>
                </div>
            </div>

        </div>

    </div>

</body>
<script>
    function goToCourse(id) {
        window.location.href = "kursvy.php?kursid=" + id;
    }
    function selected(kurs) {

    }

</script>

<script src="modal.js" defer></script>

</html>