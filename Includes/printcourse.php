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

            echo '<div style="background-color: #'.$row['HEX(course.color)'].';length: 60px;">ID: ' . $row['ID'] . ', Name: ' . $row['name']. '  active: ' . $row['active'].'<br>';
   
        $users = $pdo->prepare('
            SELECT *, users.ID AS user_ID
            FROM users
            LEFT JOIN name 
            ON users.name_ID = name.ID
        ');
        $users->execute();

        // Fetch and display the results
        while ($usersRow = $users->fetch(PDO::FETCH_ASSOC)) {
            // echo 'ID: ' . $row['ID'] . ', Name: ' . $row['name_ID'] . ', Last Name: ' . $row['lastname_ID'] . '<br>' ;
            echo '<button type="button" onclick ="addUser(this);" value = "'.$usersRow['user_ID'].'">'.$usersRow['name'].'</button><br>';
        }

            
            
            
            
            echo '</div>';
            //echo print_r($row) . "<br/>";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
        // Prints errormessage
    }
    
?>
<script type="text/JavaScript"> 
  

function addUser(user) {
    console.log(user.value);
} 
  </script> 
