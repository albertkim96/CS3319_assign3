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
            <li><a href="listcustomers.php">List all customers who bought more</a></li>
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
            ?>
            <br>
            <input type="text" name="newCustomerNumber" placeholder="xxx-xxxx">
            <br>
            <input type="submit" name="submit">
        </form>

        <?php
          if (isset($_POST["submit"])) {
            $newPhoneNumber = $_POST["newCustomerNumber"];
            $customerid = $_POST["customerlist"];
            $query = 'UPDATE customers SET phoneNumber=' . $newPhoneNumber . ' WHERE customerID=' . $customerid;
            $result = mysqli_query($connection, $query);
            if (!$result) {
              die("Query failed");
            }
            else {
              echo 'Query success';
            }
          }
          mysqli_close($connection);
        ?>

    </div>

</body>
</html>
