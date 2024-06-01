<?php
include 'connect.php';

$subjects = ['mathematics2', 'english2', 'pvs2', 'bst2', 'nv2', 'crs2', 'history2', 'yoruba2',
'cca2', 'business2', 'artcraft2', 'french2'];

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
