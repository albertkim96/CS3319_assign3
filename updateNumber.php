<?php 
    include 'connecttodb.php';
    $phone_query = 'UPDATE customers SET phoneNumber="' . $_POST["newCustomerNumber"] . '" WHERE customerID=' . $_POST["customers"];
    $result = mysqli_query($connection, $phone_query);
    if (mysqli_query($result)) {
        echo 'Successfully updated';
    }
    else {
        echo 'Error' . mysqli_error($connection);
    }
?>