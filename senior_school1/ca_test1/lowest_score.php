<?php
include 'connect.php';

$subjects = ['test_mathematics1', 'test_english1', 'test_physics1', 'test_chemistry1', 'test_f_math1', 
'test_biology1', 'test_agric1',
'test_dp1', 'test_civic1', 'test_literature1', 'test_econs1', 'test_government1', 'test_crs1', 
'test_history1', 'test_geographyi1', 'test_yoruba1',
'test_catering1', 'test_techdraw1', 'test_artcraft1', 'test_french1', 'test_commerce1', 'test_accounting1'];

// Array to store the lowest scores
$lowestScores = [];

foreach ($subjects as $subject) {
    // Retrieve the lowest score for each subject
    $query = "SELECT MIN(total_score) AS lowest_score FROM $subject";
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
