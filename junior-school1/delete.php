<?php
include 'connect.php';

if (isset($_GET['delete'])) {
    $studentId = $_GET['delete'];

    // Disable foreign key checks
    mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 0");

    // Array of table names for each term
    // ... (rest of your code) ...

    // Array of table names for each term
    $firstTermTables = ['mathematics1', 'english1', 'bst1', 'pvs1', 'nv1', 'business1', 'cca1',
     'crs1', 'yoruba1', 'history1',
    'artcraft1', 'french1', 'others1', 't_comment1'];

    $secondTermTables = ['mathematics2', 'english2', 'bst2', 'pvs2', 'nv2', 'business2', 'cca2',
     'crs2', 'yoruba2', 'history2',
    'artcraft2', 'french2', 'others2', 't_comment2'];

    $thirdTermTables = ['mathematics', 'english', 'bst', 'pvs', 'nv', 'business', 'cca',
     'crs',  'yoruba', 'history',
    'artcraft', 'french', 'others', 't_comment'];

    // Loop through and delete records from the first term tables
    foreach ($firstTermTables as $table) {
        $deleteQuery = "DELETE FROM $table WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
        if (!mysqli_query($con, $deleteQuery)) {
            die("Error deleting from $table: " . mysqli_error($con));
        }
    }

    // Loop through and delete records from the second term tables
    foreach ($secondTermTables as $table) {
        $deleteQuery = "DELETE FROM $table WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
        if (!mysqli_query($con, $deleteQuery)) {
            die("Error deleting from $table: " . mysqli_error($con));
        }
    }

    // Loop through and delete records from the third term tables
    foreach ($thirdTermTables as $table) {
        $deleteQuery = "DELETE FROM $table WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
        if (!mysqli_query($con, $deleteQuery)) {
            die("Error deleting from $table: " . mysqli_error($con));
        }
    }

   
    // Delete record from the student_details table
    $deleteStudentQuery = "DELETE FROM student_details WHERE admission_no = '$studentId'";
    if (!mysqli_query($con, $deleteStudentQuery)) {
        die("Error deleting from student_details: " . mysqli_error($con));
    }

    // Enable foreign key checks again
    mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 1");

    header("Location: junior1.php");
    exit(); // Make sure to exit after redirection
}
?>
