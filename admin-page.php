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
            <h2>Admin Portal</h2>
            <a href="logout.php" onclick=" return confirm('Are you sure you want to logout?');">Logout</a>
        </div>

        <!-- main container -->
        <div class="homepage-content">
            <p>Welcome: <span class="username"><?php echo $_SESSION["username"]; ?></p></span>
            <!-- create data form -->

            <div class="data-content">
                <a href="create.php" class="create-btn">Add Student</a>
                <!-- scroll container when minimize -->
                <div class="scroll-container">
                    <table class="data-table">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>AGE</th>
                            <th>EMAIL</th>
                            <th>GPA</th>
                            <th>ACTION</th>
                        </tr>
                        <!-- data loop -->
                        <?php while($results = mysqli_fetch_array($sqlRead)) { ?>
                        <tr>
                            <td><?php echo $results['id'] ?></td>
                            <td><?php echo $results['name'] ?></td>
                            <td><?php echo $results['age'] ?></td>
                            <td><?php echo $results['email'] ?></td>
                            <td><?php echo $results['gpa'] ?></td>
                            <td class="action-btn">
                                <!-- edit button -->
                                <form action="update.php" method="post">
                                    <input type="submit" name="edit" value="edit" class="edit-btn">
                                    <input type="hidden" name="editId" value="<?php echo $results['id'] ?>">
                                    <input type="hidden" name="editName" value="<?php echo $results['name'] ?>">
                                    <input type="hidden" name="editAge" value="<?php echo $results['age'] ?>">
                                    <input type="hidden" name="editEmail" value="<?php echo $results['email'] ?>">
                                    <input type="hidden" name="editGpa" value="<?php echo $results['gpa'] ?>">
                                </form>
                                <!-- delete button -->
                                <form action="delete.php" method="post">
                                    <input type="submit" name="delete" value="delete" class="delete-btn" onclick="return deleteConfig()">
                                    <input type="hidden" name="deleteId" value="<?php echo $results['id'] ?>">
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <!-- display data (table) -->
                
            </div>

        </div>
    </div>

    <script>
        function deleteConfig() {
            var del = confirm("Are you sure you want to delete this record?");
            if (del == true) {
                alert("Record deleted");
            }
            return del;
        }
    </script>
</body>
</html>