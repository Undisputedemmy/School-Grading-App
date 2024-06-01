<?php
include 'connect.php';

$subjects = ['test_mathematics1', 'test_english1', 'test_pvs1', 'test_bst1', 'test_nv1', 'test_crs1', 
'test_history1', 'test_yoruba1',
'test_cca1', 'test_business1', 'test_artcraft1', 'test_french1'];

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
