<?php
require 'functions.php';
// Get data from AJAX request
$enrolledID = $_POST['enrolledID'];

try{
    $query = $pdo->prepare('
    DELETE FROM course_enrollments 
    WHERE courseEnrollment_ID = :enrolledID
');

$data = array(
'enrolledID' => $enrolledID
);

$query->execute($data);
echo "Enrollment successful!";
}
catch(PDOException $e){
    echo "ERROR: " . $e;
}


exit;
?>