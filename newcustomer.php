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
            <li><a href="index.php">Go Home</a></li>
            <li><a href="showcustomers.php">View Customer Purchases</a></li>
            <li><a href="showproducts.php">View Products</a></li>
            <li><a href="newpurchase.php">Insert a new Purchase</a></li>
            <li><a class="active" href="newcustomer.php">Adding a customer</a></li>
            <li><a href="updatephonenumber.php">Update a customer's phone number</a></li>
            <li><a href="deletecustomer.php">Delete a customer</a></li>
            <li><a href="listcustomers.php">List all customers who bought more</a></li>
            <li><a href="productsnotpurchased.php">List products not purchased</a></li>
            <li><a href="totalnumber.php">List total number of purchases for a product</a></li>
        </ul>
    </div>

    <?php
        include "connecttodb.php";
    ?>

    <div id="container">
        <form action="#" method="post">

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
                die("Query failed");
            }
            # Loops through all rows of agent and adds them as option to the selection
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value=' . $row["agentID"] . '>' . $row["firstName"] . ' ' . $row["lastName"] . '</option>';
            }
        ?>
        <br>

        <!-- Button to submit details and create new customer -->
        <input type="submit" name="newCustomer" value="Add New Customer">
        </form>

        <!-- PHP to insert new customer -->
      <?php
        # Checks if the user submitted a new customer
        if (isset($_POST["newCustomer"])) {
          # Finds a new customerID and initializes it
          include 'getcustomerid.php';
          $customerID = $id;
          # Variables initializing all new customer attributes
          $customerFName = $_POST["firstName"];
          $customerLName = $_POST["lastName"];
          $customerAddress = $_POST["address"];
          $customerPhone = $_POST["pNumber"];
          $customerAgent = $_POST["agent"];
          # Query to insert into customer table
          $query = 'INSERT INTO customers VALUES ('$customerID', '$customerFName',
          '$customerLName', '$customerAddress', '$customerPhone', '$customerAgent')';
          $insert_result = mysqli_query($connection, $query);
          # Checks if the query was successful
          if (!$insert_result) {
            die("Query to insert customer failed: " . mysqli_error($connection));
          }
          # Displays to user that they have added a new customer
          echo '<script type="text/javascript">alert("Customer Added!");</script>';
        }
      ?>

    </div>

</body>
</html>
