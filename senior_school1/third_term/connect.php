<?php

$con = new mysqli('localhost', 'root', '', 'project_school4');


// check if it is connected
if(!$con){
    die(mysqli_error($con));
}


?>