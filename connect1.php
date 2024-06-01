<?php

$con = new mysqli('localhost', 'root', '', 'project_login');


// check if it is connected
if(!$con){
    die(mysqli_error($con));
}


?>