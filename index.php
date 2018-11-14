<!DOCTYPE html>
<html>
<head>
    <title>Customers Databases</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet"></head>
<body>
<script src="index.js"></script>
<?php
    include "connecttodb.php";
?>

<h1>Customers Database</h1>
Select your options:

<h2> 1. Select any customers and display which products they bought </h2>
<select> 
    <option value="1"> Select Here </option>
    <?php  
        include "getcustomers.php";
    ?>
</select>
<hr>
<hr>

<h2> 2. Show the products table and decide to show it either ascending or descending by price </h2>
<select> 
    <option value="1"> Select Here </option>
    <?php  
        include "getcustomers.php";
    ?>
</select>
<hr>
<hr>


</body>
</html>




