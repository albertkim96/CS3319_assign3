<!-- Author: Minhyuk Kim
Student number: 250807072
Assignment: CS3319 Assignment 3
File: newcustomer.php -->

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

    <!-- Include database-->
    <?php
        include "connecttodb.php";
    ?>

    <div id="container">
      <form action="#" method="post">

        <!-- Generates new ID for the customer -->
        <?php
            # Use the max customerid and increment from there to get a new customer id"
            $query = "SELECT MAX(customerID) as id from customers";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query did not work");
            }

            $row = mysqli_fetch_assoc($result);
            $id = intval($row["id"]) + 2;
            echo '<label for="ID"> ID:</label>';
            echo '<b>' . $id  . '</b>';
            echo '<br>'
        ?>

        <!-- First name, Last name, city, phone number, agent -->
        <label for="fName">First Name:</label>
        <input type="text" name="firstName" placeholder="Albert">

        <label for="lName">Last Name:</label>
        <input type="text" name="lastName" placeholder="Kim"><br>

        <label for="city">City:</label>
        <input type="text" name="city" placeholder="France"><br>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" name="pNumber" placeholder="***-****"><br>

        <label for="agentID">Agent:</label>
        <select name="agent">

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
        <!-- User has to make sure to submit in order to enter the new customer -->
        <br>
        <input type="submit" name="newCustomer" value="Add New Customer">
      </form>

      <!-- After the user presses submit, it leads to this part -->
      <?php
        if (isset($_POST["newCustomer"])) {
          $customerID = $id;
          $customerFName = $_POST["firstName"];
          $customerLName = $_POST["lastName"];
          $customerAddress = $_POST["address"];
          $customerPhone = $_POST["pNumber"];
          $customerAgent = $_POST["agent"];
          # Query to insert into customer table
          $query = "INSERT INTO customers VALUES ('$customerID', '$customerFName',
          '$customerLName', '$customerAddress', '$customerPhone', '$customerAgent')";
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
