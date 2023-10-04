<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "9528176114";
    $db_name = "agency_registration";

    $vehicle_model = $_POST["vehicle_model"];
    $vehicle_number = $_POST["vehicle_number"];
    $seating_capacity = $_POST["seating_capacity"];
    $rent_per_day = $_POST["rent_per_day"];

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql_insert = "INSERT INTO cars (vehicle_model, vehicle_number, seating_capacity, rent_per_day)
                   VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_insert);

    if ($stmt) {
        $stmt->bind_param("ssii", $vehicle_model, $vehicle_number, $seating_capacity, $rent_per_day);

        if ($stmt->execute()) {
            echo "Car details inserted successfully.";

            header("Location: available_cars.php");
            exit(); 

        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
