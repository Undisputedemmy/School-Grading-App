<?php
include 'connect.php';

if (isset($_GET['delete'])) {
    $studentId = $_GET['delete'];

    // Disable foreign key checks
    mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 0");

    // Array of table names for each term
    // ... (rest of your code) ...

    // Array of table names for each term
    $firstTermTables = ['test_mathematics1', 'test_english1', 'test_bst1', 'test_pvs1', 'test_nv1', 'test_business1', 'test_cca1',
     'test_crs1', 'test_yoruba1', 'test_history1',
    'test_artcraft1', 'test_french1', 'test_others1', 'test_t_comment1'];

    $secondTermTables = ['test_mathematics2', 'test_english2', 'test_bst2', 'test_pvs2', 'test_nv2', 'test_business2', 'test_cca2',
     'test_crs2', 'test_yoruba2', 'test_history2',
    'artcraft2', 'test_french2', 'test_others2', 'test_t_comment2'];

    $thirdTermTables = ['test_mathematics3', 'test_english3', 'test_bst3', 'test_pvs3', 'test_nv3', 'test_business3', 'test_cca3',
     'test_crs3',  'test_yoruba3', 'test_history3',
    'test_artcraft3', 'test_french3', 'test_others3', 'test_t_comment3'];

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

   
    // Enable foreign key checks again
    mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 1");

    header("Location: junior1.php");
    exit(); // Make sure to exit after redirection
}
?>
