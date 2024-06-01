<?php
$host_project_school6 = 'localhost';
$user_project_school6 = 'root';
$password_project_school6 = '';
$database_project_school6 = 'project_school6';

// Create connection
$con_project_school6 = mysqli_connect($host_project_school6, $user_project_school6, $password_project_school6, $database_project_school6);

// Check connection
if (!$con_project_school6) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
