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
            <li><a href="newpurchase.php">Insert a new Purchase</a></li>
            <li><a href="newcustomer.php">Adding a customer</a></li>
            <li><a href="updatephonenumber.php">Update a customer's phone number</a></li>
            <li><a href="deletecustomer.php">Delete a customer</a></li>
            <li><a href="productsnotpurchased.php">List products not purchased </a></li>
        </ul>
    </div>

    <?php
        include "connecttodb.php";
    ?>

    <div id="container">
      <?php
        $query = "SELECT * FROM products WHERE productID NOT IN (productID FROM purchase)";
        $result = mysqli_query($connection, $query);
        if (!$result) {
          die("Query failed");
        }
        while ($row = mysqli_fetch_assoc($result)) {
          echo ' <tr> <th scope="row">' . $row['productID'] . '</th> <td>'
          . $row['productDescription'] . '</td> <td>' . $row['costPerItem']
          . '</td> <td>' . $row['numberItems'] . '</td> </tr>';
        }
        mysqli_free_result($result);
        mysqli_close($connection);
      ?>
    </div>

</body>
</html>
