<?php

    require('./database.php');

    session_start();

    if (!isset($_SESSION["username"])) {
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <style>
        <?php include "css/style.css" ?>
    </style>
</head>
<body>
    <div class="homepage-main">
        <div class="homepage-header">
            <h2>Add Student Record</h2>
            <a href="admin-page.php">Cancel</a>

            <form action="create-form.php" class="create-main main-box" method="post">
                <!-- student name -->
                <div class="text-field">
                    <label for="name">Name</label>
                    <input type="text" name="name" autocomplete="off" required>
                </div>
                <!-- student age -->
                <div class="text-field">
                    <label for="age">Age</label>
                    <input type="number" name="age" min=18 max=65 required>
                </div>
                <!-- student email -->
                <div class="text-field">
                    <label for="email">Email</label>
                    <input type="email" name="email" autocomplete="off" required>
                </div>
                <!-- student gpa -->
                <div class="text-field">
                    <label for="gpa">GPA</label>
                    <input type="number" name="gpa" step="any" min=1.00 max="5.00" autocomplete="off" required>
                </div>
                <input type="submit" name="create" value="Create" class="btn">
            </form>
        </div>
    </div>

</body>
</html>