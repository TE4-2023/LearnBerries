<script type="text/JavaScript"> 


function user(user) {
    userID = user.value;
    courseID =  user.getAttribute("data-value");
    const xhr = new XMLHttpRequest();
    xhr.open('POST', "enrolluser.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                //alert('Enrollment successful!');
                getUsers(courseID);
                // Optionally, you can redirect the user or perform other actions here
            } else {
                alert('Error during enrollment: ' + xhr.responseText);
            }
        }
    };

    var data = 'userID=' + encodeURIComponent(userID) + '&courseID=' + encodeURIComponent(courseID);
    xhr.send(data);


    console.log(userID + "   " + courseID);
}

function getUsers(courseID) {
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Optionally, you can redirect the user or perform other actions here
                var dom = new DOMParser().parseFromString(xhr.responseText, 'text/html')
                document.getElementById("course"+courseID).innerHTML = (dom.getElementById('usersDIV').innerHTML)
            } else {
                alert('Error during enrollment: ' + xhr.responseText);
            }
        }
    };
    xhr.open('POST', "getUsers.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'courseID=' + encodeURIComponent(courseID);
    xhr.send(data);
}
  </script> 
<?php
require 'connect.php';
require 'functions.php';

    try {
        $query = $pdo->prepare('
            SELECT *, HEX(course.color)
            FROM course
            LEFT JOIN name 
            ON course.name_ID = name.name_ID
        ');

        $query->execute();

        // Fetch and display the results
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            echo '<div id = "course'.$row['course_ID'].'" style="background-color: #'.$row['HEX(course.color)'].';length: 60px;">ID: '
             . $row['course_ID'] . ', Name: ' . $row['name']. '  active: ' . $row['active'].'<br>';
            echo '<script type="text/javascript">getUsers('.$row['course_ID'].');</script>';
            echo '</div>';
            //echo print_r($row) . "<br/>";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
        // Prints errormessage
    }

//     <?php
//     require 'Includes/connect.php';
//     require 'Includes/functions.php';
//     session_start();
    
//     $userID = getUserID($_SESSION['uid']);
//     $query = $pdo->prepare('
//     SELECT *, HEX(course.color)
//     FROM course
//     LEFT JOIN name 
//     ON course.name_ID = name.name_ID
//     LEFT JOIN course_enrollments
//     ON course_enrollments.course_ID = course.course_ID
//     WHERE course_enrollments.user_ID = :userID
//     ');
//     $query->bindParam(':userID', $userID, PDO::PARAM_STR);

//     $query->execute();

//     // Fetch and display the results
//     while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

        

//         echo('<div onClick="goToCourse('.$row['course_ID'].')" class="kurs" style="background: linear-gradient(to bottom, #'.$row['HEX(course.color)'].' 45%, white -100%);">
//         <div class="top-color">
//             <h2>'.$row['name'].'</h2>
//         </div>
//         <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis cupiditate sit quas quo necessitatibus ea accusantium laudantium quasi consectetur delectus!</span>
//     </div>
//         ');
//     }
    
// ?>
