<?php
include 'connect.php';

if (isset($_GET['delete'])) {
    $studentId = $_GET['delete'];

    // Disable foreign key checks
    mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 0");

    // Array of table names for each term
    // ... (rest of your code) ...

    // Array of table names for each term
    $firstTermTables = ['test_mathematics1', 'test_english1', 'test_physics1', 'test_chemistry1', 'test_f_math1', 
    'test_biology1', 'test_agric1',
    'test_dp1', 'test_civic1', 'test_literature1', 'test_econs1', 'test_government1', 'test_crs1', 
    'test_history1', 'test_geographyi1', 'test_yoruba1',
    'test_catering1', 'test_techdraw1', 'test_artcraft1', 'test_french1', 'test_commerce1', 'test_accounting1'];
    

    $secondTermTables =['test_mathematics2', 'test_english2', 'test_physics2', 'test_chemistry2', 'test_f_math2', 
    'test_biology2', 'test_agric2',
    'test_dp2', 'test_civic2', 'test_literature2', 'test_econs2', 'test_government2', 'test_crs2', 
    'test_history2', 'test_geographyi2', 'test_yoruba2',
    'test_catering2', 'test_techdraw2', 'test_artcraft2', 'test_french2', 'test_commerce2', 'test_accounting2'];

    $thirdTermTables = ['test_mathematics3', 'test_english3', 'test_physics3', 'test_chemistry3', 'test_f_math3', 
    'test_biology3', 'test_agric3',
    'test_dp3', 'test_civic3', 'test_literature3', 'test_econs3', 'test_government3', 'test_crs3', 
    'test_history3', 'test_geographyi3', 'test_yoruba3',
    'test_catering3', 'test_techdraw3', 'test_artcraft3', 'test_french3', 'test_commerce3', 'test_accounting3'];

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

    header("Location: senior1.php");
    exit(); // Make sure to exit after redirection
}
?>
