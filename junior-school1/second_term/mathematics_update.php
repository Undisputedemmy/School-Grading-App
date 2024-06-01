<?php
include 'connect.php';
include '../functions.php';

if (isset($_POST['submit'])) {
    $studentId = $_POST['student_id']; // Admission number entered in the form
    
    $getmidtermScoreScoreQuery = "SELECT COALESCE(total_score, 0) AS midterm_score FROM test_mathematics2 WHERE 
  student_id = (SELECT id FROM student_details WHERE admission_no = '$studentId')";
  $midtermScoreScoreResult = mysqli_query($con, $getmidtermScoreScoreQuery);
  $midtermScoreScoreRow = mysqli_fetch_assoc($midtermScoreScoreResult);
  $midtermScore = $midtermScoreScoreRow['midterm_score'];

    $examScore = !empty($_POST['exam_score']) ? $_POST['exam_score'] : 0;
    
    // Calculate the terminal score as the sum of the midterm score and exam score
    $terminalScore = $midtermScore + $examScore;

    // Determine the student grade based on the termin$terminalScore score
    $studentGrade = calculateStudentGrade($terminalScore);


    // Retrieve the student details from the student_details table using the admission number
    $query = "SELECT id FROM student_details WHERE admission_no = '$studentId'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $studentDetailsId = $row['id']; // Unique ID from the student_details table

        // Update the result in the mathematics table based on the associated student ID
        $sql = "UPDATE mathematics2 SET
                midterm_score = '$midtermScore',
                exam_score = '$examScore',
                terminal_score = '$terminalScore',
                student_grade = '$studentGrade'
                WHERE student_id = '$studentDetailsId'";

        // Execute the query
        $res = mysqli_query($con, $sql);

        if ($res) {
            // Redirect back to the subjects.php page
            header('Location: ../subjects2.php');
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

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
  
    <title>Update</title>
</head>

<body>
    <div class="container my-2">
        <h1>Update mathematics</h1>
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

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rpK2jkw6Y3/dWf9RtE/LZQCeDJXh2UZbpx5mlVL9YrjvJw1IbYAsCzsfChtpejUh" crossorigin="anonymous"></script>
</body>

</html>
