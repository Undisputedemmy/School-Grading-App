<?php
include 'connect.php';

$subjects =['z_mathematics', 'z_english', 'z_physics', 'z_chemistry', 'z_f_math', 'z_biology', 'z_agric',
'z_dp', 'z_civic', 'z_literature', 'z_econs', 'z_government', 'z_crs', 'z_history', 'z_geographyi', 'z_yoruba',
'z_catering', 'z_techdraw', 'z_artcraft', 'z_french', 'z_commerce', 'z_accounting'];

// Array to store the lowest scores
$lowestScores = [];

foreach ($subjects as $subject) {
    // Retrieve the lowest score for each subject
    $query = "SELECT MIN(terminal_score) AS lowest_score FROM $subject";
    $lresult = mysqli_query($con, $query);

    if ($lresult && mysqli_num_rows($lresult) > 0) {
        $row = mysqli_fetch_assoc($lresult);
        $lowestScore = $row['lowest_score'];

        // Store the lowest score in the array
        $lowestScores[$subject] = $lowestScore;
    } else {
        // If no results found, set the lowest score as 0
        $lowestScores[$subject] = 0;
    }
}

// Close the database connection
mysqli_close($con);
?>
