<?php

function calculateStudentGrade($cumulativeScore) {
    if ($cumulativeScore >= 70 && $cumulativeScore <= 100) {
        return "Excellent";
    } elseif ($cumulativeScore >= 60 && $cumulativeScore <= 69) {
        return "V.Good";
    } elseif ($cumulativeScore >= 50 && $cumulativeScore <= 59) {
        return "Good";
    } elseif ($cumulativeScore >= 40 && $cumulativeScore <= 49) {
        return "Fair";
    } elseif ($cumulativeScore >= 0 && $cumulativeScore <= 39) {
        return "Poor";
    } else {
        return ""; // Return an empty string if the cumulative score is not within the defined ranges
    }
}


?>