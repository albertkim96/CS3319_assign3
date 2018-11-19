<?php
    $query = 'SELECT * FROM customer';
    $result = mysqli_query($connection, $query);
    # Checks if query was successful
    if (!$result) {
        die("Query did not work");
    }
    mysqli_free_result($result);
 ?>