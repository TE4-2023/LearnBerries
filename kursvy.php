<?php
require 'Includes/connect.php';
include_once "Includes/header.php";
include 'Includes/courseview.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="width:100%;height:30%;display:flex;justify-content:center;background-color:<?php getCourseColor(); ?>;border-bottom-right-radius:1.5vh;border-bottom-left-radius:1.5vh;align-items:center;flex-direction:column;flex-wrap:wrap;">
        <h1 style="color:white;text-decoration:none !important;"><?php getCourseName(); ?></h1><br>
        <p style="color:white;text-decoration:none !important;">Lärare A</p>
    </div>
    
    <div class="pane" style="width:100%;height:100%;display:flex;flex-direction:column;flex-wrap:wrap; align-items:center;">

    <?php 
        
        // Fetch and display posts
        try {
            $query = $pdo->prepare('
            SELECT posts.*, name.name 
            FROM posts 
            INNER JOIN name 
            ON posts.name_ID = name.name_ID 
            WHERE posts.course_ID = :courseID 
            ORDER BY posts.publishingDate DESC;'
          );
            $data = array(':courseID' => $_GET['kursid']); 

            $query->execute($data);

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                echo '<div style="width: 50%; display:flex; flex-direction:column; flex-wrap:wrap; border-top-left-radius:1vh; border-bottom-right-radius:1vh; height: 10%; margin-top:5%; background-color:white;border:1px solid black;">';
                if ($row['name'] == ""){
                echo '<p>Meddelande</p>';
                }
                else{
                echo '<p>Uppgiftsnamn: ' . $row['name'] . '</p>';
                }
                
                if ($row['deadlineDate'] == '0000-00-00 00:00:00') {
                echo '<p>Deadline: Ingen</p>';
                } else {
                  echo '<p>Deadline: ' . $row['deadlineDate'] . '</p>';
                }
            
                // Add more fields as needed
                echo '<hr>';
                echo '<p>Description: ' . $row['description'] . '</p>';
                echo '</div>';
                echo '<br>';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        
  
    ?>

    </div>


</body>

</html>

<!-- SCRIPTS -->
   
<script src="homescript.js"></script>

<!-- div for members and leader? -->