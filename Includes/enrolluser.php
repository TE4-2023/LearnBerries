<?php
require 'connect.php';
require 'functions.php';
// Get data from AJAX request
$userID = $_POST['userID'];
$courseID = $_POST['courseID'];

try{
    $query = $pdo->prepare('
    INSERT INTO course_enrollments (course_ID, user_ID)
    VALUES (courseID, userID);
');

$data = array(
':courseID' => $courseID,
':userID' => $userID
);

$query->execute($data);
echo "Enrollment successful!";
}
catch(PDOException $e){
    echo "ERROR" . $e;
}


exit;
?>
