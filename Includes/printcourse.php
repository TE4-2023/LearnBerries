<?php
require 'connect.php';
require 'functions.php';

    try {
        $query = $pdo->prepare('
            SELECT *, HEX(course.color)
            FROM course
            LEFT JOIN name 
            ON course.name_ID = name.ID
        ');

        $query->execute();

        // Fetch and display the results
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<div style="background-color: #'.$row['HEX(course.color)'].'; height: 60px; length: 60px;">ID: ' . $row['ID'] . ', Name: ' . $row['name']. '  active: ' . $row['active'].'<br>' ;
            //echo print_r($row) . "<br/>";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
        // Prints errormessage
    }
    
?>
