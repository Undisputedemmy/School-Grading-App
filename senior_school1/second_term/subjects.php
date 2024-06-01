<?php
include 'connect.php';

// Check if the admission_no and department parameters are present in the URL
if (isset($_GET['admission_no']) && isset($_GET['department'])) {
    $admission_no = $_GET['admission_no'];
    $department = $_GET['department'];

    // Retrieve the student's details from the database
    $query = "SELECT * FROM `student_details` WHERE `admission_no` = '$admission_no'";
    $result = mysqli_query($con, $query);
    $student = mysqli_fetch_assoc($result);

    // Load the subject form based on the department
    if ($department === 'science') {
        include 'science-subjects.php';
    } elseif ($department === 'commercial') {
        include 'commercial-subjects.php';
    } elseif ($department === 'art') {
        include 'art-subjects.php';
    }
}
?>
