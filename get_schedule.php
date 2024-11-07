<?php
include_once("connection.php");

if (isset($_POST['doctor_id'])) {
    $doctor_id = $_POST['doctor_id'];
    
    // Fetch doctor schedule from database
    $query = mysqli_query($con, "SELECT Available_days, FROM_TIME, TO_TIME FROM doctor_register WHERE Doctor_id = '$doctor_id'");
    
    // Check if any schedule is found
    if (mysqli_num_rows($query) > 0) {
        $schedule = [];
        
        while ($row = mysqli_fetch_assoc($query)) {
            $schedule[] = [
                'available_days' => $row['Available_days'],
                'FROM_TIME' => $row['FROM_TIME'],
                'TO_TIME' => $row['TO_TIME']
            ];
        }
        
        // Send JSON response
        echo json_encode(['success' => true, 'schedule' => $schedule]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No schedule found']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Doctor ID not provided']);
}
?>
