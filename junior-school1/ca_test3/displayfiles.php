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
    $query = "SELECT mr.*, sd.admission_no, sd.name, sd.class FROM test_mathematics3 mr, student_details sd WHERE sd.id = mr.student_id AND sd.admission_no = '$studentId'";
    $result = mysqli_query($con, $query);
    
    $fresult = mysqli_fetch_assoc($result);

    // Retrieve the results from the eng table
    $engResultQuery = "SELECT er.*, sd.admission_no, sd.name, sd.class FROM test_english3 er, student_details sd WHERE sd.id = er.student_id AND sd.admission_no = '$studentId'";
    $engResultResult = mysqli_query($con, $engResultQuery);
    $engResult = mysqli_fetch_assoc($engResultResult);

    // Retrieve the results from the pvs table
    $pvsResultQuery = "SELECT ph.*, sd.admission_no, sd.name, sd.class FROM test_pvs3 ph, student_details sd WHERE sd.id = ph.student_id AND sd.admission_no = '$studentId'";
    $pvsResultResult = mysqli_query($con, $pvsResultQuery);
    $pvsResult = mysqli_fetch_assoc($pvsResultResult);

    // Retrieve the results from the nv table
    $nvResultQuery = "SELECT ch.*, sd.admission_no, sd.name, sd.class FROM test_nv3 ch, student_details sd WHERE sd.id = ch.student_id AND sd.admission_no = '$studentId'";
    $nvResultResult = mysqli_query($con, $nvResultQuery);
    $nvResult = mysqli_fetch_assoc($nvResultResult);

    // Retrieve the results from the bst table
    $bstResultQuery = "SELECT ec.*, sd.admission_no, sd.name, sd.class FROM test_bst3 ec, student_details sd WHERE sd.id = ec.student_id AND sd.admission_no = '$studentId'";
    $bstResultResult = mysqli_query($con, $bstResultQuery);
    $bstResult = mysqli_fetch_assoc($bstResultResult);

    // Retrieve the results from the crs table
    $crsResultQuery = "SELECT cr.*, sd.admission_no, sd.name, sd.class FROM test_crs3 cr, student_details sd WHERE sd.id = cr.student_id AND sd.admission_no = '$studentId'";
    $crsResultResult = mysqli_query($con, $crsResultQuery);
    $crsResult = mysqli_fetch_assoc($crsResultResult);

    // Retrieve the results from the bus table
    $busResultQuery = "SELECT co.*, sd.admission_no, sd.name, sd.class FROM test_business3 co, student_details sd WHERE sd.id = co.student_id AND sd.admission_no = '$studentId'";
    $busResultResult = mysqli_query($con, $busResultQuery);
    $busResult = mysqli_fetch_assoc($busResultResult);

    
    
    // Retrieve the results from the nv table
    $yorResultQuery = "SELECT yo.*, sd.admission_no, sd.name, sd.class FROM test_yoruba3 yo, student_details sd WHERE sd.id = yo.student_id AND sd.admission_no = '$studentId'";
    $yorResultResult = mysqli_query($con, $yorResultQuery);
    $yorResult = mysqli_fetch_assoc($yorResultResult);


    // Retrieve the basic tech from the nv table
    $histResultQuery = "SELECT hi.*, sd.admission_no, sd.name, sd.class FROM test_history3 hi, student_details sd WHERE sd.id = hi.student_id AND sd.admission_no = '$studentId'";
    $histResultResult = mysqli_query($con, $histResultQuery);
    $histResult = mysqli_fetch_assoc($histResultResult);

    // Retrieve the basic tech from the nv table
    $artResultQuery = "SELECT ac.*, sd.admission_no, sd.name, sd.class FROM test_artcraft3 ac, student_details sd WHERE sd.id = ac.student_id AND sd.admission_no = '$studentId'";
    $artResultResult = mysqli_query($con, $artResultQuery);
    $artResult = mysqli_fetch_assoc($artResultResult);

    // Retrieve the basic tech from the nv table
    $ccaResultQuery = "SELECT cc.*, sd.admission_no, sd.name, sd.class FROM test_cca3 cc, student_details sd WHERE sd.id = cc.student_id AND sd.admission_no = '$studentId'";
    $ccaResultResult = mysqli_query($con, $ccaResultQuery);
    $ccaResult = mysqli_fetch_assoc($ccaResultResult);

    
    // Retrieve the basic tech from the nv table
    $frenchResultQuery = "SELECT fr.*, sd.admission_no, sd.name, sd.class FROM test_french3 fr, student_details sd WHERE sd.id = fr.student_id AND sd.admission_no = '$studentId'";
    $frenchResultResult = mysqli_query($con, $frenchResultQuery);
    $frenchResult = mysqli_fetch_assoc($frenchResultResult);

    // Retrieve the basic tech from the nv table
    $othResultQuery = "SELECT er.*, sd.admission_no, sd.name, sd.class FROM test_others3 er, student_details sd WHERE sd.id = er.student_id AND sd.admission_no = '$studentId'";
    $othResultResult = mysqli_query($con, $othResultQuery);
    $othResult = mysqli_fetch_assoc($othResultResult);

    $teaResultQuery = "SELECT er.*, sd.admission_no, sd.name, sd.class FROM test_t_comment3 er, student_details 
    sd WHERE sd.id = er.student_id AND sd.admission_no = '$studentId'";
    $teaResultResult = mysqli_query($con, $teaResultQuery);
    $teaResult = mysqli_fetch_assoc($teaResultResult);

    // Calculate the total score
$totalScore = 0;
$numberOfSubjectsTaken = 0;



if (isset($fresult['total_score'])) {
    $totalScore += $fresult['total_score'];
    $numberOfSubjectsTaken++;
}

if (isset($engResult['total_score'])) {
    $totalScore += $engResult['total_score'];
    $numberOfSubjectsTaken++;
}

if (isset($pvsResult['total_score'])) {
    $totalScore += $pvsResult['total_score'];
    $numberOfSubjectsTaken++;
}

if (isset($nvResult['total_score'])) {
    $totalScore += $nvResult['total_score'];
    $numberOfSubjectsTaken++;
}

if (isset($bstResult['total_score'])) {
    $totalScore += $bstResult['total_score'];
    $numberOfSubjectsTaken++;
}

if (isset($crsResult['total_score'])) {
    $totalScore += $crsResult['total_score'];
    $numberOfSubjectsTaken++;
}
if (isset($busResult['total_score'])) {
    $totalScore += $busResult['total_score'];
    $numberOfSubjectsTaken++;
}
if (isset($yorResult['total_score'])) {
    $totalScore += $yorResult['total_score'];
    $numberOfSubjectsTaken++;
}
if (isset($histResult['total_score'])) {
    $totalScore += $histResult['total_score'];
    $numberOfSubjectsTaken++;
}
if (isset($ccaResult['total_score'])) {
    $totalScore += $ccaResult['total_score'];
    $numberOfSubjectsTaken++;
}
if (isset($frenchResult['total_score'])) {
    $totalScore += $frenchResult['total_score'];
    $numberOfSubjectsTaken++;
}

$percentage = 0;

    if ($numberOfSubjectsTaken > 0) {
        $percentage = ($totalScore / ($numberOfSubjectsTaken * 100)) * 100;
    }

    // Display the percentage with 3 decimal place
    $formattedPercentage = number_format($percentage, 1);

}
?>
