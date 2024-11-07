<?php
session_start(); // Start the session to store information

// Include the connection file
include_once("connection.php"); // Ensure this file exists and has the correct DB connection code

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize variables to hold patient and doctor details
$patientDetails = '';
$doctorDetails = '';

// Search for Patient
if (isset($_POST['search_patient'])) {
    $patient_id = $_POST['patient_id'];

    // Prepare the SQL statement to fetch patient details based on ID
    $stmt = $con->prepare("SELECT * FROM patient WHERE patient_id = ?");
    $stmt->bind_param("i", $patient_id); // Bind the patient ID as an integer to avoid SQL injection
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a patient record was found
    if ($result->num_rows > 0) {
        // Fetch and store the patient details
        $row = $result->fetch_assoc();
        $_SESSION['patient'] = $row; // Store patient details in session
        $patientDetails .= "<h2>Patient Details Found!</h2>"; // Confirmation message
    } else {
        $patientDetails .= "<p>No patient found with ID " . htmlspecialchars($patient_id) . ".</p>";
    }

    // Close the statement
    $stmt->close();
}

// Search for Doctor
if (isset($_POST['search_doctor'])) {
    $doctor_id = $_POST['doctor_id'];

    // Prepare the SQL statement to fetch doctor details based on ID
    $stmt = $con->prepare("SELECT * FROM doctor_register WHERE Doctor_id = ?");
    $stmt->bind_param("i", $doctor_id); // Bind the doctor ID as an integer to avoid SQL injection
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a doctor record was found
    if ($result->num_rows > 0) {
        // Fetch and store the doctor details
        $row = $result->fetch_assoc();
        $_SESSION['doctor'] = $row; // Store doctor details in session
        $doctorDetails .= "<h2>Doctor Details Found!</h2>"; // Confirmation message
    } else {
        $doctorDetails .= "<p>No doctor found with ID " . htmlspecialchars($doctor_id) . ".</p>";
    }

    // Close the statement
    $stmt->close();
}

$con->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Patient and Doctor</title>
    <link rel="stylesheet" href="id.css">
    <style>
        /* Background styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('images/image2.jpg'); /* Image file in the same folder */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* Navbar styling */
        .navbar {
            background-color: rgba(0, 0, 0, 0.6);
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

        /* Search form styling with larger dimensions */
        .search-form {
            max-width: 700px;
            margin: 60px auto;
            padding: 30px;
            border: 3px solid #4CAF50;
            border-radius: 12px;
            box-shadow: 0px 6px 14px rgba(0, 0, 0, 0.3);
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        h2 {
            color: #333;
            text-align: center;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
            font-size: 18px;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 18px;
            outline: none;
            transition: 0.3s;
        }

        button {
            width: 100%;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
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

    <!-- Search Forms -->
    <div class="search-form">
        <h2><u>Search Patient by ID</u></h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="patient_id">Enter Patient ID:</label>
                <input type="number" id="patient_id" name="patient_id" placeholder="Patient ID" required>
            </div>
            <div class="form-group">
                <button type="submit" name="search_patient">Search Patient</button>
            </div>
        </form>
        <div class="patient-details">
            <?php echo $patientDetails; ?>
        </div>
    </div>

    <!-- Search Doctor by ID -->
    <div class="search-form">
        <h2><u>Search Doctor by ID</u></h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="doctor_id">Enter Doctor ID:</label>
                <input type="number" id="doctor_id" name="doctor_id" placeholder="Doctor ID" required>
            </div>
            <div class="form-group">
                <button type="submit" name="search_doctor">Search Doctor</button>
            </div>
        </form>
        <div class="doctor-details">
            <?php echo $doctorDetails; ?>
        </div>
    </div>

    <!-- Proceed to Next Step Button -->
    <?php if (isset($_SESSION['patient']) && isset($_SESSION['doctor'])): ?>
        <div class="proceed-button" style="text-align: center; margin: 20px;">
            <form action="appointment_booking.php" method="POST">
                <button type="submit" style="padding: 15px 30px; font-size: 20px;">Proceed to Book Appointment</button>
            </form>
        </div>
    <?php endif; ?>

</body>
</html>
