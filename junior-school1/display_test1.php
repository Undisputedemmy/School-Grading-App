<?php
include 'connect.php';
include './ca_test1/displayfiles.php';
include './ca_test1/position.php';
include './ca_test1/lowest_percentage.php';
include './ca_test1/highest_score.php';
include './ca_test1/lowest_score.php';
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
        <div class="header mt-0" style="flex: 85%;">
            <h2 style="font-weight: bold;">CORNERSTONE COLLEGE</h2>
            <h5 style="font-weight: bold;">OBANTOKO, ABEOKUTA, OGUN STATE</h5>
            <h6 style="font-weight: bold;">1ST TERM <?php echo !empty($studentDetails['A_session']) ? $studentDetails['A_session'] : 'N/A'; ?></h6>

        </div>
        <div class="">
            <img src="./img/logo.png" alt="bagde" width="200" height="140">
        </div>
    </div>
    <div class="student my-1 mb-2">
        <!-- Display student details -->
        <h5>Upper Basic Student's Progress Report</h5>
        <div style="display: flex;">
            <div style="flex: 32%">
                <?php if (empty($studentDetails['name']) || empty($studentDetails['admission_no'])) { ?>
                    <p style="color: red;">Please fill in any scores for mathematics to display name and admission number. You can update it later.</p>
                <?php } else { ?>
                    <p>Name: <?php echo $studentDetails['name']; ?></p><br>
                    <p>Adm No: <?php echo $studentDetails['admission_no']; ?></p>
                    <?php if (!empty($leastOverallPercentage)) : ?>
                    <br>
                    <p style="font-size: 16px;">Lowest percentage: <?php echo $leastOverallPercentage; ?> </p>
                <?php endif; ?>

                <?php } ?>

            </div>
            <div style="flex: 20%">
                <p>Class: <?php echo $studentDetails['class']; ?></p>
                </p><br>
                <p>No in class: <?php echo $totalStudents; ?></p><br>
                <p style="font-size: 16px;">Overall Score: <?php echo $totalScore ?> </p>
                
            </div>
            
                <p>Percentage: <?php echo $formattedPercentage ?> </p>
                
               
            </div>
        </div>
    </div>

    <div class="mywrap my-2 mb-2">
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
                    <td style="text-align: left;">English</td>
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
                            <td><?php echo $englishHighestScore; ?></td>
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
                    <td style="text-align: left;">Mathematics</td>
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
                    <td style="text-align: left;">B.S.T</td>
                    <?php
                    if (mysqli_num_rows($bstResultResult) > 0) {
                        mysqli_data_seek($bstResultResult, 0);
                        $bstHighestScore = $highestScores['test_bst1'];
                        $bstLowestScore = $lowestScores['test_bst1'];

                        while ($bstSubjectResult = mysqli_fetch_assoc($bstResultResult)) {
                    ?>
                            <td><?php echo ($bstSubjectResult['class_exercise'] != 0) ? $bstSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($bstSubjectResult['assignment'] != 0) ? $bstSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($bstSubjectResult['test'] != 0) ? $bstSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($bstSubjectResult['total_score'] != 0) ? $bstSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $bstHighestScore; ?></td>
                            <td><?php echo $bstLowestScore; ?></td>
                            <td><?php echo $bstSubjectResult['student_grade']; ?></td>
                            <td><?php echo $bstTeacherInitial; ?></td>
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
                    <td style="text-align: left;">P.V.S</td>
                    <?php
                    if (mysqli_num_rows($pvsResultResult) > 0) {
                        mysqli_data_seek($pvsResultResult, 0);
                        $pvsHighestScore = $highestScores['test_pvs1'];
                        $pvsLowestScore = $lowestScores['test_pvs1'];

                        while ($pvsSubjectResult = mysqli_fetch_assoc($pvsResultResult)) {
                    ?>
                            <td><?php echo ($pvsSubjectResult['class_exercise'] != 0) ? $pvsSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($pvsSubjectResult['assignment'] != 0) ? $pvsSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($pvsSubjectResult['test'] != 0) ? $pvsSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($pvsSubjectResult['total_score'] != 0) ? $pvsSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $pvsHighestScore; ?></td>
                            <td><?php echo $pvsLowestScore; ?></td>
                            <td><?php echo $pvsSubjectResult['student_grade']; ?></td>
                            <td><?php echo $pvsTeacherInitial; ?></td>
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
                    <td style="text-align: left;">N.V</td>
                    <?php
                    if (mysqli_num_rows($nvResultResult) > 0) {
                        mysqli_data_seek($nvResultResult, 0);
                        $nvHighestScore = $highestScores['test_nv1'];
                        $nvLowestScore = $lowestScores['test_nv1'];

                        while ($nvSubjectResult = mysqli_fetch_assoc($nvResultResult)) {
                    ?>
                            <td><?php echo ($nvSubjectResult['class_exercise'] != 0) ? $nvSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($nvSubjectResult['assignment'] != 0) ? $nvSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($nvSubjectResult['test'] != 0) ? $nvSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($nvSubjectResult['total_score'] != 0) ? $nvSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $nvHighestScore; ?></td>
                            <td><?php echo $nvLowestScore; ?></td>
                            <td><?php echo $nvSubjectResult['student_grade']; ?></td>
                            <td><?php echo $nvTeacherInitial; ?></td>
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
                    <td style="text-align: left;">C.R.S</td>
                    <?php
                    if (mysqli_num_rows($crsResultResult) > 0) {
                        mysqli_data_seek($crsResultResult, 0);
                        $crsHighestScore = $highestScores['test_crs1'];
                        $crsLowestScore = $lowestScores['test_crs1'];

                        while ($crsSubjectResult = mysqli_fetch_assoc($crsResultResult)) {
                    ?>
                            <td><?php echo ($crsSubjectResult['class_exercise'] != 0) ? $crsSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($crsSubjectResult['assignment'] != 0) ? $crsSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($crsSubjectResult['test'] != 0) ? $crsSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($crsSubjectResult['total_score'] != 0) ? $crsSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $crsHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $crsLowestScore; ?></td>
                            <td><?php echo $crsSubjectResult['student_grade']; ?></td>
                            <td><?php echo $crsTeacherInitial; ?></td>
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
                    <td style="text-align: left;">Business Stu.</td>
                    <?php
                    if (mysqli_num_rows($busResultResult) > 0) {
                        mysqli_data_seek($busResultResult, 0);
                        $busHighestScore = $highestScores['test_business1'];
                        $busLowestScore = $lowestScores['test_business1'];

                        while ($busSubjectResult = mysqli_fetch_assoc($busResultResult)) {
                    ?>
                            <td><?php echo ($busSubjectResult['class_exercise'] != 0) ? $busSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($busSubjectResult['assignment'] != 0) ? $busSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($busSubjectResult['test'] != 0) ? $busSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($busSubjectResult['total_score'] != 0) ? $busSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $busHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $busLowestScore; ?></td>
                            <td><?php echo $busSubjectResult['student_grade']; ?></td>
                            <td><?php echo $busTeacherInitial; ?></td>
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
                    <td style="text-align: left;">History</td>
                    <?php
                    if (mysqli_num_rows($histResultResult) > 0) {
                        mysqli_data_seek($histResultResult, 0);
                        $histHighestScore = $highestScores['test_history1'];
                        $histLowestScore = $lowestScores['test_history1'];

                        while ($histSubjectResult = mysqli_fetch_assoc($histResultResult)) {
                    ?>
                            <td><?php echo ($histSubjectResult['class_exercise'] != 0) ? $histSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($histSubjectResult['assignment'] != 0) ? $histSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($histSubjectResult['test'] != 0) ? $histSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($histSubjectResult['total_score'] != 0) ? $histSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $histHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $histLowestScore; ?></td>
                            <td><?php echo $histSubjectResult['student_grade']; ?></td>
                            <td><?php echo $histTeacherInitial; ?></td>
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
                    <td style="text-align: left;">C.C.A</td>
                    <?php
                    if (mysqli_num_rows($ccaResultResult) > 0) {
                        mysqli_data_seek($ccaResultResult, 0);
                        $ccaHighestScore = $highestScores['test_cca1'];
                        $ccaLowestScore = $lowestScores['test_cca1'];

                        while ($ccaSubjectResult = mysqli_fetch_assoc($ccaResultResult)) {
                    ?>
                            <td><?php echo ($ccaSubjectResult['class_exercise'] != 0) ? $ccaSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($ccaSubjectResult['assignment'] != 0) ? $ccaSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($ccaSubjectResult['test'] != 0) ? $ccaSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($ccaSubjectResult['total_score'] != 0) ? $ccaSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $ccaHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $ccaLowestScore; ?></td>
                            <td><?php echo $ccaSubjectResult['student_grade']; ?></td>
                            <td><?php echo $ccaTeacherInitial; ?></td>
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
                    <td style="text-align: left;">French</td>
                    <?php
                    if (mysqli_num_rows($frenchResultResult) > 0) {
                        mysqli_data_seek($frenchResultResult, 0);
                        $frenchHighestScore = $highestScores['test_french1'];
                        $frenchLowestScore = $lowestScores['test_french1'];

                        while ($frenchSubjectResult = mysqli_fetch_assoc($frenchResultResult)) {
                    ?>
                            <td><?php echo ($frenchSubjectResult['class_exercise'] != 0) ? $frenchSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($frenchSubjectResult['assignment'] != 0) ? $frenchSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($frenchSubjectResult['test'] != 0) ? $frenchSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($frenchSubjectResult['total_score'] != 0) ? $frenchSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $frenchHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $frenchLowestScore; ?></td>
                            <td><?php echo $frenchSubjectResult['student_grade']; ?></td>
                            <td><?php echo $frenchTeacherInitial; ?></td>
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
                    <td style="text-align: left;">Yoruba</td>
                    <?php
                    if (mysqli_num_rows($yorResultResult) > 0) {
                        mysqli_data_seek($yorResultResult, 0);
                        $yorHighestScore = $highestScores['test_yoruba1'];
                        $yorLowestScore = $lowestScores['test_yoruba1'];

                        while ($yorSubjectResult = mysqli_fetch_assoc($yorResultResult)) {
                    ?>
                            <td><?php echo ($yorSubjectResult['class_exercise'] != 0) ? $yorSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($yorSubjectResult['assignment'] != 0) ? $yorSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($yorSubjectResult['test'] != 0) ? $yorSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($yorSubjectResult['total_score'] != 0) ? $yorSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $yorHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $yorLowestScore; ?></td>
                            <td><?php echo $yorSubjectResult['student_grade']; ?></td>
                            <td><?php echo $yorTeacherInitial; ?></td>
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
                    <td style="text-align: left;">Art &amp; Craft</td>
                    <?php
                    if (mysqli_num_rows($artResultResult) > 0) {
                        mysqli_data_seek($artResultResult, 0);
                        $artHighestScore = $highestScores['test_artcraft1'];
                        $artLowestScore = $lowestScores['test_artcraft1'];

                        while ($artSubjectResult = mysqli_fetch_assoc($artResultResult)) {
                    ?>
                            <td><?php echo ($artSubjectResult['class_exercise'] != 0) ? $artSubjectResult['class_exercise'] : "-"; ?></td>
                            <td><?php echo ($artSubjectResult['assignment'] != 0) ? $artSubjectResult['assignment'] : "-"; ?></td>
                            <td><?php echo ($artSubjectResult['test'] != 0) ? $artSubjectResult['test'] : "-"; ?></td>
                            <td><?php echo ($artSubjectResult['total_score'] != 0) ? $artSubjectResult['total_score'] : "-"; ?></td>
                            <td><?php echo $artHighestScore; ?></td> <!-- Display the highest score here -->
                            <td><?php echo $artLowestScore; ?></td>
                            <td><?php echo $artSubjectResult['student_grade']; ?></td>
                            <td><?php echo $artcraftTeacherInitial; ?></td>
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
                        <td style="text-align: left;">25-30 - EXCELLENT</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">20-24 - VERY GOOD</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">15-19 - GOOD</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">10-14 - FAIR</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">0-9 - POOR</td>
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