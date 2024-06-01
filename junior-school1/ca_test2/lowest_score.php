<?php
include 'connect.php';

$subjects = ['test_mathematics2', 'test_english2', 'test_pvs2', 'test_bst2', 'test_nv2', 'test_crs2', 
'test_history2', 'test_yoruba2',
'test_cca2', 'test_business2', 'test_artcraft2', 'test_french2'];

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
