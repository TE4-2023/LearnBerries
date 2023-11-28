<?php
require 'connect.php';
require 'functions.php';
session_start();


if (!isset($_POST) || !isset($_SESSION['uid']))
{
    header('Location: ../kurser.php');
    exit;
}

$name = $_POST['name'];
$color = ltrim($_POST['color'], '#');
echo ($name . $color);
try {

    $nameID = checkName($name);

    $query = $pdo->prepare('
            INSERT INTO course (name_ID, color, active)
            VALUES (:nameID, UNHEX(:color), TRUE);
        ');

    $data = array(
        ':nameID' => $nameID,
        ':color' => $color
    );
    $query->execute($data);
    $last_id = $pdo->lastInsertId();


    $IDquery = $pdo->prepare("SELECT * FROM course WHERE course_ID = :courseID LIMIT 1");
    $IDquery->bindParam(':courseID', $last_id, PDO::PARAM_STR);
    $IDquery->execute();
    $nameID = $IDquery->fetch();

    $query = $pdo->prepare('
        INSERT INTO course_enrollments (course_ID, user_ID)
        VALUES (:courseID, :userID);
    ');
    
    $data = array(
    ':courseID' => $nameID['course_ID'],
    ':userID' => getUserID($_SESSION['uid'])
    );
    $query->execute($data);







    header('Location: ../kurser.php');
}

catch(PDOException $e)
{
        echo($e);
        //header('Location: signup.html');
            
} 
   

?>