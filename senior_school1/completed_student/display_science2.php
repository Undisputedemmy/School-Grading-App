<?php
include 'connect.php';
include 'displayfiles2.php';
include 'highest_Z2.php';
include 'lowest_Z2.php';
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
            <h6 style="font-weight: bold;">2ND TERM <?php echo !empty($studentDetails['A_session']) ? $studentDetails['A_session'] : 'N/A'; ?></h6>

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
                        $englishHighestScore = $highestScores['z_english2'];
                        $englishLowestScore = $lowestScores['z_english2'];

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
                        $mathHighestScore = $highestScores['z_mathematics2'];
                        $mathLowestScore = $lowestScores['z_mathematics2'];

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
                        $f_mathHighestScore = $highestScores['z_f_math2'];
                        $f_mathLowestScore = $lowestScores['z_f_math2'];

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
                        $bioHighestScore = $highestScores['z_biology2'];
                        $bioLowestScore = $lowestScores['z_biology2'];

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
                    <td colspan="6" style="text-align: left;">Agric. Science</td>
                    <?php
                    if (mysqli_num_rows($agricResultResult) > 0) {
                        mysqli_data_seek($agricResultResult, 0);
                        $agricHighestScore = $highestScores['z_agric2'];
                        $agricLowestScore = $lowestScores['z_agric2'];

                        while ($agricSubjectResult = mysqli_fetch_assoc($agricResultResult)) {
                    ?>
                            <td><?php echo ($agricSubjectResult['midterm_score'] != 0) ? $agricSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($agricSubjectResult['exam_score'] != 0) ? $agricSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($agricSubjectResult['terminal_score'] != 0) ? $agricSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $agricHighestScore; ?></td>
                            <td><?php echo $agricLowestScore; ?></td>
                            <td><?php echo $agricSubjectResult['student_grade']; ?></td>
                            <td><?php echo $agricTeacherInitial; ?></td>
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
                        $ecoHighestScore = $highestScores['z_econs2'];
                        $ecoLowestScore = $lowestScores['z_econs2'];

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
                    <td colspan="6" style="text-align: left;">Chemistry</td>
                    <?php
                    if (mysqli_num_rows($cheResultResult) > 0) {
                        mysqli_data_seek($cheResultResult, 0);
                        $cheHighestScore = $highestScores['z_chemistry2'];
                        $cheLowestScore = $lowestScores['z_chemistry2'];

                        while ($cheSubjectResult = mysqli_fetch_assoc($cheResultResult)) {
                    ?>
                            <td><?php echo ($cheSubjectResult['midterm_score'] != 0) ? $cheSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($cheSubjectResult['exam_score'] != 0) ? $cheSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($cheSubjectResult['terminal_score'] != 0) ? $cheSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $cheHighestScore; ?></td>
                            <td><?php echo $cheLowestScore; ?></td>
                            <td><?php echo $cheSubjectResult['student_grade']; ?></td>
                            <td><?php echo $chemistryTeacherInitial; ?></td>
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
                    <td colspan="6" style="text-align: left;">Physics</td>
                    <?php
                    if (mysqli_num_rows($phyResultResult) > 0) {
                        mysqli_data_seek($phyResultResult, 0);
                        $phyHighestScore = $highestScores['z_physics2'];
                        $phyLowestScore = $lowestScores['z_physics2'];

                        while ($phySubjectResult = mysqli_fetch_assoc($phyResultResult)) {
                    ?>
                            <td><?php echo ($phySubjectResult['midterm_score'] != 0) ? $phySubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($phySubjectResult['exam_score'] != 0) ? $phySubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($phySubjectResult['terminal_score'] != 0) ? $phySubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $phyHighestScore; ?></td>
                            <td><?php echo $phyLowestScore; ?></td>
                            <td><?php echo $phySubjectResult['student_grade']; ?></td>
                            <td><?php echo $physicsTeacherInitial; ?></td>
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
                        $dpHighestScore = $highestScores['z_dp2'];
                        $dpLowestScore = $lowestScores['z_dp2'];

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
                        $civicHighestScore = $highestScores['z_civic2'];
                        $civicLowestScore = $lowestScores['z_civic2'];

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
                    <td colspan="6" style="text-align: left;">C.C.P</td>
                    <?php
                    if (mysqli_num_rows($catResultResult) > 0) {
                        mysqli_data_seek($catResultResult, 0);
                        $catHighestScore = $highestScores['z_catering2'];
                        $catLowestScore = $lowestScores['z_catering2'];

                        while ($catSubjectResult = mysqli_fetch_assoc($catResultResult)) {
                    ?>
                            <td><?php echo ($catSubjectResult['midterm_score'] != 0) ? $catSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($catSubjectResult['exam_score'] != 0) ? $catSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($catSubjectResult['terminal_score'] != 0) ? $catSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $catHighestScore; ?></td>
                            <td><?php echo $catLowestScore; ?></td>
                            <td><?php echo $catSubjectResult['student_grade']; ?></td>
                            <td><?php echo $cateringTeacherInitial; ?></td>
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
                    <td colspan="6" style="text-align: left;">Tech. Drawing</td>
                    <?php
                    if (mysqli_num_rows($tecResultResult) > 0) {
                        mysqli_data_seek($tecResultResult, 0);
                        $tecHighestScore = $highestScores['z_techdraw2'];
                        $tecLowestScore = $lowestScores['z_techdraw2'];

                        while ($tecSubjectResult = mysqli_fetch_assoc($tecResultResult)) {
                    ?>
                            <td><?php echo ($tecSubjectResult['midterm_score'] != 0) ? $tecSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($tecSubjectResult['exam_score'] != 0) ? $tecSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($tecSubjectResult['terminal_score'] != 0) ? $tecSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $tecHighestScore; ?></td>
                            <td><?php echo $tecLowestScore; ?></td>
                            <td><?php echo $tecSubjectResult['student_grade']; ?></td>
                            <td><?php echo $techdrawTeacherInitial; ?></td>
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
                        $yorHighestScore = $highestScores['z_yoruba2'];
                        $yorLowestScore = $lowestScores['z_yoruba2'];

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
                        <td>Punctuality</td>
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
                        <td>Politeness</td>
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