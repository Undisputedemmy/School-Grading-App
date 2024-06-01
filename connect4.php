<?php
$host_project_school4 = 'localhost';
$user_project_school4 = 'root';
$password_project_school4 = '';
$database_project_school4 = 'project_school4';

// Create connection
$con_project_school4 = mysqli_connect($host_project_school4, $user_project_school4, $password_project_school4, $database_project_school4);

// Check connection
if (!$con_project_school4) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
