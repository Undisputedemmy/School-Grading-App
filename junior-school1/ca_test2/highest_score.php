<?php
include 'connect.php';

$subjects = ['test_mathematics2', 'test_english2', 'test_pvs2', 'test_bst2', 'test_nv2', 'test_crs2', 
'test_history2', 'test_yoruba2',
'test_cca2', 'test_business2', 'test_artcraft2', 'test_french2'];

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
