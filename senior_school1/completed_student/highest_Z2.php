<?php
include 'connect.php';

$subjects = ['z_mathematics2', 'z_english2', 'z_physics2', 'z_chemistry2', 'z_f_math2', 'z_biology2', 'z_agric2',
 'z_dp2', 'z_civic2', 'z_literature2', 'z_econs2', 'z_government2', 'z_crs2', 'z_history2', 'z_geographyi2', 'z_yoruba2',
'z_catering2', 'z_techdraw2', 'z_artcraft2', 'z_french2', 'z_commerce2', 'z_accounting2'];

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
