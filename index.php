<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

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
        <li><a href="http://localhost/phpmyadmin/index.php">Database</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    
</nav>


</head>

<body>
  <div class="container my-2">
    <h2>Student Result Portal</h2>
    <div class="container">
      <h1>Classes</h1>
      <div>
      <a href="./junior-school1/junior1.php" class="btn btn-primary">JSS 1</a>
      <a href="./junior-school2/junior1.php" class="btn btn-primary">JSS 2</a>
      <a href="./junior-school3/junior1.php" class="btn btn-primary">JSS 3</a>
      </div><br>
      <div class="div">
      <a href="./senior_school1/senior1.php" class="btn btn-primary">SSS 1</a>
      <a href="./senior_school2/senior1.php" class="btn btn-primary">SSS 2</a>
      <a href="./senior_school3/senior1.php" class="btn btn-primary">SSS 3</a>
      </div>
      
      <!--<a href="class2.php" class="btn btn-danger">SSS 2</a>
        <a href="class3.php" class="btn btn-primary">SSS 3</a> -->
    </div>
    

  </div>

  </div>

  </div>

</body>

</html>