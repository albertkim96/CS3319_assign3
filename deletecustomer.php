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

    <?php
        include "connecttodb.php";
    ?>

    <div id="container">
        <form action="#" method="post">
            <?php
                $result = 'SELECT * FROM customers';
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

            <input type="submit" name="delete" value="Delete">

        </form>

        <?php
          if (isset($_POST["delete"])) {
            $customerID = $_POST["deleteCustomer"];
            $delete = 'DELETE FROM customer where customerID=' . $customerID;
            if (mysqli_query($connection, $delete)) {
              echo 'Deleted';
            }
            else {
              die ("Query failed.");
            }
          }
        ?>
    </div>

</body>
</html>
