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

    // Retrieve the results from the pvs table
    $pvsResultQuery = "SELECT ph.*, sd.admission_no, sd.name, sd.class FROM pvs ph, student_details sd WHERE sd.id = ph.student_id AND sd.admission_no = '$studentId'";
    $pvsResultResult = mysqli_query($con, $pvsResultQuery);
    $pvsResult = mysqli_fetch_assoc($pvsResultResult);

    // Retrieve the results from the nv table
    $nvResultQuery = "SELECT ch.*, sd.admission_no, sd.name, sd.class FROM nv ch, student_details sd WHERE sd.id = ch.student_id AND sd.admission_no = '$studentId'";
    $nvResultResult = mysqli_query($con, $nvResultQuery);
    $nvResult = mysqli_fetch_assoc($nvResultResult);

    // Retrieve the results from the bst table
    $bstResultQuery = "SELECT ec.*, sd.admission_no, sd.name, sd.class FROM bst ec, student_details sd WHERE sd.id = ec.student_id AND sd.admission_no = '$studentId'";
    $bstResultResult = mysqli_query($con, $bstResultQuery);
    $bstResult = mysqli_fetch_assoc($bstResultResult);

    // Retrieve the results from the crs table
    $crsResultQuery = "SELECT cr.*, sd.admission_no, sd.name, sd.class FROM crs cr, student_details sd WHERE sd.id = cr.student_id AND sd.admission_no = '$studentId'";
    $crsResultResult = mysqli_query($con, $crsResultQuery);
    $crsResult = mysqli_fetch_assoc($crsResultResult);

    // Retrieve the results from the bus table
    $busResultQuery = "SELECT co.*, sd.admission_no, sd.name, sd.class FROM business co, student_details sd WHERE sd.id = co.student_id AND sd.admission_no = '$studentId'";
    $busResultResult = mysqli_query($con, $busResultQuery);
    $busResult = mysqli_fetch_assoc($busResultResult);

    
    
    // Retrieve the results from the nv table
    $yorResultQuery = "SELECT yo.*, sd.admission_no, sd.name, sd.class FROM yoruba yo, student_details sd WHERE sd.id = yo.student_id AND sd.admission_no = '$studentId'";
    $yorResultResult = mysqli_query($con, $yorResultQuery);
    $yorResult = mysqli_fetch_assoc($yorResultResult);


    // Retrieve the basic tech from the nv table
    $histResultQuery = "SELECT hi.*, sd.admission_no, sd.name, sd.class FROM history hi, student_details sd WHERE sd.id = hi.student_id AND sd.admission_no = '$studentId'";
    $histResultResult = mysqli_query($con, $histResultQuery);
    $histResult = mysqli_fetch_assoc($histResultResult);

    // Retrieve the basic tech from the nv table
    $artResultQuery = "SELECT ac.*, sd.admission_no, sd.name, sd.class FROM artcraft ac, student_details sd WHERE sd.id = ac.student_id AND sd.admission_no = '$studentId'";
    $artResultResult = mysqli_query($con, $artResultQuery);
    $artResult = mysqli_fetch_assoc($artResultResult);

    // Retrieve the basic tech from the nv table
    $ccaResultQuery = "SELECT cc.*, sd.admission_no, sd.name, sd.class FROM cca cc, student_details sd WHERE sd.id = cc.student_id AND sd.admission_no = '$studentId'";
    $ccaResultResult = mysqli_query($con, $ccaResultQuery);
    $ccaResult = mysqli_fetch_assoc($ccaResultResult);

    
    // Retrieve the basic tech from the nv table
    $frenchResultQuery = "SELECT fr.*, sd.admission_no, sd.name, sd.class FROM french fr, student_details sd WHERE sd.id = fr.student_id AND sd.admission_no = '$studentId'";
    $frenchResultResult = mysqli_query($con, $frenchResultQuery);
    $frenchResult = mysqli_fetch_assoc($frenchResultResult);

    // Retrieve the basic tech from the nv table
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

if (isset($pvsResult['cumulative_score'])) {
    $totalScore += $pvsResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}

if (isset($nvResult['cumulative_score'])) {
    $totalScore += $nvResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}

if (isset($bstResult['cumulative_score'])) {
    $totalScore += $bstResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}

if (isset($crsResult['cumulative_score'])) {
    $totalScore += $crsResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($busResult['cumulative_score'])) {
    $totalScore += $busResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($yorResult['cumulative_score'])) {
    $totalScore += $yorResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($histResult['cumulative_score'])) {
    $totalScore += $histResult['cumulative_score'];
    $numberOfSubjectsTaken++;
}
if (isset($ccaResult['cumulative_score'])) {
    $totalScore += $ccaResult['cumulative_score'];
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
