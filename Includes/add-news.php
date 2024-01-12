<?php
require 'connect.php';
require 'functions.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $postID = $_POST['post_ID'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Perform validation and database insertion here

    // Example PDO Insert Query
    $query = "INSERT INTO news (title, description) VALUES (:title, :description)";
    $stmt = $pdo->prepare($query); // Assuming $pdo is your PDO connection object

    // Bind parameters
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);


    // Execute the statement
    $stmt->execute();

    header("Location: ../nyheter.php");
    exit();
}
?>
