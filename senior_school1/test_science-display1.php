<?php
include 'connect.php';
include './ca_test1/displayfiles.php';
include './ca_test1/highest_score.php';
include './ca_test1/lowest_score.php';
include 'teacher_initialdisplay.php';
include 'noinclass.php'
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
    <link rel="stylesheet" href="./css/style1.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
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
    <button class="btn btn-danger back"><a href="senior1.php">Back</a></button>
    </div>

    <div class="containter" style="display: flex;">
        <div class="header mt-0" style="flex: 85%;">
            <h1 style="font-weight: bold;">CORNERSTONE COLLEGE</h1>
            <h5 style="font-weight: bold;">OBANTOKO, ABEOKUTA, OGUN STATE</h5>
            <h6 style="font-weight: bold;">1ST TERM <?php echo !empty($studentDetails['A_session']) ? $studentDetails['A_session'] : 'N/A'; ?></h6>

        </div>
        <div class="">
        <img src="./img/logo.png" alt="bagde" width="200" height="140">
        </div>
    </div>
    <div class="student my-4">
        <!-- Display student details -->
        <h5>Senior Secondary School Student's Progress Report</h5>
        <div style="display: flex;">
            <div style="flex: 30%">
                <?php if (empty($studentDetails['name']) || empty($studentDetails['admission_no'])) { ?>
                    <p style="color: red;">Please fill in any scores for mathematics to display name and admission number. You can update it later.</p>
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


    <div class="mywrap my-2 mb-4">
        <div class="table-wrapper1">
            <table style="border: 2px solid;">
                <tr>
                    <th></th>
                    <th class="rotated_cell">
                        <div class="rotate_text">Class Exercise</div>
                    </th>
                    <th class="rotated_cell">
                        <div class="rotate_text">Assignment</div>
                    </th>
                    <th class="rotated_cell">
                        <div class="rotate_text">Test</div>
                    </th>
                    <th class="rotated_cell">
                        <div class="rotate_text">Total Score</div>
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
                    <td style="text-align: left;">MARKS OBTAINED</td>
                    <td>05</td>
                    <td>05</td>
                    <td>20</td>
                    <td>30</td>
                    <td>30</td>
                    <td>30</td>
                    <td></td>
                    <td></td>
                </tr>
                <!-- subjects -->
               <tr>
                    <td  style="text-align: left;">English</td>
                    <?php
                    if (mysqli_num_rows($engResultResult) > 0) {
                        mysqli_data_seek($engResultResult, 0);
                        $englishHighestScore = $highestScores['test_english1'];
                        $englishLowestScore = $lowestScores['test_english1'];

                        while ($engSubjectResult = mysqli_fetch_assoc($engResultResult)) {
                    ?>
                            <td><?php echo ($engSubjectResult['class_exercise'] != 0) ? $engSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($engSubjectResult['assignment'] != 0) ? $engSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($engSubjectResult['test'] != 0) ? $engSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($engSubjectResult['total_score'] != 0) ? $engSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $englishHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $englishLowestScore; ?></td>
                            <td><?php echo $engSubjectResult['student_grade']; ?></td>
                            <td><?php echo $englishTeacherInitial; ?></td> <!-- Display the English teacher initial -->
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 8; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td  style="text-align: left;">Mathematics</td>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        mysqli_data_seek($result, 0);
                        $mathHighestScore = $highestScores['test_mathematics1'];
                        $mathLowestScore = $lowestScores['test_mathematics1'];

                        while ($mathResult = mysqli_fetch_assoc($result)) {
                    ?>
                            <td><?php echo ($mathResult['class_exercise'] != 0) ? $mathResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($mathResult['assignment'] != 0) ? $mathResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($mathResult['test'] != 0) ? $mathResult['test'] : "-"; ?></td>
                            <td><?php echo ($mathResult['total_score'] != 0) ? $mathResult['total_score'] : "-"; ?></td>
                            <td><?php echo $mathHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $mathLowestScore; ?></td>
                            <td><?php echo $mathResult['student_grade']; ?></td>
                            <td><?php echo $mathTeacherInitial; ?></td> <!-- Display the Mathematics teacher initial -->
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 8; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <!-- for english -->
                <tr>
                    <td  style="text-align: left;">F/Mathematics</td>
                    <?php
                    if (mysqli_num_rows($f_mathResultResult) > 0) {
                        mysqli_data_seek($f_mathResultResult, 0);
                        $f_mathHighestScore = $highestScores['test_f_math1'];
                        $f_mathLowestScore = $lowestScores['test_f_math1'];

                        while ($f_mathSubjectResult = mysqli_fetch_assoc($f_mathResultResult)) {
                    ?>
                            <td><?php echo ($f_mathSubjectResult['class_exercise'] != 0) ? $f_mathSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($f_mathSubjectResult['assignment'] != 0) ? $f_mathSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($f_mathSubjectResult['test'] != 0) ? $f_mathSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($f_mathSubjectResult['total_score'] != 0) ? $f_mathSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $f_mathHighestScore; ?></td>
                            <td><?php echo $f_mathLowestScore; ?></td>
                            <td><?php echo $f_mathSubjectResult['student_grade']; ?></td>
                            <td><?php echo $f_mathTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 8; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <!-- for english -->
                <tr>
                    <td  style="text-align: left;">Biology</td>
                    <?php
                    if (mysqli_num_rows($bioResultResult) > 0) {
                        mysqli_data_seek($bioResultResult, 0);
                        $bioHighestScore = $highestScores['test_biology1'];
                        $bioLowestScore = $lowestScores['test_biology1'];

                        while ($bioSubjectResult = mysqli_fetch_assoc($bioResultResult)) {
                    ?>
                            <td><?php echo ($bioSubjectResult['class_exercise'] != 0) ? $bioSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($bioSubjectResult['assignment'] != 0) ? $bioSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($bioSubjectResult['test'] != 0) ? $bioSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($bioSubjectResult['total_score'] != 0) ? $bioSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $bioHighestScore; ?></td>
                            <td><?php echo $bioLowestScore; ?></td>
                            <td><?php echo $bioSubjectResult['student_grade']; ?></td>
                            <td><?php echo $biologyTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 8; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td  style="text-align: left;">Agric. Science</td>
                    <?php
                    if (mysqli_num_rows($agricResultResult) > 0) {
                        mysqli_data_seek($agricResultResult, 0);
                        $agricHighestScore = $highestScores['test_agric1'];
                        $agricLowestScore = $lowestScores['test_agric1'];

                        while ($agricSubjectResult = mysqli_fetch_assoc($agricResultResult)) {
                    ?>
                            <td><?php echo ($agricSubjectResult['class_exercise'] != 0) ? $agricSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($agricSubjectResult['assignment'] != 0) ? $agricSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($agricSubjectResult['test'] != 0) ? $agricSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($agricSubjectResult['total_score'] != 0) ? $agricSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $agricHighestScore; ?></td>
                            <td><?php echo $agricLowestScore; ?></td>
                            <td><?php echo $agricSubjectResult['student_grade']; ?></td>
                            <td><?php echo $agricTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 8; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td  style="text-align: left;">Economics</td>
                    <?php
                    if (mysqli_num_rows($ecoResultResult) > 0) {
                        mysqli_data_seek($ecoResultResult, 0);
                        $ecoHighestScore = $highestScores['test_econs1'];
                        $ecoLowestScore = $lowestScores['test_econs1'];

                        while ($ecoSubjectResult = mysqli_fetch_assoc($ecoResultResult)) {
                    ?>
                            <td><?php echo ($ecoSubjectResult['class_exercise'] != 0) ? $ecoSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($ecoSubjectResult['assignment'] != 0) ? $ecoSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($ecoSubjectResult['test'] != 0) ? $ecoSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($ecoSubjectResult['total_score'] != 0) ? $ecoSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $ecoHighestScore; ?></td>
                            <td><?php echo $ecoLowestScore; ?></td>
                            <td><?php echo $ecoSubjectResult['student_grade']; ?></td>
                            <td><?php echo $econsTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 8; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td  style="text-align: left;">Chemistry</td>
                    <?php
                    if (mysqli_num_rows($cheResultResult) > 0) {
                        mysqli_data_seek($cheResultResult, 0);
                        $cheHighestScore = $highestScores['test_chemistry1'];
                        $cheLowestScore = $lowestScores['test_chemistry1'];

                        while ($cheSubjectResult = mysqli_fetch_assoc($cheResultResult)) {
                    ?>
                            <td><?php echo ($cheSubjectResult['class_exercise'] != 0) ? $cheSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($cheSubjectResult['assignment'] != 0) ? $cheSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($cheSubjectResult['test'] != 0) ? $cheSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($cheSubjectResult['total_score'] != 0) ? $cheSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $cheHighestScore; ?></td>
                            <td><?php echo $cheLowestScore; ?></td>
                            <td><?php echo $cheSubjectResult['student_grade']; ?></td>
                            <td><?php echo $chemistryTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 8; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td  style="text-align: left;">Physics</td>
                    <?php
                    if (mysqli_num_rows($phyResultResult) > 0) {
                        mysqli_data_seek($phyResultResult, 0);
                        $phyHighestScore = $highestScores['test_physics1'];
                        $phyLowestScore = $lowestScores['test_physics1'];

                        while ($phySubjectResult = mysqli_fetch_assoc($phyResultResult)) {
                    ?>
                            <td><?php echo ($phySubjectResult['class_exercise'] != 0) ? $phySubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($phySubjectResult['assignment'] != 0) ? $phySubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($phySubjectResult['test'] != 0) ? $phySubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($phySubjectResult['total_score'] != 0) ? $phySubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $phyHighestScore; ?></td>
                            <td><?php echo $phyLowestScore; ?></td>
                            <td><?php echo $phySubjectResult['student_grade']; ?></td>
                            <td><?php echo $physicsTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 8; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td  style="text-align: left;">Data Processing</td>
                    <?php
                    if (mysqli_num_rows($dpResultResult) > 0) {
                        mysqli_data_seek($dpResultResult, 0);
                        $dpHighestScore = $highestScores['test_dp1'];
                        $dpLowestScore = $lowestScores['test_dp1'];

                        while ($dpSubjectResult = mysqli_fetch_assoc($dpResultResult)) {
                    ?>
                            <td><?php echo ($dpSubjectResult['class_exercise'] != 0) ? $dpSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($dpSubjectResult['assignment'] != 0) ? $dpSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($dpSubjectResult['test'] != 0) ? $dpSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($dpSubjectResult['total_score'] != 0) ? $dpSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $dpHighestScore; ?></td>
                            <td><?php echo $dpLowestScore; ?></td>
                            <td><?php echo $dpSubjectResult['student_grade']; ?></td>
                            <td><?php echo $dpTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 8; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td  style="text-align: left;">Civic Edu. </td>
                    <?php
                    if (mysqli_num_rows($civicResultResult) > 0) {
                        mysqli_data_seek($civicResultResult, 0);
                        $civicHighestScore = $highestScores['test_civic1'];
                        $civicLowestScore = $lowestScores['test_civic1'];

                        while ($civicSubjectResult = mysqli_fetch_assoc($civicResultResult)) {
                    ?>
                            <td><?php echo ($civicSubjectResult['class_exercise'] != 0) ? $civicSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($civicSubjectResult['assignment'] != 0) ? $civicSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($civicSubjectResult['test'] != 0) ? $civicSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($civicSubjectResult['total_score'] != 0) ? $civicSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $civicHighestScore; ?></td>
                            <td><?php echo $civicLowestScore; ?></td>
                            <td><?php echo $civicSubjectResult['student_grade']; ?></td>
                            <td><?php echo $civicTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 8; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                
                <tr>
                    <td  style="text-align: left;">C.C.P</td>
                    <?php
                    if (mysqli_num_rows($catResultResult) > 0) {
                        mysqli_data_seek($catResultResult, 0);
                        $catHighestScore = $highestScores['test_catering1'];
                        $catLowestScore = $lowestScores['test_catering1'];

                        while ($catSubjectResult = mysqli_fetch_assoc($catResultResult)) {
                    ?>
                            <td><?php echo ($catSubjectResult['class_exercise'] != 0) ? $catSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($catSubjectResult['assignment'] != 0) ? $catSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($catSubjectResult['test'] != 0) ? $catSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($catSubjectResult['total_score'] != 0) ? $catSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $catHighestScore; ?></td>
                            <td><?php echo $catLowestScore; ?></td>
                            <td><?php echo $catSubjectResult['student_grade']; ?></td>
                            <td><?php echo $cateringTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 8; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td  style="text-align: left;">Tech. Drawing</td>
                    <?php
                    if (mysqli_num_rows($tecResultResult) > 0) {
                        mysqli_data_seek($tecResultResult, 0);
                        $tecHighestScore = $highestScores['test_techdraw1'];
                        $tecLowestScore = $lowestScores['test_techdraw1'];

                        while ($tecSubjectResult = mysqli_fetch_assoc($tecResultResult)) {
                    ?>
                            <td><?php echo ($tecSubjectResult['class_exercise'] != 0) ? $tecSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($tecSubjectResult['assignment'] != 0) ? $tecSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($tecSubjectResult['test'] != 0) ? $tecSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($tecSubjectResult['total_score'] != 0) ? $tecSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $tecHighestScore; ?></td>
                            <td><?php echo $tecLowestScore; ?></td>
                            <td><?php echo $tecSubjectResult['student_grade']; ?></td>
                            <td><?php echo $techdrawTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 8; $i++) {
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

    <div class="teacherbox mt-1" style="border: 2px solid; display: flex;">
        <div style="flex: 55%;" class="mt-0">
            <p><strong> Teacher's comment :
                    <?php if (!empty($teaResult['teacher_comments'])) echo $teaResult['teacher_comments']; ?></strong> </p>
        </div>
        <div style="flex: 40%;" class="my-1">
            <?php if (!empty($teaResult['teacher_name']) || !empty($teaResult['date'])) : ?>
                <p style="display: inline-block"><strong> Teacher's Name:
                        <?php echo ucwords(strtolower($teaResult['teacher_name'])); ?> </strong></p><br>
                <p style="display: inline-block"><strong> Date:
                        <?php echo date('d/m/y', strtotime($teaResult['date'])); ?></strong></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="teacherbox" style="border: 2px solid; display: flex;">
        <div style="flex: 55%;">
            <p><strong> Principal's Remark:
                    <?php if (!empty($othResult['principal_remarks'])) echo $othResult['principal_remarks']; ?></strong></p>
        </div>
        <div style="flex: 40%;">
            <?php if (!empty($othResult['principal_name']) || !empty($othResult['date'])) : ?>
                <p style="display: inline-block"><strong> Principal's Name:
                        <?php echo ucwords(strtolower($othResult['principal_name'])); ?></strong></p><br>
                <p style="display: inline-block"> <strong>Date:
                        <?php echo date('d/m/y', strtotime($othResult['date'])); ?></strong></p>
            <?php endif; ?>
        </div>
    </div>

</body>



</html>