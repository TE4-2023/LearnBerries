<?php

require 'connect.php';
require 'functions.php';
// Get data from AJAX request
$courseID = $_POST['courseID'];

try{

    $data = array(':courseID' => $courseID);

    
    
    $users = $pdo->prepare('
    SELECT *, users.user_ID AS user
    FROM users
    LEFT JOIN name 
    ON users.name_ID = name.name_ID
    WHERE users.user_ID NOT IN (SELECT course_enrollments.user_ID FROM course_enrollments WHERE course_enrollments.course_ID = :courseID);
    ');
    $users->execute($data);

    echo '<table id="inviteTable">';
    echo '<tr>
    <td>Användare</td>
    <td>Email</td>
    <td>Roll</td>
    <td>Betyg</td>
    <td>Ta bort från kurs</td>
    </tr>';
    // Fetch and display the results
    while ($usersRow = $users->fetch(PDO::FETCH_ASSOC)) {
        echo '
        <td>'.displayName($usersRow['ssn']).'</td>
        <td>'.displayEmail($usersRow['ssn']).'</td>
        <td>'.displayRole($usersRow['ssn']).'</td>
        <td>
        
        <a class="del-user" onClick="addUser('.$usersRow['user_ID']. ', '. $courseID.')"><i class="fa-solid fa-trash"></i></a>
    

      </td>


</tr>';
    }
    echo '</table>';
}
catch(PDOException $e){
    echo "ERROR: " . $e;
}
exit;        
?>

