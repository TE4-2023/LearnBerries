<?php
        // Fetch and display posts

        require 'functions.php';
        $pdo = $GLOBALS['pdo'];
        try {
            $deltequery = $pdo->prepare('
            DELETE FROM `posts`
            WHERE post_ID = :postID; ');

            $deleteData = array(':postID' => $_POST['postID']);
            $deltequery->execute($deleteData);

            $query = $pdo->prepare('
            SELECT posts.*, name.name 
            FROM posts 
            INNER JOIN name 
            ON posts.name_ID = name.name_ID 
            WHERE posts.course_ID = :courseID 
            ORDER BY posts.publishingDate DESC;'
            );
            $data = array(':courseID' => $_POST['courseID']);

            $query->execute($data);
            echo '<div class="uppgifter" id="uppgifter">';
            
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="uppgift">';
        if ($row['deadlineDate'] == '0000-00-00 00:00:00') {
            echo '<div class="uppgift-right">';
            echo '<p class="uppgift-deadline">Deadline: Ingen</p>';
            echo '<div class="edits">';
            echo '<a class="edit-trash" onClick="deletePosts('.$row['course_ID'].', ' .$row['post_ID'].')"><i class="fa-regular fa-trash-can"></i></a>';
            echo '<a class="edit-pen" onClick="getForm('.$row['post_ID'].')"><i class="fa-regular fa-pen-to-square"></i></a>';
            echo '</div>';
            echo '</div>';
            echo '<div class="uppgift-content">';
            echo '<i class="fa-solid fa-clipboard"></i>';
            echo '<div class="uppgift-title">';
            echo '<a onclick="goPost('.$row['post_ID'].');"><h2>'. $row['name'] . '</h2></a>';
            echo '<p class="meddelande">' . $row['description'] . '</p>';
            echo '<p>'.$row['publishingDate'].'</p>';
            echo "</div>";


            echo '</div>';
        } else {
            echo '<div class="uppgift-right">';
            echo '<p class="uppgift-deadline">Deadline: '. $row['deadlineDate'] . '</p>';
            echo '<div class="edits">';
            echo '<a class="edit-trash" onClick="deletePosts('.$row['course_ID'].', ' .$row['post_ID'].')"><i class="fa-regular fa-trash-can"></i></a>';
            echo '<a class="edit-pen" onClick="getForm('.$row['post_ID'].')"><i class="fa-regular fa-pen-to-square"></i></a>';
            echo '</div>';
            echo '</div>';
            echo '<div class="uppgift-content">';
            echo '<i class="fa-solid fa-clipboard"></i>';
            echo '<div class="uppgift-title">';
            echo '<a onclick="goPost('.$row['post_ID'].');"><h2>'. $row['name'] . '</h2></a>';
            echo '<p class="meddelande">' . $row['description'] . '</p>';
            echo '<p>'.$row['publishingDate'].'</p>';
            echo "</div>";
            echo '</div>';

        }

        echo '</div>';
    }
}
    catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
exit;
?>