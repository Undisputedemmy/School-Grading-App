<?php
include 'position.php';

// position.php

// Get the admission number of the student
$admissionNo = $studentDetails['admission_no'];

// Check if the admission number exists in the positions array
if (isset($positions[$admissionNo])) {
    // Retrieve the rank for the student
    $rank = $positions[$admissionNo];

    // Function to convert rank to ordinal form with consideration for ties
    function ordinalSuffix($num)
    {
        $lastTwoDigits = $num % 100;
        if ($lastTwoDigits >= 11 && $lastTwoDigits <= 13) {
            return $num . 'th';
        }

        // Check for ties
        $lastDigit = $num % 10;
        $tieSuffix = ($num >= 11 && $num <= 13) ? 'th' : '';
        
        if ($lastDigit === 1) {
            return $num . 'st' . $tieSuffix;
        } elseif ($lastDigit === 2) {
            return $num . 'nd' . $tieSuffix;
        } elseif ($lastDigit === 3) {
            return $num . 'rd' . $tieSuffix;
        } else {
            return $num . 'th';
        }
    }

    // Convert the rank to ordinal form
    $ordinalRank = ordinalSuffix($rank);

   

} else {
    echo 'N/A'; // If the student is not found in the positions array
}
?>
