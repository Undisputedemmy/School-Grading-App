<?php
// Include your database connection files
include 'connecti.php'; // Connection for project_school database
include 'connect2.php'; // Connection for project_school2 database

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
    $admissionNo = mysqli_real_escape_string($con_project_school, $_POST['admission_no']);

    $fetchStudentQuery = "SELECT * FROM student_details WHERE admission_no = '$admissionNo'";
    $fetchStudentResult = mysqli_query($con_project_school, $fetchStudentQuery);

    if ($fetchStudentResult && $row = mysqli_fetch_assoc($fetchStudentResult)) {
        // Step 2: Insert Student Details into Class 2
        $newAcademicSession = incrementAcademicSession($row['A_session']);

        $insertStudentQuery = "INSERT INTO project_school2.student_details (name, admission_no, class, A_session)
                               VALUES ('{$row['name']}', '$admissionNo', 'JSS 2', '$newAcademicSession')";

        $insertStudentResult = mysqli_query($con_project_school2, $insertStudentQuery);

        if ($insertStudentResult) {
            // Step 3: Update Student's Class in Class 1
            $updateClassQuery = "UPDATE project_school.student_details
                                SET class = 'JSS 1'
                                WHERE admission_no = '$admissionNo'";

            $updateClassResult = mysqli_query($con_project_school, $updateClassQuery);

            if ($updateClassResult) {
                // Display success message
                echo "Student promoted successfully!";
                echo '<script>
                        setTimeout(function(){
                            window.location.href = "junior-school1/junior1.php";
                        }, 3000); // Redirect after 3 seconds
                      </script>';
            } else {
                echo "Error updating student's class in Class 1: " . mysqli_error($con_project_school);
            }
        } else {
            echo "Error inserting student into Class 2: " . mysqli_error($con_project_school2);
        }
    } else {
        echo "Error fetching student details from Class 1: " . mysqli_error($con_project_school);
    }
}
?>
