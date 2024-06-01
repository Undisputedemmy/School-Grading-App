<?php
include 'connect.php';

if (isset($_GET['delete'])) {
    $studentId = $_GET['delete'];

    // Disable foreign key checks
    mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 0");

    // Array of table names for each term
    // ... (rest of your code) ...

    // Array of table names for each term
    $firstTermTables = ['z_mathematics1', 'z_english1', 'z_physics1', 'z_chemistry1', 'z_biology1', 'z_econs1', 'z_catering1',
     'z_crs1', 'z_yoruba1', 'z_techdraw1', 'f_math1', 'history1', 'z_accounting1', 'z_dp1', 'z_agric1', 'z_geographyi1',
    'z_artcraft1', 'z_french1', 'literature1', 'z_commerce1', 'z_civic1', 'z_government1', 'z_others1', 'z_t_comment1'];

    $secondTermTables = ['z_mathematics2', 'z_english2', 'z_physics2', 'z_chemistry2', 'z_biology2', 'z_econs2', 'z_catering2',
    'z_crs2', 'z_yoruba2', 'z_techdraw2', 'f_math2', 'history2', 'z_accounting2', 'z_dp2', 'z_agric2', 'z_geographyi2',
   'z_artcraft2', 'z_french2', 'literature2', 'z_commerce2', 'z_civic2', 'z_government2', 'z_others2', 'z_t_comment2'];

    $thirdTermTables = ['z_mathematics', 'z_english', 'z_physics', 'z_chemistry', 'z_biology', 'z_econs', 'z_catering',
    'z_crs', 'z_yoruba', 'z_techdraw', 'f_math', 'history', 'z_accounting', 'z_dp', 'z_agric', 'z_geographyi',
   'z_artcraft', 'z_french', 'literature', 'z_commerce', 'z_civic', 'z_government', 'z_others', 'z_t_comment'];


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
