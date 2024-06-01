<?php
include 'connect.php';

// Retrieve the total scores and subject count of all students and rank them
$query = "SELECT sd.admission_no, sd.name, 
    (COALESCE(mr.total_score, 0) + COALESCE(er.total_score, 0) + COALESCE(ec.total_score, 0) + 
    COALESCE(ph.total_score, 0) + COALESCE(ch.total_score, 0) + COALESCE(cr.total_score, 0) +
    COALESCE(co.total_score, 0) + COALESCE(yo.total_score, 0) + COALESCE(hi.total_score, 0) +
    COALESCE(ac.total_score, 0) + COALESCE(cc.total_score, 0) + COALESCE(fr.total_score, 0)) AS overall_score,
    (COALESCE(mr.total_score IS NOT NULL, 0) + COALESCE(er.total_score IS NOT NULL, 0) +
    COALESCE(ec.total_score IS NOT NULL, 0) + 
    COALESCE(ph.total_score IS NOT NULL, 0) + COALESCE(ch.total_score IS NOT NULL, 0) +
     COALESCE(cr.total_score IS NOT NULL, 0) +
    COALESCE(co.total_score IS NOT NULL, 0) + COALESCE(yo.total_score IS NOT NULL, 0) + 
    COALESCE(hi.total_score IS NOT NULL, 0) +
    COALESCE(ac.total_score IS NOT NULL, 0) + COALESCE(cc.total_score IS NOT NULL, 0) 
    + COALESCE(fr.total_score IS NOT NULL, 0)) AS subject_count
    FROM student_details sd
LEFT JOIN test_mathematics1 mr ON sd.id = mr.student_id
LEFT JOIN test_english1 er ON sd.id = er.student_id
LEFT JOIN test_bst1 ec ON sd.id = ec.student_id
LEFT JOIN test_pvs1 ph ON sd.id = ph.student_id
LEFT JOIN test_nv1 ch ON sd.id = ch.student_id
LEFT JOIN test_crs1 cr ON sd.id = cr.student_id
LEFT JOIN test_business1 co ON sd.id = co.student_id
LEFT JOIN test_yoruba1 yo ON sd.id = yo.student_id
LEFT JOIN test_history1 hi ON sd.id = hi.student_id
LEFT JOIN test_artcraft1 ac ON sd.id = ac.student_id
LEFT JOIN test_cca1 cc ON sd.id = cc.student_id
LEFT JOIN test_french1 fr ON sd.id = fr.student_id
-- Add more LEFT JOIN statements for other subjects
ORDER BY overall_score ASC
LIMIT 1";

$gresult = mysqli_query($con, $query);

if (!$gresult) {
    die('Query Error: ' . mysqli_error($con));
}

// Retrieve the student with the lowest overall score
$row = mysqli_fetch_assoc($gresult);
$admissionNo = $row['admission_no'];
$studentName = $row['name'];
$overallScore = $row['overall_score'];
$subjectCount = 11;

// Calculate the least overall percentage
$leastOverallPercentage = number_format(($overallScore / ($subjectCount * 100)) * 100, 1);

mysqli_free_result($gresult);
mysqli_close($con);
?>

