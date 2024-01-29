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
<?php
require 'Includes/connect.php';
session_start();

if (!isset($_SESSION['uid'])||!isset($_GET['uppgiftid'])) {
    
    header("location: index.php");
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
        echo 'kos';
        //header('location: index.php');
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
        echo("No rows.color");
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
        if ($result['post_ID'] == $postID) {
            $submittedAmount = $submittedAmount + 1;
        }
    }

    echo $submittedAmount . "/" . getTotalEnrolled();
}

function getUID() {
    $query = $GLOBALS['pdo']->prepare(
        'SELECT *
        FROM users
        WHERE users.ssn = :ssn;');
    $data = array(':ssn' => $_SESSION['uid']);
    $query->execute($data);

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['user_ID'];
}

function postExists() {
    $uid = getUID($_SESSION['uid']);
    $query = $GLOBALS['pdo']->prepare(
        'SELECT * 
        FROM submissions 
        WHERE submissions.user_ID = :userID 
        AND submissions.post_ID = :postID;');
    $query->bindParam(':userID', $uid);
    $query->bindParam(':postID', $_GET['uppgiftid']);
    $query->execute();

    $undo = "Ångra inlämning";
    $submit = "Lämna in";
    if ($query->rowCount() > 0) {
        return $undo;
    }
    return $submit;
}?>

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

<div class="kurs" style="background-color: <?php echo getCourseColor(); ?>">
    <h1 class="text"><?php getCourseName(); ?></h1><br>
    <a onclick="goCourse(<?php echo $courseID; ?>)" class="deltagare"><i class="fa-solid fa-arrow-left"></i> Till kurs</a>
</div>

<?php
    $name = "";
    $desc = "";
    $dld = "";
    $type = "";

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
            $name = $row['name'];
            $desc = $row['description'];
            $dld = $row['deadlineDate'];
            $type = $row['postType'];
        }
    }
    catch (PDOException $e) {
        echo 'Error '. $e;
    }?>

<div class="ruta">
    <div class="uppnamn">
        <h1 class="rubrik"><?php echo $name; ?> </h1>
        <?php if($type == 1){
            $query = $GLOBALS['pdo']->prepare(
                'SELECT * 
                FROM users
                WHERE users.user_ID = :userID;');
            $data = array(':userID' => getUID());
            $query->execute($data);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        
            if ($query->rowCount() == 0) {
                echo "Error row 230 uppgift.php";
            } else {
                if ($result['role_ID'] == 3) {
                    echo '<p class="upptext">Inlämnat: ';
                    echo getPostSubmissions();
                    echo '</p>
                          <p class="upptext">Betygsatt: </p>
                          <a class="skapa-kurs" id="myBtn">
                          <i class="fa-solid fa-file-circle-plus">
                          </i> Visa alla arbeten</a>';
                }
                else  {
                    echo '<p class="upptext">Inlämnat: ';
                    echo getPostSubmissions();
                    echo '</p>
                          <form action="Includes/turnin.php" method="post" style="padding:0; margin:0;">
                          <input type="text" style="display:none;" name="uppgiftid" value="'.$_GET['uppgiftid'].'">
                          <input style="margin-left:10px;padding-left:4px;"
                          type="submit" name="turn-in" value="';
                    echo postExists();
                    echo '"></form>';
                          //Lämna in
                }
            }
        }
        ?>
    </div>
    <div class="info">
        <p class="text">
            <?php echo $desc; ?>
        </p> 
    </div>
</div>
</body>
</html>
<!-- SCRIPTS -->

<script>
function goCourse(extra) {
    let url = window.location.protocol + "//" + window.location.host + "/LearnBerries/kursvy.php?kursid=" + extra;
    window.location.href = url;
}
</script>

<script src="homescript.js"></script>
<script src="modal.js"></script>
<script src="interactiveCreate.js"></script>
<!-- div for members and leader? -->