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
    $query = "SELECT mr.*, sd.admission_no, sd.name, sd.class FROM test_mathematics1 mr, student_details sd WHERE sd.id = mr.student_id AND sd.admission_no = '$studentId'";
    $result = mysqli_query($con, $query);
    
    $fresult = mysqli_fetch_assoc($result);

    // Retrieve the results from the eng table
    $engResultQuery = "SELECT er.*, sd.admission_no, sd.name, sd.class FROM test_english1 er, student_details sd WHERE sd.id = er.student_id AND sd.admission_no = '$studentId'";
    $engResultResult = mysqli_query($con, $engResultQuery);
    $engResult = mysqli_fetch_assoc($engResultResult);

    // Retrieve the results from the phy table
    $phyResultQuery = "SELECT ph.*, sd.admission_no, sd.name, sd.class FROM test_physics1 ph, student_details sd WHERE sd.id = ph.student_id AND sd.admission_no = '$studentId'";
    $phyResultResult = mysqli_query($con, $phyResultQuery);
    $phyResult = mysqli_fetch_assoc($phyResultResult);

    // Retrieve the results from the che table
    $cheResultQuery = "SELECT ch.*, sd.admission_no, sd.name, sd.class FROM test_chemistry1 ch, student_details sd WHERE sd.id = ch.student_id AND sd.admission_no = '$studentId'";
    $cheResultResult = mysqli_query($con, $cheResultQuery);
    $cheResult = mysqli_fetch_assoc($cheResultResult);

    // Retrieve the results from the eco table
    $ecoResultQuery = "SELECT ec.*, sd.admission_no, sd.name, sd.class FROM test_econs1 ec, student_details sd WHERE sd.id = ec.student_id AND sd.admission_no = '$studentId'";
    $ecoResultResult = mysqli_query($con, $ecoResultQuery);
    $ecoResult = mysqli_fetch_assoc($ecoResultResult);

    // Retrieve the results from the bio table
    $bioResultQuery = "SELECT bi.*, sd.admission_no, sd.name, sd.class FROM test_biology1 bi, student_details sd WHERE sd.id = bi.student_id AND sd.admission_no = '$studentId'";
    $bioResultResult = mysqli_query($con, $bioResultQuery);
    $bioResult = mysqli_fetch_assoc($bioResultResult);

    // Retrieve the results from the crs table
    $crsResultQuery = "SELECT cr.*, sd.admission_no, sd.name, sd.class FROM test_crs1 cr, student_details sd WHERE sd.id = cr.student_id AND sd.admission_no = '$studentId'";
    $crsResultResult = mysqli_query($con, $crsResultQuery);
    $crsResult = mysqli_fetch_assoc($crsResultResult);

    // Retrieve the results from the agric table
    $agricResultQuery = "SELECT ag.*, sd.admission_no, sd.name, sd.class FROM test_agric1 ag, student_details sd WHERE sd.id = ag.student_id AND sd.admission_no = '$studentId'";
    $agricResultResult = mysqli_query($con, $agricResultQuery);
    $agricResult = mysqli_fetch_assoc($agricResultResult);

    // Retrieve the results from the dp table
    $dpResultQuery = "SELECT co.*, sd.admission_no, sd.name, sd.class FROM test_dp1 co, student_details sd WHERE sd.id = co.student_id AND sd.admission_no = '$studentId'";
    $dpResultResult = mysqli_query($con, $dpResultQuery);
    $dpResult = mysqli_fetch_assoc($dpResultResult);

    // Retrieve the results from the che table
    $civicResultQuery = "SELECT ci.*, sd.admission_no, sd.name, sd.class FROM test_civic1 ci, student_details sd WHERE sd.id = ci.student_id AND sd.admission_no = '$studentId'";
    $civicResultResult = mysqli_query($con, $civicResultQuery);
    $civicResult = mysqli_fetch_assoc($civicResultResult);

    // Retrieve the results from the che table
    $accResultQuery = "SELECT bt.*, sd.admission_no, sd.name, sd.class FROM test_accounting1 bt, student_details sd WHERE sd.id = bt.student_id AND sd.admission_no = '$studentId'";
    $accResultResult = mysqli_query($con, $accResultQuery);
    $accResult = mysqli_fetch_assoc($accResultResult);

    // Retrieve the results from the che table
    $yorResultQuery = "SELECT yo.*, sd.admission_no, sd.name, sd.class FROM test_yoruba1 yo, student_details sd WHERE sd.id = yo.student_id AND sd.admission_no = '$studentId'";
    $yorResultResult = mysqli_query($con, $yorResultQuery);
    $yorResult = mysqli_fetch_assoc($yorResultResult);


    // Retrieve the basic tech from the che table
    $tecResultQuery = "SELECT te.*, sd.admission_no, sd.name, sd.class FROM test_techdraw1 te, student_details sd WHERE sd.id = te.student_id AND sd.admission_no = '$studentId'";
    $tecResultResult = mysqli_query($con, $tecResultQuery);
    $tecResult = mysqli_fetch_assoc($tecResultResult);

    // Retrieve the basic tech from the che table
    $histResultQuery = "SELECT hi.*, sd.admission_no, sd.name, sd.class FROM test_history1 hi, student_details sd WHERE sd.id = hi.student_id AND sd.admission_no = '$studentId'";
    $histResultResult = mysqli_query($con, $histResultQuery);
    $histResult = mysqli_fetch_assoc($histResultResult);

    // Retrieve the basic tech from the che table
    $comResultQuery = "SELECT se.*, sd.admission_no, sd.name, sd.class FROM test_commerce1 se, student_details sd WHERE sd.id = se.student_id AND sd.admission_no = '$studentId'";
    $comResultResult = mysqli_query($con, $comResultQuery);
    $comResult = mysqli_fetch_assoc($comResultResult);

    // Retrieve the basic tech from the che table
    $artResultQuery = "SELECT ac.*, sd.admission_no, sd.name, sd.class FROM test_artcraft1 ac, student_details sd WHERE sd.id = ac.student_id AND sd.admission_no = '$studentId'";
    $artResultResult = mysqli_query($con, $artResultQuery);
    $artResult = mysqli_fetch_assoc($artResultResult);

    // Retrieve the basic tech from the che table
    $catResultQuery = "SELECT cc.*, sd.admission_no, sd.name, sd.class FROM test_catering1 cc, student_details sd WHERE sd.id = cc.student_id AND sd.admission_no = '$studentId'";
    $catResultResult = mysqli_query($con, $catResultQuery);
    $catResult = mysqli_fetch_assoc($catResultResult);

    // Retrieve the basic tech from the che table
    $f_mathResultQuery = "SELECT mu.*, sd.admission_no, sd.name, sd.class FROM test_f_math1 mu, student_details sd WHERE sd.id = mu.student_id AND sd.admission_no = '$studentId'";
    $f_mathResultResult = mysqli_query($con, $f_mathResultQuery);
    $f_mathResult = mysqli_fetch_assoc($f_mathResultResult);

    // Retrieve the basic tech from the che table
    $frenchResultQuery = "SELECT fr.*, sd.admission_no, sd.name, sd.class FROM test_french1 fr, student_details sd WHERE sd.id = fr.student_id AND sd.admission_no = '$studentId'";
    $frenchResultResult = mysqli_query($con, $frenchResultQuery);
    
    $frenchResult = mysqli_fetch_assoc($frenchResultResult);

    // Retrieve the basic tech from the che table
    $litResultQuery = "SELECT li.*, sd.admission_no, sd.name, sd.class FROM test_literature1 li, student_details sd WHERE sd.id = li.student_id AND sd.admission_no = '$studentId'";
    $litResultResult = mysqli_query($con, $litResultQuery);
    $litResult = mysqli_fetch_assoc($litResultResult);

    // Retrieve the basic tech from the che table
    $geoResultQuery = "SELECT gr.*, sd.admission_no, sd.name, sd.class FROM test_geographyi1 gr, student_details sd WHERE sd.id = gr.student_id AND sd.admission_no = '$studentId'";
    $geoResultResult = mysqli_query($con, $geoResultQuery);
    $geoResult = mysqli_fetch_assoc($geoResultResult);

    // Retrieve the basic tech from the che table
    $govResultQuery = "SELECT gv.*, sd.admission_no, sd.name, sd.class FROM test_government1 gv, student_details sd WHERE sd.id = gv.student_id AND sd.admission_no = '$studentId'";
    $govResultResult = mysqli_query($con, $govResultQuery);
    $govResult = mysqli_fetch_assoc($govResultResult);


    // Retrieve the basic tech from the che table
    $othResultQuery = "SELECT er.*, sd.admission_no, sd.name, sd.class FROM test_others1 er, student_details sd WHERE sd.id = er.student_id AND sd.admission_no = '$studentId'";
    $othResultResult = mysqli_query($con, $othResultQuery);
    $othResult = mysqli_fetch_assoc($othResultResult);

    $teaResultQuery = "SELECT er.*, sd.admission_no, sd.name, sd.class FROM test_t_comment1 er, student_details 
    sd WHERE sd.id = er.student_id AND sd.admission_no = '$studentId'";
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
?>
