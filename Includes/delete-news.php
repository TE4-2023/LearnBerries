<?php
require 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $postID = $_POST['post_ID'];

    // Perform validation and database deletion here

    // Example PDO Delete Query
    $query = "DELETE FROM news WHERE post_ID = :postID";
    $stmt = $pdo->prepare($query); // Assuming $pdo is your PDO connection object

    // Bind parameter
    $stmt->bindParam(':postID', $postID);

    // Execute the statement
    $stmt->execute();

    header("Location: ../nyheter.php");
    exit();
}
?>
