<?php 
    include "connecttodb.php";
    $phone_query = 'UPDATE customers SET phoneNumber="' . $_POST["newCustomerNumber"] . '" WHERE customerID=' . $_POST["customerID"];
    
    if (mysqli_query($connection, $phone_query)) {
        echo 'Successfully updated';
    }
    else {
        echo 'Error' . mysqli_error($connection);
    }
?>