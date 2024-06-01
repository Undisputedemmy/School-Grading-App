<?php
include 'connect.php';
include '../functions.php';

function moveStudentDetailsToCompleted($admissionNo, $session)
{
    global $con;

    // Retrieve the student details from the student_details table using the admission number
    $query = "SELECT * FROM student_details WHERE admission_no = '$admissionNo'";
    $result = mysqli_query($con, $query);

    // Check if the student exists in the student_details table
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the student details
        $row = mysqli_fetch_assoc($result);
        $studentId = $row['id'];
        $name = $row['name'];
        $class = $row['class'];
        $department = $row['department'];
        $session = $row['A_session'];

        // Insert the student details into the completed_student table
        $insertQuery = "INSERT INTO completed_student (student_id, name, admission_no, class, department, A_session)
                        VALUES ('$studentId', '$name', '$admissionNo', '$class', '$department', '$session')";
        $insertResult = mysqli_query($con, $insertQuery);

        if ($insertResult) {
            echo "Student with admission number $admissionNo moved to completed_student successfully<br>";
        } else {
            echo "Error moving student with admission number $admissionNo to completed_student: " . mysqli_error($con);
        }
    } else {
        echo "Student details not found in the student_details table";
    }
}

function moveStudentSubjectsToZTables($admissionNo, $session)
{
    global $con;

    // Get the student's ID from the student_details table using the admission number
    $getStudentIdSql = "SELECT id FROM student_details WHERE admission_no = '$admissionNo'";
    $getStudentIdResult = mysqli_query($con, $getStudentIdSql);

    if (!$getStudentIdResult || mysqli_num_rows($getStudentIdResult) === 0) {
        // Error: Student not found
        echo "Error: Student with admission number $admissionNo not found.";
        return;
    }

    $studentIdRow = mysqli_fetch_assoc($getStudentIdResult);
    $studentId = $studentIdRow['id'];

    // List of first term subjects
    $firstTermSubjects = ['mathematics1', 'english1', 'physics1', 'chemistry1', 'f_math1', 'biology1',
        'econs1', 'dp1', 'civic1', 'techdraw1', 'agric1', 'catering1', 'geographyi1', 'crs1', 'commerce1',
        'artcraft1', 'literature1', 'accounting1', 'government1', 'history1', 'french1', 'yoruba1'];

    // List of second term subjects
    $secondTermSubjects = ['mathematics2', 'english2', 'physics2', 'chemistry2', 'f_math2', 'biology2',
        'econs2', 'dp2', 'civic2', 'techdraw2', 'agric2', 'catering2', 'geographyi2', 'crs2', 'commerce2',
        'artcraft2', 'literature2', 'accounting2', 'government2', 'history2', 'french2', 'yoruba2'];

    // List of third term subjects
    $thirdTermSubjects = ['mathematics', 'english', 'physics', 'chemistry', 'f_math', 'biology',
        'econs', 'dp', 'civic', 'techdraw', 'agric', 'catering', 'geographyi', 'crs', 'commerce',
        'artcraft', 'literature', 'accounting', 'government', 'history', 'french', 'yoruba'];

    // Move scores for each first term subject to the corresponding z_subject1 table
    foreach ($firstTermSubjects as $subject) {
        // Get the student's scores from the subject table
        $getScoresSql = "SELECT * FROM $subject WHERE student_id = $studentId";
        $getScoresResult = mysqli_query($con, $getScoresSql);

        if (!$getScoresResult) {
            // Error retrieving scores
            echo "Error retrieving scores for $subject: " . mysqli_error($con);
            return;
        }

        if (mysqli_num_rows($getScoresResult) > 0) {
            while ($row = mysqli_fetch_assoc($getScoresResult)) {
                $midtermScore = $row['midterm_score'];
                $examScore = $row['exam_score'];
                $terminalScore = $midtermScore + $examScore;
                $studentGrade = calculateStudentGrade($terminalScore);

                // Insert the scores into the z_subject1 table
                $zSubjectTable = "z_" . $subject;
                $insertScoresSql = "INSERT INTO $zSubjectTable (student_id, midterm_score, exam_score, terminal_score, student_grade)
                    VALUES ('$studentId', '$midtermScore', '$examScore', '$terminalScore', '$studentGrade')";
                $insertScoresResult = mysqli_query($con, $insertScoresSql);

                if (!$insertScoresResult) {
                    // Error inserting scores
                    echo "Error inserting scores for $subject: " . mysqli_error($con);
                    return;
                }
            }
        }
    }

    // Move scores for each second term subject to the corresponding z_subject2 table
    foreach ($secondTermSubjects as $subject) {
        // Get the student's scores from the subject table
        $getScoresSql = "SELECT * FROM $subject WHERE student_id = $studentId";
        $getScoresResult = mysqli_query($con, $getScoresSql);

        if (!$getScoresResult) {
            // Error retrieving scores
            echo "Error retrieving scores for $subject: " . mysqli_error($con);
            return;
        }

        if (mysqli_num_rows($getScoresResult) > 0) {
            while ($row = mysqli_fetch_assoc($getScoresResult)) {
                $midtermScore = $row['midterm_score'];
                $examScore = $row['exam_score'];
                $terminalScore = $midtermScore + $examScore;
                $studentGrade = calculateStudentGrade($terminalScore);

                // Insert the scores into the z_subject2 table
                $zSubjectTable = "z_" . $subject;
                $insertScoresSql = "INSERT INTO $zSubjectTable (student_id, midterm_score, exam_score, terminal_score, student_grade)
                    VALUES ('$studentId', '$midtermScore', '$examScore', '$terminalScore', '$studentGrade')";
                $insertScoresResult = mysqli_query($con, $insertScoresSql);

                if (!$insertScoresResult) {
                    // Error inserting scores
                    echo "Error inserting scores for $subject: " . mysqli_error($con);
                    return;
                }
            }
        }
    }

    // Move scores for each third term subject to the corresponding z_subject table
    foreach ($thirdTermSubjects as $subject) {
        // Get the student's scores from the subject table
        $getScoresSql = "SELECT * FROM $subject WHERE student_id = $studentId";
        $getScoresResult = mysqli_query($con, $getScoresSql);

        if (!$getScoresResult) {
            // Error retrieving scores
            echo "Error retrieving scores for $subject: " . mysqli_error($con);
            return;
        }

        if (mysqli_num_rows($getScoresResult) > 0) {
            while ($row = mysqli_fetch_assoc($getScoresResult)) {
                $midtermScore = $row['midterm_score'];
                $examScore = $row['exam_score'];
                $terminalScore = $midtermScore + $examScore;
                $firsttermScore = $row['firstterm_score'];
                $secondtermScore = $row['secondterm_score'];
                $cumulativeScore = $row['cumulative_score'];
                $studentGrade = calculateStudentGrade($terminalScore);

                // Insert the scores into the z_subject table
                $zSubjectTable = "z_" . $subject;
                $insertScoresSql = "INSERT INTO $zSubjectTable (student_id, midterm_score, exam_score, terminal_score,
                firstterm_score, secondterm_score, cumulative_score, student_grade)
                    VALUES ('$studentId', '$midtermScore', '$examScore', '$terminalScore', '$firsttermScore',
                    '$secondtermScore', '$cumulativeScore', '$studentGrade')";
                $insertScoresResult = mysqli_query($con, $insertScoresSql);

                if (!$insertScoresResult) {
                    // Error inserting scores
                    echo "Error inserting scores for $subject: " . mysqli_error($con);
                    return;
                }
            }
        }
    }

    // Move principal comments from others table to z_others table
    $getCommentsSql = "SELECT * FROM others WHERE student_id = $studentId";
    $getCommentsResult = mysqli_query($con, $getCommentsSql);

    if (!$getCommentsResult) {
        // Error retrieving comments
        echo "Error retrieving comments: " . mysqli_error($con);
        return;
    }

    if (mysqli_num_rows($getCommentsResult) > 0) {
        while ($commentRow = mysqli_fetch_assoc($getCommentsResult)) {
            $principalRemark = $commentRow['principal_remarks'];
            $principalName = $commentRow['principal_name'];
            $date = $commentRow['date'];

            // Insert the comments into the z_others table
            $zCommentsTable = "z_others";
            $insertCommentsSql = "INSERT INTO $zCommentsTable (student_id, principal_remarks, principal_name, date)
                VALUES ('$studentId', '$principalRemark', '$principalName', '$date')";
            $insertCommentsResult = mysqli_query($con, $insertCommentsSql);

            if (!$insertCommentsResult) {
                // Error inserting comments
                echo "Error inserting comments: " . mysqli_error($con);
                return;
            }
        }
    }

    // Move principal comments from others table to z_others table
$getCommentsSql = "SELECT * FROM others WHERE student_id = $studentId";
$getCommentsResult = mysqli_query($con, $getCommentsSql);

if (!$getCommentsResult) {
    // Error retrieving comments
    echo "Error retrieving comments: " . mysqli_error($con);
    return;
}

if (mysqli_num_rows($getCommentsResult) > 0) {
    while ($commentRow = mysqli_fetch_assoc($getCommentsResult)) {
        $principalRemark = $commentRow['principal_remarks'];
        $principalName = $commentRow['principal_name'];
        $date = $commentRow['date'];

        // Insert the comments into the z_others table
        $zCommentsTable = "z_others";
        $insertCommentsSql = "INSERT INTO $zCommentsTable (student_id, principal_remarks, principal_name, date)
            VALUES ('$studentId', '$principalRemark', '$principalName', '$date')";
        $insertCommentsResult = mysqli_query($con, $insertCommentsSql);

        if (!$insertCommentsResult) {
            // Error inserting comments
            echo "Error inserting comments: " . mysqli_error($con);
            return;
        }
    }
}

// Move teacher comments from t_comment table to z_t_comment table
$getTeacherCommentsSql = "SELECT * FROM t_comment WHERE student_id = $studentId";
$getTeacherCommentsResult = mysqli_query($con, $getTeacherCommentsSql);

if (!$getTeacherCommentsResult) {
    // Error retrieving teacher comments
    echo "Error retrieving teacher comments: " . mysqli_error($con);
    return;
}

if (mysqli_num_rows($getTeacherCommentsResult) > 0) {
    while ($teacherCommentRow = mysqli_fetch_assoc($getTeacherCommentsResult)) {
        $teacherComment = $teacherCommentRow['teacher_comments'];
        $teacherName = $teacherCommentRow['teacher_name'];
        $date = $teacherCommentRow['date'];

        // Insert the comments into the z_t_comment table
        $zTCommentTable = "z_t_comment";
        $insertTeacherCommentsSql = "INSERT INTO $zTCommentTable (student_id, teacher_comments, teacher_name, date)
            VALUES ('$studentId', '$teacherComment', '$teacherName', '$date')";
        $insertTeacherCommentsResult = mysqli_query($con, $insertTeacherCommentsSql);

        if (!$insertTeacherCommentsResult) {
            // Error inserting teacher comments
            echo "Error inserting teacher comments: " . mysqli_error($con);
            return;
        }
    }
}

// Move principal comments from others1 table to z_others1 table
$getCommentsSql = "SELECT * FROM others1 WHERE student_id = $studentId";
$getCommentsResult = mysqli_query($con, $getCommentsSql);

if (!$getCommentsResult) {
    // Error retrieving comments
    echo "Error retrieving comments: " . mysqli_error($con);
    return;
}

if (mysqli_num_rows($getCommentsResult) > 0) {
    while ($commentRow = mysqli_fetch_assoc($getCommentsResult)) {
        $principalRemark = $commentRow['principal_remarks'];
        $principalName = $commentRow['principal_name'];
        $date = $commentRow['date'];

        // Insert the comments into the z_others1 table
        $zCommentsTable = "z_others1";
        $insertCommentsSql = "INSERT INTO $zCommentsTable (student_id, principal_remarks, principal_name, date)
            VALUES ('$studentId', '$principalRemark', '$principalName', '$date')";
        $insertCommentsResult = mysqli_query($con, $insertCommentsSql);

        if (!$insertCommentsResult) {
            // Error inserting comments
            echo "Error inserting comments: " . mysqli_error($con);
            return;
        }
    }
}

// Move principal comments from others2 table to z_others2 table
$getCommentsSql = "SELECT * FROM others2 WHERE student_id = $studentId";
$getCommentsResult = mysqli_query($con, $getCommentsSql);

if (!$getCommentsResult) {
    // Error retrieving comments
    echo "Error retrieving comments: " . mysqli_error($con);
    return;
}

if (mysqli_num_rows($getCommentsResult) > 0) {
    while ($commentRow = mysqli_fetch_assoc($getCommentsResult)) {
        $principalRemark = $commentRow['principal_remarks'];
        $principalName = $commentRow['principal_name'];
        $date = $commentRow['date'];

        // Insert the comments into the z_others2 table
        $zCommentsTable = "z_others2";
        $insertCommentsSql = "INSERT INTO $zCommentsTable (student_id, principal_remarks, principal_name, date)
            VALUES ('$studentId', '$principalRemark', '$principalName', '$date')";
        $insertCommentsResult = mysqli_query($con, $insertCommentsSql);

        if (!$insertCommentsResult) {
            // Error inserting comments
            echo "Error inserting comments: " . mysqli_error($con);
            return;
        }
    }
}

// Move teacher comments from t_comment1 table to z_t_comment1 table
$getTeacherCommentsSql = "SELECT * FROM t_comment1 WHERE student_id = $studentId";
$getTeacherCommentsResult = mysqli_query($con, $getTeacherCommentsSql);

if (!$getTeacherCommentsResult) {
    // Error retrieving teacher comments
    echo "Error retrieving teacher comments: " . mysqli_error($con);
    return;
}

if (mysqli_num_rows($getTeacherCommentsResult) > 0) {
    while ($teacherCommentRow = mysqli_fetch_assoc($getTeacherCommentsResult)) {
        $teacherComment = $teacherCommentRow['teacher_comments'];
        $teacherName = $teacherCommentRow['teacher_name'];
        $date = $teacherCommentRow['date'];

        // Insert the comments into the z_t_comment1 table
        $zTCommentTable = "z_t_comment1";
        $insertTeacherCommentsSql = "INSERT INTO $zTCommentTable (student_id, teacher_comments, teacher_name, date)
            VALUES ('$studentId', '$teacherComment', '$teacherName', '$date')";
        $insertTeacherCommentsResult = mysqli_query($con, $insertTeacherCommentsSql);

        if (!$insertTeacherCommentsResult) {
            // Error inserting teacher comments
            echo "Error inserting teacher comments: " . mysqli_error($con);
            return;
        }
    }
}

// Move teacher comments from t_comment2 table to z_t_comment2 table
$getTeacherCommentsSql = "SELECT * FROM t_comment2 WHERE student_id = $studentId";
$getTeacherCommentsResult = mysqli_query($con, $getTeacherCommentsSql);

if (!$getTeacherCommentsResult) {
    // Error retrieving teacher comments
    echo "Error retrieving teacher comments: " . mysqli_error($con);
    return;
}

if (mysqli_num_rows($getTeacherCommentsResult) > 0) {
    while ($teacherCommentRow = mysqli_fetch_assoc($getTeacherCommentsResult)) {
        $teacherComment = $teacherCommentRow['teacher_comments'];
        $teacherName = $teacherCommentRow['teacher_name'];
        $date = $teacherCommentRow['date'];

        // Insert the comments into the z_t_comment2 table
        $zTCommentTable = "z_t_comment2";
        $insertTeacherCommentsSql = "INSERT INTO $zTCommentTable (student_id, teacher_comments, teacher_name, date)
            VALUES ('$studentId', '$teacherComment', '$teacherName', '$date')";
        $insertTeacherCommentsResult = mysqli_query($con, $insertTeacherCommentsSql);

        if (!$insertTeacherCommentsResult) {
            // Error inserting teacher comments
            echo "Error inserting teacher comments: " . mysqli_error($con);
            return;
        }
    }
}


    echo "Student with admission number $admissionNo: First term subjects, second term subjects, third term subjects, principal comments, and teacher comments moved successfully<br>";
}

if (isset($_POST['submit'])) {
    $admissionNo = $_POST['admission_no'];
    $session = $_POST['session'];

    moveStudentDetailsToCompleted($admissionNo, $session);
    moveStudentSubjectsToZTables($admissionNo, $session);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Move Student Details and Subjects</title>
</head>

<body>
    <div class="container my-2">
        <h1>Move Student Details and Subjects</h1>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Admission Number</label>
                <input type="text" class="form-control" name="admission_no" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Session</label>
                <input type="text" class="form-control" name="session" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Move Student Data</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rpK2jkw6Y3/dWf9RtE/LZQCeDJXh2UZbpx5mlVL9YrjvJw1IbYAsCzsfChtpejUh" crossorigin=""></script>
</body>

</html>
