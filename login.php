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
    $role = $_POST['role'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ? AND role = ?");
    $stmt->bind_param("ss", $email, $role);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Password is correct
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            // Redirect user based on role
            if ($role == 'admin') {
                header("Location: admin_dashboard.php");
            } elseif ($role == 'student') {
                header("Location: student_dashboard.php");
            } elseif ($role == 'mentor') {
                header("Location: mentor_dashboard.php");
            }
            exit();
        } else {
            // Password is incorrect
            echo "<script>alert('Incorrect password');</script>";
        }
    } else {
        // No user found
        echo "<script>alert('No user found with this email and role');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | TransitionPlus</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"> <!-- FontAwesome -->
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 100%;
            max-width: 400px;
        }

        .form-title {
            margin-bottom: 20px;
            font-size: 2rem;
            color: #333;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .form-control {
            border-radius: 10px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }

        .alert {
            display: none;
        }
    </style>
</head>
<body>
<div class="card">
    <h2 class="text-center form-title">Login</h2>
    <div class="alert alert-info text-center"></div>
    <form id="userForm" method="POST" action="login.php">
        <div class="form-group">
            <label for="role">I am a:</label>
            <select class="form-control" id="role" name="role">
                <option value="student">Student</option>
                <option value="mentor">Mentor</option>
                <option value="admin">Admin</option>
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
        <div id="confirm-password-group" class="form-group" style="display: none;">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" class="form-control" id="confirm-password" name="confirmPassword" placeholder="Confirm your password">
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-block" id="formSubmit">Login</button>
            <a href="index.php" class="btn btn-secondary btn-block">Back</a>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- For FontAwesome Icons -->

<script>
    $(document).ready(function () {
        $('#formMode').change(function () {
            if ($(this).val() === 'signup') {
                $('#confirm-password-group').show();
                $('#formSubmit').text('Sign Up');
            } else {
                $('#confirm-password-group').hide();
                $('#formSubmit').text('Login');
            }
        });
    });
</script>
</body>
</html>

