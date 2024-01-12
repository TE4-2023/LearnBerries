<?php
require 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $postID = $_POST['editPostID'];
    $newTitle = $_POST['editTitle'];
    $newDescription = $_POST['editDescription'];

    // Perform validation and database update here

    // Example PDO Update Query
    $query = "UPDATE news SET title = :newTitle, description = :newDescription WHERE post_ID = :postID";
    $stmt = $pdo->prepare($query);

    // Bind parameters
    $stmt->bindParam(':newTitle', $newTitle);
    $stmt->bindParam(':newDescription', $newDescription);
    $stmt->bindParam(':postID', $postID);

    // Execute the statement
    $stmt->execute();

    header("Location: ../nyheter.php");
    exit();
}
?>
