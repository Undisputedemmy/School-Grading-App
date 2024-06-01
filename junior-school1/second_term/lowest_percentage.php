<?php
include 'connect.php';

// Retrieve the total scores and subject count of all students and rank them
$query = "SELECT sd.admission_no, sd.name, 
    (COALESCE(mr.terminal_score, 0) + COALESCE(er.terminal_score, 0) + COALESCE(ec.terminal_score, 0) + 
    COALESCE(ph.terminal_score, 0) + COALESCE(ch.terminal_score, 0) + COALESCE(cr.terminal_score, 0) +
    COALESCE(co.terminal_score, 0) + COALESCE(yo.terminal_score, 0) + COALESCE(hi.terminal_score, 0) +
    COALESCE(ac.terminal_score, 0) + COALESCE(cc.terminal_score, 0) + COALESCE(fr.terminal_score, 0)) AS overall_score,
    (COALESCE(mr.terminal_score IS NOT NULL, 0) + COALESCE(er.terminal_score IS NOT NULL, 0) +
    COALESCE(ec.terminal_score IS NOT NULL, 0) + 
    COALESCE(ph.terminal_score IS NOT NULL, 0) + COALESCE(ch.terminal_score IS NOT NULL, 0) +
     COALESCE(cr.terminal_score IS NOT NULL, 0) +
    COALESCE(co.terminal_score IS NOT NULL, 0) + COALESCE(yo.terminal_score IS NOT NULL, 0) + 
    COALESCE(hi.terminal_score IS NOT NULL, 0) +
    COALESCE(ac.terminal_score IS NOT NULL, 0) + COALESCE(cc.terminal_score IS NOT NULL, 0) 
    + COALESCE(fr.terminal_score IS NOT NULL, 0)) AS subject_count
    FROM student_details sd
LEFT JOIN mathematics2 mr ON sd.id = mr.student_id
LEFT JOIN english2 er ON sd.id = er.student_id
LEFT JOIN bst2 ec ON sd.id = ec.student_id
LEFT JOIN pvs2 ph ON sd.id = ph.student_id
LEFT JOIN nv2 ch ON sd.id = ch.student_id
LEFT JOIN crs2 cr ON sd.id = cr.student_id
LEFT JOIN business2 co ON sd.id = co.student_id
LEFT JOIN yoruba2 yo ON sd.id = yo.student_id
LEFT JOIN history2 hi ON sd.id = hi.student_id
LEFT JOIN artcraft2 ac ON sd.id = ac.student_id
LEFT JOIN cca2 cc ON sd.id = cc.student_id
LEFT JOIN french2 fr ON sd.id = fr.student_id
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

