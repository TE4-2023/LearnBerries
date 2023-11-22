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


//start

if(!isset($_GET['kursid'])) { //switch this out
    //Going back to login page
    header("location: kurser.php"); // This will redirect
    // differently depending on where you use the code, if you include
    // it in a file thats in a folder it will not find index.php.
    // This is because the code is still executed from the original
    // script.
}


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
        header('Location: ./kevinstempcodetransferfile.php?error=notfound');
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
        header('Location: ./kevinstempcodetransferfile.php?error=notfound');
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