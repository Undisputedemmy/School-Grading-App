<?php
include 'connect.php';

// Retrieve the cumulative scores for each student
$query = "SELECT jd.admission_no, jd.name, jd.class, 
          SUM(mr.cummulative_score) AS math_score,
          SUM(er.cummulative_score) AS eng_score,
          SUM(br.cummulative_score) AS bscience_score,
          SUM(sr.cummulative_score) AS social_score,
          SUM(hr.cummulative_score) AS home_score,
          SUM(pr.cummulative_score) AS phe_score,
          SUM(cr.cummulative_score) AS crs_score,
          SUM(ar.cummulative_score) AS agric_score,
          SUM(cor.cummulative_score) AS comp_score,
          SUM(cir.cummulative_score) AS civic_score,
          SUM(busr.cummulative_score) AS bus_score,
          SUM(yr.cummulative_score) AS yoruba_score,
          SUM(btr.cummulative_score) AS btech_score,
          SUM(hir.cummulative_score) AS hist_score,
          SUM(scr.cummulative_score) AS sec_score,
          SUM(acr.cummulative_score) AS art_score,
          SUM(ccar.cummulative_score) AS cca_score,
          SUM(mur.cummulative_score) AS music_score,
          SUM(fr.cummulative_score) AS french_score
          FROM junior_details1 jd
          LEFT JOIN junior1_math mr ON jd.id = mr.student_id
          LEFT JOIN junior1_eng er ON jd.id = er.student_id
          LEFT JOIN junior1_bscience br ON jd.id = br.student_id
          LEFT JOIN junior1_social sr ON jd.id = sr.student_id
          LEFT JOIN junior1_econs hr ON jd.id = hr.student_id
          LEFT JOIN junior1_phe pr ON jd.id = pr.student_id
          LEFT JOIN junior1_crs cr ON jd.id = cr.student_id
          LEFT JOIN junior1_agric ar ON jd.id = ar.student_id
          LEFT JOIN junior1_computer cor ON jd.id = cor.student_id
          LEFT JOIN junior1_civic cir ON jd.id = cir.student_id
          LEFT JOIN junior1_bstudies busr ON jd.id = busr.student_id
          LEFT JOIN junior1_yoruba yr ON jd.id = yr.student_id
          LEFT JOIN junior1_tech btr ON jd.id = btr.student_id
          LEFT JOIN junior1_history hir ON jd.id = hir.student_id
          LEFT JOIN junior1_security scr ON jd.id = scr.student_id
          LEFT JOIN junior1_artcraft acr ON jd.id = acr.student_id
          LEFT JOIN junior1_cca ccar ON jd.id = ccar.student_id
          LEFT JOIN junior1_music mur ON jd.id = mur.student_id
          LEFT JOIN junior1_french fr ON jd.id = fr.student_id
          GROUP BY jd.admission_no, jd.name, jd.class
          ORDER BY (math_score + eng_score + bscience_score + social_score + home_score + phe_score + crs_score + agric_score + comp_score + civic_score + bus_score + yoruba_score + btech_score + hist_score + sec_score + art_score + cca_score + music_score + french_score) DESC";
$result = mysqli_query($con, $query);

// Display the rankings
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Rank</th><th>Admission No.</th><th>Name</th><th>Class</th><th>Total Cumulative Score</th></tr>";

    $rank = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        $admissionNo = $row['admission_no'];
        $name = $row['name'];
        $class = $row['class'];
        $totalScore = $row['math_score'] + $row['eng_score'] + $row['bscience_score'] + $row['social_score'] + $row['home_score'] + $row['phe_score'] + $row['crs_score'] + $row['agric_score'] + $row['comp_score'] + $row['civic_score'] + $row['bus_score'] + $row['yoruba_score'] + $row['btech_score'] + $row['hist_score'] + $row['sec_score'] + $row['art_score'] + $row['cca_score'] + $row['music_score'] + $row['french_score'];

        echo "<tr><td>$rank</td><td>$admissionNo</td><td>$name</td><td>$class</td><td>$totalScore</td></tr>";
        $rank++;
    }

    echo "</table>";
} else {
    echo "No records found.";
}

mysqli_close($con);
?>
