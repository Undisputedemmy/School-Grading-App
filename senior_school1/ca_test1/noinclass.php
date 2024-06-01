<?php
include 'connect.php';

// Query to count the number of students in the class
$query = "SELECT COUNT(*) AS totalStudents FROM student_details";
$nresult = mysqli_query($con, $query);

if ($nresult && mysqli_num_rows($nresult) > 0) {
    $row = mysqli_fetch_assoc($nresult);
    $totalStudents = $row['totalStudents'];
} else {
    echo "No students found in the class.";
}
?>
