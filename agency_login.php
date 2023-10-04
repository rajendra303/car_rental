<!DOCTYPE html>
<html>
<head>
    <title>Agency Login</title>
    <style>
        
body, h1, label, input, button {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.login-container {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="email"],
input[type="password"] {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 16px;
}

button {
    padding: 10px 20px;
    background-color: #FF5733;
    color: #fff;
    border: none;
    border-radius: 3px;
    font-size: 18px;
    cursor: pointer;
}

button:hover {
    background-color: #FF4500;
}

        
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Agency Login</h1>
        <form action="agency_conn.php" method="POST"> 
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
