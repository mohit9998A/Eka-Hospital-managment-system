<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
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

        /* Styling for Filter Button */
        #filter-btn {
            width: auto;
            padding: 10px 20px;
            background-color: #4CAF50; /* Green color */
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        #filter-btn:hover {
            background-color: #45a049; /* Slightly darker green on hover */
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2><u>Appointment Dashboard</u></h2>
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
    </div>
        
        <!-- Search/Filter Bar -->
        <div class="filter-container">
            <form action="" method="POST" id="search-form">
                <input type="text" id="search-patient" name="patient_id" placeholder="Search by Patient ID">&emsp13;
                <input type="text" id="search-doctor" name="doctor_id" placeholder="Search by Doctor ID">
                <input type="date" id="search-date" name="appointment_date">
                <button type="submit" id="filter-btn">Filter</button>
            </form>
        </div>

        <!-- Appointment Table -->
        <table class="appointment-table">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Email</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="appointment-list">
                <?php
                include_once("connection.php"); // Include your database connection

                // Check if the form is submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Sanitize and retrieve the input values
                    $patient_id = isset($_POST['patient_id']) ? mysqli_real_escape_string($con, $_POST['patient_id']) : '';
                    $doctor_id = isset($_POST['doctor_id']) ? mysqli_real_escape_string($con, $_POST['doctor_id']) : '';
                    $appointment_date = isset($_POST['appointment_date']) ? mysqli_real_escape_string($con, $_POST['appointment_date']) : '';

                    // Prepare the SQL query to search appointments
                    $query = "SELECT patient_name, email_address, Doctor_name, appointment_date FROM appointment WHERE 1=1";

                    // Add conditions based on input
                    if (!empty($patient_id)) {
                        $query .= " AND patient_id = '$patient_id'";
                    }
                    if (!empty($doctor_id)) {
                        $query .= " AND Doctor_id = '$doctor_id'";
                    }
                    if (!empty($appointment_date)) {
                        $query .= " AND appointment_date = '$appointment_date'";
                    }

                    // Execute the query
                    $result = mysqli_query($con, $query);

                    // Check if there are results
                    if (mysqli_num_rows($result) > 0) {
                        // Fetch and display each row of appointment data
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['patient_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email_address']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Doctor_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['appointment_date']) . "</td>";
                            echo "<td>Confirmed</td>"; // Assuming all displayed appointments are confirmed
                            echo "</tr>";
                        }
                    } else {
                        // If no records found, show a message
                        echo "<tr><td colspan='5'>No appointments found.</td></tr>";
                    }
                }

                // Close the database connection
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
