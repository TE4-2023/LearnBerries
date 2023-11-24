<script type="text/JavaScript"> 


function addUser(user) {
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
    
?>
