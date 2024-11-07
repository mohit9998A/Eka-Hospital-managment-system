<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Patient and Doctor</title>
    <link rel="stylesheet" href="id.css">
</head>
<body>

    <!-- Navigation Bar -->
    <div class="navbar">
        <nav>
            <a href="home.html">Home</a>
            <a href="pat_reg.html">Patient Registration</a>
            <a href="dashboard.html">Patient Dashboard</a>
            <a href="docregistration.html">Doctor Registration</a>
            <a href="docschedule.html">Doctor Schedule</a>
            <a href="contactus.html">Contact Us</a>
        </nav>
    </div>

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
    </div>
    <?php
    // Enable error reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
include_once("connection.php"); // Ensure this file exists and has the correct DB connection code

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
        // Fetch and display the patient details
        $row = $result->fetch_assoc();
        echo "<div class='patient-details'>";
        echo "<h2>Patient Details</h2>";
        echo "<p><strong>Patient ID:</strong> " . htmlspecialchars($row['patient_id']) . "</p>";
        echo "<p><strong>Full Name:</strong> " . htmlspecialchars($row['patient_name']) . "</p>";
        echo "<p><strong>Email Address:</strong> " . htmlspecialchars($row['email_address']) . "</p>";
        echo "<p><strong>Age:</strong> " . htmlspecialchars($row['age']) . "</p>";
        echo "<p><strong>Gender:</strong> " . htmlspecialchars($row['gender']) . "</p>";
        echo "<p><strong>Contact Number:</strong> " . htmlspecialchars($row['contact']) . "</p>";
        echo "<p><strong>Blood Group:</strong> " . htmlspecialchars($row['blood_group']) . "</p>";
        echo "<p><strong>Medical History:</strong> " . htmlspecialchars($row['medical_history']) . "</p>";
        echo "</div>";
    } else {
        // If no record is found, display a message
        echo "<p>No patient found with ID " . htmlspecialchars($patient_id) . ".</p>";
    }

    // Close the statement
    $stmt->close();
}
    ?>
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
    </div>

    <!-- PHP Code to Process Patient Search -->
    <?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



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
        // Fetch and display the doctor details
        $row = $result->fetch_assoc();
        echo "<div class='doctor-details'>";
        echo "<h2>Doctor Details</h2>";
        echo "<p><strong>Doctor ID:</strong> " . htmlspecialchars($row['Doctor_id']) . "</p>";
        echo "<p><strong>Doctor Name:</strong> " . htmlspecialchars($row['Doctor_name']) . "</p>";
        echo "<p><strong>Specialization:</strong> " . htmlspecialchars($row['Specialization']) . "</p>";
        echo "<p><strong>Contact Number:</strong> " . htmlspecialchars($row['Contact_number']) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($row['Email']) . "</p>";
        echo "<p><strong>Available Days:</strong> " . htmlspecialchars($row['Available_days']) . "</p>";
        echo "<p><strong>Available From Time:</strong> " . htmlspecialchars($row['FROM_TIME']) . "</p>";
        echo "<p><strong>Available To Time:</strong> " . htmlspecialchars($row['TO_TIME']) . "</p>";
        echo "</div>";
    } else {
        // If no record is found, display a message
        echo "<p>No doctor found with ID " . htmlspecialchars($doctor_id) . ".</p>";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$con->close();
?>


</body>
</html>
