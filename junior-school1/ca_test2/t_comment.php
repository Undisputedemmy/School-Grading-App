<?php
include 'connect.php';

$message = ''; // Initialize the message variable
$disabled = false; // Initialize the disabled variable

// Predefined comments for the teacher's remarks
$predefinedComments = [
    "Shows dedication to learning.",
    "Participates actively in class activities.",
    "Always joins in class activities with a positive attitude, making learning fun.",
    "Talks and shares ideas during class discussions, making lessons interesting for everyone.",
    "Works well with friends during group activities, making the class a friendly place.",
    "Tries really hard on tough tasks and never gives up, showing a great work ethic.",
    "Does more than expected in class activities, bringing a positive vibe to the group.",
    "Getting better at understanding new things and using them in class.",
    "Helps friends during group activities, making sure everyone is included.",
    "Makes creative assignments, adding their own special ideas.",
    "Takes charge of learning, asks questions, and helps friends when they need it.",
    "Always finishes work on time during class activities, managing time really well.",
    "Wants to improve, listens to advice, and always gives their best effort.",
    "Thinks hard during class activities and tries to solve problems.",
    "Writes and talks in a way everyone can understand during class discussions.",
    "Stays positive even when things are a bit tough, making the class a happy place.",
    "Works alone and does a lot of things independently during learning activities.",
    "Knows the subject well and shares ideas that help everyone understand better.",
    "Works well with friends during group activities, making the team stronger.",
    "Feels proud of their work and makes it look nice during assignments.",
    "Treats friends nicely and respectfully in class, making everyone feel good.",
    "Joins in activities outside of class, learning new things in a fun way.",
    "Demonstrates a positive attitude towards challenges.",
    // Add more predefined comments as needed
];

if (isset($_POST['submit'])) {
    $studentId = $_POST['student_id']; // Admission number entered in the form
    $teacher_remark = $_POST['teacher_comments'];
    $teacher_name = $_POST['teacher_name'];
    $date = $_POST['date'];

    // Retrieve the student details from the student_details table using the admission number
    $query = "SELECT id FROM student_details WHERE admission_no = '$studentId'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $studentDetailsId = $row['id']; // Unique ID from the student_details table

        // Check if the comment already exists in the test_t_comment1 table for the given student
        $checkQuery = "SELECT * FROM test_t_comment2 WHERE student_id = '$studentDetailsId'";
        $checkResult = mysqli_query($con, $checkQuery);

        if ($checkResult && mysqli_num_rows($checkResult) > 0) {
            // Comment already exists in the database
            $message = "Comment already exists for the given student!";
            $disabled = true; // Disable the form
        } else {
            // Insert the comment into the test_t_comment1 table with the associated student ID
            $sql = "INSERT INTO test_t_comment2 (student_id, teacher_comments, teacher_name, date)
            VALUES ('$studentDetailsId', '$teacher_remark', '$teacher_name', '$date')";

            // Execute the query
            $res = mysqli_query($con, $sql);

            if ($res) {
                // Redirect to a specific page or show a success message
                $message = "Comment submitted successfully!";
                $disabled = true; // Disable the form after successful submission
                header('Location: ../test_subjects2.php');
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
            <h2>Comment Form</h2>
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
                <label>Teacher's Name:</label>
                <input type="text" class="form-control" name="teacher_name" required><br>
            </div>
            <div class="mb-1">
                <label>Teacher's Comment:</label>
                <select class="form-control" name="teacher_comments" required>
                    <option value="" disabled selected>Select a comment</option>
                    <?php foreach ($predefinedComments as $comment) : ?>
                        <option value="<?php echo $comment; ?>"><?php echo $comment; ?></option>
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
