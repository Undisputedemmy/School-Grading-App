<?php
include 'connect.php';

$subjects = ['mathematics1', 'english1', 'physics1', 'chemistry1', 'f_math1', 'biology1', 'agric1',
 'dp1', 'civic1', 'literature1', 'econs1', 'government1', 'crs1', 'history1', 'geographyi1', 'yoruba1',
'catering1', 'techdraw1', 'artcraft1', 'french1', 'commerce1', 'accounting1'];

// Array to store the lowest scores
$lowestScores = [];

foreach ($subjects as $subject) {
    // Retrieve the lowest score for each subject
    $query = "SELECT MIN(terminal_score) AS lowest_score FROM $subject";
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
