<?php
include_once "header.php";

if(!isset($_SESSION['useruid'])) {
  //Going back to login page
  header("location: login.php");
}
?>

<p>test</p>

</body>
</html>