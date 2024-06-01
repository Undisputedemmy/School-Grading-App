<?php
include 'connect.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Admin page</title>
</head>

<body>
<?php
    if (isset($_GET['error']) && $_GET['error'] === 'admission_exists') {
        echo '<div class="alert alert-danger" role="alert">
                Admission number already exists.
            </div>';
        header('refresh:1;url=junior1.php');
        exit;
    }
    ?>
    <div class="container my-2">
        <a href="junior1.php" class="btn btn-dark">Back</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Adm No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `student_details`";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $admission_no = $row['admission_no'];
                        $name = $row['name'];
                        $class = $row['class'];
                        
                        echo ' <tr>
                            <th scope="row">' . $admission_no . '</th>
                            <td>' . $name . '</td>
                            <td>' . $class . '</td>
                          
                            <td>
                                <button class="btn btn-danger">
                                    <a href="test_delete.php?delete=' . $admission_no . '" class="text-light" style="text-decoration: none;">Delete</a>
                                </button>
                            </td>
                        </tr>';
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
