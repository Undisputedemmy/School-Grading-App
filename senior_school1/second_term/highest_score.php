<?php
include 'connect.php';

$subjects = ['mathematics2', 'english2', 'physics2', 'chemistry2', 'f_math2', 'biology2', 'agric2',
 'dp2', 'civic2', 'literature2', 'econs2', 'government2', 'crs2', 'history2', 'geographyi2', 'yoruba2',
'catering2', 'techdraw2', 'artcraft2', 'french2', 'commerce2', 'accounting2'];

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
