<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mentor Dashboard</title>
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
    .card-custom {
      height: 300px; /* Adjust this height as needed */
    }
    .card-body-custom {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
  </style>
</head>
<body>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Mentor Dashboard</a>
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
    <a href="#">Engage with Students</a>
    <a href="#">Communicate with Mentors</a>
    <a href="#">Provide Guidance</a>
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

      <!-- Dashboard Header -->
      <h1 class="text-center mb-4">Mentor Dashboard</h1>

      <!-- Filter Section -->
      <div class="form-group">
        <label for="fieldSelect">Filter by Field</label>
        <select class="form-control" id="fieldSelect">
          <option value="all">All Fields</option>
          <option value="science">Science</option>
          <option value="technology">Technology</option>
          <option value="engineering">Engineering</option>
          <option value="mathematics">Mathematics</option>
        </select>
      </div>

      <!-- Engage with Students Section -->
      <h2 class="mb-4">Engage with Students</h2>
      <div class="row" id="students-section">
        <!-- Student 1 -->
        <div class="col-md-4 student-card" data-field="science">
          <div class="card card-custom mb-4">
            <div class="card-body card-body-custom">
              <h5 class="card-title">Student Name 1</h5>
              <p class="card-text">Recent activities and messages from the student...</p>
              <a href="#" class="btn btn-primary">View Profile</a>
              <a href="#" class="btn btn-secondary mt-2">Message</a>
            </div>
          </div>
        </div>
        <!-- Student -->
      </div>

      <!-- Communicate with Mentors Section -->
      <h2 class="mb-4 mt-5">Communicate with Mentors</h2>
      <div class="row" id="mentors-section">
        <!-- Mentor 1 -->
        <div class="col-md-4 mentor-card" data-field="science">
          <div class="card card-custom mb-4">
            <div class="card-body card-body-custom">
              <h5 class="card-title">Mentor Name 1</h5>
              <p class="card-text">Recent activities and messages from the mentor...</p>
              <a href="#" class="btn btn-primary">View Profile</a>
              <a href="#" class="btn btn-secondary mt-2">Message</a>
            </div>
          </div>
        </div>
        <!-- Mentor -->
      </div>

      <!-- Provide Guidance Section -->
      <h2 class="mb-4 mt-5">Provide Guidance</h2>
      <div class="row" id="guidance-section">
        <!-- Guidance 1 -->
        <div class="col-md-4 guidance-card" data-field="science">
          <div class="card card-custom mb-4">
            <div class="card-body card-body-custom">
              <h5 class="card-title">Guidance Topic 1</h5>
              <p class="card-text">Brief description of the guidance topic...</p>
              <a href="#" class="btn btn-primary">Read More</a>
              <a href="#" class="btn btn-secondary mt-2">Post New Guidance</a>
            </div>
          </div>
        </div>
        <!-- Guidance -->
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
