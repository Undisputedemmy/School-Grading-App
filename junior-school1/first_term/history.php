<?php
include 'connect.php';
include '../functions.php';

$message = ''; // Initialize the message variable
$disabled = false; // Initialize the disabled variable

if (isset($_POST['submit'])) {
    $studentId = $_POST['student_id']; // Admission number entered in the form
    
    $getmidtermScoreScoreQuery = "SELECT COALESCE(total_score, 0) AS midterm_score FROM test_history1 WHERE 
  student_id = (SELECT id FROM student_details WHERE admission_no = '$studentId')";
  $midtermScoreScoreResult = mysqli_query($con, $getmidtermScoreScoreQuery);
  $midtermScoreScoreRow = mysqli_fetch_assoc($midtermScoreScoreResult);
  $midtermScore = $midtermScoreScoreRow['midterm_score'];

    $examScore = !empty($_POST['exam_score']) ? $_POST['exam_score'] : 0;


    $terminalScore = $midtermScore + $examScore;

    // Determine the student grade based on the terminal$terminalScore score
    $studentGrade = calculateStudentGrade($terminalScore);

    // Retrieve the student details from the student_details table using the admission number
  $query = "SELECT id FROM student_details WHERE admission_no = '$studentId'";
  $result = mysqli_query($con, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $studentDetailsId = $row['id']; // Unique ID from the student_details table

    // Check if the scores already exist in the history table for the given student
    $checkQuery = "SELECT * FROM history1 WHERE student_id = '$studentDetailsId'";
    $checkResult = mysqli_query($con, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
      // Scores already exist in the database
      $message = "Scores already exist for the given student!";
      $disabled = true; // Disable the form
    } else {
      // Insert the result into the history table with the associated student ID
      $sql = "INSERT INTO history1 (student_id, midterm_score, exam_score, terminal_score, student_grade)
            VALUES ('$studentDetailsId', '$midtermScore', '$examScore', '$terminalScore', '$studentGrade')";

      // Execute the query
      $res = mysqli_query($con, $sql);

      if ($res) {
        // Scores submitted successfully
        $message = "history scores submitted successfully!";
        $disabled = true; // Disable the form after successful submission
        header('Location: ../subjects1.php');
        exit(); // Stop further execution of the script
      } else {
        $message = "Error: " . mysqli_error($con);
      }
    }
  } else {
    $message = "Student details not found";
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
  
  <title>Result</title>
</head>

<body>
  <div class="container my-2">
    <a href="../subjects1.php">Back</a>
    <h1> history Scores</h1>
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
      
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rpK2jkw6Y3/dWf9RtE/LZQCeDJXh2UZbpx5mlVL9YrjvJw1IbYAsCzsfChtpejUh" crossorigin="anonymous"></script>
</body>

</html>