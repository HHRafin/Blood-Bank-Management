<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: lavender;
        }

        .content {
            width: 50%;
            max-width: 800px; /* Limit the width of the content */
            padding: 20px;
            border: 8px solid #ddd; /* Add border */
            border-radius: 8px; /* Add border radius */
            background-color: white; /* Background color for the content */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .no-donor-message {
            font-size: 18px; /* Set a larger font size for the message */
            margin-bottom: 10px; /* Add some margin at the bottom of the message */
        }

        .btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Search Results</h2>
        <?php
        require_once('connection.php');

        // Check if blood group is provided in the query string
        if (isset($_GET['blood_group'])) {
            $blood_group = $_GET['blood_group'];

            // Fetch donor information by blood group
            $sql = "SELECT dp.DonorID, dp.DonorName, dp.Gender, dp.DateOfBirth, dp.MobileNumber, dh.Weight, dh.BloodPressure, dh.IronContent, dh.BloodBankName, dh.BloodGroup 
                    FROM donor_personal dp
                    LEFT JOIN donor_health dh ON dp.DonorID = dh.DonorID
                    WHERE dh.BloodGroup = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $blood_group);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Donor ID</th><th>Name</th><th>Gender</th><th>Date of Birth</th><th>Mobile Number</th><th>Weight (kg)</th><th>Blood Pressure</th><th>Iron Content</th><th>Blood Bank Name</th><th>Blood Group</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['DonorID'] . "</td>";
                    echo "<td>" . $row['DonorName'] . "</td>";
                    echo "<td>" . $row['Gender'] . "</td>";
                    echo "<td>" . $row['DateOfBirth'] . "</td>";
                    echo "<td>" . $row['MobileNumber'] . "</td>";
                    echo "<td>" . $row['Weight'] . "</td>";
                    echo "<td>" . $row['BloodPressure'] . "</td>";
                    echo "<td>" . $row['IronContent'] . "</td>";
                    echo "<td>" . $row['BloodBankName'] . "</td>";
                    echo "<td>" . $row['BloodGroup'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<div class='no-donor-message'>No donors found for blood group " . $blood_group . "</div>";
            }
        } else {
            echo "<div class='no-donor-message'>Blood group not provided</div>";
        }

        $conn->close();
        ?>
        <br>
        <button class="btn" onclick="location.href='index.html'">Back to Index</button>
    </div>
</body>
</html>
