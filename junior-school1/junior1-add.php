<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $admission_no = $_POST['admission_no'];
    $class = $_POST['class'];
    $session = $_POST['A_session'];

    // Check if the admission number already exists
    $query = "SELECT * FROM `student_details` WHERE admission_no = '$admission_no'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        header('Location: junior1.php?error=admission_exists');
        exit();
    }

    $sql = "INSERT INTO `student_details` (name, admission_no, A_session, class)
            VALUES ('$name', '$admission_no', '$session', '$class')"; // Include the department value in the SQL query
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:junior1.php');
        exit;
    } else {
        echo mysqli_error($con);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin page</title>
</head>

<body>
    <div class="container my-2">
        <h1>Student Details Form</h1>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Student Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Adm No</label>
                <input type="text" class="form-control" name="admission_no" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Academic Session</label>
                <input type="text" class="form-control" name="A_session" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Class</label>
                <select class="form-control" name="class" required>
                    <option value="JSS 1">JSS 1</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-rpK2jkw6Y3/dWf9RtE/LZQCeDJXh2UZbpx5mlVL9YrjvJw1IbYAsCzsfChtpejUh"
        crossorigin="anonymous"></script>
</body>

</html>
