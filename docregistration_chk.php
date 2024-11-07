<?php
include_once("connection.php");

// Retrieve form data
$doctor_name = $_POST['doctor_name'];
$specialization = $_POST['specialization'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$available_days = $_POST['available_days'];
$FROM_TIME = $_POST['FROM_TIME'];
$TO_TIME = $_POST['TO_TIME'];

// Prepare and execute the SQL query to insert the data into the database
$query = mysqli_query($con, "INSERT INTO doctor_register (Doctor_name, Specialization, Contact_number, Email, Available_days, FROM_TIME, TO_TIME)
                             VALUES ('$doctor_name', '$specialization', '$contact', '$email', '$available_days', '$FROM_TIME', '$TO_TIME')");

if ($query) {
    // Retrieve the last inserted doctor ID
    $doctor_id = mysqli_insert_id($con);

    // Show alert with doctor ID and redirect using JavaScript
    echo "<script>
            alert('Doctor has been registered successfully. Doctor ID: $doctor_id');
            window.location.href = 'Home.html';
          </script>";
} else {
    // Display the error message if insertion fails
    echo "<script>
            alert('Error: Unable to register doctor.');
          </script>";
}

// Close the database connection
mysqli_close($con);
?>
