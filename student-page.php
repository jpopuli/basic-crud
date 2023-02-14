<?php

    require('./read.php');

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
            <h2>Student Portal</h2>
            <a href="logout.php" onclick=" return confirm('Are you sure you want to logout?');">Logout</a>
        </div>

        <!-- main container -->
        <div class="homepage-content">
            <p>Welcome: <span class="username"><?php echo $_SESSION["username"]; ?></p></span>
            <!-- create data form -->

            <div class="data-content">
                <!-- display data (table) -->
                <table class="data-table">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>AGE</th>
                        <th>EMAIL</th>
                        <th>GPA</th>
                    </tr>
                    <!-- data loop -->
                    <?php while($results = mysqli_fetch_array($sqlRead)) { ?>
                    <tr>
                        <td><?php echo $results['id'] ?></td>
                        <td><?php echo $results['name'] ?></td>
                        <td><?php echo $results['age'] ?></td>
                        <td><?php echo $results['email'] ?></td>
                        <td><?php echo $results['gpa'] ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

        </div>
    </div>
</body>
</html>