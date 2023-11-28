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

        <div class="kurser-grid" id="kurserDIV"><?php
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

        $TeacherQ = $pdo->prepare('
        SELECT *, name.name AS firstname , A.name AS lastname 
        FROM `users` 
        INNER JOIN name ON users.name_ID = name.name_ID
        INNER JOIN name AS A ON users.lastname_ID = A.name_ID 
        RIGHT JOIN course_enrollments ON course_enrollments.user_ID = users.user_ID
        WHERE users.role_ID = 3 AND course_enrollments.course_ID = :courseID
        ');
        $TeacherQ->bindParam(':courseID', $row['course_ID'], PDO::PARAM_STR);
    
        $TeacherQ->execute();

        echo('<div onClick="goToCourse('.$row['course_ID'].')" class="kurs">

                <div class="kurs-top" style="background-color: #'.$row['HEX(course.color)'].';">
                <h2>'.$row['name'].'</h2>
                <span>');
                $nbrOfTeachers = 0;
                while ($teachers = $TeacherQ->fetch(PDO::FETCH_ASSOC)) {
                    $nbrOfTeachers++;
                    if($nbrOfTeachers > 3)
                    {
                        echo "...";
                        break;
                    }
                    if($nbrOfTeachers>1)
                    {
                        echo ", ";
                    }
                    echo $teachers['firstname'] . " " . $teachers['lastname'];
                }
                echo ('</span>
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
         ');
     }
    
?></div>
        <a class="skapa-kurs" id="myBtn"><i class="fa-solid fa-file-circle-plus"></i> Skapa kurs</a>

        </div>

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <form id="form" action="Includes/addcourse.php" method="post">
                <div class="header-pop">
                <h2>Skapa ny kurs</h2>
                <span class="close">&times;</span>
                </div>
                <input name="name" id="name" class="kurs-titel" type="text" placeholder="Kurstitel" required>
                <span class="pick-color-text">Välj färg</span>
                <div class="color-picker" id="colorPickerContainer">
                    <input name="color" id="color"class="color-wheel" type="color" value="#6026b8" required>
                    <i class="fa-solid fa-brush"></i>
                </div>

                    <input type="submit"  class="c-btn" value="skapa kurs">
                </form>
            </div>

    </div>

</body>
<script>
    var kursdiv = document.getElementById('kurserDIV');
    if(kursdiv.innerHTML==="  ")
    {
        console.log("kos");
        kursdiv.innerText = "NO COURSES";
    }

    function goToCourse(id) {
        window.location.href = "kursvy.php?kursid=" + id;
    }

</script>

<script src="modal.js" defer></script>

</html>