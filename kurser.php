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
                    <li title="Profil"><a href=""><i class="fa-regular fa-circle-user"></i></a></li>
                        <li title="Logga ut"><a href=""><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
                    </div>
                </ul>
            </div>
        </nav>

<div class="container">

        <nav>
            <div class="vert-nav">
                <ul>
                    <li><a href=""><i class="fa-solid fa-house"></i> Hem</a></li>
                    <li><a class="active" href="kurser.php"><i class="fa-solid fa-scroll"></i> Kurser</a></li>
                    <li><a href=""><i class="fa-regular fa-calendar-days"></i> Scheman</a></li>
                    <li><a href=""><i class="fa-solid fa-file-pen"></i> Närvaro</a></li>
                    <li><a href=""><i class="fa-solid fa-newspaper"></i> Nyheter</a></li>
                    <li><a href=""><i class="fa-solid fa-address-book"></i> Kontakter</a></li>
                </ul>
            </div>
        </nav>

        <div class="kurser-grid">

            <div class="kurs kurs-1">

                <div class="kurs-top" style="background-color: #16852e;">
                    <h2>Kursnamn</h2>
                    <span>Kurslärare</span>
                </div>

                <div class="kurs-middle">
                    <div class="circle">
                   <i class="fa-regular fa-circle-user"></i>
                   </div>
                </div>

                <div class="kurs-bottom">
                    <span>Nästa lektion: Tis 13:30</span>
                    <span>Klassrum: Sal 11</span>
                </div>

            </div>

            <div class="kurs kurs-2">

            <div class="kurs-top" style="background-color: #1bd52e;">
                    <h2>Kursnamn</h2>
                    <span>Kurslärare</span>
                </div>

                <div class="kurs-middle">
                    <div class="circle">
                   <i class="fa-regular fa-circle-user"></i>
                   </div>
                </div>

                <div class="kurs-bottom">
                    <span>Nästa lektion: Tis 13:30</span>
                    <span>Klassrum: Sal 11</span>
                </div>

            </div>

            <div class="kurs kurs-3">

            <div class="kurs-top" style="background-color: #1bd52e;">
                    <h2>Kursnamn</h2>
                    <span>Kurslärare</span>
                </div>

                <div class="kurs-middle">
                    <div class="circle">
                   <i class="fa-regular fa-circle-user"></i>
                   </div>
                </div>

                <div class="kurs-bottom">
                    <span>Nästa lektion: Tis 13:30</span>
                    <span>Klassrum: Sal 11</span>
                </div>

            </div>

            <div class="kurs kurs-4">

            <div class="kurs-top" style="background-color: #1bd52e;">
                    <h2>Kursnamn</h2>
                    <span>Kurslärare</span>
                </div>

                <div class="kurs-middle">
                    <div class="circle">
                   <i class="fa-regular fa-circle-user"></i>
                   </div>
                </div>

                <div class="kurs-bottom">
                    <span>Nästa lektion: Tis 13:30</span>
                    <span>Klassrum: Sal 11</span>
                </div>

            </div>

            <div class="kurs kurs-5">

            <div class="kurs-top" style="background-color: #1bd52e;">
                    <h2>Kursnamn</h2>
                    <span>Kurslärare</span>
                </div>

                <div class="kurs-middle">
                    <div class="circle">
                   <i class="fa-regular fa-circle-user"></i>
                   </div>
                </div>

                <div class="kurs-bottom">
                    <span>Nästa lektion: Tis 13:30</span>
                    <span>Klassrum: Sal 11</span>
                </div>

            </div>

            <div class="kurs kurs-6">

            <div class="kurs-top" style="background-color: #1bd52e;">
                    <h2>Kursnamn</h2>
                    <span>Kurslärare</span>
                </div>

                <div class="kurs-middle">
                    <div class="circle">
                   <i class="fa-regular fa-circle-user"></i>
                   </div>
                </div>

                <div class="kurs-bottom">
                    <span>Nästa lektion: Tis 13:30</span>
                    <span>Klassrum: Sal 11</span>
                </div>

            </div>


        </div>
        <a class="skapa-kurs" id="myBtn"><i class="fa-solid fa-file-circle-plus"></i> Skapa kurs</a>

        </div>

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="header-pop">
                <h2>Skapa ny kurs</h2>
                <span class="close">&times;</span>
                </div>
                <input class="kurs-titel" type="text" placeholder="Kurstitel">
                <span class="pick-color-text">Välj färg</span>
                <div class="color-picker" id="colorPickerContainer">
                    <input class="color-wheel" type="color" value="#6026b8">
                    <i class="fa-solid fa-brush"></i>
                </div>
                <a class="members-btn" href="#">Bjud in deltagare</a>
                <span class="members-amount">&nbsp;(0/100)</span>
     
                    <a class="c-btn" href="#">Skapa kurs</a>

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