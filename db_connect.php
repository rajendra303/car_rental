<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "9528176114";
$db_name = "agency_registration";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $country = $_POST['country'];
    $num_days = $_POST['numDays'];
    $start_date = $_POST['startDate'];

    $formatted_start_date = date("Y-m-d", strtotime($start_date));

    $sql = "INSERT INTO bookings (first_name, last_name, country, num_days, start_date)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssis", $first_name, $last_name, $country, $num_days, $formatted_start_date);
        if ($stmt->execute()) {
            echo "Booking successful!";


            //  header("Location: view_booked_cars.php");
            // exit(); 


        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}
