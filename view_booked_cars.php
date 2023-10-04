<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "9528176114";
$db_name = "agency_registration";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bookings";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Booked Cars</title>

        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin: 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #333;
            background-color: #f0f0f0;
            padding: 10px 20px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #333;
            color: #fff;
        }
    </style>

</head>
<body>
    <h1>View Booked Cars</h1>
    
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Country</th><th>Number of Days</th><th>Start Date</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "<td>" . $row["country"] . "</td>";
            echo "<td>" . $row["num_days"] . "</td>";
            echo "<td>" . $row["start_date"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No cars have been booked.";
    }
    ?>

    <a href="available_cars.php">Go back to booking page</a>
</body>
</html>

<?php
$conn->close();
?>
