<!-- Author: Minhyuk Kim
Student number: 250807072
Assignment: CS3319 Assignment 3
File: showproducts.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Showing customers Database</title>
    <link rel="stylesheet" type="text/css" href="styling/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet"></head>
<body>

    <h1>Assignment 3 CS3319 Database</h1>
    Select your options:

    <div id="navigation-bar">
        <ul>
            <li><a href="index.php">Go Home</a></li>
            <li><a href="showcustomers.php">View Customer Purchases</a></li>
            <li><a class="active" href="showproducts.php">View Products</a></li>
            <li><a href="newpurchase.php">Insert a new Purchase</a></li>
            <li><a href="newcustomer.php">Adding a customer</a></li>
            <li><a href="updatephonenumber.php">Update a customer's phone number</a></li>
            <li><a href="deletecustomer.php">Delete a customer</a></li>
            <li><a href="listcustomers.php">List all customers who bought more</a></li>
            <li><a href="productsnotpurchased.php">List products not purchased </a></li>
        </ul>
    </div>

    <!-- Connect to database -->
    <?php
        include "connecttodb.php";
    ?>

    <div id="container">
      <h2> Please choose how you would like to order your products
        <!-- Get the user's choice -->
        <form action="#" method="post">
          <!-- Ask if they want to do it through the cost or name -->
          <select name="order">
            <option value="costPerItem">Cost</option>
            <option value="productDescription">Name</option>
          </select>

          <!-- Ask if they want it to do it through an ascending or descending order -->
          <select name="ascdesc">
            <option value="ASC"> Ascending</option>
            <option value="DESC"> Descending</option>
          </select>

          <input name="show" type="submit" value="Show">
        </form>

        <?php
          # If the user pressed "Show"
          if (isset($_POST["show"])) {
            # Reorder the products with depending on the user's choice
            $query = 'SELECT * from products ORDER BY ' . $_POST["order"] . ' ' . $_POST["ascdesc"];
            $result = mysqli_query($connection, $query);
            if (!$result) {
              die("Query failed");
            }
            # Create a loop to print the data
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<li>' . 'Product ID: ' . $row["productID"] . ' ' . $row["productDescription"] . ', Cost: ' . $row["costPerItem"] . ', Quantity: ' . $row["numberItems"];
            }
            mysqli_free_result($result);
          }
          # Close connection after
          mysqli_close($connection);
        ?>
    </div>

</body>
</html>
