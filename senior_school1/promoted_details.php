<?php
include 'connect.php';
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
</head>

<body>
<nav>
    <h1>SS 1</h1>
    <ul>
        <li><a href="senior1.php">Home</a></li>
        <li><a href="./completed_student/promote_student.php">Promote</a></li>
        <li><a href="./deletepromotedisplay.php">Delete</a></li>
    </ul>
    
</nav>

<?php
    if (isset($_GET['error']) && $_GET['error'] === 'admission_exists') {
        echo '<div class="alert alert-danger" role="alert">
                Admission number already exists.
            </div>';
        header('refresh:1;url=promoted_details.php');
        exit;
    }
    ?>
 
    <div class="container my-2">
        
        
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Adm No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Session</th>
                    
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `completed_student` ORDER BY `name` ASC";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $admission_no = $row['admission_no'];
                        $name = $row['name'];
                        $class = $row['class'];
                        $session = $row['A_session'];
                        
                        echo ' <tr>
                            <th scope="row">' . $count . '</th>
                            <td>' . $admission_no . '</td>
                            <td>' . $name . '</td>
                            <td>' . $class . '</td>
                            <td>' . $session . '</td>
                            
                            <td>
                                <button class="btn btn-primary">
                                    <a href="./completed_student/promoted_profile.php?admission_no=' . $admission_no . '" class="text-light" style="text-decoration: none;">View Profile</a>
                                </button>
                            </td>
                        </tr>';
                        $count++;
                    }
                } else {
                    echo '<tr><td colspan="14">No records found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
