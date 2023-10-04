<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '9528176114';
$db_name = 'agency_registration';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$agencyname = $_POST['agencyname'];
$contactemail = $_POST['contactemail'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

$sql = "INSERT INTO agencies (agencyname, contactemail, password) VALUES ('$agencyname', '$contactemail', '$password')";

if (mysqli_query($conn, $sql)) {   
    header("Location: agency_login.php");
    exit(); 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
