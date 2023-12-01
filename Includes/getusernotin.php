<?php

require 'connect.php';
require 'functions.php';
// Get data from AJAX request
$courseID = $_POST['courseID'];
$search = ($_POST['searchStr']==="") ? " " : $_POST['searchStr'];
try{

    $data = array(':courseID' => $courseID);

    
    
    $users = $pdo->prepare("
    SELECT * , name.name AS firstname , A.name AS lastname, CONCAT(name.name, ' ', A.name) AS fullname, users.user_ID AS user
    FROM `users` 
    INNER JOIN name ON users.name_ID = name.name_ID
    INNER JOIN name AS A ON users.lastname_ID = A.name_ID
    WHERE users.user_ID NOT IN (SELECT course_enrollments.user_ID FROM course_enrollments WHERE course_enrollments.course_ID = :courseID)
    AND CONCAT(name.name, ' ', A.name) LIKE '%".$search."%';
    ");
    $users->execute($data);

    echo '<table id="inviteTable">';
    echo '<tr>
    <td>Användare</td>
    <td>Email</td>
    <td>Roll</td>
    <td>Bjud In</td>
    </tr>';
    // Fetch and display the results
    while ($usersRow = $users->fetch(PDO::FETCH_ASSOC)) {
        echo '
        <td>'.displayName($usersRow['ssn']).'</td>
        <td>'.displayEmail($usersRow['ssn']).'</td>
        <td>'.displayRole($usersRow['ssn']).'</td>
        <td>
        
        <a style="cursor: pointer;"onClick="inviteUser('.$usersRow['user_ID']. ', '. $courseID.')"><i class="fa-regular fa-paper-plane"></i></a>
    

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

