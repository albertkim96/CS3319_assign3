<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Adding a new customer</title>
    <link rel="stylesheet" type="text/css" href="styling/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
</head>
<body>

    <h1>Assignment 3 CS3319 Database</h1>
    Select your options:

    <div id="navigation-bar">
        <ul>
            <li><a class="active" href="index.php">Go Home</a></li>
            <li><a href="showcustomers.php">View Customer Purchases</a></li>
            <li><a href="showproducts.php">View Products</a></li>
            <li><a href="newpurchase.php">Insert a new Purchase</a></li>
            <li><a href="newcustomer.php">Adding a customer</a></li>
        </ul>
    </div>

    <?php
        include "connecttodb.php";
    ?>

    <div id="container">
        <form action="insertnewcustomer.php" method="post">

        <!-- Generates new ID for the customer -->
        <?php
            include 'getcustomerid.php';
            echo '<tr><td><label for="ID"> ID:</label>';
            echo '<td><b>' . $id  . '</b>';
            echo '<br>'
        ?>

        <tr><td><label for="fName">First Name:</label> <!-- FIRST NAME -->
        <td><input type="text" name="firstName" placeholder="Albert">

        <tr><td><label for="lName">Last Name:</label> <!-- LAST NAME -->
        <td><input type="text" name="lastName" placeholder="Kim"><br>

        <tr><td><label for="city">Address:</label> <!-- ADDRESS -->
        <td><input type="text" name="address" placeholder="France"><br>

        <tr><td><label for="phoneNumber">Phone Number:</label> <!-- PHONE NUMBER -->
        <td><input type="text" name="pNumber" placeholder="***-****"><br>

        <tr><td><label for="agentID">Agent:</label> <!-- AGENT SELECTION -->
        <td><select name="agent">

        <?php
        # Query to find all agents from agent table
            $query = 'SELECT * FROM agents';
            $result = mysqli_query($connection, $query);
            # Checks if query successful
            if (!$result) {
                die("Something went wrong looking for agents!");
            }
            # Loops through all rows of agent and adds them as option to the selection
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value=' . $row["agentID"] . '>' . $row["firstName"] . ' ' . $row["lastName"] . '</option>';
            }
        ?>
        <br>

        <!-- Button to submit details and create new customer -->
        <input type="submit" value="Add New Customer" id="submission">
        </form>

    </div>

</body>
</html>
