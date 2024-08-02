<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.php');
    exit();
}

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">

  <title>Admin Dashboard</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"> <!-- FontAwesome for icons -->
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .sidebar {
      height: 100vh;
      width: 200px;
      position: fixed;
      background-color: #343a40;
      padding-top: 20px;
      color: white;
    }
    .sidebar a {
      color: white;
      display: block;
      padding: 10px;
      text-decoration: none;
      font-size: 14px;
    }
    .sidebar a:hover {
      background-color: #495057;
      text-decoration: none;
    }
    .content {
      margin-left: 220px;
      padding: 20px;
    }
    .report {
      background-color: #f8f9fa;
      padding: 20px;
      margin-bottom: 20px;
      border: 1px solid #dee2e6;
      border-radius: 5px;
    }
  </style>
</head>
<body>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Admin Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-bell"></i> Notifications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Profile</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Settings
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Account Settings</a>
          <a class="dropdown-item" href="#">Privacy Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Security</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

  <!-- Sidebar -->
  <div class="sidebar">
    <a href="#">Dashboard</a>
    <a href="#">Manage Users</a>
    <a href="#">Content Moderation</a>
    <a href="#">Reports & Analytics</a>
  </div>

  <!-- Content -->
<?php
// Database connection
$servername = "sql108.infinityfree.com";
$username = "if0_36973131";
$password = "9reHr7jPZ59v";
$dbname = "if0_36973131_trans";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(strip_tags($data));
}

// Check if delete request is sent
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $username_to_delete = sanitize_input($_POST['username']);
    $delete_sql = "DELETE FROM users WHERE username=?";
    $stmt = $conn->prepare($delete_sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $username_to_delete);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>User deleted successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting user: " . $stmt->error . "</div>";
    }
    $stmt->close();
}

// Check if update request is sent
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_user'])) {
    $username = sanitize_input($_POST['username']);
    $role = sanitize_input($_POST['role']);
    $update_sql = "UPDATE users SET role=? WHERE username=?";
    $stmt = $conn->prepare($update_sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ss", $role, $username);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>User updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error updating user: " . $stmt->error . "</div>";
    }
    $stmt->close();
}

// Check if create request is sent
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create_user'])) {
    $new_username = sanitize_input($_POST['new_username']);
    $new_email = sanitize_input($_POST['new_email']);
    $new_password = password_hash(sanitize_input($_POST['new_password']), PASSWORD_DEFAULT); // Securely hash the password
    $new_role = sanitize_input($_POST['new_role']);
    $create_sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($create_sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssss", $new_username, $new_email, $new_password, $new_role);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>User created successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error creating user: " . $stmt->error . "</div>";
    }
    $stmt->close();
}

// Fetch users data
$sql = "SELECT username, email, role FROM users";
$result = $conn->query($sql);
if ($result === false) {
    die("Query failed: " . $conn->error);
}
?>


<!-- User Management Section -->
<div class="content">
    <div class="container mt-5">
        <!-- Dashboard Header -->
        <h1 class="text-center mb-4">Admin Dashboard</h1>

        <!-- Create User Button -->
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#createUserModal">Create User</button>

        <div class="container mt-5">
            <section id="user-management">
                <h2 class="mb-3">Manage Users</h2>
                <div class="table-responsive mb-5">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="user-table-body">
                            <?php
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>" . htmlspecialchars($row['username']) . "</td>
                                        <td>" . htmlspecialchars($row['email']) . "</td>
                                        <td>" . htmlspecialchars($row['role']) . "</td>
                                        <td>
                                            <form method='POST' action='' style='display:inline-block;'>
                                                <input type='hidden' name='username' value='" . htmlspecialchars($row['username']) . "'>
                                                <button type='submit' name='delete_user' class='btn btn-danger btn-sm'>Delete</button>
                                            </form>
                                            <button type='button' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#updateUserModal' data-username='" . htmlspecialchars($row['username']) . "' data-role='" . htmlspecialchars($row['role']) . "'>Update</button>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No users found</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        
<section id="content-moderation">
        <h2 class="mb-3">Content Moderation</h2>
        <div class="table-responsive mb-5">
          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Content Title</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody id="content-table-body">
              <!-- Example Content Rows (Replace with dynamic data) -->
              <tr>
                <td>Content Title 1</td>
                <td>Pending</td>
                <td>
                  <button class="btn btn-success btn-sm action-btn">Approve</button>
                  <button class="btn btn-danger btn-sm action-btn">Reject</button>
                  <button class="btn btn-warning btn-sm action-btn">Edit</button>
                </td>
              </tr>
              <tr>
                <td>Content Title 2</td>
                <td>Approved</td>
                <td>
                  <button class="btn btn-danger btn-sm action-btn">Reject</button>
                  <button class="btn btn-warning btn-sm action-btn">Edit</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Reports and Analytics Section -->
      <section id="reports-analytics">
        <h2 class="mb-3">Reports & Analytics</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="report">
              <h3>Users Overview</h3>
              <p>Insert charts or data tables summarizing user statistics.</p>
              <a href="#" class="btn btn-primary">View Details</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="report">
              <h3>Content Performance</h3>
              <p>Insert charts or data tables showing content performance metrics.</p>
              <a href="#" class="btn btn-primary">View Details</a>
            </div>
          </div>
        </div>
      </section>



    </div>


<!-- Update User Modal -->
<div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUserModalLabel">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" readonly>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="role" name="role" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Create User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_username">Username</label>
                        <input type="text" class="form-control" id="new_username" name="new_username" required>
                    </div>
                    <div class="form-group">
                        <label for="new_email">Email</label>
                        <input type="email" class="form-control" id="new_email" name="new_email" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password">Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="form-group">
                        <label for="new_role">Role</label>
                        <input type="text" class="form-control" id="new_role" name="new_role" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="create_user" class="btn btn-primary">Create User</button>
                </div>
            </form>
        </div>
    </div>

<!-- Content Moderation Section -->
      <section id="content-moderation">
        <h2 class="mb-3">Content Moderation</h2>
        <div class="table-responsive mb-5">
          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Content Title</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody id="content-table-body">
              <!-- Example Content Rows (Replace with dynamic data) -->
              <tr>
                <td>Content Title 1</td>
                <td>Pending</td>
                <td>
                  <button class="btn btn-success btn-sm action-btn">Approve</button>
                  <button class="btn btn-danger btn-sm action-btn">Reject</button>
                  <button class="btn btn-warning btn-sm action-btn">Edit</button>
                </td>
              </tr>
              <tr>
                <td>Content Title 2</td>
                <td>Approved</td>
                <td>
                  <button class="btn btn-danger btn-sm action-btn">Reject</button>
                  <button class="btn btn-warning btn-sm action-btn">Edit</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Reports and Analytics Section -->
      <section id="reports-analytics">
        <h2 class="mb-3">Reports & Analytics</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="report">
              <h3>Users Overview</h3>
              <p>Insert charts or data tables summarizing user statistics.</p>
              <a href="#" class="btn btn-primary">View Details</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="report">
              <h3>Content Performance</h3>
              <p>Insert charts or data tables showing content performance metrics.</p>
              <a href="#" class="btn btn-primary">View Details</a>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

<!-- Include jQuery, Bootstrap JS, and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Script to handle the Update User Modal -->
<script>
  $('#updateUserModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var username = button.data('username'); // Extract info from data-* attributes
    var role = button.data('role'); // Extract info from data-* attributes
    var modal = $(this);
    modal.find('.modal-body #username').val(username);
    modal.find('.modal-body #role').val(role);
  });
</script>

      

  
</body>
</html>


