<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the PHP file to establish the database connection
include 'connect.php';

// Get the student ID from the URL parameter
if (isset($_GET['admission_no'])) {
    $studentId = $_GET['admission_no'];

    // Sanitize and validate the admission_no parameter
    $studentId = mysqli_real_escape_string($con, $studentId);

    // Retrieve student details from completed_student table
    $studentQuery = "SELECT admission_no, name, class, A_session FROM completed_student WHERE admission_no = '$studentId'";
    $studentResult = mysqli_query($con, $studentQuery);

    if ($studentResult) {
        // Check if the student is found in the database
        if (mysqli_num_rows($studentResult) > 0) {
            $studentDetails = mysqli_fetch_assoc($studentResult);

            // Retrieve the student_scores from z_mathematics table
    $query = "SELECT * FROM z_mathematics WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $result = mysqli_query($con, $query);
    $fresult = mysqli_fetch_assoc($result);

            // Retrieve the results from the eng table
    $engResultQuery = "SELECT * FROM z_english WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $engResultResult = mysqli_query($con, $engResultQuery);
    $engResult = mysqli_fetch_assoc($engResultResult);

    // Retrieve the results from the phy table
    $phyResultQuery = "SELECT * FROM z_physics WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $phyResultResult = mysqli_query($con, $phyResultQuery);
    $phyResult = mysqli_fetch_assoc($phyResultResult);

    // Retrieve the results from the che table
    $cheResultQuery = "SELECT * FROM z_chemistry WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $cheResultResult = mysqli_query($con, $cheResultQuery);
    $cheResult = mysqli_fetch_assoc($cheResultResult);

    // Retrieve the results from the eco table
    $ecoResultQuery ="SELECT * FROM z_econs WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $ecoResultResult = mysqli_query($con, $ecoResultQuery);
    $ecoResult = mysqli_fetch_assoc($ecoResultResult);

    // Retrieve the results from the bio table
    $bioResultQuery = "SELECT * FROM z_biology WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $bioResultResult = mysqli_query($con, $bioResultQuery);
    $bioResult = mysqli_fetch_assoc($bioResultResult);

    // Retrieve the results from the crs table
    $crsResultQuery = "SELECT * FROM z_crs WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $crsResultResult = mysqli_query($con, $crsResultQuery);
    $crsResult = mysqli_fetch_assoc($crsResultResult);

    // Retrieve the results from the agric table
    $agricResultQuery = "SELECT * FROM z_agric WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $agricResultResult = mysqli_query($con, $agricResultQuery);
    $agricResult = mysqli_fetch_assoc($agricResultResult);

    // Retrieve the results from the dp table
    $dpResultQuery = "SELECT * FROM z_dp WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $dpResultResult = mysqli_query($con, $dpResultQuery);
    $dpResult = mysqli_fetch_assoc($dpResultResult);

    // Retrieve the results from the che table
    $civicResultQuery = "SELECT * FROM z_civic WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $civicResultResult = mysqli_query($con, $civicResultQuery);
    $civicResult = mysqli_fetch_assoc($civicResultResult);

    // Retrieve the results from the che table
    $accResultQuery = "SELECT * FROM z_accounting WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $accResultResult = mysqli_query($con, $accResultQuery);
    $accResult = mysqli_fetch_assoc($accResultResult);

    // Retrieve the results from the che table
    $yorResultQuery = "SELECT * FROM z_yoruba WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $yorResultResult = mysqli_query($con, $yorResultQuery);
    $yorResult = mysqli_fetch_assoc($yorResultResult);


    // Retrieve the basic tech from the che table
    $tecResultQuery = "SELECT * FROM z_techdraw WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $tecResultResult = mysqli_query($con, $tecResultQuery);
    $tecResult = mysqli_fetch_assoc($tecResultResult);

    // Retrieve the basic tech from the che table
    $histResultQuery = "SELECT * FROM z_history WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $histResultResult = mysqli_query($con, $histResultQuery);
    $histResult = mysqli_fetch_assoc($histResultResult);

    // Retrieve the basic tech from the che table
    $comResultQuery = "SELECT * FROM z_commerce WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $comResultResult = mysqli_query($con, $comResultQuery);
    $comResult = mysqli_fetch_assoc($comResultResult);

    // Retrieve the basic tech from the che table
    $artResultQuery = "SELECT * FROM z_artcraft WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $artResultResult = mysqli_query($con, $artResultQuery);
    $artResult = mysqli_fetch_assoc($artResultResult);

    // Retrieve the basic tech from the che table
    $catResultQuery = "SELECT * FROM z_catering WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $catResultResult = mysqli_query($con, $catResultQuery);
    $catResult = mysqli_fetch_assoc($catResultResult);

    // Retrieve the basic tech from the che table
    $f_mathResultQuery = "SELECT * FROM z_f_math WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $f_mathResultResult = mysqli_query($con, $f_mathResultQuery);
    $f_mathResult = mysqli_fetch_assoc($f_mathResultResult);

    // Retrieve the basic tech from the che table
    $frenchResultQuery = "SELECT * FROM z_french WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $frenchResultResult = mysqli_query($con, $frenchResultQuery);
    $frenchResult = mysqli_fetch_assoc($frenchResultResult);

    // Retrieve the basic tech from the che table
    $litResultQuery = "SELECT * FROM z_literature WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $litResultResult = mysqli_query($con, $litResultQuery);
    $litResult = mysqli_fetch_assoc($litResultResult);

    // Retrieve the basic tech from the che table
    $geoResultQuery = "SELECT * FROM z_geographyi WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $geoResultResult = mysqli_query($con, $geoResultQuery);
    $geoResult = mysqli_fetch_assoc($geoResultResult);

   

    // Retrieve the basic tech from the che table
    $othResultQuery = "SELECT * FROM z_others WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";
    $othResultResult = mysqli_query($con, $othResultQuery);
    $othResult = mysqli_fetch_assoc($othResultResult);

    $teaResultQuery = "SELECT * FROM z_t_comment WHERE student_id = (SELECT student_id FROM completed_student WHERE admission_no = '$studentId')";

    $teaResultResult = mysqli_query($con, $teaResultQuery);
    $teaResult = mysqli_fetch_assoc($teaResultResult);

    // Calculate the total score
$totalScore = 0;
$numberOfSubjectsTaken = 0;



if (isset($fresult['terminal_score'])) {
    $totalScore += $fresult['terminal_score'];
    $numberOfSubjectsTaken++;
}

if (isset($engResult['terminal_score'])) {
    $totalScore += $engResult['terminal_score'];
    $numberOfSubjectsTaken++;
}

if (isset($phyResult['terminal_score'])) {
    $totalScore += $phyResult['terminal_score'];
    $numberOfSubjectsTaken++;
}

if (isset($cheResult['terminal_score'])) {
    $totalScore += $cheResult['terminal_score'];
    $numberOfSubjectsTaken++;
}

if (isset($ecoResult['terminal_score'])) {
    $totalScore += $ecoResult['terminal_score'];
    $numberOfSubjectsTaken++;
}

if (isset($bioResult['terminal_score'])) {
    $totalScore += $bioResult['terminal_score'];
    $numberOfSubjectsTaken++;
}
if (isset($crsResult['terminal_score'])) {
    $totalScore += $crsResult['terminal_score'];
    $numberOfSubjectsTaken++;
}
if (isset($agricResult['terminal_score'])) {
    $totalScore += $agricResult['terminal_score'];
    $numberOfSubjectsTaken++;
}
if (isset($dpResult['terminal_score'])) {
    $totalScore += $dpResult['terminal_score'];
    $numberOfSubjectsTaken++;
}
if (isset($civicResult['terminal_score'])) {
    $totalScore += $civicResult['terminal_score'];
    $numberOfSubjectsTaken++;
}
if (isset($accResult['terminal_score'])) {
    $totalScore += $accResult['terminal_score'];
    $numberOfSubjectsTaken++;
}
if (isset($yorResult['terminal_score'])) {
    $totalScore += $yorResult['terminal_score'];
    $numberOfSubjectsTaken++;
}
if (isset($tecResult['terminal_score'])) {
    $totalScore += $tecResult['terminal_score'];
    $numberOfSubjectsTaken++;
}
if (isset($histResult['terminal_score'])) {
    $totalScore += $histResult['terminal_score'];
    $numberOfSubjectsTaken++;
}
if (isset($comResult['terminal_score'])) {
    $totalScore += $comResult['terminal_score'];
    $numberOfSubjectsTaken++;
}
if (isset($artResult['terminal_score'])) {
    $totalScore += $artResult['terminal_score'];
    $numberOfSubjectsTaken++;
}
if (isset($catResult['terminal_score'])) {
    $totalScore += $catResult['terminal_score'];
    $numberOfSubjectsTaken++;
}
if (isset($f_mathResult['terminal_score'])) {
    $totalScore += $f_mathResult['terminal_score'];
    $numberOfSubjectsTaken++;
}
if (isset($frenchResult['terminal_score'])) {
    $totalScore += $frenchResult['terminal_score'];
    $numberOfSubjectsTaken++;
}

$percentage = 0;

    if ($numberOfSubjectsTaken > 0) {
        $percentage = ($totalScore / ($numberOfSubjectsTaken * 100)) * 100;
    }

    // Display the percentage with 1 decimal place
    $formattedPercentage = number_format($percentage, 1);

}
    }
}
