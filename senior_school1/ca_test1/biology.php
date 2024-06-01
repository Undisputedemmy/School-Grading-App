<?php
include 'connect.php';
include '../functions_test.php';

$message = ''; // Initialize the message variable
$disabled = false; // Initialize the disabled variable

if (isset($_POST['submit'])) {
    $studentId = $_POST['student_id']; // Admission number entered in the form
    $classScore = !empty($_POST['class_exercise']) ? $_POST['class_exercise'] : 0;
    $assignmentScore = !empty($_POST['assignment']) ? $_POST['assignment'] : 0;
    $testScore = !empty($_POST['test']) ? $_POST['test'] : 0;


    $totalScore = $classScore + $assignmentScore + $testScore;

    // Determine the student grade based on the total$totalScore score
    $studentGrade = calculateStudentGrade($totalScore);

    // Retrieve the student details from the student_details table using the admission number
  $query = "SELECT id FROM student_details WHERE admission_no = '$studentId'";
  $result = mysqli_query($con, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $studentDetailsId = $row['id']; // Unique ID from the student_details table

    // Check if the scores already exist in the test_biology table for the given student
    $checkQuery = "SELECT * FROM test_biology1 WHERE student_id = '$studentDetailsId'";
    $checkResult = mysqli_query($con, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
      // Scores already exist in the database
      $message = "Scores already exist for the given student!";
      $disabled = true; // Disable the form
    } else {
      // Insert the result into the test_biology table with the associated student ID
      $sql = "INSERT INTO test_biology1 (student_id, class_exercise, assignment, total_score, test, student_grade)
            VALUES ('$studentDetailsId', '$classScore', '$assignmentScore', '$totalScore', '$testScore', '$studentGrade')";

      // Execute the query
      $res = mysqli_query($con, $sql);

      if ($res) {
        // Scores submitted successfully
        $message = "test_biology scores submitted successfully!";
        $disabled = true; // Disable the form after successful submission
        header('Location: ../test_subjects1.php');
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
  <title>CA Test</title>
</head>

<body>
  <div class="container my-2">
    <h1> test_biology Scores</h1>
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
            <label class="form-label">Class Exercise </label>
            <input type="number" class="form-control" name="class_exercise" required min="0" max="5">
          </div>
          <div class="mb-3">
            <label class="form-label">Assignment Score</label>
            <input type="number" class="form-control" name="assignment" required min="0" max="5">
          </div>
          <div class="mb-3">
            <label class="form-label">Test Score</label>
            <input type="number" class="form-control" name="test" required min="0" max="20">
          </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rpK2jkw6Y3/dWf9RtE/LZQCeDJXh2UZbpx5mlVL9YrjvJw1IbYAsCzsfChtpejUh" crossorigin="anonymous"></script>
</body>

</html>