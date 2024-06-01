<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    // Retrieve the s submitted in the form
    $mathTeacherInitial = $_POST['math_teacher_initial'];
    $englishTeacherInitial = $_POST['english_teacher_initial'];
    $businessTeacherInitial = $_POST['business_teacher_initial'];
    $ccaTeacherInitial = $_POST['cca_teacher_initial'];
    $bstTeacherInitial = $_POST['bst_teacher_initial'];
    $crsTeacherInitial = $_POST['crs_teacher_initial'];
    $pvsTeacherInitial = $_POST['pvs_teacher_initial'];
    $nvTeacherInitial = $_POST['nv_teacher_initial'];
    $historyTeacherInitial = $_POST['history_teacher_initial'];
    $yorubaTeacherInitial = $_POST['yoruba_teacher_initial'];
    $frenchTeacherInitial = $_POST['french_teacher_initial'];
    $artcraftTeacherInitial = $_POST['artcraft_teacher_initial'];


    // Store the s in the database table 'teacher_initials'
    $sql = "INSERT INTO teacher_initials (mathematics, english, business, cca, bst, crs, pvs, nv,
    history, yoruba, french, artcraft ) VALUES 
            ('$mathTeacherInitial', '$englishTeacherInitial', '$businessTeacherInitial', '$ccaTeacherInitial',
             '$bstTeacherInitial', '$crsTeacherInitial', '$pvsTeacherInitial',  
            '$nvTeacherInitial', '$historyTeacherInitial', '$yorubaTeacherInitial', '$frenchTeacherInitial',
             '$artcraftTeacherInitial')";

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
        <button><a href="http://localhost/phpmyadmin/index.php?route=/sql&db=project_school&table=teacher_initials&pos=0">

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
                        <label class="form-label">business </label>
                        <input type="text" class="form-control" name="business_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">cca </label>
                        <input type="text" class="form-control" name="cca_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">bst </label>
                        <input type="text" class="form-control" name="bst_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Artcraft </label>
                        <input type="text" class="form-control" name="artcraft_teacher_initial" required>
                    </div>
                    </div>
                <div class="col-md-4">
                    <div class="mb-2">
                        <label class="form-label">Crs </label>
                        <input type="text" class="form-control" name="crs_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">pvs </label>
                        <input type="text" class="form-control" name="pvs_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">nv </label>
                        <input type="text" class="form-control" name="nv_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Yoruba </label>
                        <input type="text" class="form-control" name="yoruba_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">French</label>
                        <input type="text" class="form-control" name="french_teacher_initial" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">History </label>
                        <input type="text" class="form-control" name="history_teacher_initial" required>
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
