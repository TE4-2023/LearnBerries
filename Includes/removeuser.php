<?php
require 'connect.php';
require 'functions.php';
// Get data from AJAX request
$userID = $_POST['userID'];
$courseID = $_POST['courseID'];

try{
    $query = $pdo->prepare('
    DELETE FROM course_enrollments 
    WHERE user_ID = :userID AND course_ID= :courseID
');

$data = array(
':courseID' => $courseID,
':userID' => $userID
);

$query->execute($data);
echo "Enrollment successful!";
}
catch(PDOException $e){
    echo "ERROR: " . $e;
}


exit;
?>