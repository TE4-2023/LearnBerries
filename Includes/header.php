<?php
    session_start();

    if(!isset($_SESSION['uid'])) { //switch this out
        //Going back to login page
        header("location: index.php"); // This will redirect
        // differently depending on where you use the code, if you include
        // it in a file thats in a folder it will not find index.php.
        // This is because the code is still executed from the original
        // script.
    }
    else {
        //echo($_SESSION['uid']." ");
        
    }
?>