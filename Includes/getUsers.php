<?php

require 'connect.php';
require 'functions.php';
// Get data from AJAX request
$courseID = $_POST['courseID'];

try{
    $users = $pdo->prepare('
    SELECT *, users.user_ID AS user
    FROM users
    LEFT JOIN name 
    ON users.name_ID = name.name_ID
    LEFT JOIN course_enrollments
    ON users.user_ID = course_enrollments.user_ID
    WHERE users.user_ID NOT IN (SELECT course_enrollments.user_ID FROM course_enrollments WHERE course_enrollments.course_ID = :courseID)
    GROUP BY users.user_ID
');
    $data = array(':courseID' => $courseID);
    $users->execute($data);

    // Fetch and display the results
    echo '<div id = "usersDIV">';
    while ($usersRow = $users->fetch(PDO::FETCH_ASSOC)) {
    echo '<button id="course'.$courseID.'" type="button" onclick ="addUser(this);"
    data-value="'.$courseID.'" value = "'.$usersRow['user'].'">'.$usersRow['name'].'</button><br>';
}
    echo '</div>';
}
catch(PDOException $e){
    echo "ERROR: " . $e;
}        
?>
