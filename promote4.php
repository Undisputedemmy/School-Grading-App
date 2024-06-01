<?php
// Include your database connection files
include 'connect4.php'; // Connection for project_school database
include 'connect5.php'; // Connection for project_school5 database

// Function to increment the academic session by a year
function incrementAcademicSession($currentSession) {
    list($startYear, $endYear) = explode('/', $currentSession);

    // Increment both the start and end years
    $newStartYear = $startYear + 1;
    $newEndYear = $endYear + 1;

    // Construct the new academic session
    $newAcademicSession = "$newStartYear/$newEndYear";

    return $newAcademicSession;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['promote'])) {
    // Assuming you have a form with the admission number field and the promote button

    // Step 1: Fetch Student Details from Class 1
    $admissionNo = mysqli_real_escape_string($con_project_school4, $_POST['admission_no']);

    $fetchStudentQuery = "SELECT * FROM student_details WHERE admission_no = '$admissionNo'";
    $fetchStudentResult = mysqli_query($con_project_school4, $fetchStudentQuery);

    if ($fetchStudentResult && $row = mysqli_fetch_assoc($fetchStudentResult)) {
        // Step 2: Insert Student Details into Class 
        $newAcademicSession = incrementAcademicSession($row['A_session']);

        $insertStudentQuery = "INSERT INTO project_school5.student_details (name, admission_no, class, department, A_session)
                               VALUES ('{$row['name']}', '$admissionNo', 'SSS 2', 'department', '$newAcademicSession')";

        $insertStudentResult = mysqli_query($con_project_school5, $insertStudentQuery);

        if ($insertStudentResult) {
            // Step 3: Update Student's Class in Class 1
            $updateClassQuery = "UPDATE project_school4.student_details
                                SET class = 'SSS 1'
                                WHERE admission_no = '$admissionNo'";

            $updateClassResult = mysqli_query($con_project_school4, $updateClassQuery);

            if ($updateClassResult) {
                // Display success message
                echo "Student promoted successfully!";
                echo '<script>
                        setTimeout(function(){
                            window.location.href = "senior_school1/senior1.php";
                        }, 3000); // Redirect after 3 seconds
                      </script>';
            } else {
                echo "Error updating student's class in Class 2: " . mysqli_error($con_project_school4);
            }
        } else {
            echo "Error inserting student into Class 3: " . mysqli_error($con_project_school5);
        }
    } else {
        echo "Error fetching student details from Class 2: " . mysqli_error($con_project_school4);
    }
}
?>
