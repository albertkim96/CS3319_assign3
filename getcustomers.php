<?php
    $query = "SELECT fName, lName from customers ORDER BY lName";
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value = " . $row["customerID"]. ">";
        echo $row["fName"];
        echo " ";
        echo $row["lName"];
    }
    mysqli_free_result($result);
?>