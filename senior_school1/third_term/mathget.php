<?php
include 'connect.php';

$studentId = $_GET['student_id'];

// Retrieve the terminal score from the mathematics1 table
$getTerminalScoreQuery1 = "SELECT terminal_score FROM mathematics1 WHERE student_id = '$studentId'";
$terminalScoreResult1 = mysqli_query($con, $getTerminalScoreQuery1);

// Retrieve the terminal score from the mathematics2 table
$getTerminalScoreQuery2 = "SELECT terminal_score FROM mathematics2 WHERE student_id = '$studentId'";
$terminalScoreResult2 = mysqli_query($con, $getTerminalScoreQuery2);

$terminalScore1 = null;
$terminalScore2 = null;

// Check if terminal score was found in mathematics1 table
if ($terminalScoreResult1 && mysqli_num_rows($terminalScoreResult1) > 0) {
    $terminalScoreRow1 = mysqli_fetch_assoc($terminalScoreResult1);
    $terminalScore1 = $terminalScoreRow1['terminal_score'];
}

// Check if terminal score was found in mathematics2 table
if ($terminalScoreResult2 && mysqli_num_rows($terminalScoreResult2) > 0) {
    $terminalScoreRow2 = mysqli_fetch_assoc($terminalScoreResult2);
    $terminalScore2 = $terminalScoreRow2['terminal_score'];
}

mysqli_close($con);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Mathematics Terminal Score</title>
</head>

<body>
    <div class="container my-2">
        <h1>Mathematics Terminal Score</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Admission Number: <?php echo $studentId; ?></label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Terminal Score (Mathematics 1): <?php echo $terminalScore1; ?></label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Terminal Score (Mathematics 2): <?php echo $terminalScore2; ?></label>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rpK2jkw6Y3/dWf9RtE/LZQCeDJXh2UZbpx5mlVL9YrjvJw1IbYAsCzsfChtpejUh" crossorigin="anonymous"></script>
</body>

</html>
