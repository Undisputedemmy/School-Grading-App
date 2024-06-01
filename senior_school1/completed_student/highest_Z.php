<?php
include 'connect.php';

$subjects = ['z_mathematics1', 'z_english1', 'z_physics1', 'z_chemistry1', 'z_f_math1', 'z_biology1', 'z_agric1',
 'z_dp1', 'z_civic1', 'z_literature1', 'z_econs1', 'z_government1', 'z_crs1', 'z_history1', 'z_geographyi1', 'z_yoruba1',
'z_catering1', 'z_techdraw1', 'z_artcraft1', 'z_french1', 'z_commerce1', 'z_accounting1'];

// Array to store the highest scores
$highestScores = [];

foreach ($subjects as $subject) {
    // Retrieve the highest score for each subject
    $query = "SELECT MAX(terminal_score) AS highest_score FROM $subject";
    $dresult = mysqli_query($con, $query);

    if ($dresult && mysqli_num_rows($dresult) > 0) {
        $row = mysqli_fetch_assoc($dresult);
        $highestScore = $row['highest_score'];

        // Store the highest score in the array
        $highestScores[$subject] = $highestScore;
    } else {
        // If no results found, set the highest score as 0
        $highestScores[$subject] = 0;
    }
}

// Close the database connection
mysqli_close($con);
?>
