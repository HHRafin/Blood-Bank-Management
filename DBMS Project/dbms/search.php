<!DOCTYPE html>
<html>
<head>
    <title>Search Donors</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: lavender; /* Set background color for the whole page */
        }

        .container {
            background-color: #ffffff; /* Set background color for the container */
            padding: 20px;
            border-radius: 8px;
            border-color: solid black;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add box shadow for a raised effect */
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="submit"] {
            margin-top: 10px;
            cursor: pointer;
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
    </style>
</head>
<body>
    <div class="container"> <!-- Enclose body content within the container -->
        <h2>Search Blood Group</h2>
        <form action="search_result.php" method="get">
            <label for="blood_group">Blood Group:</label>
            <select name="blood_group" id="blood_group" required>
                <option value="" selected disabled>Select</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
            <input type="submit" value="Search">
        </form>
    </div>
</body>
</html>
