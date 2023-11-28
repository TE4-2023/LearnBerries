<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ef1241843c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="nyheter.css">
    <title>Nyheter</title>
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
                        <li><a href=""><i class="fa-solid fa-arrow-right-from-bracket"></i> Logga ut</a></li>
                    </div>
                </ul>
            </div>
        </nav>

        <div class="nyheter-grid">

            <div class="nyheter kurs-1">
                <div class="top-color">
                <h2>Nyheter</h2>
                </div>
                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis cupiditate sit quas quo necessitatibus ea accusantium laudantium quasi consectetur delectus!</span>
                <a href="">Gå till kurs</a>
            </div>

            <div class="nyheter kurs-2">
                <h2>Nyheter</h2>
                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis mollitia iure quasi adipisci blanditiis veniam rerum qui similique necessitatibus doloribus, nesciunt voluptatem hic quam dolorem atque neque itaque reprehenderit quod at aliquid, reiciendis ab, animi alias. Nulla, consequuntur porro corrupti nesciunt molestias saepe placeat dolorum ab iusto quo quis asperiores!</span>
            </div>

            <div class="nyheter kurs-3">
                <h2>Nyheter</h2>
                <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat nulla commodi earum tenetur, corrupti cupiditate quis modi velit alias repudiandae, animi numquam officiis eos soluta quaerat sint enim sunt labore iusto iure ad fuga iste. Consectetur esse facere alias saepe quibusdam eaque! Dolorum, eius? Possimus quo corporis blanditiis dolore nemo?
                </span>
            </div>



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

</body>

</html>
