<?php
require 'connect.php';
require 'functions.php';
session_start();


if (!isset($_POST))
{
    header('Location: ../demoKurser.php');
    exit;
}
$name = $_POST['name'];
$color =  ($_POST['color'] == "custom") ? $_POST['customcolor'] : $_POST['color'];
$color = ltrim($color, '#');
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
    header('Location: printcourse.php');
}

catch(PDOException $e)
{
        echo($e);
        //header('Location: signup.html');
            
} 
   

?>