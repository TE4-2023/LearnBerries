<?php
require 'functions.php';
$pdo = $GLOBALS['pdo'];
$grade = $_POST['grade'];
$enrolledID = $_POST['enrolledID'];
    try {
        $query = $pdo->prepare('
            UPDATE course_enrollments
            SET grade = :grade
            WHERE courseEnrollment_ID = :enrolledID
            ');
            
            $data = array(
            'enrolledID' => $enrolledID,
            'grade' => $grade
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
