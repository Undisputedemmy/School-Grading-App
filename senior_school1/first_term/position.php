<?php
include 'connect.php';

// Retrieve the total scores of all students and rank them
$query = "SELECT sd.admission_no, sd.name, 
    COALESCE(mr.cummulative_score, 0) + COALESCE(er.cummulative_score, 0) + COALESCE(sc.cummulative_score, 0) + 
    COALESCE(so.cummulative_score, 0) + COALESCE(ec.cummulative_score, 0) + COALESCE(ph.cummulative_score, 0) +
    COALESCE(cr.cummulative_score, 0) + COALESCE(ag.cummulative_score, 0) + COALESCE(co.cummulative_score, 0) +
    COALESCE(ci.cummulative_score, 0) + COALESCE(bt.cummulative_score, 0) + COALESCE(yo.cummulative_score, 0) + COALESCE(te.cummulative_score, 0) +
    COALESCE(hi.cummulative_score, 0) + COALESCE(se.cummulative_score, 0) + COALESCE(ac.cummulative_score, 0) +
    COALESCE(cc.cummulative_score, 0) + COALESCE(mu.cummulative_score, 0) + COALESCE(fr.cummulative_score, 0) AS total_score
FROM junior_details1 sd
LEFT JOIN junior1_math mr ON sd.id = mr.student_id
LEFT JOIN junior1_eng er ON sd.id = er.student_id
LEFT JOIN junior1_bscience sc ON sd.id = sc.student_id
LEFT JOIN junior1_social so ON sd.id = so.student_id
LEFT JOIN junior1_econs ec ON sd.id = ec.student_id
LEFT JOIN junior1_phe ph ON sd.id = ph.student_id
LEFT JOIN junior1_crs cr ON sd.id = cr.student_id
LEFT JOIN junior1_agric ag ON sd.id = ag.student_id
LEFT JOIN junior1_computer co ON sd.id = co.student_id
LEFT JOIN junior1_civic ci ON sd.id = ci.student_id
LEFT JOIN junior1_bstudies bt ON sd.id = bt.student_id
LEFT JOIN junior1_yoruba yo ON sd.id = yo.student_id
LEFT JOIN junior1_tech te ON sd.id = te.student_id
LEFT JOIN junior1_history hi ON sd.id = hi.student_id
LEFT JOIN junior1_security se ON sd.id = se.student_id
LEFT JOIN junior1_artcraft ac ON sd.id = ac.student_id
LEFT JOIN junior1_cca cc ON sd.id = cc.student_id
LEFT JOIN junior1_music mu ON sd.id = mu.student_id
LEFT JOIN junior1_french fr ON sd.id = fr.student_id
-- Add more LEFT JOIN statements for other subjects
ORDER BY total_score DESC";

$presult = mysqli_query($con, $query);

if (!$presult) {
    die('Query Error: ' . mysqli_error($con));
}

$rank = 1;

// Store the positions of each student in an array
$positions = array();

// Retrieve the positions and store them in the array
while ($row = mysqli_fetch_assoc($presult)) {
    $admissionNo = $row['admission_no'];
    $positions[$admissionNo] = $rank;
    $rank++;
}

mysqli_free_result($presult);
mysqli_close($con);
?>
