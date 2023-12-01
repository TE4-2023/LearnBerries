<?php
        // Fetch and display posts

        require 'functions.php';

        $deadline =(isset($_POST['deadline'])) ? $_POST['deadline'] : '0000-00-00 00:00:00';
        if(!isset($_POST['name'],$_POST['deadline'], $_POST['description'], $_POST['postid'])){
            header('Location: ../home.php');
        }
        $pdo = $GLOBALS['pdo'];
        try {

            $editquery = $pdo->prepare('
            UPDATE `posts` 
            SET `name_ID` = :name,
            `deadlineDate` = :deadline,
            `description` = :description
            WHERE `post_ID` = :postID
            ');

            $editdata = array(
            ':name' => checkName($_POST['name']),
            ':deadline' => $deadline,
            ':description' => $_POST['description'],
            ':postID' => $_POST['postid']);
            
            $editquery->execute($editdata);
            header('Location: ../kursvy.php?kursid='.$_POST['courseid']);
        
    //         $query = $pdo->prepare('
    //         SELECT posts.*, name.name 
    //         FROM posts 
    //         INNER JOIN name 
    //         ON posts.name_ID = name.name_ID 
    //         WHERE posts.course_ID = :courseID 
    //         ORDER BY posts.publishingDate DESC;'
    //         );
    //         $data = array(':courseID' => $_POST['courseid']);

    //         $query->execute($data);
    //         echo '<div class="uppgifter" id="uppgifter">';
    // while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    //     echo '<div class="uppgift">';
    //     if ($row['deadlineDate'] == '0000-00-00 00:00:00') {
    //         echo '<div class="uppgift-right">';
    //         echo '<p class="uppgift-deadline">Deadline: Ingen</p>';
    //         echo '<div class="edits">';
    //         echo '<a class="edit-trash" onClick="deletePosts('.$row['course_ID'].', ' .$row['post_ID'].')"><i class="fa-regular fa-trash-can"></i></a>';
    //         echo '<a class="edit-pen" onClick="editPosts('.$row['course_ID'].',' .$row['post_ID'].', '.$row['name_ID'].', '.$row['deadlineDate'].', '.$row['description'].')"><i class="fa-regular fa-pen-to-square"></i></a>';
    //         echo '</div>';
    //         echo '</div>';
    //         echo '<div class="uppgift-content">';
    //         echo '<i class="fa-solid fa-clipboard"></i>';
    //         echo '<h2>'. $row['name'] . '</h2>';
    //         echo '<p class="meddelande">' . $row['description'] . '</p>';


    //         echo '</div>';
    //     } else {
    //         echo '<p class="uppgift-deadline">Deadline: ' . $row['deadlineDate'] . '</p>';
    //         echo '<div class="uppgift-content">';
    //         echo '<i class="fa-solid fa-clipboard"></i>';
    //         echo '<h2>' . $row['name'] . '</h2>';
    //         echo '<p class="meddelande">' . $row['description'] . '</p>';
    //         echo '<div class="edits">';
    //         echo '<a class="edit-trash" onClick="deletePosts('.$row['course_ID'].', ' .$row['post_ID'].')"><i class="fa-regular fa-trash-can"></i></a>';
    //         echo '<a class="edit-pen" onClick="editPosts('.$row['course_ID'].',' .$row['post_ID'].', '.$row['name_ID'].', '.$row['deadlineDate'].', '.$row['description'].')"><i class="fa-regular fa-pen-to-square"></i></a>';
    //         echo '</div>';
    //         echo '</div>';

    //     }

    //     echo '</div>';
    // }
}
    catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
exit;
?>