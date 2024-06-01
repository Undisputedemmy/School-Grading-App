<?php
$host_project_school3 = 'localhost';
$user_project_school3 = 'root';
$password_project_school3 = '';
$database_project_school3 = 'project_school3';

// Create connection
$con_project_school3 = mysqli_connect($host_project_school3, $user_project_school3, $password_project_school3, $database_project_school3);

// Check connection
if (!$con_project_school3) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
