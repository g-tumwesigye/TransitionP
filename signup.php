<?php
// Start the session
session_start();

// Database configuration
$servername = "sql108.infinityfree.com"; // Replace with your server details
$username = "if0_36973131"; // Replace with your database username
$password = "9reHr7jPZ59v"; // Replace with your database password
$dbname = "if0_36973131_trans"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $role = $_POST['role'];

    // Signup process
    if ($password == $confirmPassword) {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) {
            // Email doesn't exist, proceed with signup
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into database
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
            $username = explode('@', $email)[0]; // Create a username from the email prefix
            $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);

            if ($stmt->execute()) {
                echo "<script>alert('Signup successful! You can now login.');</script>";
            } else {
                echo "<script>alert('Error during signup. Please try again.');</script>";
            }

            $stmt->close();
        } else {
            // Email already exists
            echo "<script>alert('Email already exists. Please use a different email.');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match.');</script>";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"> <!-- FontAwesome -->
    <style>
        .form-container {
            margin-top: 50px;
        }

        .form-title {
            margin-bottom: 30px;
        }

        .role-selector, .form-mode-selector {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="container form-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center form-title">Signup</h2>
            <div class="alert alert-info text-center"></div>
            <form id="userForm" method="POST" action="signup.php">
                <div class="form-group">
                    <label for="role">I am a:</label>
                    <select class="form-control role-selector" id="role" name="role">
                        <option value="student">Student</option>
                        <option value="mentor">Mentor</option>
                        <!-- <option value="admin">Admin</option> -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirmPassword" placeholder="Confirm your password" required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-block" id="formSubmit">Signup</button>
                    <a href="index.php" class="btn btn-secondary btn-block">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- For FontAwesome Icons -->
</body>
</html>

