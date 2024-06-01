<?php
$host_project_school5 = 'localhost';
$user_project_school5 = 'root';
$password_project_school5 = '';
$database_project_school5 = 'project_school5';

// Create connection
$con_project_school5 = mysqli_connect($host_project_school5, $user_project_school5, $password_project_school5, $database_project_school5);

// Check connection
if (!$con_project_school5) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
