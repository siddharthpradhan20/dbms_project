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
    $ssn = $_POST['SSN'];
    $name = $_POST['Emp_Name'];
    $hiring_date = $_POST['Hiring_Date'];
    $emp_role = $_POST['Emp_role'];
    $location_id = $_POST['Location_Id'];
    

    // Insert the data into the database
    $sql = "INSERT INTO emp (SSN, Emp_Name, Hiring_Date, Emp_role, Location_Id) VALUES ('$ssn', '$name', '$hiring_date', '$emp_role', '$location_id')";
    if (mysqli_query($conn, $sql)) {
        echo 'Employee Registration successful';
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
    <title>Employee Registration Form</title>
</head>
<body>

<h1>Employee Registration Form</h1>

<form method="post">
    <label for="SSN">SSN:</label>
    <input type="text" name="SSN" required><br><br>
    
    <label for="Emp_Name">Name:</label>
    <input type="text" name="Emp_Name" required><br><br>
    
    <label for="Hiring_Date">Hiring Date:</label>
    <input type="date" name="Hiring_Date" required><br><br>
    
    <label for="Emp_role">Employee Role:</label>
    <input type="text" name="Emp_role" required><br><br>
    
    <label for="Location_Id">Location Id:</label>
    <input type="text" name="Location_Id" required><br><br>
    
    <input type="submit" value="Register">
</form>

</body>
</html>