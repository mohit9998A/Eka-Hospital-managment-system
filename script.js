// script.js

function getPatientInfo() {
    const patientId = document.getElementById("patient-id").value;
  
    if (!patientId) {
      alert("Please enter a Patient ID.");
      return;
    }
  
    // Send AJAX request to fetch patient info
    fetch("get_patient_info.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: `patient_id=${patientId}`
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      const patientInfoDiv = document.getElementById("patient-info");
  
      if (data.error) {
        patientInfoDiv.innerHTML = `<p>${data.error}</p>`;
      } else {
        patientInfoDiv.innerHTML = `
          <h3>Patient Information:</h3>
          <p><strong>Name:</strong> ${data.patient_name}</p>
          <p><strong>Email:</strong> ${data.email_address}</p>
          <p><strong>Age:</strong> ${data.age}</p>
          <p><strong>Gender:</strong> ${data.gender}</p>
          <p><strong>Contact:</strong> ${data.contact}</p>
          <p><strong>Blood Group:</strong> ${data.blood_group}</p>
          <p><strong>Medical History:</strong> ${data.medical_history}</p>
        `;
      }
    })
    .catch(error => {
      console.error("Error fetching patient info:", error);
      document.getElementById("patient-info").innerHTML = "<p>Error fetching data. Please try again.</p>";
    });
  }
  
  // Bind click event to button
  document.getElementById("get-patient-info-btn").addEventListener("click", getPatientInfo);
  