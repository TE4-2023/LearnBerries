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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <script src="navbar-responsive.js"></script>
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
                    <li><a href="Includes/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logga ut</a>
                    </li>
                </div>
            </ul>
           
        </div>
    </nav>
    <a href="javascript:void(0);" class="icon" onclick="toggleNav()">
                <i class="fa fa-bars"></i>
                </a>
    <nav>
        <div class="vert-nav" id="myVertnav">
            <ul>
              
                <li class="active"><a href="home.php"><i class="fa-solid fa-house"></i> Hem</a></li>
                <li><a href="kurser.php"><i class="fa-solid fa-scroll"></i> Kurser</a></li>
                <li><a href=""><i class="fa-regular fa-calendar-days"></i> Scheman</a></li>
                <li><a href="närvaro.php"><i class="fa-solid fa-file-pen"></i> Närvaro</a></li>
                <li><a href="nyheter.php"><i class="fa-solid fa-newspaper"></i> Nyheter</a></li>
                <li><a href="kontakter.php"><i class="fa-solid fa-address-book"></i> Kontakter</a></li>
                
            </ul>
        </div>
    </nav>



    
    <div class="home-container">

        <div class="nyheter">
            <div class="nyhet nyhet-1">
                <h2>Rubrik</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto animi fuga maiores cumque modi
                    sed voluptates optio quasi deleniti ab?</p>
                <span>2023-01-24 - Tis 00:00</span>
            </div>
            <hr>
            <div class="nyhet nyhet-2">
                <h2>Rubrik</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto animi fuga maiores cumque modi
                    sed voluptates optio quasi deleniti ab?</p>
                <span>2023-01-24 - Tis 00:00</span>
            </div>
            <hr>
            <div class="nyhet nyhet-3">
                <h2>Rubrik</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto animi fuga maiores cumque modi
                    sed voluptates optio quasi deleniti ab?</p>
                <span>2023-01-24 - Tis 00:00</span>
            </div>
            <hr>
            <div class="nyhet nyhet-3">
                <h2>Rubrik</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto animi fuga maiores cumque modi
                    sed voluptates optio quasi deleniti ab?</p>
                <span>2023-01-24 - Tis 00:00</span>
            </div>

        </div>

        <div class="schema">
            <img src="Screenshot_1.png" alt="Schema">
        </div>

        <div class="todo-list">
            <h2 class="todo-title">Att göra lista</h2>
            <?php

            require "Includes/functions.php";
            session_start();
            $pdo = $GLOBALS['pdo'];
            $users = $pdo->prepare("
            SELECT *, HEX(course.color), name.name AS posName, courseName.name AS courseN FROM posts
            JOIN course ON posts.course_ID = course.course_ID
            JOIN name ON posts.name_ID = name.name_ID
            JOIN name AS courseName ON course.name_ID = courseName.name_ID
            WHERE posts.course_ID IN (SELECT course_enrollments.course_ID FROM course_enrollments WHERE course_enrollments.user_ID = :userID)
            AND posts.deadlineDate != '0000-00-00 00:00:00';
            ");

            $data = array(
                ':userID' => $_SESSION['userid']

            );
            $users->execute($data);

            // Fetch and display the results
            while ($posts = $users->fetch(PDO::FETCH_ASSOC)) {
                echo '
                <div class="list-item item-1" style="background-color: #' . $posts['HEX(course.color)'] . ';">
                <span>' . $posts['posName'] . '</span>
                <span>' . $posts['courseN'] . '</span>
                <span style="font-weight: bold;">' . $posts['deadlineDate'] . '</span>
                </div>
                ';
            }

            ?>


        </div>

        <!-- Kommentar -->
        <div class="todo-prov-list">

            <h2 class="prov-title">Kommande prov</h2>
            <?php 

            
            
            $pdo = $GLOBALS['pdo'];
            $users = $pdo->prepare("
            SELECT *, HEX(course.color), name.name AS examName, courseName.name AS courseN, exam.examinationDate AS examDate FROM exam
            JOIN course ON exam.course_ID = course.course_ID
            JOIN name ON exam.name_ID = name.name_ID
            JOIN name AS courseName ON course.name_ID = courseName.name_ID
            WHERE exam.course_ID IN (SELECT course_enrollments.course_ID FROM course_enrollments WHERE course_enrollments.user_ID = :userID)
            AND exam.examinationDate > NOW();
            ");

            $data = array(
                ':userID' => $_SESSION['userid']

            );
            $users->execute($data);
        
            // Fetch and display the results
            while ($exam = $users->fetch(PDO::FETCH_ASSOC)) {
                echo '
                <div class="prov-item item-1" style="background-color: #'. $exam['HEX(course.color)'] .'">
                <span>'. $exam['examName'] .'</span>
                <span>'. $exam['courseN'] .'</span>
                <span style="font-weight: bold;">'. $exam['examDate'] .'</span>
                </div>
                ';
            }
            
            ?>
        

           
        </div>

    </div>


</body>

</html>