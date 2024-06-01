<?php
$host_project_school2 = 'localhost';
$user_project_school2 = 'root';
$password_project_school2 = '';
$database_project_school2 = 'project_school2';

// Create connection
$con_project_school2 = mysqli_connect($host_project_school2, $user_project_school2, $password_project_school2, $database_project_school2);

// Check connection
if (!$con_project_school2) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
