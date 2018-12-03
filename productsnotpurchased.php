<!-- Author: Minhyuk Kim
Student number: 250807072
Assignment: CS3319 Assignment 3
File: productsnotpurchased.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Customers Databases</title>
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
            <li><a href="deletecustomer.php">Delete a customer</a></li>
            <li><a href="listcustomers.php">List all customers who bought more than a given quantity</a></li>
            <li><a class="active" href="productsnotpurchased.php">List products not purchased </a></li>
            <li><a href="totalnumber.php">List total number of purchases for a product</a></li>
        </ul>
    </div>

    <!-- Connect to database -->
    <?php
        include "connecttodb.php";
    ?>

    <!-- Show which products have not been bought by the customer --> 
    <div id="container">
      <h2> Here are the products not purchased: </h2>
      <?php
        # Query to check which product has not been bought
        $query = 'SELECT * FROM products WHERE productID NOT IN (SELECT productID FROM purchase)';
        $result = mysqli_query($connection, $query);
        if (!$result) {
          die("Query failed");
        }
        # Show all the products which have not been purchased
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li>' . 'Product ID: ' . $row["productID"] . ', Name: ' . 
            $row["productDescription"] . ', Cost: ' . $row["costPerItem"];
        }
        mysqli_free_result($result);
        # Close connection after
        mysqli_close($connection);
      ?>
    </div>

</body>
</html>
