<script>
    // function delete(postid, courseid){
    //     const xhr = new XMLHttpRequest();
    //     xhr.open('POST', "Includes/deletePost.php", true);
    //     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    //     xhr.onreadystatechange = function () {
    //         if (xhr.readyState === XMLHttpRequest.DONE) {
    //             if (xhr.status === 200) {
    //                 //alert('SEnrollment successful!');
    //                 getPost(courseid);
    //                 // Optionally, you can redirect the user or perform other actions here
    //             } else {
    //                 alert('Error during enrollment: ' + xhr.responseText);
    //             }
    //         }
    //     };

    //     var data = 'post_ID=' + encodeURIComponent(userID);
    //     xhr.send(data);
    // }

    function deletePosts(courseid, postid){
        console.log(courseid, postid)
        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Optionally, you can redirect the user or perform other actions here
                    var dom = new DOMParser().parseFromString(xhr.responseText, 'text/html')
                    document.getElementById("uppgifter").innerHTML = (dom.getElementById('uppgifter').innerHTML)
                } else {
                    alert('Error during enrollment: ' + xhr.responseText);
                }
            }
        };
        xhr.open('POST', "Includes/deletePosts.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        var data = 'courseID=' + encodeURIComponent(courseid) + '&postID=' + encodeURIComponent(postid);
        xhr.send(data);
    }
</script>
<?php
require 'Includes/functions.php';
session_start();

if (!isset($_SESSION['uid'])) { //switch this out
    //Going back to login page
    header("location: index.php"); // This will redirect
    // differently depending on where you use the code, if you include
    // it in a file thats in a folder it will not find index.php.
    // This is because the code is still executed from the original
    // script.
} else {
    //echo($_SESSION['uid']." ");

}
include 'Includes/courseview.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursvy</title>
    <link rel="stylesheet" href="kursvy.css">
    <script src="https://kit.fontawesome.com/ef1241843c.js" crossorigin="anonymous"></script>
</head>

<body>
<nav>
            <div class="navbar">
                <ul>
                    <li><img class="bild" src="logga.png" alt="logga" /></li>
                    <li>
                        <h1 class="header">Kursvy</h1>
                    </li>

                    <div class="left-nav">
                        <li><a href=""><i class="fa-solid fa-arrow-right-from-bracket"></i> Logga ut</a></li>
                    </div>
                </ul>
            </div>
</nav>

<nav>
            <div class="vert-nav">
                <ul>
                    <li><a href="home.php"><i class="fa-solid fa-house"></i> Hem</a></li>
                    <li class="active"><a href="kurser.php"><i class="fa-solid fa-scroll"></i> Kurser</a></li>
                    <li><a href=""><i class="fa-regular fa-calendar-days"></i> Scheman</a></li>
                    <li><a href=""><i class="fa-solid fa-file-pen"></i> Närvaro</a></li>
                    <li><a href="nyheter.php"><i class="fa-solid fa-newspaper"></i> Nyheter</a></li>
                    <li><a href="kontakter.php"><i class="fa-solid fa-address-book"></i> Kontakter</a></li>
                </ul>
            </div>
</nav>

<div class="kurs" style="background-color:<?php getCourseColor(); ?>;">
        <h1 class="text" style="color:white;text-decoration:none !important;"><?php getCourseName(); ?></h1><br>
        <p class="text" style="color:white;text-decoration:none !important;">kurs lärare: <?php echo getAllTeachers($_GET['kursid'])?></p>
        <a href="#" class="deltagare"><i class="fa-solid fa-users"></i> Deltagare</a>
</div>


<div class="button">
    <button class="btn">Filtrera <i class="fa-solid fa-caret-down"></i></button>
    <button class="btn">Sortera <i class="fa-solid fa-caret-down"></i></button>
</div>



<div class="uppgifter" id="uppgifter">

<?php
        // Fetch and display posts
        try {
            $query = $pdo->prepare('
            SELECT posts.*, name.name 
            FROM posts 
            INNER JOIN name 
            ON posts.name_ID = name.name_ID 
            WHERE posts.course_ID = :courseID 
            ORDER BY posts.publishingDate DESC;'
            );
            $data = array(':courseID' => $_GET['kursid']);

            $query->execute($data);

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="uppgift">';
        if ($row['deadlineDate'] == '0000-00-00 00:00:00') {
            echo '<div class="uppgift-right">';
            echo '<p class="uppgift-deadline">Deadline: Ingen</p>';
            echo '<div class="edits">';
            echo '<a class="edit-trash" onClick="deletePosts('.$row['course_ID'].', ' .$row['post_ID'].')"><i class="fa-regular fa-trash-can"></i></a>';
            echo '<a class="edit-pen" href="#"><i class="fa-regular fa-pen-to-square"></i></a>';
            echo '</div>';
            echo '</div>';
            echo '<div class="uppgift-content">';
            echo '<i class="fa-solid fa-clipboard"></i>';
            echo '<div class="uppgift-title">';
            echo '<h2>'. $row['name'] . '</h2>';
            echo '<p class="meddelande">' . $row['description'] . '</p>';
            echo "</div>";


            echo '</div>';
        } else {
            echo '<p class="uppgift-deadline">Deadline: ' . $row['deadlineDate'] . '</p>';
            echo '<div class="uppgift-content">';
            echo '<i class="fa-solid fa-clipboard"></i>';
            echo '<h2>' . $row['name'] . '</h2>';
            echo '<p class="meddelande">' . $row['description'] . '</p>';
            echo '<div class="edits">';
            echo '<a class="edit-trash" onClick="deletePosts('.$row['post_ID'].')"><i class="fa-regular fa-trash-can"></i></a>';
            echo '<a class="edit-pen" href="#"><i class="fa-regular fa-pen-to-square"></i></a>';
            echo '</div>';
            echo '</div>';

        }

        echo '</div>';
    }
}
    catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

</div>


    <a class="skapa-kurs" id="myBtn"><i class="fa-solid fa-file-circle-plus"></i> Skapa uppgift</a>


    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <form id="form" action="Includes/insertPosts.php" method="post">
            <span class="close">&times;</span>
            
                <input type="hidden" name="courseid" value= <?php echo $_GET['kursid']
                ?>
                >
                <input type="radio" id="uppgift" name="typAv" value="Uppgift" checked="checked">
                <label for="uppgift">Uppgift</label>
                <input type="radio" id="meddelande" name="typAv" value="Meddelande">
                <label for="meddelande">Meddelande</label>
                <div class="header-pop">
                    <h2>Skapa uppgift</h2>
                </div>
                <input name="name" id="name" class="upp-titel" type="text" placeholder="Titel på uppgift" required>
                <textarea name="description" id="name" class="upp-besk" type="text"
                    placeholder="Beskrivning av uppgift..."></textarea>

                    <a class="bifoga-filer" href="#"><i class="fa-solid fa-plus"></i> Bifoga filer (0/9)</a>
                <input type="submit" class="c-btn" value="Skapa uppgift">
            </form>
        </div>

    </div> 


</body>

</html>

<!-- SCRIPTS -->

<script src="homescript.js"></script>
<script src="modal.js"></script>
<script src="interactiveCreate.js"></script>

<!-- div for members and leader? -->