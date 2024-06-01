<?php
include 'connect.php';

if (isset($_GET['delete'])) {
    $studentId = $_GET['delete'];

    // Disable foreign key checks
    mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 0");

    // Array of table names for each term
    // ... (rest of your code) ...

    // Array of table names for each term
    $firstTermTables = ['z_mathematics1', 'z_english1', 'z_bst1', 'z_pvs1', 'z_nv1', 'z_business1', 'z_cca1',
     'z_crs1', 'z_yoruba1',
    'z_artcraft1', 'z_french1', 'z_others1', 'z_t_comment1'];

    $secondTermTables = ['z_mathematics2', 'z_english2', 'z_bst2', 'z_pvs2', 'z_nv2', 'z_business2', 'z_cca2',
     'z_crs2', 'z_yoruba2',
    'z_artcraft2', 'z_french2', 'z_others2', 'z_t_comment2'];

    $thirdTermTables = ['z_mathematics', 'z_english', 'z_bst', 'z_pvs', 'z_nv', 'z_business', 'z_cca',
     'z_crs',  'z_yoruba',
    'z_artcraft', 'z_french', 'z_others', 'z_t_comment'];

    // Loop through and delete records from the first term tables
    foreach ($firstTermTables as $table) {
        $deleteQuery = "DELETE FROM $table WHERE student_id IN (SELECT id FROM completed_student WHERE admission_no = '$studentId')";
        if (!mysqli_query($con, $deleteQuery)) {
            die("Error deleting from $table: " . mysqli_error($con));
        }
    }

    // Loop through and delete records from the second term tables
    foreach ($secondTermTables as $table) {
        $deleteQuery = "DELETE FROM $table WHERE student_id IN (SELECT id FROM completed_student WHERE admission_no = '$studentId')";
        if (!mysqli_query($con, $deleteQuery)) {
            die("Error deleting from $table: " . mysqli_error($con));
        }
    }

    // Loop through and delete records from the third term tables
    foreach ($thirdTermTables as $table) {
        $deleteQuery = "DELETE FROM $table WHERE student_id IN (SELECT id FROM completed_student WHERE admission_no = '$studentId')";
        if (!mysqli_query($con, $deleteQuery)) {
            die("Error deleting from $table: " . mysqli_error($con));
        }
    }

   
    // Delete record from the completed_student table
    $deleteStudentQuery = "DELETE FROM completed_student WHERE admission_no = '$studentId'";
    if (!mysqli_query($con, $deleteStudentQuery)) {
        die("Error deleting from completed_student: " . mysqli_error($con));
    }

    // Enable foreign key checks again
    mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 1");

    header("Location: promoted_details.php");
    exit(); // Make sure to exit after redirection
}
?>
