<?php
include 'connect.php';

$message = ''; // Initialize the message variable
$disabled = false; // Initialize the disabled variable

// Predefined comments for the principal's remarks
$predefinedRemarks = [
    "Exceptional work! Your performance has been consistently outstanding.",
    "Your results are truly commendable. Keep up the excellent work!",
    "Your performance has been consistently good. Keep striving for excellence.",
    "You have demonstrated above-average performance. Continue the hard work!",
    "Your performance is satisfactory, but there is room for improvement. Keep pushing yourself.",
    "I have noticed improvements in your results. Keep up the good work!",
    "You are meeting the expected standards. Continue to work diligently.",
    "I appreciate the effort you put into your studies. Keep it up!",
    "Though your results may not be as expected, do not be discouraged. Keep trying, and success will follow.",
    "Aim for excellence in your studies. You have the potential to achieve great things.",
    "It is important to focus more on your studies to achieve better results.",
    "There is room for improvement in your performance. Identify areas to work on.",
    "Consider improving your study habits to enhance your academic performance.",
    "Additional effort is needed to reach your full academic potential.",
    "If you are facing challenges, don't hesitate to seek help. Your success is important.",
    "Work on managing your time effectively to improve overall performance.",
    "Maintain a positive attitude towards learning. It contributes to success.",
    "Set clear academic goals for yourself. They will guide your efforts.",
    "Encourage your parents' involvement in your academic journey. It can make a significant difference."
];


if (isset($_POST['submit'])) {
    $studentId = $_POST['student_id']; // Admission number entered in the form
    $principal_remark = $_POST['principal_remarks'];
    $principal_name = $_POST['principal_name'];
    $date = $_POST['date'];

    // Retrieve the student details from the student_details table using the admission number
    $query = "SELECT id FROM student_details WHERE admission_no = '$studentId'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $studentDetailsId = $row['id']; // Unique ID from the student_details table

        // Check if the Remarks already exist in the test_others2 table for the given student
        $checkQuery = "SELECT * FROM test_others2 WHERE student_id = '$studentDetailsId'";
        $checkResult = mysqli_query($con, $checkQuery);

        if ($checkResult && mysqli_num_rows($checkResult) > 0) {
            // Remarks already exist in the database
            $message = "Remarks already exist for the given student!";
            $disabled = true; // Disable the form
        } else {
            // Insert the Remarks into the test_others2 table with the associated student ID
            $sql = "INSERT INTO test_others2 (student_id, principal_remarks, principal_name, date)
            VALUES ('$studentDetailsId', '$principal_remark', '$principal_name', '$date')";

            // Execute the query
            $res = mysqli_query($con, $sql);

            if ($res) {
                // Redirect to a specific page or show a success message
                $message = "Remarks submitted successfully!";
                $disabled = true; // Disable the form after successful submission
                header('Location: ../test_commentsform.php');
                exit(); // Stop further execution of the script
            } else {
                $message = "Error: " . mysqli_error($con);
            }
        }
    } else {
        $message = "Student details not found";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
  
    <title>Make Result</title>
</head>

<body>
    <div class="container my-2">
        <form method="POST">
            <!-- Display the form -->
            <h2>Remarks Form</h2>
            <?php if (!empty($message)) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <div class="mb-2">
                <label class="form-label">Admission Number</label>
                <input type="text" class="form-control" name="student_id" required>
            </div>
            <div class="mb-1">
                <label>Principal's Name:</label>
                <input type="text" class="form-control" name="principal_name" required><br>
            </div>
            <div class="mb-1">
                <label>Principal's Remark:</label>
                <select class="form-control" name="principal_remarks" required>
                    <option value="" disabled selected>Select a remark</option>
                    <?php foreach ($predefinedRemarks as $remark) : ?>
                        <option value="<?php echo $remark; ?>"><?php echo $remark; ?></option>
                    <?php endforeach; ?>
                </select><br>
            </div>
            <div class="mb-1">
                <label>Date:</label>
                <input type="date" class="form-control" name="date" required><br>
            </div>
            <button type="submit" name="submit" class="btn btn-primary" <?php if ($disabled) echo "disabled"; ?>>Submit</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rpK2jkw6Y3/dWf9RtE/LZQCeDJXh2UZbpx5mlVL9YrjvJw1IbYAsCzsfChtpejUh" crossorigin="anonymous"></script>
</body>

</html>
