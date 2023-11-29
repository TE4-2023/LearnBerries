<?php
require 'functions.php';

$teacherID = $_POST['teacher'];
$courseID = $_POST['course'];
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];
$classroom = $_POST['classroom'];
$dates = explode(', ', $_POST['lessonDates']);


try{
    $query = $pdo->prepare('
    INSERT INTO course_enrollments (course_ID, user_ID)
    VALUES (:courseID, :userID);
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