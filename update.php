<?php

    require('./database.php');

    session_start();

    if (!isset($_SESSION["username"])) {
        header("location:index.php");
    }

    if(isset($_POST['editId'])) {
        $editId = $_POST['editId'];
        $editName = $_POST['editName'];
        $editAge = $_POST['editAge'];
        $editEmail = $_POST['editEmail'];
        $editGpa = $_POST['editGpa']; 
    }

    if (isset($_POST['update'])) {
        $updateId = $_POST['updateId'];
        $updateName = $_POST['updateName'];
        $updateAge = $_POST['updateAge'];
        $updateEmail = $_POST['updateEmail'];
        $updateGpa = $_POST['updateGpa'];

        $queryUpdate = "UPDATE student SET name = '$updateName', age = $updateAge, email = '$updateEmail', gpa = $updateGpa WHERE id = $updateId";
        $sqlUpdate = mysqli_query($connection, $queryUpdate);

        echo '<script>alert("updated successfuly")</script>';
        echo '<script>window.location.href = "admin-page.php"</script>';
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
            <h2>Update Student Record</h2>
            <a href="admin-page.php" onclick=" return confirm('Proceed? Any changes will not be save.');">Cancel</a>

            <!-- update data form -->
            <form action="update.php" class="create-main main-box" method="post">
                <!-- student name -->
                <div class="text-field">
                    <label for="updateName">Name</label>
                    <input type="text" name="updateName" value="<?php echo $editName ?>" required>
                </div>
                <!-- student age -->
                <div class="text-field">
                    <label for="updateAge">Age</label>
                    <input type="number" name="updateAge" value="<?php echo $editAge ?>" required>
                </div>
                <!-- student email -->
                <div class="text-field">
                    <label for="updateEmail">Email</label>
                    <input type="email" name="updateEmail" value="<?php echo $editEmail ?>" required>
                </div>
                <!-- student gpa -->
                <div class="text-field">
                    <label for="updateGpa">GPA</label>
                    <input type="number" name="updateGpa" step="any" value="<?php echo $editGpa ?>" required>
                </div>
                <input type="submit" name="update" value="Update" class="btn">
                <input type="hidden" name="updateId" value="<?php echo $editId ?>">
            </form>
        </div>
    </div>
</body>
</html>