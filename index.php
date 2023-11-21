<?php
include_once "Includes/header.php";

if(!isset($_SESSION['useruid'])) { //switch this out
  //Going back to login page
  header("location: login.php");
}
?>

<p>test</p>

</body>
</html>