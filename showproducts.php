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
            <li><a class="active" href="index.php">Go Home</a></li>
            <li><a href="showcustomers.php">View Customer Purchases</a></li>
            <li><a href="showproducts.php">Products</a></li>
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
