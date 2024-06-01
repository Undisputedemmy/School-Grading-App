<?php
include 'connect.php';

if (isset($_GET['delete'])) {
    $studentId = $_GET['delete'];
    // Rest of the code


// DELETE query for junior1_math table
$deleteMathQuery = "DELETE FROM mathematics WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteMathQuery);

// DELETE query for junior1_eng table
$deleteEngQuery = "DELETE FROM english WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteEngQuery);

// DELETE query for junior1_bscience table
$deleteBscQuery = "DELETE FROM f_math WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteBscQuery);

// DELETE query for junior1_agric table
$deleteAgrQuery = "DELETE FROM agric WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteAgrQuery);

// DELETE query for junior1_bstudies table
$deleteBusQuery = "DELETE FROM econs WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteBusQuery);

// DELETE query for junior1_cca table
$deleteCcaQuery = "DELETE FROM crs WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteCcaQuery);

// DELETE query for junior1_tech table
$deleteTecQuery = "DELETE FROM biology WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteTecQuery);

// DELETE query for junior1_yoruba table
$deleteYorQuery = "DELETE FROM physics WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteYorQuery);

// DELETE query for junior1_econs table
$deleteEcoQuery = "DELETE FROM chemistry WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteEcoQuery);

// DELETE query for junior1_computer table
$deleteComQuery = "DELETE FROM government WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteComQuery);

// DELETE query for junior1_artcraft table
$deleteArtQuery = "DELETE FROM artcraft WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteArtQuery);

// DELETE query for junior1_history table
$deleteHisQuery = "DELETE FROM history WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteHisQuery);

// DELETE query for junior1_french table
$deleteFreQuery = "DELETE FROM french WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteFreQuery);

// DELETE query for junior1_french table
$deleteFreQuery = "DELETE FROM catering WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteFreQuery);


// DELETE query for junior1_music table
$deleteMusQuery = "DELETE FROM accounting WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteMusQuery);

// DELETE query for junior1_security table
$deleteSecQuery = "DELETE FROM commerce WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteSecQuery);

// DELETE query for junior1_social table
$deleteSocQuery = "DELETE FROM geographyi WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteSocQuery);

// DELETE query for junior1_crs table
$deleteCrsQuery = "DELETE FROM literature WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteCrsQuery);

// DELETE query for junior1_civic table
$deleteCivQuery = "DELETE FROM civic WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteCivQuery);

// DELETE query for junior1_phe table
$deletePheQuery = "DELETE FROM dp WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deletePheQuery);

// DELETE query for junior1_french table
$deleteFreQuery = "DELETE FROM techdraw WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteFreQuery);

// DELETE query for junior1_french table
$deleteFreQuery = "DELETE FROM yoruba WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteFreQuery);

// DELETE query for junior1_others table
$deleteOthQuery = "DELETE FROM others WHERE student_id IN (SELECT id FROM student_details WHERE admission_no = '$studentId')";
mysqli_query($con, $deleteOthQuery);

// DELETE query for student_details table
$deleteStudentQuery = "DELETE FROM student_details WHERE admission_no = '$studentId'";
mysqli_query($con, $deleteStudentQuery);

header("Location: senior2.php");
    exit(); // Make sure to exit after redirection

}

?>