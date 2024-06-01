<?php
include 'connect.php';
include './second_term/displayfiles.php';
include './second_term/position.php';
include './second_term/positions.php';
include './second_term/lowest_percentage.php';
include './second_term/highest_score.php';
include './second_term/lowest_score.php';
include 'noinclass.php';
include 'teacher_initialdisplay.php'

?>
<!doctype html>
<html lang="en">

<head>

    <head>
        <!-- Other meta tags, CSS links, etc. -->

        <!-- Include jQuery library -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/style1.css">

    <!-- Bootstrap CSS -->
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
    </div>
    <button class="btn btn-primary print-button" onclick="window.print()">Print Result</button>
    <button class="btn btn-danger back"><a href="junior1.php">Back</a></button>
    </div>

    <div class="containter" style="display: flex;">
        <div class="header mt-0" style="flex: 75%;">
            <h2 style="font-weight: bold;">CORNERSTONE COLLEGE</h2>
            <h5 style="font-weight: bold;">OBANTOKO, ABEOKUTA, OGUN STATE</h5>
            <h6 style="font-weight: bold;">2ND TERM <?php echo !empty($studentDetails['A_session']) ? $studentDetails['A_session'] : 'N/A'; ?></h6>

        </div>
        <div class="">
            <img src="./img/logo.png" alt="bagde" width="200" height="140">
        </div>
    </div>
    <div class="student my-1">
        <!-- Display student details -->
        <h5>Upper Basic Student's Progress Report</h5>
        <div style="display: flex;">
            <div style="flex: 32%">
                <?php if (empty($studentDetails['name']) || empty($studentDetails['admission_no'])) { ?>
                    <p style="color: red;">Please fill in any scores for mathematics to display name and admission number. You can update it later.</p>
                <?php } else { ?>
                    <p style="font-size: 15px;">Name: <?php echo $studentDetails['name']; ?></p><br>
                    <p style="font-size: 15px;">Adm No: <?php echo $studentDetails['admission_no']; ?></p>
                    <?php if (!empty($leastOverallPercentage)) : ?>
                        <br>
                        <p style="font-size: 15px;">Lowest percentage: <?php echo $leastOverallPercentage; ?> </p>
                    <?php endif; ?>

                <?php } ?>

            </div>
            <div style="flex: 20%">
                <p style="font-size: 15px;">Class: <?php echo $studentDetails['class']; ?></p>
                </p><br>
                <p style="font-size: 15px;">No in class: <?php echo $totalStudents; ?></p><br>
                <p style="font-size: 15px;">Overall Score: <?php echo $totalScore ?> </p>

            </div>
            <div style="flex: 15%">
                <p style="font-size: 15px;">Position:
                    <?php
                    
                        echo $ordinalRank
                    ?>
                </p><br>
                <p style="font-size: 15px;">Percentage: <?php echo $formattedPercentage ?> </p>


            </div>
        </div>
    </div>

    <div class="mywrap my-2 mb-1">
        <div class="table-wrapper1">
            <table style="border: 2px solid;">
                <tr>
                    <th></th>
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
                    <td style="text-align: left;">MARKS OBTAINED</td>
                    <td>30</td>
                    <td>70</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td></td>
                    <td></td>
                </tr>
                <!-- subjects -->
                <tr>
                    <td style="text-align: left;">English</td>
                    <?php
                    if (mysqli_num_rows($engResultResult) > 0) {
                        mysqli_data_seek($engResultResult, 0);
                        $englishHighestScore = $highestScores['english2'];
                        $englishLowestScore = $lowestScores['english2'];

                        while ($engSubjectResult = mysqli_fetch_assoc($engResultResult)) {
                    ?>
                            <td><?php echo ($engSubjectResult['midterm_score'] != 0) ? $engSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($engSubjectResult['exam_score'] != 0) ? $engSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($engSubjectResult['terminal_score'] != 0) ? $engSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $englishHighestScore; ?></td>
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
                    <td style="text-align: left;">Mathematics</td>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        mysqli_data_seek($result, 0);
                        $mathHighestScore = $highestScores['mathematics2'];
                        $mathLowestScore = $lowestScores['mathematics2'];

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

                <!-- for english -->
                <tr>
                    <td style="text-align: left;">B.S.T</td>
                    <?php
                    if (mysqli_num_rows($bstResultResult) > 0) {
                        mysqli_data_seek($bstResultResult, 0);
                        $bstHighestScore = $highestScores['bst2'];
                        $bstLowestScore = $lowestScores['bst2'];

                        while ($bstSubjectResult = mysqli_fetch_assoc($bstResultResult)) {
                    ?>
                            <td><?php echo ($bstSubjectResult['midterm_score'] != 0) ? $bstSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($bstSubjectResult['exam_score'] != 0) ? $bstSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($bstSubjectResult['terminal_score'] != 0) ? $bstSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $bstHighestScore; ?></td>
                            <td><?php echo $bstLowestScore; ?></td>
                            <td><?php echo $bstSubjectResult['student_grade']; ?></td>
                            <td><?php echo $bstTeacherInitial; ?></td>
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
                    <td style="text-align: left;">P.V.S</td>
                    <?php
                    if (mysqli_num_rows($pvsResultResult) > 0) {
                        mysqli_data_seek($pvsResultResult, 0);
                        $pvsHighestScore = $highestScores['pvs2'];
                        $pvsLowestScore = $lowestScores['pvs2'];

                        while ($pvsSubjectResult = mysqli_fetch_assoc($pvsResultResult)) {
                    ?>
                            <td><?php echo ($pvsSubjectResult['midterm_score'] != 0) ? $pvsSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($pvsSubjectResult['exam_score'] != 0) ? $pvsSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($pvsSubjectResult['terminal_score'] != 0) ? $pvsSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $pvsHighestScore; ?></td>
                            <td><?php echo $pvsLowestScore; ?></td>
                            <td><?php echo $pvsSubjectResult['student_grade']; ?></td>
                            <td><?php echo $pvsTeacherInitial; ?></td>
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
                    <td style="text-align: left;">N.V</td>
                    <?php
                    if (mysqli_num_rows($nvResultResult) > 0) {
                        mysqli_data_seek($nvResultResult, 0);
                        $nvHighestScore = $highestScores['nv2'];
                        $nvLowestScore = $lowestScores['nv2'];

                        while ($nvSubjectResult = mysqli_fetch_assoc($nvResultResult)) {
                    ?>
                            <td><?php echo ($nvSubjectResult['midterm_score'] != 0) ? $nvSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($nvSubjectResult['exam_score'] != 0) ? $nvSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($nvSubjectResult['terminal_score'] != 0) ? $nvSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $nvHighestScore; ?></td>
                            <td><?php echo $nvLowestScore; ?></td>
                            <td><?php echo $nvSubjectResult['student_grade']; ?></td>
                            <td><?php echo $nvTeacherInitial; ?></td>
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
                    <td style="text-align: left;">C.R.S</td>
                    <?php
                    if (mysqli_num_rows($crsResultResult) > 0) {
                        mysqli_data_seek($crsResultResult, 0);
                        $crsHighestScore = $highestScores['crs2'];
                        $crsLowestScore = $lowestScores['crs2'];

                        while ($crsSubjectResult = mysqli_fetch_assoc($crsResultResult)) {
                    ?>
                            <td><?php echo ($crsSubjectResult['midterm_score'] != 0) ? $crsSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($crsSubjectResult['exam_score'] != 0) ? $crsSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($crsSubjectResult['terminal_score'] != 0) ? $crsSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $crsHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $crsLowestScore; ?></td>
                            <td><?php echo $crsSubjectResult['student_grade']; ?></td>
                            <td><?php echo $crsTeacherInitial; ?></td>
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
                    <td style="text-align: left;">Business Stu.</td>
                    <?php
                    if (mysqli_num_rows($busResultResult) > 0) {
                        mysqli_data_seek($busResultResult, 0);
                        $busHighestScore = $highestScores['business2'];
                        $busLowestScore = $lowestScores['business2'];

                        while ($busSubjectResult = mysqli_fetch_assoc($busResultResult)) {
                    ?>
                            <td><?php echo ($busSubjectResult['midterm_score'] != 0) ? $busSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($busSubjectResult['exam_score'] != 0) ? $busSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($busSubjectResult['terminal_score'] != 0) ? $busSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $busHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $busLowestScore; ?></td>
                            <td><?php echo $busSubjectResult['student_grade']; ?></td>
                            <td><?php echo $busTeacherInitial; ?></td>
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
                    <td style="text-align: left;">History</td>
                    <?php
                    if (mysqli_num_rows($histResultResult) > 0) {
                        mysqli_data_seek($histResultResult, 0);
                        $histHighestScore = $highestScores['history2'];
                        $histLowestScore = $lowestScores['history2'];

                        while ($histSubjectResult = mysqli_fetch_assoc($histResultResult)) {
                    ?>
                            <td><?php echo ($histSubjectResult['midterm_score'] != 0) ? $histSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($histSubjectResult['exam_score'] != 0) ? $histSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($histSubjectResult['terminal_score'] != 0) ? $histSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $histHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $histLowestScore; ?></td>
                            <td><?php echo $histSubjectResult['student_grade']; ?></td>
                            <td><?php echo $histTeacherInitial; ?></td>
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
                    <td style="text-align: left;">C.C.A</td>
                    <?php
                    if (mysqli_num_rows($ccaResultResult) > 0) {
                        mysqli_data_seek($ccaResultResult, 0);
                        $ccaHighestScore = $highestScores['cca2'];
                        $ccaLowestScore = $lowestScores['cca2'];

                        while ($ccaSubjectResult = mysqli_fetch_assoc($ccaResultResult)) {
                    ?>
                            <td><?php echo ($ccaSubjectResult['midterm_score'] != 0) ? $ccaSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($ccaSubjectResult['exam_score'] != 0) ? $ccaSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($ccaSubjectResult['terminal_score'] != 0) ? $ccaSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $ccaHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $ccaLowestScore; ?></td>
                            <td><?php echo $ccaSubjectResult['student_grade']; ?></td>
                            <td><?php echo $ccaTeacherInitial; ?></td>
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
                    <td style="text-align: left;">French</td>
                    <?php
                    if (mysqli_num_rows($frenchResultResult) > 0) {
                        mysqli_data_seek($frenchResultResult, 0);
                        $frenchHighestScore = $highestScores['french2'];
                        $frenchLowestScore = $lowestScores['french2'];

                        while ($frenchSubjectResult = mysqli_fetch_assoc($frenchResultResult)) {
                    ?>
                            <td><?php echo ($frenchSubjectResult['midterm_score'] != 0) ? $frenchSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($frenchSubjectResult['exam_score'] != 0) ? $frenchSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($frenchSubjectResult['terminal_score'] != 0) ? $frenchSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $frenchHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $frenchLowestScore; ?></td>
                            <td><?php echo $frenchSubjectResult['student_grade']; ?></td>
                            <td><?php echo $frenchTeacherInitial; ?></td>
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
                    <td style="text-align: left;">Yoruba</td>
                    <?php
                    if (mysqli_num_rows($yorResultResult) > 0) {
                        mysqli_data_seek($yorResultResult, 0);
                        $yorHighestScore = $highestScores['yoruba2'];
                        $yorLowestScore = $lowestScores['yoruba2'];

                        while ($yorSubjectResult = mysqli_fetch_assoc($yorResultResult)) {
                    ?>
                            <td><?php echo ($yorSubjectResult['midterm_score'] != 0) ? $yorSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($yorSubjectResult['exam_score'] != 0) ? $yorSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($yorSubjectResult['terminal_score'] != 0) ? $yorSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $yorHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $yorLowestScore; ?></td>
                            <td><?php echo $yorSubjectResult['student_grade']; ?></td>
                            <td><?php echo $yorTeacherInitial; ?></td>
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
                    <td style="text-align: left;">Art &amp; Craft</td>
                    <?php
                    if (mysqli_num_rows($artResultResult) > 0) {
                        mysqli_data_seek($artResultResult, 0);
                        $artHighestScore = $highestScores['artcraft2'];
                        $artLowestScore = $lowestScores['artcraft2'];

                        while ($artSubjectResult = mysqli_fetch_assoc($artResultResult)) {
                    ?>
                            <td><?php echo ($artSubjectResult['midterm_score'] != 0) ? $artSubjectResult['midterm_score'] : "-"; ?></td>
                            <td><?php echo ($artSubjectResult['exam_score'] != 0) ? $artSubjectResult['exam_score'] : "-"; ?></td>
                            <td><?php echo ($artSubjectResult['terminal_score'] != 0) ? $artSubjectResult['terminal_score'] : "-"; ?></td>
                            <td><?php echo $artHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $artLowestScore; ?></td>
                            <td><?php echo $artSubjectResult['student_grade']; ?></td>
                            <td><?php echo $artcraftTeacherInitial; ?></td>
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
                        <td>Leadership</td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="craft1"><label for="craft1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="handwriting1"><label for="handwriting1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                    </tr>
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
                        <td>Games</td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="craft1"><label for="craft1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                        <td><input type="checkbox" id="handwriting1"><label for="handwriting1"></label></td>
                        <td><input type="checkbox" id="skills1"><label for="skills1"></label></td>
                    </tr>
                    <tr>
                        <td>Skill</td>
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
                    <p class="mt-2 mb-1" style="text-align: left;"> GRADE </p>
                    <!-- Second table content -->
                    <tr>
                        <td style="text-align: left;">70-100 - EXCELLENT</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">60-69 - VERY GOOD</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">50-59 - GOOD</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">40-49 - FAIR</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">0-39 - POOR</td>
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