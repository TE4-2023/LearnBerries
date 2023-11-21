<?php
require 'Includes/connect.php';
require 'Includes/functions.php';
if (isset($_POST))
{
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $SSN = $_POST['ssn'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $roleID = 0;
    switch($role)
    {
        case 'student':
            $roleID = 2;
            break;
        case 'teacher':
            $roleID = 3;
            break;
        default:
        $roleID = 2;
    }
    
    echo ($database_name . $role);
    try {
        if(itemExists("ssn", $SSN) or itemExists("email", $email))
        {
            header('Location: create.html?taken=true');
            exit();
        }
        else
        {
            $nameID = checkName($name);
            $lastNameID = checkName($lastName);
            echo ($nameID . $lastNameID);
    
            $query = $pdo->prepare('
                    INSERT INTO users (name_ID, lastname_ID, email, ssn, role_ID, password)
                    VALUES (:nameID, :lastNameID, :email, :ssn, :roleID, SHA(:password));
            ');
            
            $data = array(
                ':nameID' => $nameID,
                ':lastNameID' => $lastNameID,
                ':password' => $password,
                ':email' => $email,
                ':ssn' => $SSN,
                ':roleID' => $roleID
            );
            
            $query->execute($data);
        }

        header('Location: login.html');
        
        }
        catch(PDOException $e)
        {
            echo($e);
            //header('Location: signup.html');
            
    } 

   
}
?>