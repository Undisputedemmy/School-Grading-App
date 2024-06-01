<?php
include 'connect.php';

$subjects = ['mathematics1', 'english1', 'physics1', 'chemistry1', 'f_math1', 'biology1', 'agric1',
 'dp1', 'civic1', 'literature1', 'econs1', 'government1', 'crs1', 'history1', 'geographyi1', 'yoruba1',
'catering1', 'techdraw1', 'artcraft1', 'french1', 'commerce1', 'accounting1'];

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
