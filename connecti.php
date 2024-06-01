<?php
$host_project_school = 'localhost';
$user_project_school = 'root';
$password_project_school = '';
$database_project_school = 'project_school';

// Create connection
$con_project_school = mysqli_connect($host_project_school, $user_project_school, $password_project_school, $database_project_school);

// Check connection
if (!$con_project_school) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
