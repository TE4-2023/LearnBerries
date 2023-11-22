<?php
require 'connect.php';
require 'functions.php';

    try {
        $query = $pdo->prepare('
            SELECT users.*
            FROM users
            INNER JOIN course_enrollments ON users.ID = course_enrollments.user_ID
        ');

        $query->execute();

        // Fetch and display the results
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            // echo 'ID: ' . $row['ID'] . ', Name: ' . $row['name_ID'] . ', Last Name: ' . $row['lastname_ID'] . '<br>' ;
            echo print_r($row) . "<br/>";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
        // Prints errormessage
    }
    
?>
