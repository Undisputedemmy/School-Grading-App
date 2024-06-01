<?php
include 'connect.php';

$subjects = ['test_mathematics1', 'test_english1', 'test_physics1', 'test_chemistry1', 'test_f_math1', 
'test_biology1', 'test_agric1',
'test_dp1', 'test_civic1', 'test_literature1', 'test_econs1', 'test_government1', 'test_crs1', 
'test_history1', 'test_geographyi1', 'test_yoruba1',
'test_catering1', 'test_techdraw1', 'test_artcraft1', 'test_french1', 'test_commerce1', 'test_accounting1'];


// Array to store the highest scores
$highestScores = [];

foreach ($subjects as $subject) {
    // Retrieve the highest score for each subject
    $query = "SELECT MAX(total_score) AS highest_score FROM $subject";
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
