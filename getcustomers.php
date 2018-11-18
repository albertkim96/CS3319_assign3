<?php
    $query = "SELECT * from customers INNER JOIN agents ON customers.agentID=agentID ORDER BY lName";
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div>';
		echo '<input type="radio" name="customers" value="' . $row["CustomerID"] . '" /><b>' . $row["CustomerID"] . '</b>:<br> <b>Name:</b> ' . $row["lName"] . ', ' . $row["fName"] . '<br>';
		echo '<b>Agent:</b> ' . $row["fName"] . ' ' . $row["lName"] . '<br>';
		echo '<b>city:</b> ' . $row["city"] . '<br>';
		echo '</div>';
	}
    mysqli_free_result($result);
?>