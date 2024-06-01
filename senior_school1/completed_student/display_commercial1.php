<?php
include 'connect.php';
include 'displayfiles1.php';
include 'highest_Z.php';
include 'lowest_Z.php';
include '../teacher_initialdisplay.php';
include '../noinclass.php'
?>
<!doctype html>
<html lang="en">

<head>

    <head>
        <!-- Other meta tags, CSS links, etc. -->

        <!-- Include jQuery library -->
        <script src="https://code.jquery.che/jquery-3.6.0.min.js"></script>

        <!-- Include the rankings.js file -->
        <script src="rankings.js"></script>
    </head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style1.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Student Result</title>
</head>


<body>
    <style>
        @media print {

            .print-button,
            .back {
                display: none;
            }
        }
    </style>
    <!-- this is the header section -->
    <div>
        <button class="btn btn-primary print-button" onclick="window.print()">Print Result</button>
        <button class="btn btn-danger back"><a href="promoted_details.php">Back</a></button>
    </div>
    <div class="containter" style="display: flex;">
        <div class="header mt-0" style="flex: 75%;">
            <h1 style="font-weight: bold;">CORNERSTONE COLLEGE</h1>
            <h5 style="font-weight: bold;">OBANTOKO, ABEOKUTA, OGUN STATE</h5>
            <h6 style="font-weight: bold;">1ST TERM <?php echo !empty($studentDetails['A_session']) ? $studentDetails['A_session'] : 'N/A'; ?></h6>

        </div>
        <div class="">
            <img src="../img/logo.png" alt="bagde" width="200" height="140">
        </div>
    </div>
    <div class="student my-3">
        <!-- Display student details -->
        <h5>Senior Secondary School Student's Progress Report</h5>
        <div style="display: flex;">
            <div style="flex: 30%">
                <?php if (empty($studentDetails['name']) || empty($studentDetails['admission_no'])) { ?>
                <?php } else { ?>
                    <p>Name: <?php echo $studentDetails['name']; ?></p><br>
                    <p>Adm No: <?php echo $studentDetails['admission_no']; ?></p>
                <?php } ?>

            </div>
            <div style="flex: 14%">
                <p>Class: <?php echo $studentDetails['class']; ?></p><br>
                <p>No in class: <?php echo $totalStudents; ?></p>

            </div>

        </div>
    </div>

    <!-- ... Your previous code ... -->

    <div class="mywrap my-3">
        <div class="table-wrapper1">
            <table style="border: 2px solid;">
                <tr>
                    <th colspan="6"></th>
                    <th class="rotated_cell">
                        <div class="rotate_text">Mid Term Score</div>
                    </th>
                    <th class="rotated_cell">
                        <div class="rotate_text">Examination Score</div>
                    </th>
                    <th class="rotated_cell">
                        <div class="rotate_text">Terminal Score</div>
                    </th>
                    <th class="rotated_cell">
                        <div class="rotate_text">Highest Score</div>
                    </th>
                    <th class="rotated_cell">
                        <div class="rotate_text">Lowest Score</div>
                    </th>
                    <th class="rotated_cell">
                        <div class="rotate_text">Student's Grade</div>
                    </th>
                    <th class="rotated_cell">
                        <div class="rotate_text">Teacher's Initial</div>
                    </th>
                </tr>

                <tr>
                    <td colspan="6" style="text-align: left;">MARKS OBTAINED</td>
                    <td>30</td>
                    <td>70</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">English</td>
                    <?php
                    if (mysqli_num_rows($engResultResult) > 0) {
                        mysqli_data_seek($engResultResult, 0);
                        $englishHighestScore = $highestScores['z_english1'];
                        $englishLowestScore = $lowestScores['z_english1'];

                        while ($engSubjectResult = mysqli_fetch_assoc($engResultResult)) {
                    ?>
                            <td><?php echo ($engSubjectResult['midterm_score'] != 0) ? $engSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($engSubjectResult['exam_score'] != 0) ? $engSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($engSubjectResult['terminal_score'] != 0) ? $engSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $englishHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $englishLowestScore; ?></td>
                            <td><?php echo $engSubjectResult['student_grade']; ?></td>
                            <td><?php echo $englishTeacherInitial; ?></td> <!-- Display the English teacher initial -->
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 7; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">Mathematics</td>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        mysqli_data_seek($result, 0);
                        $mathHighestScore = $highestScores['z_mathematics1'];
                        $mathLowestScore = $lowestScores['z_mathematics1'];

                        while ($mathResult = mysqli_fetch_assoc($result)) {
                    ?>
                            <td><?php echo ($mathResult['midterm_score'] != 0) ? $mathResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($mathResult['exam_score'] != 0) ? $mathResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($mathResult['terminal_score'] != 0) ? $mathResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $mathHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $mathLowestScore; ?></td>
                            <td><?php echo $mathResult['student_grade']; ?></td>
                            <td><?php echo $mathTeacherInitial; ?></td> <!-- Display the Mathematics teacher initial -->
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 7; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">F/Mathematics</td>
                    <?php
                    if (mysqli_num_rows($f_mathResultResult) > 0) {
                        mysqli_data_seek($f_mathResultResult, 0);
                        $f_mathHighestScore = $highestScores['z_f_math1'];
                        $f_mathLowestScore = $lowestScores['z_f_math1'];

                        while ($f_mathSubjectResult = mysqli_fetch_assoc($f_mathResultResult)) {
                    ?>
                            <td><?php echo ($f_mathSubjectResult['midterm_score'] != 0) ? $f_mathSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($f_mathSubjectResult['exam_score'] != 0) ? $f_mathSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($f_mathSubjectResult['terminal_score'] != 0) ? $f_mathSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $f_mathHighestScore; ?></td>
                            <td><?php echo $f_mathLowestScore; ?></td>
                            <td><?php echo $f_mathSubjectResult['student_grade']; ?></td>
                            <td><?php echo $f_mathTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 7; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <!-- for english -->
                <tr>
                    <td colspan="6" style="text-align: left;">Biology</td>
                    <?php
                    if (mysqli_num_rows($bioResultResult) > 0) {
                        mysqli_data_seek($bioResultResult, 0);
                        $bioHighestScore = $highestScores['z_biology1'];
                        $bioLowestScore = $lowestScores['z_biology1'];

                        while ($bioSubjectResult = mysqli_fetch_assoc($bioResultResult)) {
                    ?>
                            <td><?php echo ($bioSubjectResult['midterm_score'] != 0) ? $bioSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($bioSubjectResult['exam_score'] != 0) ? $bioSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($bioSubjectResult['terminal_score'] != 0) ? $bioSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $bioHighestScore; ?></td>
                            <td><?php echo $bioLowestScore; ?></td>
                            <td><?php echo $bioSubjectResult['student_grade']; ?></td>
                            <td><?php echo $biologyTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 7; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">Economics</td>
                    <?php
                    if (mysqli_num_rows($ecoResultResult) > 0) {
                        mysqli_data_seek($ecoResultResult, 0);
                        $ecoHighestScore = $highestScores['z_econs1'];
                        $ecoLowestScore = $lowestScores['z_econs1'];

                        while ($ecoSubjectResult = mysqli_fetch_assoc($ecoResultResult)) {
                    ?>
                            <td><?php echo ($ecoSubjectResult['midterm_score'] != 0) ? $ecoSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($ecoSubjectResult['exam_score'] != 0) ? $ecoSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($ecoSubjectResult['terminal_score'] != 0) ? $ecoSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $ecoHighestScore; ?></td>
                            <td><?php echo $ecoLowestScore; ?></td>
                            <td><?php echo $ecoSubjectResult['student_grade']; ?></td>
                            <td><?php echo $econsTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 7; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">Commerce</td>
                    <?php
                    if (mysqli_num_rows($comResultResult) > 0) {
                        mysqli_data_seek($comResultResult, 0);
                        $comHighestScore = $highestScores['z_commerce1'];
                        $comLowestScore = $lowestScores['z_commerce1'];

                        while ($comSubjectResult = mysqli_fetch_assoc($comResultResult)) {
                    ?>
                            <td><?php echo ($comSubjectResult['midterm_score'] != 0) ? $comSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($comSubjectResult['exam_score'] != 0) ? $comSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($comSubjectResult['terminal_score'] != 0) ? $comSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $comHighestScore; ?></td>
                            <td><?php echo $comLowestScore; ?></td>
                            <td><?php echo $comSubjectResult['student_grade']; ?></td>
                            <td><?php echo $commerceTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 7; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">Data Processing</td>
                    <?php
                    if (mysqli_num_rows($dpResultResult) > 0) {
                        mysqli_data_seek($dpResultResult, 0);
                        $dpHighestScore = $highestScores['z_dp1'];
                        $dpLowestScore = $lowestScores['z_dp1'];

                        while ($dpSubjectResult = mysqli_fetch_assoc($dpResultResult)) {
                    ?>
                            <td><?php echo ($dpSubjectResult['midterm_score'] != 0) ? $dpSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($dpSubjectResult['exam_score'] != 0) ? $dpSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($dpSubjectResult['terminal_score'] != 0) ? $dpSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $dpHighestScore; ?></td>
                            <td><?php echo $dpLowestScore; ?></td>
                            <td><?php echo $dpSubjectResult['student_grade']; ?></td>
                            <td><?php echo $dpTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 7; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">Civic Edu. </td>
                    <?php
                    if (mysqli_num_rows($civicResultResult) > 0) {
                        mysqli_data_seek($civicResultResult, 0);
                        $civicHighestScore = $highestScores['z_civic1'];
                        $civicLowestScore = $lowestScores['z_civic1'];

                        while ($civicSubjectResult = mysqli_fetch_assoc($civicResultResult)) {
                    ?>
                            <td><?php echo ($civicSubjectResult['midterm_score'] != 0) ? $civicSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($civicSubjectResult['exam_score'] != 0) ? $civicSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($civicSubjectResult['terminal_score'] != 0) ? $civicSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $civicHighestScore; ?></td>
                            <td><?php echo $civicLowestScore; ?></td>
                            <td><?php echo $civicSubjectResult['student_grade']; ?></td>
                            <td><?php echo $civicTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 7; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">Government</td>
                    <?php
                    if (mysqli_num_rows($govResultResult) > 0) {
                        mysqli_data_seek($govResultResult, 0);
                        $govHighestScore = $highestScores['z_government1'];
                        $govLowestScore = $lowestScores['z_government1'];

                        while ($govSubjectResult = mysqli_fetch_assoc($govResultResult)) {
                    ?>
                            <td><?php echo ($govSubjectResult['midterm_score'] != 0) ? $govSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($govSubjectResult['exam_score'] != 0) ? $govSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($govSubjectResult['terminal_score'] != 0) ? $govSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $govHighestScore; ?></td>
                            <td><?php echo $govLowestScore; ?></td>
                            <td><?php echo $govSubjectResult['student_grade']; ?></td>
                            <td><?php echo $governmentTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 7; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                
                <tr>
                    <td colspan="6" style="text-align: left;">F/Accounting</td>
                    <?php
                    if (mysqli_num_rows($accResultResult) > 0) {
                        mysqli_data_seek($accResultResult, 0);
                        $accHighestScore = $highestScores['z_accounting1'];
                        $accLowestScore = $lowestScores['z_accounting1'];

                        while ($accSubjectResult = mysqli_fetch_assoc($accResultResult)) {
                    ?>
                            <td><?php echo ($accSubjectResult['midterm_score'] != 0) ? $accSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($accSubjectResult['exam_score'] != 0) ? $accSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($accSubjectResult['terminal_score'] != 0) ? $accSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $accHighestScore; ?></td>
                            <td><?php echo $accLowestScore; ?></td>
                            <td><?php echo $accSubjectResult['student_grade']; ?></td>
                            <td><?php echo $accountingTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 7; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">History</td>
                    <?php
                    if (mysqli_num_rows($histResultResult) > 0) {
                        mysqli_data_seek($histResultResult, 0);
                        $histHighestScore = $highestScores['z_history1'];
                        $histLowestScore = $lowestScores['z_history1'];

                        while ($histSubjectResult = mysqli_fetch_assoc($histResultResult)) {
                    ?>
                            <td><?php echo ($histSubjectResult['midterm_score'] != 0) ? $histSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($histSubjectResult['exam_score'] != 0) ? $histSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($histSubjectResult['terminal_score'] != 0) ? $histSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $histHighestScore; ?></td>
                            <td><?php echo $histLowestScore; ?></td>
                            <td><?php echo $histSubjectResult['student_grade']; ?></td>
                            <td><?php echo $historyTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 7; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                
                <tr>
                    <td colspan="6" style="text-align: left;">Yoruba</td>
                    <?php
                    if (mysqli_num_rows($yorResultResult) > 0) {
                        mysqli_data_seek($yorResultResult, 0);
                        $yorHighestScore = $highestScores['z_yoruba1'];
                        $yorLowestScore = $lowestScores['z_yoruba1'];

                        while ($yorSubjectResult = mysqli_fetch_assoc($yorResultResult)) {
                    ?>
                            <td><?php echo ($yorSubjectResult['midterm_score'] != 0) ? $yorSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($yorSubjectResult['exam_score'] != 0) ? $yorSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($yorSubjectResult['terminal_score'] != 0) ? $yorSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $yorHighestScore; ?></td>
                            <td><?php echo $yorLowestScore; ?></td>
                            <td><?php echo $yorSubjectResult['student_grade']; ?></td>
                            <td><?php echo $yorubaTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 7; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>

            </table>
        </div>

        <div class="wrapper-table2">
            <p class="mb-0" style="text-align: center,;"> AFFECTIVE DOMAIN </p>
            <div>
                <table style="border: 2px solid;">
                    <!-- Second table content -->
                    <tr>
                        <th>SKILLS</th>
                        <th>5</th>
                        <th>4</th>
                        <th>3</th>
                        <th>2</th>
                        <th>1</th>
                    </tr>
                    <tr>
                        <td>Punctuacomy</td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="craft1"><label for="craft1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="handwriting1"><label for="handwriting1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                    </tr>
                    <tr>
                        <td>Attendance</td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="craft1"><label for="craft1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="handwriting1"><label for="handwriting1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                    </tr>
                    <tr>
                        <td>Pocomeness</td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="craft1"><label for="craft1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="handwriting1"><label for="handwriting1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                    </tr>
                    <tr>
                        <td>Leadership</td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="craft1"><label for="craft1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="handwriting1"><label for="handwriting1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                    </tr>
                </table>
            </div>
            <div>
                <table style="border: 2px solid;" class="mb-0">
                    <p class="mt-3 mb-0" style="text-align: center;"> PSYCHOMOTOR DOMAIN </p>
                    <!-- Second table content -->
                    <tr>
                        <th>SKILLS</th>
                        <th>5</th>
                        <th>4</th>
                        <th>3</th>
                        <th>2</th>
                        <th>1</th>
                    </tr>
                    <tr>
                        <td>Painting</td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="craft1"><label for="craft1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="handwriting1"><label for="handwriting1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                    </tr>
                    <tr>
                        <td>Sport</td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="craft1"><label for="craft1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="handwriting1"><label for="handwriting1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                    </tr>
                    <tr>
                        <td>Craft</td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="craft1"><label for="craft1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="handwriting1"><label for="handwriting1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                    </tr>

                    <tr>
                        <td>Writing</td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="craft1"><label for="craft1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="handwriting1"><label for="handwriting1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                    </tr>
                </table>
            </div>
            <div>
                <table style="border: 2px solid;" class="mb-2">
                    <p class="mt-2 mb-1" style="text-align: center;"> GRADE </p>
                    <!-- Second table content -->
                    <tr>
                        <td style="text-align: left;">75-100....A1</td>
                        <td style="text-align: left;">50-54....C6</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">70-74....B2</td>
                        <td style="text-align: left;">45-49....D7</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">65-69....B3</td>
                        <td style="text-align: left;">40-44....E8</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">60-64....C4</td>
                        <td style="text-align: left;">0-39....F9</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">55-59....C5</td>
                        <td style="text-align: left;"></td>
                    </tr>

                </table>
            </div>

        </div>
    </div>

    <div class="teacherbox mt-1 my-3" style="border: 2px solid; display: flex;">
        <div style="flex: 60%;" class="mt-1">
            <p style="text-transform: uppercase;"><strong> Class Teacher's comment :
                    <?php if (!empty($teaResult['teacher_comments'])) echo $teaResult['teacher_comments']; ?></strong> </p>
        </div>
        <div style="flex: 40%;" class="my-1">
            <?php if (!empty($teaResult['teacher_name']) || !empty($teaResult['date'])) : ?>
                <p style="display: inline-block; text-transform: uppercase;"><strong> Teacher's Name:
                        <?php echo $teaResult['teacher_name']; ?> </strong></p><br>
                <p style="display: inline-block; text-transform: uppercase;"><strong> Date:
                        <?php echo date('d/m/y', strtotime($teaResult['date'])); ?></strong></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="teacherbox my-1" style="border: 2px solid; display: flex;">
        <div style="flex: 60%;">
            <p style="text-transform: uppercase;"><strong> Principal's Remark:
                    <?php if (!empty($othResult['principal_remarks'])) echo $othResult['principal_remarks']; ?></strong></p>
        </div>
        <div style="flex: 40%;">
            <?php if (!empty($othResult['principal_name']) || !empty($othResult['date'])) : ?>
                <p style="display: inline-block; text-transform: uppercase;"><strong> Principal's Name:
                        <?php echo $othResult['principal_name']; ?></strong></p><br>
                <p style="display: inline-block; text-transform: uppercase;"> <strong>Date:
                        <?php echo date('d/m/y', strtotime($othResult['date'])); ?></strong></p>
            <?php endif; ?>
        </div>
    </div>
</body>



</html>


</body>

</html>