<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "9528176114";
$db_name = "agency_registration";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_select = "SELECT * FROM cars";
$result = $conn->query($sql_select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Cars to Rent</title>
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
            width: 100%;
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

        select, input[type="date"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #555;
        }


.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fff;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 50%;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.close {
    color: #aaa;
    float: right;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #000;
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

form label {
    font-weight: bold;
}

form input[type="text"],
form select,
form input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

form select {
    appearance: none; 
}

form button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 12px 20px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s;
}

form button:hover {
    background-color: #555;
}

@media (max-width: 768px) {
    .modal-content {
        width: 80%;
    }
}
    </style>
</head>
<body>
    <h1>Available Cars to Rent</h1>
    <table>
        <thead>
            <tr>
                <th>Vehicle Model</th>
                <th>Vehicle Number</th>
                <th>Seating Capacity</th>
                <th>Rent per Day</th>
                <th>Number of Days</th>
                <th>Start Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["vehicle_model"] . "</td>";
                    echo "<td>" . $row["vehicle_number"] . "</td>";
                    echo "<td>" . $row["seating_capacity"] . "</td>";
                    echo "<td>" . $row["rent_per_day"] . "</td>";
                    echo "<td>";
                    echo "<select class='numDays'>";
                    for ($i = 1; $i <= 9; $i++) {
                        echo "<option value='$i'>$i Day" . ($i > 1 ? 's' : '') . "</option>";
                    }
                    echo "</select>";
                    echo "</td>";
                    echo "<td>";
                    echo "<input type='date' class='startDate' name='startDate'>";
                    echo "</td>";
                    echo "<td>";
                    echo "<button onclick='openModal()'>Rent Car</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No cars available.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        function openModal() {
            var modal = document.getElementById('carRentModal');
            modal.style.display = 'block';
        }

        function closeModal() {
            var modal = document.getElementById('carRentModal');
            modal.style.display = 'none';
        }

    </script>

    <!-- Modal -->
    <div id="carRentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Rent a Car</h2>
            <form action="db_connect.php" method="POST" id="carRentForm">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name..">
                <br>

                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                <br>

                <label for="country">Country</label>
                <select id="country" name="country">
                    <option value="india">India</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                </select>
                <br>

                <label for="numDays">Number of Days:</label>
                <select class="numDays" name="numDays">
                    <?php
                    for ($i = 1; $i <= 9; $i++) {
                        echo "<option value='$i'>$i Day" . ($i > 1 ? 's' : '') . "</option>";
                    }
                    ?>
                </select>
                <br>

                <label for="startDate">Start Date:</label>
                <input type="date" class="startDate" name="startDate">
                <br>

                <button type="submit">Submit</button>
            </form>

        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>





