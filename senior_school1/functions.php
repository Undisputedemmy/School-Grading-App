<?php

function calculateStudentGrade($cumulativeScore) {
    if ($cumulativeScore >= 75 && $cumulativeScore <= 100) {
        return  "A1";
    } elseif ($cumulativeScore >= 70 && $cumulativeScore <= 74) {
        return  "B2";
    } elseif ($cumulativeScore >= 65 && $cumulativeScore <= 69) {
        return  "B3";
    } elseif ($cumulativeScore >= 60 && $cumulativeScore <= 64) {
        return  "C4";
    } elseif ($cumulativeScore >= 55 && $cumulativeScore <= 59) {
        return  "C5";
    } elseif ($cumulativeScore >= 50 && $cumulativeScore <= 54) {
        return  "C6";
    } elseif ($cumulativeScore >= 45 && $cumulativeScore <= 49) {
        return  "D7";
    } elseif ($cumulativeScore >= 40 && $cumulativeScore <= 44) {
        return  "E8";
    } elseif ($cumulativeScore >= 0 && $cumulativeScore <= 39) {
        return  "F9";
    }

}
?>
