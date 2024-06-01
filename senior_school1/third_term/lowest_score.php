<?php
include 'connect.php';

$subjects = ['mathematics', 'english', 'physics', 'chemistry', 'f_math', 'biology', 'agric',
 'dp', 'civic', 'literature', 'econs', 'government', 'crs', 'history', 'geographyi', 'yoruba',
'catering', 'techdraw', 'artcraft', 'french', 'commerce', 'accounting'];

// Array to store the lowest scores
$lowestScores = [];

foreach ($subjects as $subject) {
    // Retrieve the lowest score for each subject
    $query = "SELECT MIN(cumulative_score) AS lowest_score FROM $subject";
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
