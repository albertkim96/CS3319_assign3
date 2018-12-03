<!-- Author: Minhyuk Kim
Student number: 250807072
Assignment: CS3319 Assignment 3
File: totalnumber.php -->

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
            <li><a href="listcustomers.php">List all customers who bought more</a></li>
            <li><a href="productsnotpurchased.php">List products not purchased</a></li>
            <li><a class="active" href="totalnumber.php">List total number of purchases for a product</a></li>
        </ul>
    </div>

    <!-- Connect to database -->
    <?php
      include 'connecttodb.php';
    ?>

    <div id="container">
      <h2> Choose a Product to find out the total money made in sales for that product </h2>

      <!-- Allowing the user to search/select the product -->
      <form action="#" method="post">
        
        <?php
          $query = 'SELECT * from products';
          $result = mysqli_query($connection, $query);
          # Check if query worked
          if (!$result) {
            die("databases query failed.");
          }
          echo '<select name="products">';
          # List all the products to the user
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value=' . $row["productID"] . '>' . 'ID: ' . $row["productID"] . ', Name: ' . $row["productDescription"] . '</option>';
          }

          echo '</select>';
          mysqli_free_result($result);
        ?>
        <input type="submit" name="submit" value="Submit">

      </form>
      
      <!-- After user submits which product they want to get data from -->
      <?php
        if (isset($_POST["submit"])) {
          $product_name = $_POST["products"];
          # Get the total amount of products
          $query = 'SELECT SUM(quantity) as total FROM purchase WHERE productID=' . $product_name . ' GROUP BY productID';
          $result = mysqli_query($connection, $query);
          $amount = mysqli_fetch_assoc($result);

          # After you get the total amount, get the product information to calculate profit
          $products_query = 'SELECT * FROM products where productID=' . $product_name;
          $products_result = mysqli_query($connection, $products_query);
          $products_amount = mysqli_fetch_assoc($products_result);

          # Get the total amount by multiplying cost and the total amount
          $totalAmount = $products_amount["costPerItem"] * $amount["total"];
        }
      ?>
      
      <!-- List all the product information --> 
      <ul>
        <!-- ID -->
        <li> Product ID: 
        <?php 
          echo $product_name; 
        ?> 
        </li>
        
        <!-- Name -->
        <li> Product Name:
        <?php
          $query = 'SELECT * from products WHERE productID=' . $product_name;
          $result = mysqli_query($connection, $query);
          # Check if query worked
          if (!$result) {
            die("databases query failed.");
          }
          # Get the product name from the products table
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row["productDescription"];
          }
          mysqli_free_result($result);
        ?> 
        </li>

        <!-- Cost -->
        <li> Product cost: 
        <?php
          $query = 'SELECT * from products WHERE productID=' . $product_name;
          $result = mysqli_query($connection, $query);
          # Check if query worked
          if (!$result) {
            die("databases query failed.");
          }
          # Get the cost from the products table;
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row["costPerItem"];
          }
          mysqli_free_result($result);
        ?> 
        </li>

        <!-- Total amount -->
        <li> Total amount: 
        <?php 
          # Get the total amount bought from the query
          echo $amount["total"]; 
        ?> 
        </li>

        <!-- Total profit -->
        <li> Total profit: 
        <?php 
          echo $totalAmount; 
        ?> 
        </li>
      </ul>

      <!-- Close the database -->
      <?php 
        mysqli_close($connection) 
      ?>
    </div>

</body>
</html>
