<?php
    $query = "SELECT fName, lName from customers";
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["fName"];
        echo " ";
        echo $row["lName"];
    }
    mysqli_free_result($result);
?>