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

/*if(isset($_GET['error'])) {
    header("location: ../noaccess.php");
}*/


if(!isset($_GET['kursid'])) {
    header("location: ../kurser.php");
}

$kursid = (int)$_GET['kursid'];

//isUserParticipant();



function sqlExec($table, $keyword, $value, $type) {
    $conn = $GLOBALS['conn'];

    $command = "SELECT * FROM `webschool`.`". $table ."` WHERE `". $keyword ."`=?;"; // still ? to prevent sql attacks

    $stmt = $conn->prepare($command); // course_ID = ? for example
    $stmt->bind_param($type, $value);

    $stmt->execute();
    
    $value = $stmt->get_result();
    $stmt = null;

    return $value;
}


function getCourseColor() {
    $kursid = $GLOBALS['kursid'];

    $result = sqlExec("course","course_ID",$kursid,"i");

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
    $kursid = $GLOBALS['kursid'];

    $result = sqlExec("course","course_ID",$kursid,"i");

    if(mysqli_num_rows($result) == 0) {
        $stmt = null;
        echo("No rows.");
        header('Location: ./kursvy.php?error=notfound');
        //header("location: .");
    }
    else {
        $row = mysqli_fetch_row($result);
        
        $result = sqlExec("name","name_ID",$row[1],"i");

        $row = mysqli_fetch_row($result);

        echo($row[1]);
    }
}



// EXPERIMENTAL

function isUserParticipant() {
    $userid = "";

    $conn = $GLOBALS['conn']; //accesses conn variable in global scope (1 layer above in this case)

    $result = sqlExec("course","course_ID",$_SESSION['uid'],"i");

    if(mysqli_num_rows($result) == 0) {
        echo("No rows.");
        header('Location: ./kursvy.php?error=notfound');
        echo("test");
    }
    else {
        $row = mysqli_fetch_row($result);
        $userid = $row[0];
    }

    $stmt = $conn->prepare("SELECT *
                            FROM `webschool`.`course_enrollments`
                            WHERE `course_ID`=? AND `user_ID`=?;");
    $stmt->bind_param("is", $_GET["kursid"], $userid);

    $stmt->execute();
    
    $result = $stmt->get_result();

    echo(mysqli_fetch_row($result)[0]);

    /*if(mysqli_num_rows($result) == 0) {
        $stmt = null;
        echo("No rows.");
        header('Location: ./home.php');
    }
    $stmt = null;*/
}

function printPost() {
    $conn = $GLOBALS['conn']; //accesses conn variable in global scope (1 layer above in this case)

    $kursid = $GLOBALS['kursid'];


    $stmt = $conn->prepare("SELECT *
                            FROM `webschool`.`post`
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
        
            echo($row);

        $stmt = null;
    }
}
