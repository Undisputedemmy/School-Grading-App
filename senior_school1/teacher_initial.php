<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    // Retrieve the s submitted in the form
    $mathTeacherInitial = $_POST['math_teacher_initial'];
    $englishTeacherInitial = $_POST['english_teacher_initial'];
    $physicsTeacherInitial = $_POST['physics_teacher_initial'];
    $chemistryTeacherInitial = $_POST['chemistry_teacher_initial'];
    $econsTeacherInitial = $_POST['econs_teacher_initial'];
    $f_mathTeacherInitial = $_POST['f_math_teacher_initial'];
    $crsTeacherInitial = $_POST['crs_teacher_initial'];
    $agricTeacherInitial = $_POST['agric_teacher_initial'];
    $dpTeacherInitial = $_POST['dp_teacher_initial'];
    $civicTeacherInitial = $_POST['civic_teacher_initial'];
    $accountingTeacherInitial = $_POST['accounting_teacher_initial'];
    $yorubaTeacherInitial = $_POST['yoruba_teacher_initial'];
    $cateringTeacherInitial = $_POST['catering_teacher_initial'];
    $historyTeacherInitial = $_POST['history_teacher_initial'];
    $literatureTeacherInitial = $_POST['literature_teacher_initial'];
    $governmentTeacherInitial = $_POST['government_teacher_initial'];
    $geographyiTeacherInitial = $_POST['geographyi_teacher_initial'];
    $frenchTeacherInitial = $_POST['french_teacher_initial'];
    $biologyTeacherInitial = $_POST['biology_teacher_initial'];
    $commerceTeacherInitial = $_POST['commerce_teacher_initial'];
    $techdrawTeacherInitial = $_POST['techdraw_teacher_initial'];
    $artcraftTeacherInitial = $_POST['artcraft_teacher_initial'];


    // Store the s in the database table 'teacher_initials'
    $sql = "INSERT INTO teacher_initials (mathematics, english, physics, chemistry, econs, f_math, crs, agric, dp,
    civic, accounting, yoruba, catering, history, literature, government, geographyi,
    french, biology, commerce, techdraw, artcraft ) VALUES 
            ('$mathTeacherInitial', '$englishTeacherInitial', '$physicsTeacherInitial', '$chemistryTeacherInitial',
            '$econsTeacherInitial', '$f_mathTeacherInitial', '$crsTeacherInitial', '$agricTeacherInitial',  
            '$dpTeacherInitial', '$civicTeacherInitial', '$accountingTeacherInitial', '$yorubaTeacherInitial', '$cateringTeacherInitial', 
            '$historyTeacherInitial', '$literatureTeacherInitial', '$governmentTeacherInitial', 
            '$geographyiTeacherInitial', '$frenchTeacherInitial', '$biologyTeacherInitial', '$commerceTeacherInitial',
            '$techdrawTeacherInitial', '$artcraftTeacherInitial')";

    // Execute the query
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "s stored successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
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
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>initials</title>
</head>

<body>
    
    <div class="container my-2">
        <h1>Teacher's Initials</h1>
        <button><a href="http://localhost/phpmyadmin/index.php?route=/sql&db=project_school4&table=teacher_initials&pos=0">

        Edit Initials</a></button>
        <form method="POST">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-2">
                        <label class="form-label">Math </label>
                        <input type="text" class="form-control" name="math_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">English </label>
                        <input type="text" class="form-control" name="english_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Physics </label>
                        <input type="text" class="form-control" name="physics_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Chemistry </label>
                        <input type="text" class="form-control" name="chemistry_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Economics </label>
                        <input type="text" class="form-control" name="econs_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Futher_math </label>
                        <input type="text" class="form-control" name="f_math_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">T.D </label>
                        <input type="text" class="form-control" name="techdraw_teacher_initial" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-2">
                        <label class="form-label">Crs </label>
                        <input type="text" class="form-control" name="crs_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Agric </label>
                        <input type="text" class="form-control" name="agric_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">DP </label>
                        <input type="text" class="form-control" name="dp_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Civic </label>
                        <input type="text" class="form-control" name="civic_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Accounting </label>
                        <input type="text" class="form-control" name="accounting_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Yoruba </label>
                        <input type="text" class="form-control" name="yoruba_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Commerce </label>
                        <input type="text" class="form-control" name="commerce_teacher_initial" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-2">
                        <label class="form-label">Lit-in-eng</label>
                        <input type="text" class="form-control" name="literature_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">History </label>
                        <input type="text" class="form-control" name="history_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">CCP </label>
                        <input type="text" class="form-control" name="catering_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Government </label>
                        <input type="text" class="form-control" name="government_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Geography </label>
                        <input type="text" class="form-control" name="geographyi_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">French </label>
                        <input type="text" class="form-control" name="french_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Biology </label>
                        <input type="text" class="form-control" name="biology_teacher_initial" required>
                    </div>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha284-rpK2jkw6Y2/dWf9RtE/LZQCeDJXh2UZbpx5mlVL9YrjvJw1IbYAsCzsfChtpejUh" crossorigin="anonymous"></script>
</body>

</html>
