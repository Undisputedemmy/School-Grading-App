<?php

function calculateStudentGrade($cumulativeScore) {
    if ($cumulativeScore >= 28 && $cumulativeScore <= 30) {
        return  "A1";
    } elseif ($cumulativeScore >= 25 && $cumulativeScore <= 27) {
        return  "B2";
    } elseif ($cumulativeScore >= 23 && $cumulativeScore <= 24) {
        return  "B3";
    } elseif ($cumulativeScore >= 20 && $cumulativeScore <= 22) {
        return  "C4";
    } elseif ($cumulativeScore >= 18 && $cumulativeScore <= 19) {
        return  "C5";
    } elseif ($cumulativeScore >= 15 && $cumulativeScore <= 17) {
        return  "C6";
    } elseif ($cumulativeScore >= 12 && $cumulativeScore <= 14) {
        return  "D7";
    } elseif ($cumulativeScore >= 10 && $cumulativeScore <= 11) {
        return  "E8";
    } elseif ($cumulativeScore >= 0 && $cumulativeScore <= 9) {
        return  "F9";
    }

}
?>
