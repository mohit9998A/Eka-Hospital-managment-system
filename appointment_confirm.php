<?php
include_once("connection.php");
$patient_id = $_POST['patient_id'];
$patient_name = $_POST['patient_name'];
$email_address = $_POST['email_address'];
$contact = $_POST['contact'];
$doctor_id=$_POST['doctor_id'];
$doctor_name=$_POST['doctor_name'];
$specialization=$_POST['specialization'];
$appointment_date=$_POST['appointment_date'];

$query=mysqli_query($con,"insert into appointment(patient_id,patient_name, email_address,patient_contact,Doctor_id,Doctor_name,
                                      Specialization,appointment_date)
            values ('$patient_id','$patient_name', '$email_address','$contact','$doctor_id',
                    '$doctor_name','$specialization','$appointment_date')");
if($query)
{
    echo "<script>
    alert('Your Appointment has been Booked!!');
    window.location.href = 'Home.html';
  </script>";
}
else
{
    mysqli_error($con);
}
?>
