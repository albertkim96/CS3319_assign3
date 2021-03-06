<!-- Author: Minhyuk Kim
Student number: 250807072
Assignment: CS3319 Assignment 3
File: updatephonenumber.php -->

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
            <li><a class="active" href="updatephonenumber.php">Update a customer's phone number</a></li>
            <li><a href="deletecustomer.php">Delete a customer</a></li>
            <li><a href="listcustomers.php">List all customers who bought more than a given quantity</a></li>
            <li><a href="productsnotpurchased.php">List products not purchased</a></li>
            <li><a href="totalnumber.php">List total number of purchases for a product</a></li>
        </ul>
    </div>

    <!-- Connect to database -->
    <?php
        include "connecttodb.php";
    ?>

    <!-- Connect to customers database -->
    <div id="container">
        <form action="#" method="post">
            <?php
                $query = 'SELECT * FROM customers';
                $result = mysqli_query($connection, $query);
                # Check if query worked
                if (!$result) {
                  die("Query failed");
                }

                echo '<select name="customerlist">';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value =' . $row["customerID"] . '>' . $row["fName"] . ' ' . $row["lName"] . ' - ' . $row["phoneNumber"] . '</option>';
                }
                echo '</select';
                mysqli_free_result($result);
            ?>
            <br>
            <label for="phoneNumber">Phone Number:</label>
            <input type="text" name="pNumber" placeholder="***-****"><br>
            <input type="submit" name="submit">
        </form>
        
        <!-- After user chooses the customer and which phone number to update it with-->          
        <?php
          if (isset($_POST["submit"])) {
            # Put the phone number and customer id in the variable
            $newPhoneNumber = (string)$_POST["pNumber"];
            $customerid = $_POST["customerlist"];
            # Query to update phone number
            $query = 'UPDATE customers SET phoneNumber=' . $newPhoneNumber . ' WHERE customerID=' . $customerid;
            $result = mysqli_query($connection, $query);
            # Check if query worked
            if (!$result) {
              die("Query failed");
            }
            else {
              echo 'Customer phone updated!';
            }
          }
          # Close connection after
          mysqli_close($connection);
        ?>

    </div>

</body>
</html>
