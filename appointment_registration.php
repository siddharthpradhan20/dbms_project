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
    $appt_id = $_POST['Appt_id'];
    $appt_date = $_POST['Appt_Date'];
    $cust_id = $_POST['Cust_id'];
    $location_id = $_POST['Location_id'];
    $vin = $_POST['VIN'];
    

    // Insert the data into the database
    $sql = "INSERT INTO appointment (Appt_id, Appt_Date, Cust_id, Location_id, VIN) VALUES ('$appt_id', '$appt_date', '$cust_id', '$location_id', '$vin')";
    if (mysqli_query($conn, $sql)) {
        echo 'Appointment has been confirmed!';
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
    <title>Appointment Registration Form</title>
</head>
<body>

<h1>Employee Registration Form</h1>

<form method="post">
    <label for="Appt_id">Appointment ID:</label>
    <input type="text" name="Appt_id" required><br><br>
    
    <label for="Appt_Date">Appointment Date:</label>
    <input type="date" name="Appt_Date" required><br><br>
    
    <label for="Cust_id">Customer ID:</label>
    <input type="text" name="Cust_id" required><br><br>
    
    <label for="Location_id">Location ID:</label>
    <input type="text" name="Location_id" required><br><br>
    
    <label for="VIN">Vehicle Identification Number:</label>
    <input type="text" name="VIN" required><br><br>
    
    <input type="submit" value="Register">
</form>

</body>
</html>