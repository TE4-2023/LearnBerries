<?php
function checkName($nameToCheck)
{
    require 'connect.php';
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
        $query = $pdo->prepare("SELECT ID FROM name WHERE name = :name LIMIT 1");
        $query->bindParam(':name', $nameToCheck, PDO::PARAM_STR);
        $query->execute();
        $nameID = $query->fetch();
        return $nameID['ID'];
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
}
function itemExists($parameterToCheck, $value)
{
    require 'connect.php';
    $query = $pdo->prepare("SELECT * FROM name WHERE :parameter = :value");
    $query->bindParam(':parameter', $parameterToCheck, PDO::PARAM_STR);
    $query->bindParam(':value', $value, PDO::PARAM_STR);
    $query->execute();
    $table = $query->fetchAll();
    return empty($table);
}

?>