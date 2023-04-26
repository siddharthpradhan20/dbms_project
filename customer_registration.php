<?php

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Connect to the database
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'dmsd_project';
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Get the form data
    $cust_id = $_POST['Cust_id'];
    $name = $_POST['Cust_name'];
    $address = $_POST['Cust_address'];
    $phone = $_POST['Cust_phone'];
    $email = $_POST['Cust_Email'];
    $credit_card = $_POST['Cust_CreditCard'];
    

    // Insert the data into the database
    $sql = "INSERT INTO customer (Cust_id, Cust_name, Cust_address, Cust_phone, Cust_Email, Cust_CreditCard) VALUES ('$cust_id', '$name', '$address', '$phone', '$email', '$credit_card')";
    if (mysqli_query($conn, $sql)) {
        echo 'Customer registration successful';
    } else {
        echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration Form</title>
</head>
<body>

<h1>Customer Registration Form</h1>

<form method="post">
    <label for="Cust_id">Customer ID:</label>
    <input type="text" name="Cust_id" required><br><br>
    
    <label for="Cust_name">Name:</label>
    <input type="text" name="Cust_name" required><br><br>
    
    <label for="Cust_address">Address:</label>
    <input type="text" name="Cust_address" required><br><br>
    
    <label for="Cust_phone">Phone:</label>
    <input type="tel" name="Cust_phone" required><br><br>
    
    <label for="Cust_Email">Email:</label>
    <input type="email" name="Cust_Email" required><br><br>
    
    <label for="Cust_CreditCard">Credit Card Number:</label>
    <input type="text" name="Cust_CreditCard" required><br><br>

    <input type="submit" value="Register">
</form>

</body>
</html>