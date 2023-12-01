<?php

require 'connect.php';



try{
    $query = $pdo->prepare('
            SELECT *
            FROM posts
            JOIN name
            ON posts.name_ID = name.name_ID
            WHERE post_ID = :postid;
        ');
        
        $data = array(':postid' => $_POST['postID']);
    
        $query->execute($data);
        echo '<div id="hiddenform">';
        while ($row = $query->fetch(PDO::FETCH_ASSOC)){
            $isUppgift = !($row['deadlineDate'] === '0000-00-00 00:00:00');
            $type = !($row['deadlineDate'] == '0000-00-00 00:00:00') ? "uppgift" : "meddelande";
            echo '<div class="modal-content">
            <form id="form" action="Includes/editPosts.php" method="post">
            <span class="close">&times;</span>
            
                <input type="hidden" name="courseid" value="'.$row['course_ID'].'">
                <input type="hidden" name="postid" value="'.$row['post_ID'].'">

                <div class="header-pop">
                    <h2>Ändra '.$type.'</h2>
                </div>
                <input name="name" id="name" class="upp-titel" type="text" value="'.$row['name'].'" required>
                <textarea name="description" id="name" class="upp-besk" type="text">'.$row['description'].'</textarea>

                    <a class="bifoga-filer" href="#"><i class="fa-solid fa-plus"></i> Bifoga filer (0/9)</a>';
                    if($isUppgift)
                    {
                        echo    '<input class="set-deadline" type="datetime-local" value="'.$row['deadlineDate'].'" name="deadline" id="deadline" required>';
                    }
                    echo '
                <input type="submit" class="c-btn" value="Bekräfta">
            </form>
        </div>';
        }
        echo '</div>';
}catch (PDOException $e) {
    echo $e->getMessage();
    // Prints errormessage
}
exit;
?>