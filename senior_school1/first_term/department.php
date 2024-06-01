<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <a href="subjects.php?admission_no=<?php echo $student['admission_no']; ?>&department=science">Science</a><br>
        <a href="subjects.php?admission_no=<?php echo $student['admission_no']; ?>&department=commercial">Commercial</a><br>
        <a href="subjects.php?admission_no=<?php echo $student['admission_no']; ?>&department=art">Art</a><br>
    </div>
</body>

</html>