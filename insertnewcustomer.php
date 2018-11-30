<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Insert New Customer</title>
</head>
<body>
    <?php
        include "connecttodb.php";
    ?>

    <?php
        include "getcustomerid.php";
        $customerID = $id;

        # Setting up variables for new customers
        $customerFirstName = $_POST["fName"];
        $customerLastName =$_POST["lName"];
        $customerCity = $_POST["city"];
        $customerPhoneNumber = $_POST["phoneNumber"];
        $customerAgent = $_POST["agentID"];

        $query = 'INSERT INTO customers VALUES ("' . $customerFirstName . '","' . $customerLastName . '","' . $customerCity . '","'
            . $customerPhoneNumber . ',' . $customerAgent . ')';

        if (!mysqli_query($connection, $query)) {
            die ("Query failed!");
        }
        else {
            header('Location: newcustomer.php');
        }
    ?>

    <?php
        mysqli_close($connection);
    ?>
</body>
</html>
