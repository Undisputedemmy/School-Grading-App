<?php
include 'connect.php';

// Check if the admission_no parameter is present in the URL
if (isset($_GET['admission_no'])) {
    $admission_no = $_GET['admission_no'];

    // Retrieve the student's details from the database
    $query = "SELECT * FROM `student_details` WHERE `admission_no` = '$admission_no'";
    $result = mysqli_query($con, $query);
    $student = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jss 1</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>

<body>
<nav>
    <h1>JSS 1</h1>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="junior1.php">Back</a></li>
    </ul>
    
</nav>

<body>
    <div class="container my-2">
        <?php if (isset($student)) : ?>
            <h1>Student Profile</h1>
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Admission No:</th>
                        <td><?php echo $student['admission_no']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Name:</th>
                        <td><?php echo $student['name']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Class:</th>
                        <td><?php echo $student['class']; ?></td>
                    </tr>
                    <!-- Add more rows for other student information -->
                    
                <?php endif; ?>
                </tbody>
            </table>
            <div>
                <h3>1st Term</h3>
                <button class="btn btn-primary">
                    <a href="displayfirst.php?admission_no=<?php echo $student['admission_no']; ?>
                " class="text-light">Result</a>
                </button>
                <button class="btn btn-primary">
                    <a href="display_test1.php?admission_no=<?php echo $student['admission_no']; ?>
                " class="text-light">Test</a>
                </button>
            </div>



            <div>
                <h3>2nd Term</h3>

                <button class="btn btn-primary">
                    <a href="displaysecond.php?admission_no=<?php echo $student['admission_no']; ?>
                    " class="text-light">Result</a>
                </button>
                <button class="btn btn-primary">
                    <a href="display_test2.php?admission_no=<?php echo $student['admission_no']; ?>
                " class="text-light">Test</a>
                </button>

            </div>
            <div>
                <h3>3rd Term</h3>

                <button class="btn btn-primary">
                    <a href="displaythird.php?admission_no=<?php echo $student['admission_no']; ?>
                    " class="text-light">Result</a>
                </button>
                <button class="btn btn-primary">
                    <a href="display_test3.php?admission_no=<?php echo $student['admission_no']; ?>
                " class="text-light">Test</a>
                </button>


            </div>
    </div>
</body>

</html>