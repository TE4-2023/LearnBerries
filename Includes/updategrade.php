<?php
require 'functions.php';
$pdo = $GLOBALS['pdo'];
$grade = $_POST['grade'];
$userID = $_POST['userID'];
$courseID = $_POST['courseID'];
    try {
        echo($grade. ' '. $userID . ' ' . $courseID);
        $query = $pdo->prepare('
            UPDATE course_enrollments
            SET grade = :grade
            WHERE user_ID = :userID AND course_ID = :courseID
        ');
        $data = array(
            ':userID' => $userID,
            ':courseID' => $courseID,
            ':grade' => $grade
        );


        if($query->execute($data) === TRUE ) {
            echo('success' . $grade);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        // Prints errormessage
    }
exit;
?>
