<!-- Author: Minhyuk Kim
Student number: 250807072
Assignment: CS3319 Assignment 3
File: deletecustomer.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Customer</title>
    <link rel="stylesheet" type="text/css" href="styling/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet"></head>
<body>

    <h1>Assignment 3 CS3319 Database</h1>
    Select your options:

    <div id="navigation-bar">
        <ul>
            <li><a href="index.php">Go Home</a></li>
            <li><a href="showcustomers.php">View Customer Purchases</a></li>
            <li><a href="showproducts.php">View Products</a></li>
            <li><a href="newpurchase.php">Insert a new Purchase</a></li>
            <li><a href="newcustomer.php">Adding a customer</a></li>
            <li><a href="updatephonenumber.php">Update a customer's phone number</a></li>
            <li><a class="active" href="deletecustomer.php">Delete a customer</a></li>
            <li><a href="listcustomers.php">List all customers who bought more</a></li>
            <li><a href="productsnotpurchased.php">List products not purchased</a></li>
            <li><a href="totalnumber.php">List total number of purchases for a product</a></li>
        </ul>
    </div>

    <!-- Include database -->
    <?php
        include "connecttodb.php";
    ?>

    <div id="container">
        <form action="#" method="post">
            <!-- Include customers database and show user all the customers -->
            <?php
                $query = 'SELECT * FROM customers';
                $result = mysqli_query($connection, $query);
                # Checks if query was successful
                if (!$result) {
                    die("Query did not work");
                }
                echo '<select name="deleteCustomer">';
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value=' . $row["customerID"] . '>' . $row["fName"] . ' ' . $row["lName"] .  '</option>';
                }
                echo '</select><br>';
            ?>
            <br>
            <input type="submit" name="delete" value="Delete">

        </form>

        <!-- Checks if the user has submitted from the form -->
        <?php
          if (isset($_POST["delete"])) {
            $customerID = $_POST["deleteCustomer"];
            # query to delete
            $query = 'DELETE FROM customers where customerID=' . $customerID;
            $result = mysqli_query($connection, $query);
            if (!$result) {
              die ("Query failed.");
            }
            else {
              echo 'Deleted';
            }
          }
        ?>
    </div>

</body>
</html>
