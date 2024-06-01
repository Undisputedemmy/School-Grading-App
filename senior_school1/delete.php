<?php
include 'connect.php';

if (isset($_GET['delete'])) {
    $studentId = $_GET['delete'];

    // Disable foreign key checks
    mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 0");

    // Array of table names for each term
    // ... (rest of your code) ...

    // Array of table names for each term
    $firstTermTables = ['mathematics1', 'english1', 'physics1', 'chemistry1', 'f_math1', 'biology1', 'agric1',
    'dp1', 'civic1', 'literature1', 'econs1', 'government1', 'crs1', 'history1', 'geographyi1', 'yoruba1',
    'catering1', 'techdraw1', 'artcraft1', 'french1', 'commerce1', 'accounting1', 'others1', 't_comment1'];

    $secondTermTables = ['mathematics2', 'english2', 'physics2', 'chemistry2', 'f_math2', 'biology2', 'agric2',
    'dp2', 'civic2', 'literature2', 'econs2', 'government2', 'crs2', 'history2', 'geographyi2', 'yoruba2',
    'catering2', 'techdraw2', 'artcraft2', 'french2', 'commerce2', 'accounting2', 'others2', 't_comment2'];

    $thirdTermTables = ['mathematics', 'english', 'physics', 'chemistry', 'f_math', 'biology', 'agric',
    'dp', 'civic', 'literature', 'econs', 'government', 'crs', 'history', 'geographyi', 'yoruba',
    'catering', 'techdraw', 'artcraft', 'french', 'commerce', 'accounting', 'others', 't_comment'];

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

    header("Location: senior1.php");
    exit(); // Make sure to exit after redirection
}
?>
