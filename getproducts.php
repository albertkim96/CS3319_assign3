<?php
    $query = "SELECT * from products ORDER BY costPerItem";
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value = " . $row["productID"]. ">";
        echo $row["productDescription"];
        echo " - ";
        echo $row["costPerItem"];
        echo " - ";
        echo $row["numberItems"];
    }
    mysqli_free_result($result);
?>