<?php
include 'connect.php';

// Retrieve the teacher initials from the database table 'teacher_initials'
$sql = "SELECT * FROM teacher_initials";
$yresult = mysqli_query($con, $sql);

// Check if the query was successful
if ($yresult) {
    // Fetch the teacher initials from the result
    $teacherInitials = mysqli_fetch_assoc($yresult);

    // Access the teacher initials for each subject
    $mathTeacherInitial = isset($teacherInitials['mathematics']) ? $teacherInitials['mathematics'] : null;
    $englishTeacherInitial = isset($teacherInitials['english']) ? $teacherInitials['english'] : null;
    $bstTeacherInitial = isset($teacherInitials['bst']) ? $teacherInitials['bst'] : null;
    $crsTeacherInitial = isset($teacherInitials['crs']) ? $teacherInitials['crs'] : null;
    $nvTeacherInitial = isset($teacherInitials['nv']) ? $teacherInitials['nv'] : null;
    $pvsTeacherInitial = isset($teacherInitials['pvs']) ? $teacherInitials['pvs'] : null;
    $yorTeacherInitial = isset($teacherInitials['yoruba']) ? $teacherInitials['yoruba'] : null;
    $histTeacherInitial = isset($teacherInitials['history']) ? $teacherInitials['history'] : null;
    $frenchTeacherInitial = isset($teacherInitials['french']) ? $teacherInitials['french'] : null;
    $ccaTeacherInitial = isset($teacherInitials['cca']) ? $teacherInitials['cca'] : null;
    $busTeacherInitial = isset($teacherInitials['business']) ? $teacherInitials['business'] : null;
    $artcraftTeacherInitial = isset($teacherInitials['artcraft']) ? $teacherInitials['artcraft'] : null;

    // Use the retrieved teacher initials as needed
    // For example, you can display them in the HTML table
} else {
    // Handle the case when the query fails
    echo "Error: " . mysqli_error($con);
    // Set default values to teacher initials in case of an error or empty table
    $mathTeacherInitial = null;
    $englishTeacherInitial = null;
    $bstTeacherInitial = null;
    $crsTeacherInitial = null;
    $nvTeacherInitial = null;
    $pvsTeacherInitial = null;
    $yorTeacherInitial = null;
    $histTeacherInitial = null;
    $frenchTeacherInitial = null;
    $ccaTeacherInitial = null;
    $busTeacherInitial = null;
    $artcraftTeacherInitial = null;
}

// Close the database connection
mysqli_close($con);
?>
