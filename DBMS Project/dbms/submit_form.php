<?php
require_once('connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $donor_name = $_POST['donor_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $mobile_number = $_POST['mobile_number'];
    $weight = $_POST['weight'];
    $blood_pressure = isset($_POST['blood_pressure']) ? $_POST['blood_pressure'] : null;
    $iron_content = isset($_POST['iron_content']) ? $_POST['iron_content'] : null;
    $blood_bank_name = isset($_POST['blood_bank_name']) ? $_POST['blood_bank_name'] : null;
    $blood_group = $_POST['blood_group'];

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO donor_personal (DonorName, Gender, DateOfBirth, MobileNumber) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $donor_name, $gender, $dob, $mobile_number);

    if ($stmt->execute()) {
        $donor_id = $conn->insert_id;
        $stmt->close();

        // Insert health-related data if provided
        if ($blood_pressure || $iron_content || $blood_bank_name || $blood_group) {
            $stmt = $conn->prepare("INSERT INTO donor_health (DonorID, Weight, BloodPressure, IronContent, BloodBankName, BloodGroup) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("idssss", $donor_id, $weight, $blood_pressure, $iron_content, $blood_bank_name, $blood_group);
            $stmt->execute();
            $stmt->close();
        }

        echo "Data saved successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $conn->close();
}
?>