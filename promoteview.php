<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Promotion</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styleboot.css">

</head>

<body class="container mt-5">
    <h4 class="mb-4">Promote Student</h4>

    <form action="promote.php" method="post" class="col-md-6" onsubmit="showSuccessAndRedirect()">
        <div class="form-group">
            <label for="admission_no">Admission Number:</label>
            <input type="text" class="form-control" name="admission_no" required>
        </div> <br>

        <button type="submit" class="btn btn-primary" name="promote">Promote</button>
    </form>

    <!-- Success Message -->
    <div id="success-message" class="alert alert-success mt-3" style="display: none;">
        Student promoted successfully!
    </div>

    
</body>

</html>
