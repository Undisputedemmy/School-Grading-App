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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin page</title>
</head>

<body>
<?php
    if (isset($_GET['error']) && $_GET['error'] === 'admission_exists') {
        echo '<div class="alert alert-danger" role="alert">
                Admission number already exists.
            </div>';
        header('refresh:1;url=senior1.php');
        exit;
    }
    ?>
 
    <div class="container my-2">
        <div><a href="../index.php" class="btn btn-dark my-1">Home</a></div>
        
        
        <div style="float: right">
        <a href="term.php" class="btn btn-success">Enter scores</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Adm No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Dept</th>
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
                        $depatment = $row['department'];
                        echo ' <tr>
                            <th scope="row">' . $count . '</th>
                            <td>' . $admission_no . '</td>
                            <td>' . $name . '</td>
                            <td>' . $class . '</td>
                            <td>' . $depatment . '</td>
                            <td>
                                <button class="btn btn-primary">
                                    <a href="promoted_profile.php?admission_no=' . $admission_no . '" class="text-light" style="text-decoration: none;">View Profile</a>
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
