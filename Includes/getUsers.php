<?php

session_start();
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
    WHERE course_enrollments.course_ID = :courseID
    ');

    $data = array(
        ':courseID'=> $courseID
    );

    $users->execute($data);
    echo '<table id="newUsers">';
    echo '<tr>
    <td>Användare</td>
    <td>Email</td>
    <td>Roll</td>
    <td>Betyg</td>
    <td>Ta bort från kurs</td>
    </tr>';
    // Fetch and display the results
    while ($usersRow = $users->fetch(PDO::FETCH_ASSOC)) {
    $grade = ($usersRow['grade']=="") ? "none" : $usersRow['grade'];
        echo '
        <td>'.displayName($usersRow['ssn']).'</td>
        <td>'.displayEmail($usersRow['ssn']).'</td>
        <td>'.displayRole($usersRow['ssn']).'</td>
        <td>';
        if ($usersRow['role_ID']<3)
        {
            echo '<select id="grade" name="grade" onchange="updateGrade(this.value, '.$usersRow['courseEnrollment_ID'].')" required>';
            echo '<option value="'.$grade.'">'.$grade.'</option>';
            foreach (range('A', 'F') as $char) {
                echo '<option value="'.$char.'">'.$char.'</option>';
            }
            echo '<option value="">none</option>
        </select></td>';
        }
        else{
            echo ' </td>';
        }
        echo '
        <td>';
        if(!($usersRow['ssn'] == $_SESSION['uid']))
        {
            echo '<a class="del-user" onClick="removeUser('.$usersRow['courseEnrollment_ID']. ', '. $usersRow['course_ID'].')"><i class="fa-solid fa-trash"></i></a>';
        }
       echo'
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
