<?php
include 'connect.php';

$subjects = ['z_mathematics', 'z_english', 'z_physics', 'z_chemistry', 'z_f_math', 'z_biology', 'z_agric',
 'z_dp', 'z_civic', 'z_literature', 'z_econs', 'z_government', 'z_crs', 'z_history', 'z_geographyi', 'z_yoruba',
'z_catering', 'z_techdraw', 'z_artcraft', 'z_french', 'z_commerce', 'z_accounting'];

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
