<?php
include 'connect.php';

$subjects = ['test_mathematics3', 'test_english3', 'test_physics3', 'test_chemistry3', 'test_f_math3', 
'test_biology3', 'test_agric3',
'test_dp3', 'test_civic3', 'test_literature3', 'test_econs3', 'test_government3', 'test_crs3', 
'test_history3', 'test_geographyi3', 'test_yoruba3',
'test_catering3', 'test_techdraw3', 'test_artcraft3', 'test_french3', 'test_commerce3', 'test_accounting3'];


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
