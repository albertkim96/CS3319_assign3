<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Showing customers Database</title>
    <link rel="stylesheet" type="text/css" href="styling/styles.css">
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

    <?php
        include "connecttodb.php";
    ?> 

    <form action="#" method="post">

        <div id="show">
            <?php 
                include 'getcustomers.php'
            ?>
        </div>

        <!-- Div to organize all the buttons needed for ordering the products-->
        <div id="organizebuttons">
            <!-- Allows the user to select the way purchased products by a customer are organized -->
            <input type="radio" name="order" value="ASC" checked="checked">Ascending<br>
            <input type="radio" name="order" value="DESC">Descending<br>
        </div>

        <!-- Button for user to accept all values of search and search the products purchased by customer -->
        <input type="submit" name="submit" value="Show Purchased Products" id="submit"><br><hr><br>

    </form>
</body>
</html>

