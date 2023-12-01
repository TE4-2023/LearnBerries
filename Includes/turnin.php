<?php
require 'functions.php';
// Get data from AJAX request
session_start();
$userID = $_SESSION['uid'];
$postID = $_POST['uppgiftid'];

function getUID() {
    $query = $GLOBALS['pdo']->prepare(
        'SELECT *
        FROM users
        WHERE users.ssn = :ssn;');
    $data = array(':ssn' => $GLOBALS['$userID']);
    $query->execute($data);

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['user_ID'];
}

function postExists() {
    $query = $GLOBALS['pdo']->prepare(
        'SELECT * 
        FROM submissions 
        WHERE submissions.user_ID = :userID 
        AND submissions.post_ID = :postID;');
    $query->bindParam(':userID', $GLOBALS['userID']);
    $query->bindParam(':postID', $GLOBALS['postID']);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $query->rowCount();
}


try{
    $query = $pdo->prepare(
    'INSERT INTO submissions (user_ID, post_ID, date)
    VALUES (:userID, :postID, NOW());
');
$data = array(
':postID' => $postID,
':userID' => $userID
);


if (postExists() == 0) {
    $query->execute($data);
}
else {
    $query = NULL;
}


header('Location: ../uppgift.php?uppgiftid='. $postID);
}
catch(PDOException $e){
    echo "ERROR: " . $e;
}


exit;
?>
