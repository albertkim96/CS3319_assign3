<!-- Author: Minhyuk Kim
Student number: 250807072
Assignment: CS3319 Assignment 3
File: showcustomers.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Showing customers Database</title>
    <link rel="stylesheet" type="text/css" href="styling/styles.css">
    <link rel="stylesheet" type="text/css" href="styling/showCustomer_styles.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet"></head>
<body>

    <h1>Assignment 3 CS3319 Database</h1>
    Select your options:

    <div id="navigation-bar">
        <ul>
            <li><a href="index.php">Go Home</a></li>
            <li><a class="active" href="showcustomers.php">View Customer Purchases</a></li>
            <li><a href="showproducts.php">View Products</a></li>
            <li><a href="newpurchase.php">Insert a new Purchase</a></li>
            <li><a href="newcustomer.php">Adding a customer</a></li>
            <li><a href="updatephonenumber.php">Update a customer's phone number</a></li>
            <li><a href="deletecustomer.php">Delete a customer</a></li>
            <li><a href="listcustomers.php">List all customers who bought more</a></li>
            <li><a href="productsnotpurchased.php">List products not purchased</a></li>
            <li><a href="totalnumber.php">List total number of purchases for a product</a></li>
        </ul>
    </div>

    <h2> Here is the list of customers and their information along with their agent </h2>
    <h3> Click on any of the customers to see what they purchased </h3>

    <!-- Connect to database -->
    <?php
        include "connecttodb.php";
    ?>

    <div id="container">
      <!-- Show all the customers in a drop down format with all of their information -->
      <form action="#" method="post">
          <?php
            $query = "SELECT * from customers INNER JOIN agents ON customers.agentID=agents.agentID ORDER BY lName";
            $result = mysqli_query($connection,$query);
            if (!$result) {
                die("Query failed!");
            }
            echo '<select name="choosecustomer">';
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value=' . $row["customerID"] . '>' . $row["fName"] . ' ' . $row["lName"] . ', '
              . $row["city"] . ', ' . $row["phoneNumber"] . ', Agent: ' . '<b>' . $row["firstName"] . ' ' . $row["lastName"] . '</b>' .
              '</option>';
            }
            echo '</select>';
          ?>

          <br>
          <input type="submit" name="submit">
      </form>

      <!-- After user submits from which customer they selected -->
      <?php
        if (isset($_POST["submit"])) {
          $customerid = $_POST["choosecustomer"];
          $quantity = $_POST["quantity"];
          # Query to get product name and quantity
          $query = 'SELECT customerid, productDescription, quantity
          from purchase c INNER JOIN products on products.productID=c.productID
          INNER JOIN customers a ON a.customerID=c.customerid WHERE c.customerid' . $customerid;
          $result = mysqli_query($connection, $query);
          # Check if query worked
          if (!$result) {
            die("Query failed");
          }

          echo '<h2> Products: </h2>';

          echo '<ul>';
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<li>' . $_POST["productDescription"] . ', ' . $_POST["quantity"] . '</li>';
          }
          echo '</ul>';

          mysqli_free_result($customer_result);
        }
        mysqli_close($connection);
      ?>
    </div>
</body>
</html>

<!-- INNER JOIN customers customers.customerID=purchase.customerI -->
<!-- INNER JOIN purchase ON
products.productID=purchase.productID -->
