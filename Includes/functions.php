<?php
require 'connect.php';
function checkName($nameToCheck)
{
    $pdo = $GLOBALS['pdo'];
    try{
        $query = $pdo->prepare("SELECT name FROM name WHERE name = :name");
        $query->bindParam(':name', $nameToCheck, PDO::PARAM_STR);
        $query->execute();
        $Isname = $query->fetchAll();
        if(empty($Isname))
        {
            $query = $pdo->prepare("INSERT INTO name (name) VALUES(:name)");
            $query->bindParam(':name', $nameToCheck, PDO::PARAM_STR);
            $query->execute();
        }
        $query = $pdo->prepare("SELECT * FROM name WHERE name = :name LIMIT 1");
        $query->bindParam(':name', $nameToCheck, PDO::PARAM_STR);
        $query->execute();
        $nameID = $query->fetch();
        return $nameID['name_ID'];
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
}
function itemExists($parameterToCheck, $value)
{
    $pdo = $GLOBALS['pdo'];
    $query = $pdo->prepare('SELECT * FROM users WHERE '. $parameterToCheck.' = :value');
    //$query->bindParam(':parameter', $parameterToCheck, PDO::PARAM_STR);
    $query->bindParam(':value', $value, PDO::PARAM_STR);
    $query->execute();
    $table = $query->fetchAll();
    echo print_r($table);
    return !empty($table);
}

function getUserID($userSSN)
{
    $pdo = $GLOBALS['pdo'];
    $query = $pdo->prepare('SELECT * FROM users WHERE  :userSSN = ssn');
    $query->bindParam(':userSSN', $userSSN, PDO::PARAM_STR);
    $query->execute();
    while ($table = $query->fetch())
    {
        return $table['user_ID'];
    }


}

function displayName($userssn)
{
    $pdo = $GLOBALS['pdo'];


        try {
            $query = $pdo->prepare('
            SELECT * , name.name AS firstname , A.name AS lastname 
            FROM `users` 
            INNER JOIN name ON users.name_ID = name.name_ID
            INNER JOIN name AS A ON users.lastname_ID = A.name_ID 
            WHERE users.ssn = :uid;
            ');

            $data = array(
                ':uid' => $userssn
            );

            $query->execute($data);

            // Fetch and display the results
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $username = $row['firstname'] . ' ' . $row['lastname'];
                return $username;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            // Handle the exception or redirect as needed
            // header('Location: login.html');
        }
}

function displayEmail($userssn)
{
    $pdo = $GLOBALS['pdo'];
    try{
        $query = $pdo->prepare('
        SELECT email 
        FROM users
        WHERE users.ssn = :uid;
        ');

        $data = array(
            ':uid' => $userssn
        );
        $query->execute($data);

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $useremail = $row['email'] ;
            return $useremail;
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
        // Handle the exception or redirect as needed
        // header('Location: login.html');
    }


}

function getAllTeachers($course)
{
    $pdo = $GLOBALS['pdo'];



    $TeacherQ = $pdo->prepare('
        SELECT *, name.name AS firstname , A.name AS lastname 
        FROM `users` 
        INNER JOIN name ON users.name_ID = name.name_ID
        INNER JOIN name AS A ON users.lastname_ID = A.name_ID 
        RIGHT JOIN course_enrollments ON course_enrollments.user_ID = users.user_ID
        WHERE users.role_ID = 3 AND course_enrollments.course_ID = :courseID
        ');
        $TeacherQ->bindParam(':courseID', $course, PDO::PARAM_STR);
    
        $TeacherQ->execute();

    $nbrOfTeachers = 0;
    $allTeachers = "";
                while ($teachers = $TeacherQ->fetch(PDO::FETCH_ASSOC)) {
                    $nbrOfTeachers++;
                    if($nbrOfTeachers > 3)
                    {
                        $allTeachers .= "...";
                        break;
                    }
                    if($nbrOfTeachers>1)
                    {
                        $allTeachers .= ", ";
                    }
                    $allTeachers .= $teachers['firstname'] . " " . $teachers['lastname'];
                }
                return $allTeachers;
}



?>