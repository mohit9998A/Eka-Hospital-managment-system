<?php
include_once("connection.php");

// Retrieve form data
$patient_name = $_POST['patient_name'];
$email_address = $_POST['email_address'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$blood_group = $_POST['blood_group'];
$medical_history = $_POST['medical_history'];

// Prepare and execute the SQL query to insert the data into the database
$query = mysqli_query($con, "INSERT INTO patient (patient_name, email_address, age, gender, contact, blood_group, medical_history) 
                             VALUES ('$patient_name', '$email_address', '$age', '$gender', '$contact', '$blood_group', '$medical_history')");

if ($query) {
    // Retrieve the last inserted patient ID
    $patient_id = mysqli_insert_id($con);

    // Show alert with patient ID and redirect using JavaScript
    echo "<script>
            alert('Patient has been registered successfully. Patient ID: $patient_id');
            window.location.href = 'Home.html';
          </script>";
} else {
    // Display the error message if insertion fails
    echo "<script>
            alert('Error: Unable to register patient.');
          </script>";
}

// Close the database connection
mysqli_close($con);
?>
