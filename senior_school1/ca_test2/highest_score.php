<?php
include 'connect.php';

$subjects = ['test_mathematics2', 'test_english2', 'test_physics2', 'test_chemistry2', 'test_f_math2', 
'test_biology2', 'test_agric2',
'test_dp2', 'test_civic2', 'test_literature2', 'test_econs2', 'test_government2', 'test_crs2', 
'test_history2', 'test_geographyi2', 'test_yoruba2',
'test_catering2', 'test_techdraw2', 'test_artcraft2', 'test_french2', 'test_commerce2', 'test_accounting2'];


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
