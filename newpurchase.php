<!-- Author: Minhyuk Kim
Student number: 250807072
Assignment: CS3319 Assignment 3
File: newpurchase.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Adding a new Purchase</title>
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
            <li><a class="active" href="newpurchase.php">Insert a new Purchase</a></li>
            <li><a href="newcustomer.php">Adding a customer</a></li>
            <li><a href="updatephonenumber.php">Update a customer's phone number</a></li>
            <li><a href="deletecustomer.php">Delete a customer</a></li>
            <li><a href="listcustomers.php">List all customers who bought more</a></li>
            <li><a href="productsnotpurchased.php">List products not purchased</a></li>
            <li><a href="totalnumber.php">List total number of purchases for a product</a></li>
        </ul>
    </div>

    <!-- Connect to database -->
    <?php
        include "connecttodb.php";
    ?>

    <div id="container">
        <form action="#" method="post">
            <h2> Please choose your customer </h2>
            <?php
                # Include the customer information from customers database
                $query = 'SELECT * FROM customers';
                $result = mysqli_query($connection, $query);
                # Check if query worked
                if (!$result) {
                  die("Customer query did not work");
                }

                echo '<select name="customer">';
                # Loops through list and shows them as options
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value=' . $row["customerID"] . '>' . $row["fName"] . ' ' . $row["lName"] . '</option>';
                }
                echo '</select>';
                mysqli_free_result($result);
            ?>

            <h2> Please choose your product </h2>
            <?php
                # Get product database information from products database
                $product_query = 'SELECT * FROM products';
                $product_result = mysqli_query($connection, $product_query);
                # Check if query worked
                if (!$product_result) {
                    die("Products query did not work");
                }

                echo '<select name="product">';
                # Loops through list of products and makes them options of our selection
                while ($row = mysqli_fetch_assoc($product_result)) {
                    echo '<option value=' . $row["productID"] . '>' . $row["productDescription"] . ', Cost: ' . $row["costPerItem"] . '</option>';
                }
                echo '</select>';
                mysqli_free_result($product_result);
  			?>
        <br>
        <!-- Allow the user to input their amount --> 
  		<input type="text" name="quantity" placeholder="Quantity">
        <input type="submit" name="submit" value="Submit">
  		</form>
                
      <!-- After user submits the quantity along with the customer and the product-->          
      <?php
        if (isset($_POST["submit"])) {
          # Get all the variables: Customer ID, product, and quantity
          $customerName = $_POST["customer"];
          $product = $_POST["product"];
          $quantity = $_POST["quantity"];
          # Query to get count if the customer has already purchased the product, and to get the quantity
          $query = 'SELECT COUNT(*) as count, quantity FROM purchase WHERE customerID=' . $customerName . ' AND productID=' . $product;
          $result = mysqli_query($connection, $query);
          # Check if query works
          if (!$result) {
            die("Query failed");
          }
          $row = mysqli_fetch_assoc($result);

          # If the customer has not purchased this product yet, then add it onto the purchase table
          if ($row["count"] != 1) {
            $insert = "INSERT INTO purchase VALUES ('$customerName', '$product', '$quantity')";
            $insert_result = mysqli_query($connection, $insert);
            if (!$insert_result) {
              die("Insert Query has failed");
            }
          }
          # If the customer has purchased this product already
          else {
            $newTotal = $row["quantity"] + $quantity;
            $add_query = 'UPDATE purchase SET quantity=' . $newTotal . ' WHERE customerid=' . $customerName . ' AND productID=' . $product;
            $add_result = mysqli_query($connection, $add_query);
            if(!$add_result) {
              die("Add query has failed");
            }
          }
          mysqli_free_result($$result);
          mysqli_free_result($insert_result);
          mysqli_free_result($add_result);
          # Close connection after
          mysqli_close($connection);
        }
      ?>
    </div>

</body>
</html>
