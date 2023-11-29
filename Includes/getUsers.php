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
    WHERE course_enrollments.course_ID = :courseID AND users.role_ID = 3
');
    $data = array(':courseID' => $courseID);
    $users->execute($data);
    
    // Fetch and display the results
    echo '<div id = "usersDIV">
    <h2>Teachers</h2>';
    while ($usersRow = $users->fetch(PDO::FETCH_ASSOC)) {
    echo '<button id="course'.$courseID.'" type="button" onclick ="user(this);"
    data-value="'.$courseID.'" value = "'.$usersRow['user'].'">'.displayName($usersRow['ssn']).'</button><br>';
    }
    $users = $pdo->prepare('
    SELECT *, users.user_ID AS user
    FROM users
    LEFT JOIN name 
    ON users.name_ID = name.name_ID
    LEFT JOIN course_enrollments
    ON users.user_ID = course_enrollments.user_ID
    WHERE course_enrollments.course_ID = :courseID AND users.role_ID = 2
    ');
    $users->execute($data);

    // Fetch and display the results
    echo'<h2>Students</h2>';
    while ($usersRow = $users->fetch(PDO::FETCH_ASSOC)) {
    $grade = ($usersRow['grade']=="") ? "none" : $usersRow['grade'];
    echo '<div style=""><button id="course'.$courseID.'" type="button" onclick ="user(this);"
    data-value="'.$courseID.'" value = "'.$usersRow['user'].'">'.$usersRow['name'].'</button>
    <form style="display:inline">
    <label for="color">grade</label>
    <select id="color" name="color" onchange="updateGrade(this.value, '.$usersRow['user_ID'].', '.$courseID.')" required>';
    echo '<option value="'.$grade.'">'.$grade.'</option>';
        foreach (range('A', 'F') as $char) {
            echo '<option value="'.$char.'">'.$char.'</option>';
        }
        echo '<option value="">none</option>
    </select>
    </form>
    <br></div>';
    }
}
catch(PDOException $e){
    echo "ERROR: " . $e;
} 
exit;       
?>
