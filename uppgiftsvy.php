<!DOCTYPE html>
<html lang="se">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursvy</title>
    <link rel="stylesheet" href="kursvy.css">
    <script src="https://kit.fontawesome.com/ef1241843c.js" 
    crossorigin="anonymous"></script>
</head>
<body>
<?php
require 'Includes/connect.php';
session_start();

if (!isset($_SESSION['uid'])||!isset($_GET['uppgiftid'])) {
    
    //header("location: index.php");
}

$courseID = 0;
try {
    // in a real scenario ssn would be a horrible way to store a session
    $userquery = $pdo->prepare(
    'SELECT * FROM users WHERE users.ssn = :ssn;');
    $data = array(':ssn' => $_SESSION['uid']);
    $userquery->execute($data);
    $userid = $userquery->fetch(PDO::FETCH_ASSOC);

    $postquery = $pdo->prepare(
    'SELECT * FROM `posts` WHERE 1');
    $postquery->execute();
    
    $success = false;
    while ($postrow = $postquery->fetch(PDO::FETCH_ASSOC)) {
        if ($_GET['uppgiftid'] != $postrow['post_ID']) {
            continue;
        }

        $ecoursequery = $pdo->prepare(
        'SELECT * FROM course_enrollments WHERE
        course_enrollments.user_ID = :user_ID;');
        $ecoursedata = array(':user_ID' => $userid['user_ID']);
        $ecoursequery->execute($ecoursedata);

        while ($ecourserow = $ecoursequery->fetch(PDO::FETCH_ASSOC)) {
            if ($ecourserow['course_ID'] != $postrow['course_ID']) {
                continue;
            }

            $courseID = $postrow['course_ID'];
            $success = true;
        }
    }

    $userquery = NULL;
    $userdata = NULL;
    $postquery = NULL;
    $postdata = NULL;

    if (!$success) {
        // Never reached for some reason
        header('location: index.php');
    }
}
catch (PDOException $e) {
    echo '<p>Error ' . $e->getMessage() . '</p>';
}

function getCourseColor() {
    $courseID = $GLOBALS['courseID'];
    $pdo = $GLOBALS['pdo'];

    //$result = sqlExec("course","course_ID",$courseID,"i");

    $query = $pdo->prepare(
    'SELECT * FROM course WHERE course.course_ID = :courseID;');
    $data = array(':courseID' => $courseID);
    $query->execute($data);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if($query->rowCount() == 0) {
        $query = null;
        echo("No rows.");
        header('Location: ./noaccess.php');
    }
    else {
        echo('#'. bin2hex($result['color']));
        $query = null;
    }
}

function getCourseName() {
    $courseID = $GLOBALS['courseID'];
    $pdo = $GLOBALS['pdo'];

    $query = $pdo->prepare(
    'SELECT course.*, name.name
    FROM course 
    INNER JOIN name 
    ON course.name_ID = name.name_ID 
    WHERE course.course_ID = :courseID;');
    $data = array(':courseID' => $courseID);
    $query->execute($data);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if($query->rowCount() == 0) {
        $query = null;
        echo("No rows.");
        header('Location: ./noaccess.php');
    }
    else {
        echo $result['name'];
        $query = null;
    }
}

function getTotalEnrolled() {
    $enrolledAmount = 0;
    $courseID = $GLOBALS['courseID'];
    $query = $GLOBALS['pdo']->prepare(
        'SELECT * 
        FROM course_enrollments 
        WHERE course_enrollments.course_ID = :courseID;');
    $data = array(':courseID' => $courseID);
    $query->execute($data);

    while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
        if ($query->rowCount() == 0) {
            break;
        } else {
            $enrolledAmount = $enrolledAmount + 1;
        }
    }

    return $enrolledAmount;
}

function getPostSubmissions() {
    $submittedAmount = 0;
    $postID = $_GET['uppgiftid'];
    $query = $GLOBALS['pdo']->prepare(
        'SELECT *
        FROM submissions
        WHERE submissions.post_ID = :postID;');
    $data = array(':postID' => $postID);
    $query->execute($data);

    while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
        if ($query['course_ID'] == $postID) {
            $submittedAmount = $submittedAmount + 1;
        }
    }

    echo "Total submissions: ". $submittedAmount . "/" . getTotalEnrolled();
}?>
<nav>
    <div class="navbar">
        <ul>
            <li><img class="bild" src="logga.png" alt="logga" /></li>
            <li>
                <h1 class="header">Uppgift</h1>
            </li>

            <div class="left-nav">
                <li><a href="Includes/logout.php">
                    <i class="fa-solid fa-arrow-right-from-bracket">
                    </i> Logga ut
                </a></li>
            </div>
        </ul>
    </div>
</nav>
<nav>
    <div class="vert-nav">
        <ul>
            <li><a href="home.php">
            <i class="fa-solid fa-house"></i> Hem</a></li>

            <li class="active"><a href="kurser.php">
            <i class="fa-solid fa-scroll"></i> Kurser</a></li>
            
            <li><a href=""><i class="fa-regular fa-calendar-days">
            </i> Scheman</a></li>

            <li><a href="">
            <i class="fa-solid fa-file-pen"></i> Närvaro</a></li>

            <li><a href="nyheter.php">
            <i class="fa-solid fa-newspaper"></i> Nyheter</a></li>

            <li><a href="kontakter.php">
            <i class="fa-solid fa-address-book"></i> Kontakter</a></li>
        </ul>
    </div>
</nav>
<div class="kurs" style="background-color:<?php getCourseColor(); ?>;">
        <h1 style="color:white;text-decoration:none !important;">
        <?php getCourseName(); ?></h1><br>

        <p style="color:white;text-decoration:none !important;">Lärare A</p>
</div>
<div class="pane"
    style="width:100%;height:100%;display:flex;flex-direction:column;
    flex-wrap:wrap; align-items:center;">
    <?php
    ?><p><?php getPostSubmissions(); ?></p><?php
    // TODO:
    // Show how many submissions from unique users exist and that dont.
    // This tells the teacher how many people have turned them in.

    try {
        $userquery = $pdo->prepare(
        'SELECT posts.*, name.name 
        FROM posts 
        INNER JOIN name 
        ON posts.name_ID = name.name_ID 
        WHERE posts.post_ID = :postID 
        ORDER BY posts.publishingDate DESC;');
        $userdata = array(':postID' => $_GET['uppgiftid']);

        $userquery->execute($userdata);

        while ($row = $userquery->fetch(PDO::FETCH_ASSOC)) {
            echo '<div style="width: 50%; display:flex;'.
            ' flex-direction:column; flex-wrap:wrap;'.
            ' border-top-left-radius:1vh;'.
            ' border-bottom-right-radius:1vh;'.
            ' height: 10%; margin-top:5%;'.
            ' background-color:white;border:1px solid black;">';
            if ($row['name'] == "") {
                echo '<p>Meddelande</p>';
            } else {
                echo '<p>Uppgiftsnamn: ' . $row['name'] . '</p>';
            }

            if ($row['deadlineDate'] == '0000-00-00 00:00:00') {
                echo '<p>Deadline: Ingen</p>';
            } else {
                echo '<p>Deadline: ' . $row['deadlineDate'] . '</p>';
            }

            // Add more fields as needed
            echo '<hr>';
            echo '<p>Description: ' . $row['description'] . '</p>';
            echo '</div>';
            echo '<br>';
        }
    }
    catch (PDOException $e) {
        echo 'Error '. $e;
    }
    ?>
</div>
</body>
</html>

<!-- SCRIPTS -->
<script src="homescript.js"></script>
<script src="modal.js"></script>
<script src="interactiveCreate.js"></script>