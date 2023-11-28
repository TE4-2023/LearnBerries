<?php

/*

    This script can be called to greatly reduce statements.
    Functions use underscores to increase readability. There
    is a difference between authn and auth.

*/

// Connection variables
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);


// CONSTRUCT
// - Reusable functions
//   ex. Creates an string for an sql command

// Constructs a string to be used in an sql statement in one table only.
// Pass these params:
// $tableName, $columnName, $cellValue, //$tCellValue
// Any less will cause the function to stop.
function single_table_sql_statement() {
    $arg_list = func_get_args();
    $arg_list_len = func_num_args();
    
    $statement = "SELECT * FROM `webschool`.";

    if ($arg_list_len < 4 || ($arg_list_len - 4) % 2 != 0) {
        echo "single_table_statement() error at line 32 -"
        ." insufficient parameters.";
    }
    ////foreach ($arg_list as $argument) {}
}



// AUTHENTICATION
// - Confirms you are who you say you are.
//   ex. Logging in to your account or checking session validity

// Verifies login as well as logging in if able to
function authn_login() {

}


// AUTHORIZATION
// - Confirms wether you access a resource or not.
//   ex. Changing the course color (must be a teacher)

// Checks if the user can access a feature
/*function auth_can_access($tableName) {
    // Fetches top level variable in script
    $conn = $GLOBALS['conn'];

    $command = "SELECT * FROM `webschool`.`". $table ."` WHERE `". $keyword ."`=?;"; // still ? to prevent sql attacks

    $stmt = $conn->prepare($command); // course_ID = ? for example
    $stmt->bind_param($type, $value);

    $stmt->execute();
    
    $value = $stmt->get_result();
    $stmt = null;

    return $value;
}*/