
<?php
  include 'connecttodb.php';
?>

<?php
    $query = "SELECT MAX(customerID) as id from customers";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query did not work");
    }

    $row = mysqli_fetch_assoc($result);
    $id = intval($row["id"]) + 2;
?>
