<?php
include 'connect.php';

// Define the number of students to display per page
$studentsPerPage = 25;

// Get the current page number from the query parameter
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;

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
        <li><a href="junior1-add.php">Add Student</a></li>
        <li><a href="#">Exam</a>
        <ul>
        <li><a href="subjects1.php">First term</a></li>
        <li><a href="subjects2.php">Second term</a></li>
        <li><a href="subjects.php">Third term</a></li>
        </ul>
        </li>
        <li><a href="#">CA_Test</a>
        <ul>
        <li><a href="test_subjects1.php">First term</a></li>
        <li><a href="test_subjects2.php">Second term</a></li>
        <li><a href="test_subjects3.php">Third term</a></li>
        </ul>
        </li>
        <li><a href="#">Sheets</a>
        <ul>
        <li><a href="sheets1.php">First term</a></li>
        <li><a href="sheets2.php">Second term</a></li>
        <li><a href="sheets.php">Third term</a></li>
        </ul>
        </li>
        <li><a href="#">Others</a>
        <ul>
        <li><a href="teacher_initial.php">Initials</a></li>
        <li><a href="../promoteview.php">Promote</a></li>
        <li><a href="test_deletedisplay.php">Delete CA</a></li>
        <li><a href="delete_display.php">Delete Result</a></li>
        <li><a href="./first_term/positions2.php">Position</a></li>
        </ul>
        </li>
        
    </ul>
    
    </nav>

    <div class="container my-2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Adm No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Calculate the offset for the SQL query
                $offset = ($page - 1) * $studentsPerPage;

                // Modify the SQL query to limit the number of students based on the page
                $sql = "SELECT * FROM `student_details` ORDER BY `name` ASC LIMIT $studentsPerPage OFFSET $offset";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    $count = $offset + 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $admission_no = $row['admission_no'];
                        $name = $row['name'];
                        $class = $row['class'];
                        echo '<tr>
                            <th scope="row">' . $count . '</th>
                            <td>' . $admission_no . '</td>
                            <td>' . $name . '</td>
                            <td>' . $class . '</td>
                            <td>
                                <button class="btn btn-primary">
                                    <a href="junior1-profile.php?admission_no=' . $admission_no . '" class="text-light" style="text-decoration: none;">View Profile</a>
                                </button>
                            </td>
                        </tr>';
                        $count++;
                    }

                    // Display the "Next Page" button if there are more students
                    $nextPage = $page + 1;
                    $sqlCount = "SELECT COUNT(*) as total FROM `student_details`";
                    $countResult = mysqli_query($con, $sqlCount);
                    $rowCount = mysqli_fetch_assoc($countResult)['total'];
                    if ($rowCount > $offset + $studentsPerPage) {
                        echo '<tr><td colspan="5"><a href="junior1.php?page=' . $nextPage . '">Next Page</a></td></tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No records found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="../js/jquery-3.7.0.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>
