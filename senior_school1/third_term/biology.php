<?php
include 'connect.php';
include '../functions.php';

$message = ''; // Initialize the message variable
$disabled = false; // Initialize the disabled variable

if (isset($_POST['submit'])) {
    $studentId = $_POST['student_id']; // Admission number entered in the form
    $getmidtermScoreScoreQuery = "SELECT COALESCE(total_score, 0) AS midterm_score FROM test_biology3 WHERE 
  student_id = (SELECT id FROM student_details WHERE admission_no = '$studentId')";
    $midtermScoreScoreResult = mysqli_query($con, $getmidtermScoreScoreQuery);
    $midtermScoreScoreRow = mysqli_fetch_assoc($midtermScoreScoreResult);
    $midtermScore = $midtermScoreScoreRow['midterm_score'];
    
    $examScore = $_POST['exam_score'];


    // Retrieve the first term score from the biology1 table
    $getFirstTermScoreQuery = "SELECT COALESCE(terminal_score, 0) AS firstterm_score FROM biology1 WHERE 
    student_id = (SELECT id FROM student_details WHERE admission_no = '$studentId')";
    $firstTermScoreResult = mysqli_query($con, $getFirstTermScoreQuery);
    $firstTermScoreRow = mysqli_fetch_assoc($firstTermScoreResult);
    $firstterm = $firstTermScoreRow['firstterm_score'];

    // Retrieve the second term score from the biology2 table
    $getSecondTermScoreQuery = "SELECT COALESCE(terminal_score, 0) AS secondterm_score FROM biology2 WHERE 
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

        // Check if the scores already exist in the biology table for the given student
        $checkQuery = "SELECT * FROM biology WHERE student_id = '$studentDetailsId'";
        $checkResult = mysqli_query($con, $checkQuery);

        if ($checkResult && mysqli_num_rows($checkResult) > 0) {
            // Scores already exist in the database
            $message = "Scores already exist for the given student!";
            $disabled = true; // Disable the form
        } else {
            // Insert the result into the biology table with the associated student ID
            $sql = "INSERT INTO biology (student_id, midterm_score, exam_score, terminal_score, firstterm_score, secondterm_score, cumulative_score, student_grade)
            VALUES ('$studentDetailsId', '$midtermScore', '$examScore', '$terminalScore', '$firstterm', '$secondterm', '$cumulative', '$studentGrade')";

            // Execute the query
            $res = mysqli_query($con, $sql);

            if ($res) {
                // Scores submitted successfully
                $message = "artcraft scores submitted successfully!";
                $disabled = true; // Disable the form after successful submission
                header('Location: ../subjects.php');
                exit(); // Stop further execution of the script
              } else {
                $message = "Error: " . mysqli_error($con);
              }
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
    <title>Make Result</title>
</head>

<body>
    <div class="container my-2">
        <h1>biology Result</h1>
        <?php if (!empty($message)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form method="POST" <?php if ($disabled) echo "disabled"; ?>>
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