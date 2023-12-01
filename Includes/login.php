<?php

session_start();
$r=session_id();

include_once "loginconnect.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    //Grabbing the data
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

    $stmt = $conn->prepare("SELECT *
                        FROM `webschool`.`users`
                        WHERE `email`=? AND `password`= SHA(?);");
    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();

    $result = $stmt->get_result();

    if(mysqli_num_rows($result) == 0) {
        $stmt = null;
        echo("No rows.");
        header('Location: ../login.html?error=notfound');
        //header("location: .");
    }
    else {
        $row = mysqli_fetch_row($result);
        
        $_SESSION["uid"] = $row[4]; //ssn
        $_SESSION['userid'] = $row[0];
        $_SESSION['role'] = $row[5];

        $stmt = null;

        header("location: ../kurser.php"); //Direktar till kurser för test
        

    }
}
?>