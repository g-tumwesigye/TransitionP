<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <a href="#">Platform Settings</a>
  </div>

  <!-- Content -->
  <div class="content">
    <div class="container mt-5">
      <!-- Dashboard Header -->
      <h1 class="text-center mb-4">Admin Dashboard</h1>

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

      // Check if delete request is sent
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
          $username_to_delete = $_POST['username'];
          $delete_sql = "DELETE FROM users WHERE username='$username_to_delete'";
          if ($conn->query($delete_sql) === TRUE) {
              echo "<div class='alert alert-success'>User deleted successfully.</div>";
          } else {
              echo "<div class='alert alert-danger'>Error deleting user: " . $conn->error . "</div>";
          }
      }

      // Fetch users data
      $sql = "SELECT username, role FROM users";
      $result = $conn->query($sql);
      ?>

      <!-- User Management Section -->
      <div class="container mt-5">
        <section id="user-management">
          <h2 class="mb-3">Manage Users</h2>
          <div class="table-responsive mb-5">
            <table class="table table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">User Name</th>
                  <th scope="col">Role</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody id="user-table-body">
              <?php
              if ($result->num_rows > 0) {
                  // Output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<tr>
                              <td>" . htmlspecialchars($row['username']) . "</td>
                              <td>" . htmlspecialchars($row['role']) . "</td>
                              <td>
                                  <form method='POST' action=''>
                                      <input type='hidden' name='username' value='" . htmlspecialchars($row['username']) . "'>
                                      <button type='submit' name='delete_user' class='btn btn-danger btn-sm'>Delete</button>
                                       
                                  </form>
                              </td>
                            </tr>";
                  }
              } else {
                  echo "<tr><td colspan='3'>No users found</td></tr>";
              }
              $conn->close();
              ?>
              </tbody>
            </table>
          </div>
        </section>
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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

