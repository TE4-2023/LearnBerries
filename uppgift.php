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


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uppgift</title>
    <link rel="stylesheet" href="uppgift.css">
    <script src="https://kit.fontawesome.com/ef1241843c.js" crossorigin="anonymous"></script>
</head>

<body>
<nav>
            <div class="navbar">
                <ul>
                    <li><img class="bild" src="logga.png" alt="logga" /></li>
                    <li>
                        <h1 class="header">Uppgift</h1>
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

<div class="kurs">
        <h1 class="text">Kursnamn</h1><br>
        <a href="#" class="deltagare"><i class="fa-solid fa-users"></i> Deltagare</a>
</div>











<div class="ruta">

    <div class="uppnamn">
        
        <h1 class="rubrik">Uppgiftsnamn </h1>
        <p class="upptext">Inlämnat: </p>
        <p class="upptext">Betygsatt: </p>
        <a class="skapa-kurs" id="myBtn"><i class="fa-solid fa-file-circle-plus"></i> Visa alla arbeten</a>

    </div>


    <div class="info">

        <p class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur libero commodi ex numquam? Consequatur tenetur, minus sapiente eligendi quae, dolorem possimus culpa accusamus placeat nesciunt ullam sunt id cupiditate, aspernatur nobis sequi excepturi at mollitia officia fugit rem suscipit saepe explicabo corrupti? Non sunt distinctio voluptate, nihil fugit minus! Officia provident tenetur fuga repudiandae eveniet sequi labore quo cumque nam rem, obcaecati vel enim quibusdam beatae eum quis laborum aliquid distinctio, magni non quidem! Doloribus explicabo dicta officiis odio perferendis deleniti eligendi molestiae dolorum, labore iusto, dolore neque ipsum adipisci. Cum cumque deserunt laudantium vel ipsam sequi, hic, quis repudiandae iure quibusdam autem voluptate incidunt dolorum explicabo neque nihil adipisci. Ad sequi eligendi maiores consequatur placeat, quos id quam dolorem. Similique atque ullam modi unde labore quo quam consequuntur accusantium. Perspiciatis ab fugit libero aut optio laudantium saepe velit odio architecto sequi exercitationem hic suscipit dicta maiores, similique sint aperiam, consequatur ipsam provident delectus mollitia. Vitae voluptatibus delectus iste doloribus! Vero tempore at harum cum, totam nisi reiciendis similique sapiente dolorem libero, officia illum asperiores delectus ut? Consectetur rerum odit autem beatae, omnis recusandae aspernatur enim tempora reprehenderit eius ab, pariatur magnam, a ducimus deleniti consequatur libero id numquam facilis.
        </p> 

    </div>

</div>













</body>

</html>

<!-- SCRIPTS -->

<script src="homescript.js"></script>
<script src="modal.js"></script>
<script src="interactiveCreate.js"></script>
<!-- div for members and leader? -->