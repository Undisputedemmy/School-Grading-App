<?php
include '../connect.php';

// Execute the query to retrieve bscience table data with student names
$query = "SELECT m.id, m.student_id, s.name AS student_name, m.midterm_score, m.exam_score,
 m.terminal_score, m.firstterm_score, m.secondterm_score, m.cumulative_score,
  m.student_grade
          FROM econs m
          JOIN student_details s ON m.student_id = s.id
          ORDER BY student_name ASC"; // Order by student name alphabetically
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    echo '
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>economics Scores</title>
        <style>
            .score-table {
                width: 100%;
                border-collapse: collapse;
            }

            .score-table th,
            .score-table td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
            }

            .score-table th {
                background-color: #ccc;
            }

            .score-table tbody tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            .score-table tbody tr:hover {
                background-color: #e0e0e0;
            }
        </style>
    </head>

    <body>
        <h2> 3rd Term economics Scores</h2>

        <table class="score-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Midterm Score</th>
                    <th>Exam Score</th>
                    <th>Terminal Score</th>
                    <th>Firstterm Score</th>
                    <th>Secondterm Score</th>
                    <th>Cumulative Score</th>
                    <th>Student Grade</th>
                </tr>
            </thead>
            <tbody>';

    $rowNumber = 1; // Counter for numbering rows

    while ($row = mysqli_fetch_assoc($result)) {
        // Convert score to "-" if it is 0
        $midtermScore = $row['midterm_score'] != 0 ? $row['midterm_score'] : "-";
        $examScore = $row['exam_score'] != 0 ? $row['exam_score'] : "-";
        $terminalScore = $row['terminal_score'] != 0 ? $row['terminal_score'] : "-";
        $firsttermScore = $row['firstterm_score'] != 0 ? $row['firstterm_score'] : "-";
        $secondtermScore = $row['secondterm_score'] != 0 ? $row['secondterm_score'] : "-";
        $cumulativeScore = $row['cumulative_score'] != 0 ? $row['cumulative_score'] : "-";

        echo '<tr>
                <td>'.$rowNumber.'</td>
                <td>'.$row['student_name'].'</td>
                <td>'.$midtermScore.'</td>
                <td>'.$examScore.'</td>
                <td>'.$terminalScore.'</td>
                <td>'.$firsttermScore.'</td>
                <td>'.$secondtermScore.'</td>
                <td>'.$cumulativeScore.'</td>
                <td>'.$row['student_grade'].'</td>
              </tr>';

        $rowNumber++;
    }

    echo '</tbody></table>
    </body>
    </html>';
} else {
    echo 'No data found in thebscience table.';
}

mysqli_close($con);
?>
