<?php
    $query = "SELECT MAX(customerID) as maxID from customers";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query did not work");
    }

    $row = mysqli_fetch_assoc($result);
    $id = intval($row["maxID"]) + 2;
?>