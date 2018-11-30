<!-- This page gets all the information from the customers table and joins them with the agent table based on their ID -->

<?php
    $query = "SELECT * from customers INNER JOIN agents ON customers.agentID=agents.agentID ORDER BY lName";
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    echo '<select name="choosecustomer">';
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<option value=' . $row["customerID"] . '>' . $row["fName"] . ' ' . $row["lName"] . ', '
      . $row["city"] . ', Agent: ' . '<b>' . $row["firstName"] . ' ' . $row["lastName"] . '</b>'
      ' - ' . $row["phoneNumber"] . '</option>';
    }
    echo '</select>';
    mysqli_free_result($result);
?>
