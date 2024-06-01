<?php
include 'connect.php';

// Query to dynamically retrieve the academic session for which you want to count students
$sessionQuery = "SELECT DISTINCT A_session FROM completed_student";
$sessionResult = mysqli_query($con, $sessionQuery);

if ($sessionResult && mysqli_num_rows($sessionResult) > 0) {
    // Assuming you want to count students for the latest academic session
    $latestSessionRow = mysqli_fetch_assoc($sessionResult);
    $academicSession = $latestSessionRow['A_session'];

    // Now query to count the number of students with the dynamically retrieved academic session
    $countQuery = "SELECT COUNT(*) AS totalStudents FROM completed_student WHERE A_session = '$academicSession'";
    $countResult = mysqli_query($con, $countQuery);

    if ($countResult && mysqli_num_rows($countResult) > 0) {
        $countRow = mysqli_fetch_assoc($countResult);
        $totalStudents = $countRow['totalStudents'];
    } else {
        echo "No students found in the class for the academic session $academicSession.";
    }
} else {
    echo "No academic sessions found in the database.";
}
?>
