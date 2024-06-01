<?php
include 'connect.php';
include './ca_test2/displayfiles.php';
include './ca_test2/highest_score.php';
include './ca_test2/lowest_score.php';
include 'teacher_initialdisplay.php';
include 'noinclass.php'
?>
<!doctype html>
<html lang="en">

<head>

    <head>
        <!-- Other meta tags, CSS links, etc. -->

        <!-- Include jQuery library -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            <h6 style="font-weight: bold;">2ND TERM <?php echo !empty($studentDetails['A_session']) ? $studentDetails['A_session'] : 'N/A'; ?></h6>

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


    <div class="mywrap my-4">
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
                        $englishHighestScore = $highestScores['test_english2'];
                        $englishLowestScore = $lowestScores['test_english2'];

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
                        $mathHighestScore = $highestScores['test_mathematics2'];
                        $mathLowestScore = $lowestScores['test_mathematics2'];

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
                        $f_mathHighestScore = $highestScores['test_f_math2'];
                        $f_mathLowestScore = $lowestScores['test_f_math2'];

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
                        $bioHighestScore = $highestScores['test_biology2'];
                        $bioLowestScore = $lowestScores['test_biology2'];

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
                    <td  style="text-align: left;">Economics</td>
                    <?php
                    if (mysqli_num_rows($ecoResultResult) > 0) {
                        mysqli_data_seek($ecoResultResult, 0);
                        $ecoHighestScore = $highestScores['test_econs2'];
                        $ecoLowestScore = $lowestScores['test_econs2'];

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
                    <td  style="text-align: left;">Commerce</td>
                    <?php
                    if (mysqli_num_rows($comResultResult) > 0) {
                        mysqli_data_seek($comResultResult, 0);
                        $comHighestScore = $highestScores['test_commerce2'];
                        $comLowestScore = $lowestScores['test_commerce2'];

                        while ($comSubjectResult = mysqli_fetch_assoc($comResultResult)) {
                    ?>
                            <td><?php echo ($comSubjectResult['class_exercise'] != 0) ? $comSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($comSubjectResult['assignment'] != 0) ? $comSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($comSubjectResult['test'] != 0) ? $comSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($comSubjectResult['total_score'] != 0) ? $comSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $comHighestScore; ?></td>
                            <td><?php echo $comLowestScore; ?></td>
                            <td><?php echo $comSubjectResult['student_grade']; ?></td>
                            <td><?php echo $commerceTeacherInitial; ?></td>
                    <?php
                        }
                    } else {
                        for ($i = 0; $i < 8; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tr>
                
                </tr>
                <tr>
                    <td  style="text-align: left;">Data Processing</td>
                    <?php
                    if (mysqli_num_rows($dpResultResult) > 0) {
                        mysqli_data_seek($dpResultResult, 0);
                        $dpHighestScore = $highestScores['test_dp2'];
                        $dpLowestScore = $lowestScores['test_dp2'];

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
                        $civicHighestScore = $highestScores['test_civic2'];
                        $civicLowestScore = $lowestScores['test_civic2'];

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
                    <td  style="text-align: left;">Government</td>
                    <?php
                    if (mysqli_num_rows($govResultResult) > 0) {
                        mysqli_data_seek($govResultResult, 0);
                        $govHighestScore = $highestScores['test_government2'];
                        $govLowestScore = $lowestScores['test_government2'];

                        while ($govSubjectResult = mysqli_fetch_assoc($govResultResult)) {
                    ?>
                            <td><?php echo ($govSubjectResult['class_exercise'] != 0) ? $govSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($govSubjectResult['assignment'] != 0) ? $govSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($govSubjectResult['test'] != 0) ? $govSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($govSubjectResult['total_score'] != 0) ? $govSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $govHighestScore; ?></td>
                            <td><?php echo $govLowestScore; ?></td>
                            <td><?php echo $govSubjectResult['student_grade']; ?></td>
                            <td><?php echo $governmentTeacherInitial; ?></td>
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
                    <td  style="text-align: left;">F.Accounting</td>
                    <?php
                    if (mysqli_num_rows($accResultResult) > 0) {
                        mysqli_data_seek($accResultResult, 0);
                        $accHighestScore = $highestScores['test_accounting2'];
                        $accLowestScore = $lowestScores['test_accounting2'];

                        while ($accSubjectResult = mysqli_fetch_assoc($accResultResult)) {
                    ?>
                            <td><?php echo ($accSubjectResult['class_exercise'] != 0) ? $accSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($accSubjectResult['assignment'] != 0) ? $accSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($accSubjectResult['test'] != 0) ? $accSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($accSubjectResult['total_score'] != 0) ? $accSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $accHighestScore; ?></td>
                            <td><?php echo $accLowestScore; ?></td>
                            <td><?php echo $accSubjectResult['student_grade']; ?></td>
                            <td><?php echo $accountingTeacherInitial; ?></td>
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
                    <td  style="text-align: left;">History</td>
                    <?php
                    if (mysqli_num_rows($histResultResult) > 0) {
                        mysqli_data_seek($histResultResult, 0);
                        $histHighestScore = $highestScores['test_history2'];
                        $histLowestScore = $lowestScores['test_history2'];

                        while ($histSubjectResult = mysqli_fetch_assoc($histResultResult)) {
                    ?>
                            <td><?php echo ($histSubjectResult['class_exercise'] != 0) ? $histSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($histSubjectResult['assignment'] != 0) ? $histSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($histSubjectResult['test'] != 0) ? $histSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($histSubjectResult['total_score'] != 0) ? $histSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $histHighestScore; ?></td>
                            <td><?php echo $histLowestScore; ?></td>
                            <td><?php echo $histSubjectResult['student_grade']; ?></td>
                            <td><?php echo $historyTeacherInitial; ?></td>
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
                    <td  style="text-align: left;">Yoruba</td>
                    <?php
                    if (mysqli_num_rows($yorResultResult) > 0) {
                        mysqli_data_seek($yorResultResult, 0);
                        $yorHighestScore = $highestScores['test_yoruba2'];
                        $yorLowestScore = $lowestScores['test_yoruba2'];

                        while ($yorSubjectResult = mysqli_fetch_assoc($yorResultResult)) {
                    ?>
                            <td><?php echo ($yorSubjectResult['class_exercise'] != 0) ? $yorSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($yorSubjectResult['assignment'] != 0) ? $yorSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($yorSubjectResult['test'] != 0) ? $yorSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($yorSubjectResult['total_score'] != 0) ? $yorSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $yorHighestScore; ?></td>
                            <td><?php echo $yorLowestScore; ?></td>
                            <td><?php echo $yorSubjectResult['student_grade']; ?></td>
                            <td><?php echo $yorubaTeacherInitial; ?></td>
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