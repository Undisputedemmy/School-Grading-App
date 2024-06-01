<?php
include 'connect.php';

$subjects = ['test_mathematics3', 'test_english3', 'test_pvs3', 'test_bst3', 'test_nv3', 'test_crs3', 
'test_history3', 'test_yoruba3',
'test_cca3', 'test_business3', 'test_artcraft3', 'test_french3'];

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
