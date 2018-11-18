<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Showing customers Database</title>
    <link rel="stylesheet" type="text/css" href="styling/styles.css">
    <link rel="stylesheet" type="text/css" href="styling/showCustomer_styles.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet"></head>
<body>

    <h1>Assignment 3 CS3319 Database</h1>
    Select your options:

    <div id="navigation-bar"> 
        <ul>
            <li><a class="active" href="index.php">Go Home</a></li>
            <li><a href="showcustomers.php">View Customer Purchases</a></li>
            <li><a href="showproducts.php">Products</a></li>
        </ul>
    </div>

    <h2> Here is the list of customers and their information along with their agent </h2>
    
    <!-- Connect to database -->
    <?php
        include "connecttodb.php";
    ?> 

    <form action="#" method="post">
        <div id="show">
            <?php 
                include 'getcustomers.php'
            ?>
        </div>
    </form>
</body>
</html>

