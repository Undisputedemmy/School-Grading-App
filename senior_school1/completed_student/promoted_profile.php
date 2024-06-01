<?php
include 'connect.php';

// Check if the admission_no parameter is present in the URL
if (isset($_GET['admission_no'])) {
    $admission_no = $_GET['admission_no'];

    // Retrieve the student's details from the database
    $query = "SELECT * FROM `completed_student` WHERE `admission_no` = '$admission_no'";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
                    <!-- Add more rows for other student information -->

                </tbody>
            </table>
            <div>
                <h3>1st Term</h3>
                <?php if ($department == 'Science') : ?>
                    <button class="btn btn-primary">
                        <a href="display_science1.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                    </button>
                <?php elseif ($department == 'Commercial') : ?>
                    <button class="btn btn-primary">
                        <a href="display_commercial1.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                    </button>
                <?php elseif ($department == 'Art') : ?>
                    <button class="btn btn-primary">
                        <a href="display_art1.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                    </button>
                <?php endif; ?>
            </div>
        <?php endif; ?>


        <div>
            <h3>2nd Term</h3>
            <?php if ($department == 'Science') : ?>
                <button class="btn btn-primary">
                    <a href="display_science2.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                </button>
            <?php elseif ($department == 'Commercial') : ?>
                <button class="btn btn-primary">
                    <a href="display_commercial2.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                </button>
            <?php elseif ($department == 'Art') : ?>
                <button class="btn btn-primary">
                    <a href="display_art2.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                </button>
            <?php endif; ?>
        </div>
        <div>
            <h3>3rd Term</h3>
            <?php if ($department == 'Science') : ?>
                <button class="btn btn-primary">
                    <a href="display_science3.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                </button>
            <?php elseif ($department == 'Commercial') : ?>
                <button class="btn btn-primary">
                    <a href="display_commercial3.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                </button>
            <?php elseif ($department == 'Art') : ?>
                <button class="btn btn-primary">
                    <a href="display_art3.php?admission_no=<?php echo $student['admission_no']; ?>" class="text-light">View Result</a>
                </button>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>