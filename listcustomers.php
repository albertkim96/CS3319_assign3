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
            <li><a class="active" href="listcustomers.php">List all customers who bought more than a given quantity</a></li>
            <li><a href="productsnotpurchased.php">List products not purchased </a></li>
        </ul>
    </div>

    <!-- Connect to database -->
    <?php
        include "connecttodb.php";
    ?>

    <div id="container">
      <h2> PLease enter a quantity </h2>

      <form action="#" method="post">
        <input type="text" id="amount" name="quantity" placeholder="Amount">
        <input type="submit" name="submit" value="find">
      </form>

      <?php
        if (isset($_POST["submit"])) {
          $quantity = $_POST["quantity"];
          $amount = intval($quantity);

          $query = 'SELECT fName, lName, productDescription, quantity FROM purchase INNER JOIN products ON products.productID=purchase.productID INNER JOIN customers ON
          customers.customerID=purchase.customerID WHERE quantity>=' . $amount;
          $result = mysqli_query($connection, $query);

          if (!$result) {
              die("databases query failed.");
          }
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<li><b>' . $row["fName"] . ' ' . $row["lName"] . '</b> Purchased <b>' . $row["productDescription"] . '</b> In Amount: <b>' . $row["quantity"] . '</b></li>';
          }
          # Closes database
          mysqli_close($connection);
      ?>
    </div>
</body>
</html>
