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
    $physicsTeacherInitial = isset($teacherInitials['physics']) ? $teacherInitials['physics'] : null;
    $chemistryTeacherInitial = isset($teacherInitials['chemistry']) ? $teacherInitials['chemistry'] : null;
    $econsTeacherInitial = isset($teacherInitials['econs']) ? $teacherInitials['econs'] : null;
    $f_mathTeacherInitial = isset($teacherInitials['f_math']) ? $teacherInitials['f_math'] : null;
    $crsTeacherInitial = isset($teacherInitials['crs']) ? $teacherInitials['crs'] : null;
    $agricTeacherInitial = isset($teacherInitials['agric']) ? $teacherInitials['agric'] : null;
    $dpTeacherInitial = isset($teacherInitials['dp']) ? $teacherInitials['dp'] : null;
    $civicTeacherInitial = isset($teacherInitials['civic']) ? $teacherInitials['civic'] : null;
    $accountingTeacherInitial = isset($teacherInitials['accounting']) ? $teacherInitials['accounting'] : null;
    $yorubaTeacherInitial = isset($teacherInitials['yoruba']) ? $teacherInitials['yoruba'] : null;
    $cateringTeacherInitial = isset($teacherInitials['catering']) ? $teacherInitials['catering'] : null;
    $historyTeacherInitial = isset($teacherInitials['history']) ? $teacherInitials['history'] : null;
    $literatureTeacherInitial = isset($teacherInitials['literature']) ? $teacherInitials['literature'] : null;
    $governmentTeacherInitial = isset($teacherInitials['government']) ? $teacherInitials['government'] : null;
    $geographyiTeacherInitial = isset($teacherInitials['geographyi']) ? $teacherInitials['geographyi'] : null;
    $frenchTeacherInitial = isset($teacherInitials['french']) ? $teacherInitials['french'] : null;
    $biologyTeacherInitial = isset($teacherInitials['biology']) ? $teacherInitials['biology'] : null;
    $commerceTeacherInitial = isset($teacherInitials['commerce']) ? $teacherInitials['commerce'] : null;
    $techdrawTeacherInitial = isset($teacherInitials['techdraw']) ? $teacherInitials['techdraw'] : null;
    $artcraftTeacherInitial = isset($teacherInitials['artcraft']) ? $teacherInitials['artcraft'] : null;

    // Use the retrieved teacher initials as needed
    // For example, you can display them in the HTML table
} else {
    // Handle the case when the query fails
    echo "Error: " . mysqli_error($con);
    // Set default values to teacher initials in case of an error or empty table
    $mathTeacherInitial = null;
    $englishTeacherInitial = null;
    $physicsTeacherInitial = null;
    $chemistryTeacherInitial = null;
    $econsTeacherInitial = null;
    $f_mathTeacherInitial = null;
    $crsTeacherInitial = null;
    $agricTeacherInitial = null;
    $dpTeacherInitial = null;
    $civicTeacherInitial = null;
    $accountingTeacherInitial = null;
    $yorubaTeacherInitial = null;
    $cateringTeacherInitial = null;
    $historyTeacherInitial = null;
    $literatureTeacherInitial = null;
    $governmentTeacherInitial = null;
    $geographyiTeacherInitial = null;
    $frenchTeacherInitial = null;
    $biologyTeacherInitial = null;
    $commerceTeacherInitial = null;
    $techdrawTeacherInitial = null;
    $artcraftTeacherInitial = null;
}

// Close the database connection
mysqli_close($con);
?>
