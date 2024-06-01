<?php
include 'connect.php';

// Retrieve the total scores of all students and rank them
$query = "SELECT sd.admission_no, sd.name, 
    COALESCE(mr.terminal_score, 0) + COALESCE(er.terminal_score, 0) + 
    COALESCE(ec.terminal_score, 0) + 
    COALESCE(ph.terminal_score, 0) + COALESCE(ch.terminal_score, 0) + COALESCE(cr.terminal_score, 0) 
    +
    COALESCE(co.terminal_score, 0) + COALESCE(yo.terminal_score, 0) + COALESCE(hi.terminal_score, 0) 
     + COALESCE(cc.terminal_score, 0) + COALESCE(fr.terminal_score, 0)
     AS total_score
FROM student_details sd
LEFT JOIN mathematics1 mr ON sd.id = mr.student_id
LEFT JOIN english1 er ON sd.id = er.student_id
LEFT JOIN bst1 ec ON sd.id = ec.student_id
LEFT JOIN pvs1 ph ON sd.id = ph.student_id
LEFT JOIN nv1 ch ON sd.id = ch.student_id
LEFT JOIN crs1 cr ON sd.id = cr.student_id
LEFT JOIN business1 co ON sd.id = co.student_id
LEFT JOIN yoruba1 yo ON sd.id = yo.student_id
LEFT JOIN history1 hi ON sd.id = hi.student_id

LEFT JOIN cca1 cc ON sd.id = cc.student_id
LEFT JOIN french1 fr ON sd.id = fr.student_id
-- Add more LEFT JOIN statements for other subjects
ORDER BY total_score DESC";

$presult = mysqli_query($con, $query);

if (!$presult) {
    die('Query Error: ' . mysqli_error($con));
}

$rank = 1;

// Store the positions of each student in an array
$positions = array();

$prevScore = null;
$tiesCount = 0;

// Retrieve the positions and store them in the array
while ($row = mysqli_fetch_assoc($presult)) {
    $admissionNo = $row['admission_no'];
    $score = $row['total_score'];

    if ($prevScore !== null && $score < $prevScore) {
        $rank += $tiesCount;
        $tiesCount = 1;
    } else {
        $tiesCount++;
    }

    $positions[$admissionNo] = $rank;

    $prevScore = $score;
}

mysqli_free_result($presult);
mysqli_close($con);
?>
