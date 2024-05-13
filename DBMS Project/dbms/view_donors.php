<!DOCTYPE html>
<html>
<head>
    <title>View Donors</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: lavender;
            
        }
   

        h2 {
            margin-bottom: 20px; /* Add some margin to separate the headline from the table */
            text-align: center;
        }

        table.container {
            width: 50%;
            max-width: 800px; /* Limit the width of the content */
            padding: 20px;
            border: 8px solid #ddd; /* Add border */
            border-radius: 8px; /* Add border radius */
            background-color: white; /* Background color for the content */
        }

        table {
            width: 80%;
            border-collapse: collapse;
            background-color: white;
            
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            /* Add box-shadow to create a box effect */
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #f2f2f2;
            /* Add border-radius to th elements to create rounded corners */
            border-radius: 5px 5px 0 0;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h2>Donor Information</h2>
    <table>
        <tr>
            <th style="border-bottom: none;">Donor ID</th>
            <th style="border-bottom: none;">Name</th>
            <th style="border-bottom: none;">Gender</th>
            <th style="border-bottom: none;">Date of Birth</th>
            <th style="border-bottom: none;">Mobile Number</th>
            <th style="border-bottom: none;">Weight (kg)</th>
            <th style="border-bottom: none;">Blood Pressure</th>
            <th style="border-bottom: none;">Iron Content</th>
            <th style="border-bottom: none;">Blood Bank Name</th>
            <th style="border-bottom: none;">Blood Group</th>
        </tr>
        <?php
        require_once('connection.php');

        // Fetch donor information from both tables
        $sql = "SELECT dp.DonorID, dp.DonorName, dp.Gender, dp.DateOfBirth, dp.MobileNumber, dh.Weight, dh.BloodPressure, dh.IronContent, dh.BloodBankName, dh.BloodGroup 
                FROM donor_personal dp
                LEFT JOIN donor_health dh ON dp.DonorID = dh.DonorID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
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
        } else {
            echo "<tr><td colspan='10'>No donors found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
