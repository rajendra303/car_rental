<!DOCTYPE html>
<html>
<head>
    <title>Car Registration Form</title>
<style>
    
form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f4f4f4;
    border: 1px solid #ccc;
    border-radius: 5px;
}

h1 {
    text-align: center;
    color: #333;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 3px;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

br {
    margin-bottom: 10px;
}

</style>

</head>
<body>
    <h1>Car Registration Form</h1>
    <form action="databases.php" method="post">
        <label for="vehicle_model">Vehicle Model:</label>
        <input type="text" id="vehicle_model" name="vehicle_model" required><br><br>

        <label for="vehicle_number">Vehicle Number:</label>
        <input type="text" id="vehicle_number" name="vehicle_number" required><br><br>

        <label for="seating_capacity">Seating Capacity:</label>
        <input type="number" id="seating_capacity" name="seating_capacity" required><br><br>

        <label for="rent_per_day">Rent Per Day:</label>
        <input type="number" id="rent_per_day" name="rent_per_day" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>


</body>
</html>
