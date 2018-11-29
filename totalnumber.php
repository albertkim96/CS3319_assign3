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
            <li><a href="listcustomers.php">List all customers who bought more</a></li>
            <li><a href="productsnotpurchased.php">List products not purchased</a></li>
            <li><a class="active" href="totalnumber.php">List total number of purchases for a product</a></li>
        </ul>
    </div>

    <!-- Connect to database -->
    <?php
      include 'connecttodb.php';
    ?>

    <div id="container">
      <h2> Choose a Product to find out the total money made in sales for that product </h2>

      <!-- Allowing the user to search/select the product -->
      <form action="#" method="post">
        <select name="products">

        <?php
          $query = 'SELECT * from products';
          $result = mysqli_query($connection, $query);

          if (!$result) {
            die("databases query failed.");
          }

          while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value=' . $row["productID"] . '>' . $row["productID"] . ': ' . $row["productDescription"] . '</option>';
          }

          echo '</select>';
        ?>

        <input type="submit" name="submit" value="Get profit">

      </form>

      <?php
        if (isset($_POST["submit"])) {
          $product_name = $_POST["products"];
          $query = 'SELECT SUM(quantity) as total FROM purchase WHERE productID=' . $product_name . ' GROUP BY productID';
          $result = mysqli_query($connection, $query);
          $amount = mysqli_fetch_assoc($result);

          $products_query = 'SELECT * FROM products where productID=' . $product_name;
          $products_result = mysqli_query($connection, $products_query);
          $products_amount = mysqli_fetch_assoc($products_result);

          $totalAmount = $products_amount["costPerItem"] * $amount["total"];
        }
      ?>

      <ul>
        <li> Product ID: <b> <?php echo $product_name; ?> </b></li>
        <li> Product Name: <b>
        <?php
          $query = 'SELECT * from products WHERE productID=' . $product_name;
          $result = mysqli_query($connection, $query);

          if (!$result) {
            die("databases query failed.");
          }

          while ($row = mysqli_fetch_assoc($result)) {
            echo $row["productDescription"];
          }
        ?> </b></li>
        <li> Product cost: <b>
        <?php
        <?php
          $query = 'SELECT * from products WHERE productID=' . $product_name;
          $result = mysqli_query($connection, $query);

          if (!$result) {
            die("databases query failed.");
          }

          while ($row = mysqli_fetch_assoc($result)) {
            echo $row["costPerItem"];
          }
        ?> </b></li>
        <li> Total amount: <b> <?php echo $amount["total"]; ?> </b></li>
        <li> Total profit: <b> <?php echo $totalAmount; ?> </b></li>
      </ul>

      <?php mysqli_close($connection) ?>
    </div>

</body>
</html>
