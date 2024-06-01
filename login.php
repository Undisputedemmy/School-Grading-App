<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styleboot.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav>
        <h1>Cornerstone college</h1>
        <ul>
            <li><a href="register.php">Register</a></li>
        </ul>
    </nav>

    <div class="container my-2">
        <h2>Login</h2>
        <form action="login_process.php" method="post" class="col-md-6" >
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div><br>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and Popper.js -->

</body>

</html>