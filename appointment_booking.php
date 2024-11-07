<?php
session_start(); // Start the session to access patient and doctor information

// Check if patient and doctor details are set in the session
if (!isset($_SESSION['patient']) || !isset($_SESSION['doctor'])) {
    // Redirect to the search page if no details are available
    header("Location: search_page.php"); // Change to your actual search page file name
    exit();
}

// Fetch patient and doctor details from session
$patient = $_SESSION['patient'];
$doctor = $_SESSION['doctor'];

// Clear session data after fetching
unset($_SESSION['patient']);
unset($_SESSION['doctor']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="id.css">
    <style>
        /* Background styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('images/image2.jpg'); /* Image file in the same folder */
            background-size: cover; /* Ensures the image covers the entire screen */
            background-position: center; /* Center the background image */
            background-repeat: no-repeat; /* Prevent the image from repeating */
            background-attachment: fixed; /* Keeps the background fixed on scroll */
            background-opacity: 
        }

        /* Navbar styling */
        .navbar {
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent background */
            padding: 15px;
            text-align: center;
        }

        .navbar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #ddd;
        }

        /* Form container styling */
        .registration-form {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            padding: 20px;
            max-width: 600px;
            margin: 50px auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="navbar">
        <nav>
            <a href="home.html">Home</a>
            <a href="pat_reg.html">Patient Registration</a>
            <a href="Appointment.php">Appointment</a>
            <a href="dashboard.php">Patient Dashboard</a>
            <a href="docregistration.html">Doctor Registration</a>
            <a href="docschedule.html">Doctor Schedule</a>
            <a href="contactus.html">Contact Us</a>
        </nav>
    </div><br><br><br><br>
    <div class="appointment-details">
        <h2>Appointment Booking</h2>
        
        <!-- Appointment Booking Form -->
        <form action="appointment_confirm.php" method="POST">
            <h3>Patient Details</h3>
            <div class="form-group">
                <label for="patient_id">Patient ID:</label>
                <input type="text" id="patient_id" name="patient_id" value="<?php echo htmlspecialchars($patient['patient_id']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="patient_name">Full Name:</label>
                <input type="text" id="patient_name" name="patient_name" value="<?php echo htmlspecialchars($patient['patient_name']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="email_address">Email Address:</label>
                <input type="email" id="email_address" name="email_address" value="<?php echo htmlspecialchars($patient['email_address']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="text" id="contact" name="contact" value="<?php echo htmlspecialchars($patient['contact']); ?>" readonly>
            </div>
            
            <h3>Doctor Details</h3>
            <div class="form-group">
                <label for="doctor_id">Doctor ID:</label>
                <input type="text" id="doctor_id" name="doctor_id" value="<?php echo htmlspecialchars($doctor['Doctor_id']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="doctor_name">Doctor Name:</label>
                <input type="text" id="doctor_name" name="doctor_name" value="<?php echo htmlspecialchars($doctor['Doctor_name']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="specialization">Specialization:</label>
                <input type="text" id="specialization" name="specialization" value="<?php echo htmlspecialchars($doctor['Specialization']); ?>" readonly>
            </div>
            
            <div class="form-group">
                <label for="appointment_date">Select Appointment Date:</label>
                <input type="date" id="appointment_date" name="appointment_date" required>
            </div>
            <div class="form-group">
                <button type="submit">Confirm Appointment</button>
            </div>
        </form>
    </div>

</body>
</html>
