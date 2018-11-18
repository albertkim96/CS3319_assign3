<?php
    $query = "SELECT * from customers INNER JOIN agents ON customers.agentID=agents.agentID ORDER BY lName";
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div>';
        echo '<b>Name:</b> ' . $row["lName"] . ', ' . $row["fName"] . '<br>';
        echo '<b>Customer ID:</b>' . $row["customerID"] . '<br>';
        echo '<b>Customer City:</b>' . $row["customers.city"] . '<br>';
        echo '<b>Phone Number:</b>' . $row["phoneNumber"] . '<br>';
        echo '<b>Agent Name:</b> ' . $row["lastName"] . ', ' . $row["firstName"] . '<br>';
        echo '<b>Agent City:</b>' . $row["agents.city"] . '<br>';
        echo '<b>Agent commission percent:</b>' . $row["agents.commissionPercent"] . '<br>';
        echo '<b>Agent city:</b>' . $row["agents.agentID"] . '<br>';
		echo '</div>';
	}
    mysqli_free_result($result);
?>