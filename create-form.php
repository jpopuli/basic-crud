<?php

    require('./database.php');

    session_start();
    
    if(isset($_POST['create'])) {
        $studentName = $_POST['name'];
        $studentAge = $_POST['age'];
        $studentEmail = $_POST['email'];
        $studentGPA = $_POST['gpa'];

        $queryCreate = "INSERT INTO student VALUES (null, '$studentName', $studentAge, '$studentEmail', $studentGPA )";
        $sqlCreate = mysqli_query($connection, $queryCreate);

        echo '<script>alert("created successfuly")</script>';
        echo '<script>window.location.href = "admin-page.php"</script>';
    } else {
        echo '<script>window.location.href = "admin-page.php"</script>';
    }

?>


