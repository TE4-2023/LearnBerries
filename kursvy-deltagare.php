<?php
require 'Includes/connect.php';
require 'Includes/functions.php';
session_start();

if (!isset($_SESSION['uid'])) { //switch this out
    //Going back to login page
    header("location: login.html"); // This will redirect
    // differently depending on where you use the code, if you include
    // it in a file thats in a folder it will not find index.php.
    // This is because the code is still executed from the original
    // script.
} else {
    //echo($_SESSION['uid']." ");

}
include 'Includes/courseview.php';

?>
<script type="text/JavaScript">

function searching()
{
    console.log("kos");
}

    function removeUser(enrolledID, courseID) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', "Includes/removeuser.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                //alert('SEnrollment successful!');
                getUsers(courseID);
                // Optionally, you can redirect the user or perform other actions here
            } else {
                alert('Error during enrollment: ' + xhr.responseText);
            }
        }
    };

    var data = 'enrolledID=' + encodeURIComponent(enrolledID);
    xhr.send(data);


}

function getUsers(courseID) {
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Optionally, you can redirect the user or perform other actions here
                var dom = new DOMParser().parseFromString(xhr.responseText, 'text/html')
                document.getElementById("usersTable").innerHTML = (dom.getElementById('newUsers').innerHTML)
            } else {
                alert('Error during enrollment: ' + xhr.responseText);
            }
        }
    };
    xhr.open('POST', "Includes/getUsers.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'courseID=' + encodeURIComponent(courseID);
    xhr.send(data);
}

function updateGrade(grade, enrolledID)
{
    const xhr = new XMLHttpRequest();
    xhr.open('POST', "Includes/updategrade.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Optionally, you can redirect the user or perform other actions here
            } else {
                alert('Error grade update error: ' + xhr.responseText);
            }
        }
    };

    var data = 'enrolledID=' + encodeURIComponent(enrolledID) + '&grade=' + encodeURIComponent(grade);
    xhr.send(data);
}

function getInviteList(courseID, searchstr)
{
    const xhr = new XMLHttpRequest();
    search = searchstr;
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Optionally, you can redirect the user or perform other actions here
                var dom = new DOMParser().parseFromString(xhr.responseText, 'text/html')
                document.getElementById("inviteTable").innerHTML = (dom.getElementById('inviteTable').innerHTML)


            } else {
                alert('Error during enrollment: ' + xhr.responseText);
            }
        }
    };
    xhr.open('POST', "Includes/getusernotin.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'courseID=' + encodeURIComponent(courseID) + '&searchStr=' + encodeURIComponent(searchstr);
    xhr.send(data);
}

function inviteUser(userID, courseID) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', "Includes/enrolluser.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                //alert('Enrollment successful!');
                getInviteList(courseID, search)
                getUsers(courseID)
                // Optionally, you can redirect the user or perform other actions here
            } else {
                alert('Error during enrollment: ' + xhr.responseText);
            }
        }
    };

    var data = 'userID=' + encodeURIComponent(userID) + '&courseID=' + encodeURIComponent(courseID);
    xhr.send(data);
    
}
function openModal()
{


    getInviteList(<?php echo $_GET['kursid'] ?>, "");
    // Get the modal
    var modal = document.getElementById("myModal");

// Get the button that opens the modal

// When the user clicks the button, open the modal 
   modal.style.display = "block";



   var span = document.getElementById("closeSpan");
                    modal.style.display = "block";
                if (span) {
                    span.onclick = function () {
                        modal.style.display = "none";
                    };
                }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
// }


}

  </script>
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
                    <h1 class="header">Kontakter</h1>
                </li>

                <div class="left-nav">
                    <li><a href="Includes/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logga ut</a></li>
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
        <h1 style="color:white;font-size: 80px;text-decoration:none !important;"><?php getCourseName(); ?></h1><br>
        <p class="text" style="color:white;text-decoration:none !important;">kurs lärare: <?php echo getAllTeachers($_GET['kursid'])?></p>
        <a href="kursvy.php?kursid=<?php echo $_GET['kursid']; ?>" class="deltagare"><i class="fa-solid fa-clipboard"></i></i></i> Inlägg</a>
    </div>

    </head>

    <body>


        <div class="users" id="users">
            <h2 class="elev-titel">Deltagare</h2>
            <table id="usersTable">

                    <?php

                    echo '<script type="text/javascript">getUsers(' . $_GET['kursid'] . ');</script>';


                    ?>



            </table>
        </div>
        <?php
           if($_SESSION['role']>2)
           {
               echo'<a  onClick="openModal();"class="skapa-kurs" id="myBtn"><i class="fa-solid fa-user-plus"></i> Bjud in deltagare</a>

               </div>
       
               <div id="myModal" class="modal">
       
                   <!-- Modal content -->
                   <div class="modal-content">
                       <form id="form" action="#" method="post">
                           <span id="closeSpan" class="close">&times;</span>
                           <input name="search" id="search" class="upp-titel" type="text" onkeyup="getInviteList('.$_GET['kursid'].', this.value);">
                           <div class="users">
                               <h2 class="elev-titel">Deltagare</h2>
                               <table id="inviteTable">';
           }
    




                            ?>
                    </div>

            </div>

    </body>

</html>

<!-- SCRIPTS -->

<script src="homescript.js"></script>
<script src="interactiveCreate.js"></script>
<!-- div for members and leader? -->