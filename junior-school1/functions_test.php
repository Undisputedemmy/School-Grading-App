<?php

function calculateStudentGrade($cumulativeScore) {
    if ($cumulativeScore >= 25 && $cumulativeScore <= 30) {
        return "Excellent";
    } elseif ($cumulativeScore >= 20 && $cumulativeScore <= 24) {
        return "V.Good";
    } elseif ($cumulativeScore >= 15 && $cumulativeScore <= 19) {
        return "Good";
    } elseif ($cumulativeScore >= 10 && $cumulativeScore <= 14) {
        return "Fair";
    } elseif ($cumulativeScore >= 0 && $cumulativeScore <= 9) {
        return "Poor";
    } else {
        return ""; // Return an empty string if the cumulative score is not within the defined ranges
    }
}


?>