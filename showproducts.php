<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Showing customers Database</title>
    <link rel="stylesheet" type="text/css" href="styling/styles.css">
    <link rel="stylesheet" type="text/css" href="styling/showProducts_styles.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet"></head>
<body>

    <h1>Assignment 3 CS3319 Database</h1>
    Select your options:

    <div id="navigation-bar">
        <ul>
            <li><a href="index.php">Go Home</a></li>
            <li><a href="showcustomers.php">View Customer Purchases</a></li>
            <li><a class="active" href="showproducts.php">View Products</a></li>
            <li><a href="newpurchase.php">Insert a new Purchase</a></li>
            <li><a href="newcustomer.php">Adding a customer</a></li>
            <li><a href="updatephonenumber.php">Update a customer's phone number</a></li>
            <li><a href="deletecustomer.php">Delete a customer</a></li>
            <li><a href="listcustomers.php">List all customers who bought more</a></li>
            <li><a href="productsnotpurchased.php">List products not purchased </a></li>
        </ul>
    </div>

    <h2> Here is the list of products and their information along with their agent </h2>
    <h3> Click on the buttons below if you want it to be ascending/descending </h3>

    <!-- Connect to database -->
    <?php
        include "connecttodb.php";
    ?>

    <div id="container">
        <form action="getproducts.php">
    </div>

</body>
</html>
