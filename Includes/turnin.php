<?php
require 'functions.php';
// Get data from AJAX request
session_start();
$userID = $_SESSION['uid'];
$postID = $_POST['uppgiftid'];

try{
    $query = $pdo->prepare('
    INSERT INTO submissions (user_ID, post_ID, date)
    VALUES (:userID, :postID, NOW());
');

$data = array(
':postID' => $postID,
':userID' => $userID
);

$query->execute($data);
header('Location: ../uppgift.php?uppgiftid='. $postID);
}
catch(PDOException $e){
    echo "ERROR: " . $e;
}


exit;
?>
