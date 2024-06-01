<?php
session_start();
include 'connect1.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the hashed password from the database based on the username
    $query = "SELECT * FROM login WHERE username = '$username'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedHashedPassword = $row['password'];

        // Verify the password
        if (password_verify($password, $storedHashedPassword)) {
            // Successful login
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit();
        } else {
            // Invalid password
            echo 'Invalid username or password';
        }
    } else {
        // Invalid username
        echo 'Invalid username or password';
    }
}
?>
