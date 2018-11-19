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
            
        </ul>
    </div>

    <!-- Connect to database -->
    <?php 
        include "connecttodb.php";
    ?>

    <!-- Connect to customers database --> 
    <div id="container">
        <form action="updateNumber.php" method="post">
            <?php 
                include 'getcustomerinfo.php';

                echo '<select name="customers">';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value =' . $row["customerID"] . ' ' . $row["lName"] . ', ' . $row["fName"] . ' - ' . $row["phoneNumber"] . '</option>';
                }
                echo '</select';
            ?>l
        </form>

        <input type="text" name="newCustomerNumber" placeholder="Input new phone number"><br>
        <input type="submit" value="Update customer's phone number">
    </div>

</body>
</html>
