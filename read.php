<?php

    require('./database.php');

    $queryRead = "SELECT * FROM student";
    $sqlRead = mysqli_query($connection, $queryRead);

?>