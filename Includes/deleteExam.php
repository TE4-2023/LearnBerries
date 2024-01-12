<?php
        // Fetch and display posts

        require 'functions.php';
        $pdo = $GLOBALS['pdo'];
        try {
            $deltequery = $pdo->prepare('
            DELETE FROM `exam`
            WHERE exam_ID = :examID; ');

            $deleteData = array(':examID' => $_POST['examID']);
            $deltequery->execute($deleteData);

            $query = $pdo->prepare('
            SELECT exam.*, name.name 
            FROM exam 
            INNER JOIN name 
            ON exam.name_ID = name.name_ID 
            WHERE exam.course_ID = :courseID 
            ORDER BY exam.examinationDate ASC;'
            );
            $data = array(':courseID' => $_POST['courseID']);

            $query->execute($data);
            echo '<div class="uppgifter-exam" id="uppgifter-exam">';
            
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo'<div class="uppgift">';
            echo '<div class="uppgift-right">';
            echo '<p class="uppgift-deadline">Provtid: '. $row['examinationDate'] . '</p>';
            echo '<div class="edits">';
            echo '<a class="edit-trash" onClick="deleteExam('.$row['course_ID'].', ' .$row['exam_ID'].')"><i class="fa-regular fa-trash-can"></i></a>';
            echo '</div>';
            echo '</div>';
            echo '<div class="uppgift-content">';
            echo '<i class="fa-solid fa-clipboard"></i>';
            echo '<div class="uppgift-title">';
            echo '<h2>'. $row['name'] . '</h2>';
            echo '<p class="meddelande">' . $row['description'] . '</p>';
            echo "</div>";
            echo '</div>';

            echo '</div>';

        }
    }

catch(PDOException $e){
    echo 'Error: ' . $e->getMessage();
}

exit;
?>