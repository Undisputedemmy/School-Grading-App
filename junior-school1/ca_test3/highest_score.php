<?php
include 'connect.php';

$subjects = ['test_mathematics3', 'test_english3', 'test_pvs3', 'test_bst3', 'test_nv3', 'test_crs3', 
'test_history3', 'test_yoruba3',
'test_cca3', 'test_business3', 'test_artcraft3', 'test_french3'];

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
