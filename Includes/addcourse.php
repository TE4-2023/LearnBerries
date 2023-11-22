<?php
require 'connect.php';
require 'functions.php';
if (!isset($_POST))
{
    header('Location: demoKurser.php');
    exit;
}
$name = $_POST['name'];
$color =  ($_POST['color'] == "costum") ? $_POST['costumColor'] : $_POST['color'];
echo ($name . $color);
try {

    $nameID = checkName($name);

    $query = $pdo->prepare('
            INSERT INTO course (name_ID, color, active)
            VALUES (:nameID, UNHEX(:color), "TRUE");
        ');

    $data = array(
        ':nameID' => $nameID,
        ':color' => $color
    );

    $query->execute($data);
}

catch(PDOException $e)
{
        echo($e);
        //header('Location: signup.html');
            
} 

   

?>