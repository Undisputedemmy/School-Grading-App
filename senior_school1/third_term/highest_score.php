<?php
include 'connect.php';

$subjects = ['mathematics', 'english', 'physics', 'chemistry', 'f_math', 'biology', 'agric',
 'dp', 'civic', 'literature', 'econs', 'government', 'crs', 'history', 'geographyi', 'yoruba',
'catering', 'techdraw', 'artcraft', 'french', 'commerce', 'accounting'];

// Array to store the highest scores
$highestScores = [];

foreach ($subjects as $subject) {
    // Retrieve the highest score for each subject
    $query = "SELECT MAX(cumulative_score) AS highest_score FROM $subject";
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
