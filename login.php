<?php

session_start();

include_once "connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    //Grabbing the data
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

    $stmt = $conn->prepare("SELECT *
                        FROM `webschool`.`users`
                        WHERE `email`=? AND `password`=?;"); // BAD SQL STATEMENT
    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();

    $result = $stmt->get_result(); // FETCHES RESULT FROM STATEMENT CHECK FOR IF THERE ANY ROWS THAT MATCH TO 

    if(mysqli_num_rows($result) == 0) {
        $stmt = null;
        echo("No rows.");
    }
    else {
        $row = mysqli_fetch_row($result);
        echo($row[3]); //email
        echo($row[6]); //password

        $_SESSION["uid"] = $row[4]; //ssn

        $stmt = null;

        header("location: home.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Email">                                        <!-- UNIQUE -->
        <input type="password" name="password" placeholder="Password">          <!-- UNIQUE -->
        <input type="submit" value="Submit">
    </form>

</body>
</html>