<?php

    require('./database.php');

    if(isset($_POST['delete'])) {
        $deleteId = $_POST['deleteId'];

        $queryDelete = "DELETE FROM student WHERE id = $deleteId";
        $sqlDelete = mysqli_query($connection, $queryDelete);

        echo '<script>window.location.href = "admin-page.php"</script>';
    } else {
        echo '<script>window.location.href = "admin-page.php"</script>';
    }

?>