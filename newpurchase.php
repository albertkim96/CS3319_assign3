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
            <li><a class="active" href="index.php">Go Home</a></li>
            <li><a href="showcustomers.php">View Customer Purchases</a></li>
            <li><a href="showproducts.php">View Products</a></li>
            <li><a href="addpurchase.php">Insert a new Purchase</a></li>
        </ul>
    </div>

    <?php
        include "connecttodb.php";
    ?> 

    <div id="container">
        <form action="#" method="post">
            <?php
                # Include the customer information
                include 'getcustomerinfo.php';
                
                # Get product database information
                $product_query = 'SELECT * FROM products';
                $result = mysqli_query($connection, $product_query);

                # Check if query worked
                if (!$result) {
                    die("Query did not work");
                }
                # Starts a selection operation to pick from a list of customers
                echo '<p style="display: block; margin-bottom: 20px;"> CUSTOMER </p><select name="customer" id="customerSelect">';
                # Loops through list of customers and makes them options of our selection
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value=' . $row["CustomerID"] . '>' . $row["FName"] . ' ' . $row["LName"] . '</option>';
                }
                # End of select statement
                echo '</select>';  

                # Start of the product choosing section
                echo '<p style="margin-bottom: 30px; margin-top: 30px;"> PRODUCTS </p>';
                # Putting all the radio buttons into an unordered list
                echo '<ul>';
                    # Loops through list of products and makes them options of our selection
                    while ($row = mysqli_fetch_assoc($product_query)) {
                        echo '<li><input type="radio" name="productsid" value=' . $row["ProdID"] . ' />' . $row["Description"] . ' $' . $row["CostPerItem"] . '</li>';
                    }
                echo '</ul>';
  			?>

  			<!-- Asks the user the quantity of the product chosen they would like to purchase -->
  			<input type="text" name="quantity" placeholder="Quantity" id="quantityTxt" size="15">
  			<br><input type="submit" value="Insert Product Purchase" id="subButton">
  		</form>

        <?php
            # Initializes variables to store the purchasers id and the products id that they are purchasing
            $whichCustomer = $_POST["customer"];
            $whichProduct = $_POST["product"];
            $quantity = $_POST["quantity"];
            # Query to insert purchase order into values
            $query = 'INSERT INTO productsold VALUES (' . $whichProduct . ', ' . $whichProduct . ', ' . intval($quantity) . ')';
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

