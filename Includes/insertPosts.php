<?php

session_start();
require 'connect.php';
require 'functions.php';

if ($_SESSION['role'] < 3) {

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form is submitted, process the data

    $courseID = $_POST['course'];
    $name = $_POST['name'];
    $deadline = $_POST['deadline'];
    $description = $_POST['description'];
    $userID = $_SESSION['userid'];

    try {
        $query = $pdo->prepare('INSERT INTO posts (course_ID, user_ID, name_ID, publishingDate, deadlineDate, description) 
                               VALUES (:courseID, :userID, :nameID, NOW(), :deadline, :description)');
        $data = array(
            ':courseID' => $courseID,
            ':userID' => $userID,
            ':nameID' => $name,  // Adjust this based on your database schema
            ':deadline' => $deadline,
            ':description' => $description
        );

        $query->execute($data);

        header('Location: ../kurser.php');

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>