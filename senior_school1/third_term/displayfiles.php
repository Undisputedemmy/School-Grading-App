<?php
include 'connect.php';

// Get the student ID from the URL parameter
if (isset($_GET['admission_no'])) {
    $studentId = $_GET['admission_no'];

    $studentQuery = "SELECT admission_no, name, class, A_session FROM student_details WHERE admission_no = '$studentId'";
    $studentResult = mysqli_query($con, $studentQuery);

    if ($studentResult && mysqli_num_rows($studentResult) > 0) {
        $studentDetails = mysqli_fetch_assoc($studentResult);
    } else {
        // Student not found, handle the error or redirect to an error page
        echo "Student not found";
        exit;
    }


    // Retrieve the student_details from student_details table
    $query = "SELECT mr.*, sd.admission_no, sd.name, sd.class FROM mathematics mr, student_details sd WHERE sd.id = mr.student_id AND sd.admission_no = '$studentId'";
    $result = mysqli_query($con, $query);
    $fresult = mysqli_fetch_assoc($result);

    // Retrieve the results from the eng table
    $engResultQuery = "SELECT er.*, sd.admission_no, sd.name, sd.class FROM english er, student_details sd WHERE sd.id = er.student_id AND sd.admission_no = '$studentId'";
    $engResultResult = mysqli_query($con, $engResultQuery);
    $engResult = mysqli_fetch_assoc($engResultResult);

    // Retrieve the results from the phy table
    $phyResultQuery = "SELECT ph.*, sd.admission_no, sd.name, sd.class FROM physics ph, student_details sd WHERE sd.id = ph.student_id AND sd.admission_no = '$studentId'";
    $phyResultResult = mysqli_query($con, $phyResultQuery);
    $phyResult = mysqli_fetch_assoc($phyResultResult);

    // Retrieve the results from the che table
    $cheResultQuery = "SELECT ch.*, sd.admission_no, sd.name, sd.class FROM chemistry ch, student_details sd WHERE sd.id = ch.student_id AND sd.admission_no = '$studentId'";
    $cheResultResult = mysqli_query($con, $cheResultQuery);
    $cheResult = mysqli_fetch_assoc($cheResultResult);

    // Retrieve the results from the eco table
    $ecoResultQuery = "SELECT ec.*, sd.admission_no, sd.name, sd.class FROM econs ec, student_details sd WHERE sd.id = ec.student_id AND sd.admission_no = '$studentId'";
    $ecoResultResult = mysqli_query($con, $ecoResultQuery);
    $ecoResult = mysqli_fetch_assoc($ecoResultResult);

    // Retrieve the results from the bio table
    $bioResultQuery = "SELECT bi.*, sd.admission_no, sd.name, sd.class FROM biology bi, student_details sd WHERE sd.id = bi.student_id AND sd.admission_no = '$studentId'";
    $bioResultResult = mysqli_query($con, $bioResultQuery);
    $bioResult = mysqli_fetch_assoc($bioResultResult);

    // Retrieve the results from the crs table
    $crsResultQuery = "SELECT cr.*, sd.admission_no, sd.name, sd.class FROM crs cr, student_details sd WHERE sd.id = cr.student_id AND sd.admission_no = '$studentId'";
    $crsResultResult = mysqli_query($con, $crsResultQuery);
    $crsResult = mysqli_fetch_assoc($crsResultResult);

    // Retrieve the results from the agric table
    $agricResultQuery = "SELECT ag.*, sd.admission_no, sd.name, sd.class FROM agric ag, student_details sd WHERE sd.id = ag.student_id AND sd.admission_no = '$studentId'";
    $agricResultResult = mysqli_query($con, $agricResultQuery);
    $agricResult = mysqli_fetch_assoc($agricResultResult);

    // Retrieve the results from the dp table
    $dpResultQuery = "SELECT co.*, sd.admission_no, sd.name, sd.class FROM dp co, student_details sd WHERE sd.id = co.student_id AND sd.admission_no = '$studentId'";
    $dpResultResult = mysqli_query($con, $dpResultQuery);
    $dpResult = mysqli_fetch_assoc($dpResultResult);

    // Retrieve the results from the che table
    $civicResultQuery = "SELECT ci.*, sd.admission_no, sd.name, sd.class FROM civic ci, student_details sd WHERE sd.id = ci.student_id AND sd.admission_no = '$studentId'";
    $civicResultResult = mysqli_query($con, $civicResultQuery);
    $civicResult = mysqli_fetch_assoc($civicResultResult);

    // Retrieve the results from the che table
    $accResultQuery = "SELECT bt.*, sd.admission_no, sd.name, sd.class FROM accounting bt, student_details sd WHERE sd.id = bt.student_id AND sd.admission_no = '$studentId'";
    $accResultResult = mysqli_query($con, $accResultQuery);
    $accResult = mysqli_fetch_assoc($accResultResult);

    // Retrieve the results from the che table
    $yorResultQuery = "SELECT yo.*, sd.admission_no, sd.name, sd.class FROM yoruba yo, student_details sd WHERE sd.id = yo.student_id AND sd.admission_no = '$studentId'";
    $yorResultResult = mysqli_query($con, $yorResultQuery);
    $yorResult = mysqli_fetch_assoc($yorResultResult);


    // Retrieve the basic tech from the che table
    $tecResultQuery = "SELECT te.*, sd.admission_no, sd.name, sd.class FROM techdraw te, student_details sd WHERE sd.id = te.student_id AND sd.admission_no = '$studentId'";
    $tecResultResult = mysqli_query($con, $tecResultQuery);
    $tecResult = mysqli_fetch_assoc($tecResultResult);

    // Retrieve the basic tech from the che table
    $histResultQuery = "SELECT hi.*, sd.admission_no, sd.name, sd.class FROM history hi, student_details sd WHERE sd.id = hi.student_id AND sd.admission_no = '$studentId'";
    $histResultResult = mysqli_query($con, $histResultQuery);
    $histResult = mysqli_fetch_assoc($histResultResult);

    // Retrieve the basic tech from the che table
    $comResultQuery = "SELECT se.*, sd.admission_no, sd.name, sd.class FROM commerce se, student_details sd WHERE sd.id = se.student_id AND sd.admission_no = '$studentId'";
    $comResultResult = mysqli_query($con, $comResultQuery);
    $comResult = mysqli_fetch_assoc($comResultResult);

    // Retrieve the basic tech from the che table
    $artResultQuery = "SELECT ac.*, sd.admission_no, sd.name, sd.class FROM artcraft ac, student_details sd WHERE sd.id = ac.student_id AND sd.admission_no = '$studentId'";
    $artResultResult = mysqli_query($con, $artResultQuery);
    $artResult = mysqli_fetch_assoc($artResultResult);

    // Retrieve the basic tech from the che table
    $catResultQuery = "SELECT cc.*, sd.admission_no, sd.name, sd.class FROM catering cc, student_details sd WHERE sd.id = cc.student_id AND sd.admission_no = '$studentId'";
    $catResultResult = mysqli_query($con, $catResultQuery);
    $catResult = mysqli_fetch_assoc($catResultResult);

    // Retrieve the basic tech from the che table
    $f_mathResultQuery = "SELECT mu.*, sd.admission_no, sd.name, sd.class FROM f_math mu, student_details sd WHERE sd.id = mu.student_id AND sd.admission_no = '$studentId'";
    $f_mathResultResult = mysqli_query($con, $f_mathResultQuery);
    $f_mathResult = mysqli_fetch_assoc($f_mathResultResult);

    // Retrieve the basic tech from the che table
    $frenchResultQuery = "SELECT fr.*, sd.admission_no, sd.name, sd.class FROM french fr, student_details sd WHERE sd.id = fr.student_id AND sd.admission_no = '$studentId'";
    $frenchResultResult = mysqli_query($con, $frenchResultQuery);
    $frenchResult = mysqli_fetch_assoc($frenchResultResult);

    // Retrieve the basic tech from the che table
    $litResultQuery = "SELECT li.*, sd.admission_no, sd.name, sd.class FROM literature li, student_details sd WHERE sd.id = li.student_id AND sd.admission_no = '$studentId'";
    $litResultResult = mysqli_query($con, $litResultQuery);
    $litResult = mysqli_fetch_assoc($litResultResult);

    // Retrieve the basic tech from the che table
    $geoResultQuery = "SELECT gr.*, sd.admission_no, sd.name, sd.class FROM geographyi gr, student_details sd WHERE sd.id = gr.student_id AND sd.admission_no = '$studentId'";
    $geoResultResult = mysqli_query($con, $geoResultQuery);
    $geoResult = mysqli_fetch_assoc($geoResultResult);

    // Retrieve the basic tech from the che table
    $govResultQuery = "SELECT gv.*, sd.admission_no, sd.name, sd.class FROM government gv, student_details sd WHERE sd.id = gv.student_id AND sd.admission_no = '$studentId'";
    $govResultResult = mysqli_query($con, $govResultQuery);
    $govResult = mysqli_fetch_assoc($govResultResult);


    // Retrieve the basic tech from the che table
    $othResultQuery = "SELECT er.*, sd.admission_no, sd.name, sd.class FROM others er, student_details sd WHERE sd.id = er.student_id AND sd.admission_no = '$studentId'";
    $othResultResult = mysqli_query($con, $othResultQuery);
    $othResult = mysqli_fetch_assoc($othResultResult);

    $teaResultQuery = "SELECT er.*, sd.admission_no, sd.name, sd.class FROM t_comment er, student_details 
    sd WHERE sd.id = er.student_id AND sd.admission_no = '$studentId'";
    $teaResultResult = mysqli_query($con, $teaResultQuery);
    $teaResult = mysqli_fetch_assoc($teaResultResult);


    // Calculate the total score
$totalScore = 0;
$numberOfSubjectsTaken = 0;



if (isset($fresult['cumulative_score'])) {
    $totalScore += $fresult['cumulative_score'];
    $numberOfSubjectsTaken++;
}

if (isset($engResult['cumulative_score'])) {
    $totalScore += $engResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}

if (isset($phyResult['cumulative_score'])) {
    $totalScore += $phyResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}

if (isset($cheResult['cumulative_score'])) {
    $totalScore += $cheResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}

if (isset($ecoResult['cumulative_score'])) {
    $totalScore += $ecoResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}

if (isset($bioResult['cumulative_score'])) {
    $totalScore += $bioResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($crsResult['cumulative_score'])) {
    $totalScore += $crsResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($agricResult['cumulative_score'])) {
    $totalScore += $agricResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($dpResult['cumulative_score'])) {
    $totalScore += $dpResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($civicResult['cumulative_score'])) {
    $totalScore += $civicResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($accResult['cumulative_score'])) {
    $totalScore += $accResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($yorResult['cumulative_score'])) {
    $totalScore += $yorResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($tecResult['cumulative_score'])) {
    $totalScore += $tecResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($histResult['cumulative_score'])) {
    $totalScore += $histResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($comResult['cumulative_score'])) {
    $totalScore += $comResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($artResult['cumulative_score'])) {
    $totalScore += $artResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($catResult['cumulative_score'])) {
    $totalScore += $catResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($f_mathResult['cumulative_score'])) {
    $totalScore += $f_mathResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($frenchResult['cumulative_score'])) {
    $totalScore += $frenchResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}

$percentage = 0;

    if ($numberOfSubjectsTaken > 0) {
        $percentage = ($totalScore / ($numberOfSubjectsTaken * 100)) * 100;
    }

    // Display the percentage with 1 decimal place
    $formattedPercentage = number_format($percentage, 1);

    
}
?>
