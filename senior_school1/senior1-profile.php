<?php
include 'connect.php';

// Check if the admission_no parameter is present in the URL
if (isset($_GET['admission_no'])) {
    $admission_no = $_GET['admission_no'];

    // Retrieve the student's details from the database
    $query = "SELECT * FROM `student_details` WHERE `admission_no` = '$admission_no'";
    $result = mysqli_query($con, $query);
    $student = mysqli_fetch_assoc($result);

    // Get the department of the student
    $department = $student['department'];
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Student Profile</title>
</head>

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
                        <?php endif; ?>
                </tbody>
            </table>
            <div>
                <h3>1st Term</h3>
                <?php if ($department == 'Science') : ?>
                    <button class="btn btn-primary">
                        <a href="science-display1.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                    </button>
                <?php elseif ($department == 'Commercial') : ?>
                    <button class="btn btn-primary">
                        <a href="commercial-display1.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                    </button>
                <?php elseif ($department == 'Art') : ?>
                    <button class="btn btn-primary">
                        <a href="art-display1.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                    </button>       
                <?php endif; ?>
                <?php if ($department == 'Science') : ?>
                    <button class="btn btn-primary">
                        <a href="test_science-display1.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">Test</a>
                    </button>
                <?php elseif ($department == 'Commercial') : ?>
                    <button class="btn btn-primary">
                        <a href="test_commercial-display1.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">Test</a>
                    </button>
                <?php elseif ($department == 'Art') : ?>
                    <button class="btn btn-primary">
                        <a href="test_art-display1.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">Test</a>
                    </button>       
                <?php endif; ?>
            </div>

        <div>
            <h3>2nd Term</h3>
            <?php if ($department == 'Science') : ?>
                <button class="btn btn-primary">
                    <a href="science-display2.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                </button>
            <?php elseif ($department == 'Commercial') : ?>
                <button class="btn btn-primary">
                    <a href="commercial-display2.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                </button>
            <?php elseif ($department == 'Art') : ?>
                <button class="btn btn-primary">
                    <a href="art-display2.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                </button>
            <?php endif; ?>
            <?php if ($department == 'Science') : ?>
                    <button class="btn btn-primary">
                        <a href="test_science-display2.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">Test</a>
                    </button>
                <?php elseif ($department == 'Commercial') : ?>
                    <button class="btn btn-primary">
                        <a href="test_commercial-display2.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">Test</a>
                    </button>
                <?php elseif ($department == 'Art') : ?>
                    <button class="btn btn-primary">
                        <a href="test_art-display2.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">Test</a>
                    </button>       
                <?php endif; ?>
        </div>
        <div>
            <h3>3rd Term</h3>
            <?php if ($department == 'Science') : ?>
                <button class="btn btn-primary">
                    <a href="science-display.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                </button>
            <?php elseif ($department == 'Commercial') : ?>
                <button class="btn btn-primary">
                    <a href="commercial-display.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                </button>
            <?php elseif ($department == 'Art') : ?>
                <button class="btn btn-primary">
                    <a href="art-display.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                </button>
            <?php endif; ?>
            <?php if ($department == 'Science') : ?>
                    <button class="btn btn-primary">
                        <a href="test_science-display3.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">Test</a>
                    </button>
                <?php elseif ($department == 'Commercial') : ?>
                    <button class="btn btn-primary">
                        <a href="test_commercial-display3.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">Test</a>
                    </button>
                <?php elseif ($department == 'Art') : ?>
                    <button class="btn btn-primary">
                        <a href="test_art-display3.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">Test</a>
                    </button>       
                <?php endif; ?>
        </div>
    </div>
</body>

</html>