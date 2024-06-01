<?php
include 'connect.php';
include '../functions.php';

if (isset($_POST['submit'])) {
    $studentId = $_POST['student_id']; // Admission number entered in the form
    $getmidtermScoreScoreQuery = "SELECT COALESCE(total_score, 0) AS midterm_score FROM test_government3 WHERE 
  student_id = (SELECT id FROM student_details WHERE admission_no = '$studentId')";
    $midtermScoreScoreResult = mysqli_query($con, $getmidtermScoreScoreQuery);
    $midtermScoreScoreRow = mysqli_fetch_assoc($midtermScoreScoreResult);
    $midtermScore = $midtermScoreScoreRow['midterm_score'];
    
    $examScore = $_POST['exam_score'];


    // Retrieve the first term score from the government1 table
    $getFirstTermScoreQuery = "SELECT COALESCE(terminal_score, 0) AS firstterm_score FROM government1 WHERE
    student_id = (SELECT id FROM student_details WHERE admission_no = '$studentId')";
    $firstTermScoreResult = mysqli_query($con, $getFirstTermScoreQuery);
    $firstTermScoreRow = mysqli_fetch_assoc($firstTermScoreResult);
    $firstterm = $firstTermScoreRow['firstterm_score'];

    // Retrieve the second term score from the government2 table
    $getSecondTermScoreQuery = "SELECT COALESCE(terminal_score, 0) AS secondterm_score FROM government2 WHERE
    student_id = (SELECT id FROM student_details WHERE admission_no = '$studentId')";
    $secondTermScoreResult = mysqli_query($con, $getSecondTermScoreQuery);
    $secondTermScoreRow = mysqli_fetch_assoc($secondTermScoreResult);
    $secondterm = $secondTermScoreRow['secondterm_score'];

    // Calculate the terminal score as the sum of the midterm score and exam score
    $terminalScore = $midtermScore + $examScore;

    $cumulative = 0;
    if ($firstterm == 0) {
        $cumulative = ($terminalScore + $secondterm) / 2;
    } elseif ($secondterm == 0) {
        $cumulative = ($terminalScore + $firstterm) / 2;
    } elseif ($terminalScore == 0) {
        $cumulative = ($firstterm + $secondterm) / 2;
    } else {
        $cumulative = ($terminalScore + $firstterm + $secondterm) / 3;
    }


    // Determine the student grade based on the terminal$terminalScore score
    $studentGrade = calculateStudentGrade($cumulative);
    // Retrieve the student details from the student_details table using the admission number
    $query = "SELECT id, department FROM student_details WHERE admission_no = '$studentId'";
    $result = mysqli_query($con, $query);

    // Execute the query
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $studentDetailsId = $row['id']; // Unique ID from the student_details table
        $department = $row['department'];

        // Update the result in the government table with the associated student ID
        $updateSql = "UPDATE government SET
            midterm_score = '$midtermScore',
            exam_score = '$examScore',
            terminal_score = '$terminalScore',
            firstterm_score = '$firstterm',
            secondterm_score = '$secondterm',
            cumulative_score = '$cumulative',
            student_grade = '$studentGrade'
            WHERE student_id = '$studentDetailsId'";

        // Execute the query
        $updateRes = mysqli_query($con, $updateSql);

        if ($updateRes) {
            // Redirect back to the subjects.php page
            header('Location: ../subjects.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Student details not found";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Update Result</title>
</head>

<body>
    <div class="container my-2">
        <h1>government Result</h1>
        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Admission Number</label>
                        <input type="text" class="form-control" name="student_id" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Exam Score</label>
                        <input type="number" class="form-control" name="exam_score" required min="0" max="70">
                    </div>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rpK2jkw6Y3/dWf9RtE/LZQCeDJXh2UZbpx5mlVL9YrjvJw1IbYAsCzsfChtpejUh" crossorigin="anonymous"></script>
</body>

</html>