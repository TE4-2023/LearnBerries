<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if(!isset($_GET['kursid'])) {
    header("location: ./kurser.php");
}

isUserParticipant();

function getCourseColor() {
    $conn = $GLOBALS['conn']; //accesses conn variable in global scope (1 layer above in this case)

    $kursid = (int)$_GET['kursid'];

    $stmt = $conn->prepare("SELECT *
                            FROM `webschool`.`course`
                            WHERE `course_ID`=?;");
    $stmt->bind_param("i", $kursid);

    $stmt->execute();

    $result = $stmt->get_result(); // FETCHES RESULT FROM STATEMENT CHECK FOR IF THERE ANY ROWS THAT MATCH TO 

    if(mysqli_num_rows($result) == 0) {
        $stmt = null;
        echo("No rows.");
        header('Location: ./kursvy.php?error=notfound');
        //header("location: .");
    }
    else {
        $row = mysqli_fetch_row($result);
        echo('#'. bin2hex($row[2]));

        $stmt = null;
    }
}

function getCourseName() {
    $conn = $GLOBALS['conn']; //accesses conn variable in global scope (1 layer above in this case)

    $kursid = (int)$_GET['kursid'];

    $stmt = $conn->prepare("SELECT *
                            FROM `webschool`.`course`
                            WHERE `course_ID`=?;");
    $stmt->bind_param("i", $kursid);

    $stmt->execute();

    $result = $stmt->get_result(); // FETCHES RESULT FROM STATEMENT CHECK FOR IF THERE ANY ROWS THAT MATCH TO 

    if(mysqli_num_rows($result) == 0) {
        $stmt = null;
        echo("No rows.");
        header('Location: ./kursvy.php?error=notfound');
        //header("location: .");
    }
    else {
        $row = mysqli_fetch_row($result);
        

        $stmt = null;


        $stmt = $conn->prepare("SELECT *
                            FROM `webschool`.`name`
                            WHERE `name_ID`=?;");
        $stmt->bind_param("i", $row[1]);

        $stmt->execute();

        $result = $stmt->get_result(); // FETCHES RESULT FROM STATEMENT CHECK FOR IF THERE ANY ROWS THAT MATCH TO 

        $row = mysqli_fetch_row($result);

        echo($row[1]);

        $stmt = null;
    }
}

function isUserParticipant() {
    $userid = "";

    $conn = $GLOBALS['conn']; //accesses conn variable in global scope (1 layer above in this case)

    $stmt = $conn->prepare("SELECT *
                            FROM `webschool`.`users`
                            WHERE `ssn`=?;");
    $stmt->bind_param("s", $_SESSION['uid']);

    $stmt->execute();

    $result = $stmt->get_result(); 

    if(mysqli_num_rows($result) == 0) {
    $stmt = null;
    echo("No rows.");
    header('Location: ./kursvy.php?error=notfound');
    //header("location: .");
    }
    else {
        $row = mysqli_fetch_row($result);
        $userid = $row[0];

        $stmt = null;
    }

    $stmt = $conn->prepare("SELECT *
                            FROM `webschool`.`course_enrollments`
                            WHERE `course_ID`=? AND `user_ID`=?;");

    $courseid = (int)$_GET["kursid"];
    $stmt->bind_param("is", $courseid, $userid);

    $stmt->execute();

    echo($courseid."/");
    echo($userid."/");
    

    $result = $stmt->get_result();

    if(mysqli_num_rows($result) == 0) {
        $stmt = null;
        echo("No rows.");
        header('Location: ./home.php');
    }
    else {
        echo("enrolled");

        $stmt = null;
    }
}