<?php
include_once "Includes/header.php";

session_start();

if(!isset($_SESSION['uid'])) { // Using ssn is very bad
  //Going back to login page
  header("location: login.html");
} else {
  header('location: home.php');
}
?>

<p>test</p>

</body>
</html>