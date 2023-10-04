<?php
$servername = "localhost";
$username = "root";
$password = "9528176114";
$dbname = "agency_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "INSERT INTO users (email, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error: " . $conn->error);
}

$stmt->bind_param("ss", $email, $password);

if ($stmt->execute()) {
    echo "Data inserted successfully.";

    header("Location: add_car.php");
    exit(); 
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
