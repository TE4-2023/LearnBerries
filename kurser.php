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

        <div class="kurser-grid">
        <?php
            require 'Includes/connect.php';
            require 'Includes/functions.php';
            session_start();
            
            $userID = getUserID($_SESSION['uid']);
            $query = $pdo->prepare('
            SELECT *, HEX(course.color)
            FROM course
            LEFT JOIN name 
            ON course.name_ID = name.name_ID
            LEFT JOIN course_enrollments
            ON course_enrollments.course_ID = course.course_ID
            WHERE course_enrollments.user_ID = :userID
            ');
            $query->bindParam(':userID', $userID, PDO::PARAM_STR);

            $query->execute();

            // Fetch and display the results
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                

                echo('<div onmouseover="selected(this)" onclick ="goToCourse('.$row['course_ID'].');" 
                class="kurs" style="background: linear-gradient(to bottom, #'. $row['HEX(course.color)'].' 45%, white -100%);">
                    <h2>'.$row['name'].'</h2>
                    <span>testestet</span>
                </div>
                ');
            }

        ?>    
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
