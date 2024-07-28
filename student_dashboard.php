
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
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
    .notification {
      background-color: #f8d7da;
      border-color: #f5c6cb;
      color: #721c24;
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      border-radius: .25rem;
      display: flex;
      align-items: center;
    }
    .notification .fa-bell {
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Student Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-bell"></i> Notifications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
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
    <a href="#">Scholarships</a>
    <a href="#">Mentorship Opportunities</a>
    <a href="#">Courses</a>
    <a href="#">Settings</a>
  </div>

  <!-- Content -->
  <div class="content">
    <div class="container mt-5">
      <!-- Notification Section -->
      <div id="notification-section" class="notification">
        <i class="fas fa-bell"></i>
        <strong>New Notification!</strong> You have new notifications.
      </div>

      <h1 class="text-center mb-4">Scholarship Listings</h1>
      <div class="row">
        <!-- Scholarship 1 -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Scholarship Name 1</h5>
              <p class="card-text">Brief description of the scholarship. This scholarship is available for students who...</p>
              <p class="card-text"><small class="text-muted">Deadline: June 30, 2024</small></p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <!-- Scholarship 2 -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Scholarship Name 2</h5>
              <p class="card-text">Brief description of the scholarship. This scholarship is available for students who...</p>
              <p class="card-text"><small class="text-muted">Deadline: July 15, 2024</small></p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <!-- Scholarship 3 -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Scholarship Name 3</h5>
              <p class="card-text">Brief description of the scholarship. This scholarship is available for students who...</p>
              <p class="card-text"><small class="text-muted">Deadline: August 1, 2024</small></p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      </div>

      <h1 class="text-center mb-4 mt-5">Mentorship Opportunities</h1>
      <div class="row">
        <!-- Mentorship 1 -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Mentorship Program 1</h5>
              <p class="card-text">Brief description of the mentorship program. This program is available for students who...</p>
              <p class="card-text"><small class="text-muted">Start Date: July 1, 2024</small></p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <!-- Mentorship 2 -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Mentorship Program 2</h5>
              <p class="card-text">Brief description of the mentorship program. This program is available for students who...</p>
              <p class="card-text"><small class="text-muted">Start Date: August 15, 2024</small></p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <!-- Mentorship 3 -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Mentorship Program 3</h5>
              <p class="card-text">Brief description of the mentorship program. This program is available for students who...</p>
              <p class="card-text"><small class="text-muted">Start Date: September 1, 2024</small></p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      </div>

      <h1 class="text-center mb-4 mt-5">Other Information</h1>
      <div class="row">
        <!-- Additional information -->
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Courses</h5>
              <p class="card-text">Details about courses you can enroll in...</p>
              <a href="#" class="btn btn-primary">View Courses</a>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <p class="card-text">Manage your account settings...</p>
              <a href="#" class="btn btn-primary">Go to Settings</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
