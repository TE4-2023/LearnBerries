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

    

            

        </div>
        <a class="skapa-kurs" href=""><i class="fa-solid fa-plus"></i> Skapa kurs</a>
    </div>

</body>
<script>
    function goToCourse(id)
    {
        window.location.href = "kursvy.php?kursid="+id;
    }
    function selected(kurs)
    {
        
    }

</script>
</html>
