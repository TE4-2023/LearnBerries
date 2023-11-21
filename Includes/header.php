<?php
    session_start();

    if(!isset($_SESSION['uid'])) { //switch this out
        //Going back to login page
        header("location: ../index.php");
    }
    else {
        //echo($_SESSION['uid']." ");
        
    }
?>