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
    ORDER BY users.role_ID DESC

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
    <td>Betyg</td>';
    if($_SESSION['role']>2)
    {
        echo '<td>Ta bort från kurs</td>';
    }
    echo'
    </tr>';
    // Fetch and display the results
    while ($usersRow = $users->fetch(PDO::FETCH_ASSOC)) {
    $grade = ($usersRow['grade']=="") ? "none" : $usersRow['grade'];
        echo '<tr style="background-color:'. (($usersRow['user_ID'] == $_SESSION['userid']) ? "rgba(172, 166, 166, 0.548)" : "white").'">
        <td>'.displayName($usersRow['ssn']).'</td>
        <td>'.displayEmail($usersRow['ssn']).'</td>
        <td>'.displayRole($usersRow['ssn']).'</td>
        <td>';
        if ($usersRow['role_ID'] <2 || ($_SESSION['role']>2 && $usersRow['user_ID'] != $_SESSION['userid']))
        {
            echo '<select id="grade" name="grade" onchange="updateGrade(this.value, '.$usersRow['courseEnrollment_ID'].')" required>';
            echo '<option value="'.$grade.'">'.$grade.'</option>';
            foreach (range('A', 'F') as $char) {
                echo '<option value="'.$char.'">'.$char.'</option>';
            }
            echo '<option value="">none</option>
        </select></td>';
        }
        else if($usersRow['user_ID'] == $_SESSION['userid'])
        {
            echo $usersRow['grade'];
        }
        else{
            echo ' </td>';
        }

        if(!($usersRow['user_ID'] == $_SESSION['userid']) && $_SESSION['role']>2)
        {
            echo '<td><a class="del-user" onClick="removeUser('.$usersRow['courseEnrollment_ID']. ', '. $usersRow['course_ID'].')"><i class="fa-solid fa-trash"></i></a></td>';
        }
        if($_SESSION['role']>2 && ($usersRow['user_ID'] == $_SESSION['userid']))
        {
            echo'<td></td>';
        }
       echo' 


</tr>';
    }
    echo '</table>';
}
catch(PDOException $e){
    echo "ERROR: " . $e;
} 
exit;       
?>
