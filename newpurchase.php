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

    <?php
        include "connecttodb.php";
    ?>

    <div id="container">
        <form action="#" method="post">
            <h2> Please choose your customer </h2>
            <?php
                # Include the customer information
                $query = 'SELECT * FROM customers';
                $result = mysqli_query($connection, $query);
                # Check if query worked
                if (!$result) {
                  die("Customer query did not work");
                }

                echo '<select>';
                # Loops through list and shows them as options
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value=' . $row["customerID"] . '>' . $row["fName"] . ' ' . $row["lName"] . '</option>';
                }
                echo '</select>';
            ?>
            <h2> Please choose your product </h2>
            <?php
                # Get product database information
                $product_query = 'SELECT * FROM products';
                $product_result = mysqli_query($connection, $product_query);
                # Check if query worked
                if (!$product_result) {
                    die("Products query did not work");
                }

                echo '<select>';
                # Loops through list of products and makes them options of our selection
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value=' . $row["productID"] . '>' . $row["productDescription"] . ' ' . $row["costPerItem"] . '</option>';
                }
                echo '</select>';
  			?>

  			
  			<input type="text" name="quantity" placeholder="Quantity">
        <input type="submit" value="Insert Quantity">
  		</form>

        <?php
            # Initializes variables to store the purchasers id and the products id that they are purchasing
            $whichCustomer = $_POST["customer"];
            $whichProduct = $_POST["product"];
            $quantity = $_POST["quantity"];
            # Query to insert purchase order into values
            $query = 'INSERT INTO products VALUES (' . $whichProduct . ', ' . $whichProduct . ', ' . intval($quantity) . ')';
            # Checks if the query failed and outputs message if it does, otherwise adds row to database
            if ( !mysqli_query($connection, $query) ) {
                die('Error: Insertion Failed: ' . mysqli_error($connection));
            }
            # Welcome
            echo 'Product purchased!';
            # Closes database
            mysqli_close($connection);
        ?>


    </div>


</body>
</html>
