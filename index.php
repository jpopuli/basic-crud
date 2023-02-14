<?php

    // This is the login page

    require('./database.php');

    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = mysqli_real_escape_string($connection,$_POST['username']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);

        $queryValidate = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
        $sqlValidate = mysqli_query($connection, $queryValidate);

        $row = mysqli_fetch_array($sqlValidate);
            if ($row["usertype"] == "student") {
                // pass student username
                $_SESSION["username"] = $username;
                header("location:student-page.php");
            } elseif($row["usertype"] == "admin") {
                // pass admin username
                $_SESSION["username"] = $username;
                header("location: admin-page.php");
            } else {
                echo "incorect info";
            }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <style>
        <?php include "css/style.css" ?>
    </style>
</head>

<body>
    <div class="main">
        <div class="main-box">
            <h1>Login</h1>
            <form action="" class="form-login" method="post">
                <div class="text-field">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Type your username" autocomplete="off" required>
                </div>
                <div class="text-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Type your password" autocomplete="off" required>
                </div>
                <input class="btn" type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</html>