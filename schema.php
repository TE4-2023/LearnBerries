<?php

include 'includes/functions.php';
session_start();

$user_id = $_SESSION['userid'];

$sql_courses = "SELECT course_ID FROM course_enrollments WHERE user_id = :user_id";

try {
    $stmt_courses = $pdo->prepare($sql_courses);
    $stmt_courses->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt_courses->execute();

    $results_courses = $stmt_courses->fetchAll(PDO::FETCH_ASSOC);

    $allLessons = array();

    if ($results_courses) {
        foreach ($results_courses as $result_course) {
            $courseID = $result_course['course_ID'];

            $sql_lessons = "SELECT * FROM lesson WHERE courseID = :course_id";

            $stmt_lessons = $pdo->prepare($sql_lessons);
            $stmt_lessons->bindParam(':course_id', $courseID, PDO::PARAM_INT);
            $stmt_lessons->execute();

            $results_lessons = $stmt_lessons->fetchAll(PDO::FETCH_ASSOC);
            if ($results_lessons) {
                foreach ($results_lessons as $lesson) {
                    // Retrieve name_ID from the courses using course_ID
                    $courseNameID = getCourseNameID($courseID);

                    // Retrieve name from the names table using name_ID
                    $name = getNameFromID($courseNameID);

                    // Add name to the lesson array
                    $lesson['name'] = $name;

                    $day = $lesson['day'];

                    if (!isset($allLessons[$day])) {
                        $allLessons[$day] = array();
                    }
                    $allLessons[$day][] = $lesson;
                }
            }
        }
        $lessonsJson = json_encode($allLessons);
        header('Content-Type: application/json');
        echo $lessonsJson;
    } else {
        echo "No courses found for the user.";
    }

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
// Function to get the name_ID for a given course_ID
function getCourseNameID($courseID) {
    // Modify this SQL query based on your database schema
    $sql_course_name = "SELECT name_ID FROM course WHERE course_ID = :course_id";
    global $pdo;

    $stmt_course_name = $pdo->prepare($sql_course_name);
    $stmt_course_name->bindParam(':course_id', $courseID, PDO::PARAM_INT);
    $stmt_course_name->execute();

    $result_course_name = $stmt_course_name->fetch(PDO::FETCH_ASSOC);

    return $result_course_name['name_ID'];
}

// Function to get the name from the names table for a given name_ID
function getNameFromID($nameID) {
    // Modify this SQL query based on your database schema
    $sql_name = "SELECT name FROM name WHERE name_ID = :name_id";
    global $pdo;

    $stmt_name = $pdo->prepare($sql_name);
    $stmt_name->bindParam(':name_id', $nameID, PDO::PARAM_INT);
    $stmt_name->execute();

    $result_name = $stmt_name->fetch(PDO::FETCH_ASSOC);

    return $result_name['name'];
}

?>