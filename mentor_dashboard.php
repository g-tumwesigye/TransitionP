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
  <title>Mentor Dashboard</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"> <!-- FontAwesome for icons -->
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f8f9fa;
    }
    .navbar {
      background: linear-gradient(90deg, #4b6cb7, #182848);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .sidebar {
      height: 100vh;
      width: 240px;
      position: fixed;
      background: #343a40;
      padding-top: 20px;
      color: white;
      transition: width 0.3s;
    }
    .sidebar a {
      color: white;
      display: block;
      padding: 15px 20px;
      text-decoration: none;
      font-size: 16px;
      transition: background 0.3s;
    }
    .sidebar a:hover {
      background: #495057;
      text-decoration: none;
    }
    .sidebar .sidebar-header {
      font-size: 1.5rem;
      text-align: center;
      padding: 10px 0;
      margin-bottom: 1rem;
      background: #495057;
    }
    .content {
      margin-left: 260px;
      padding: 20px;
      transition: margin-left 0.3s;
    }
    .notification {
      background: #f8d7da;
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
      height: 300px;
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .card-custom:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .card-body-custom {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .btn-primary, .btn-secondary {
      border-radius: 20px;
      font-size: 14px;
    }
    .form-control {
      border-radius: 20px;
    }
    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .content {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="#">Mentor Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
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
  <div class="sidebar-header">Menu</div>
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
            <h5 class="card-title">Guidance Title 1</h5>
            <p class="card-text">Details about the guidance provided...</p>
            <a href="#" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>
      <!-- Guidance -->
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  // Filter functionality for student and mentor cards
  document.getElementById('fieldSelect').addEventListener('change', function() {
    var field = this.value;
    filterCards('student-card', field);
    filterCards('mentor-card', field);
    filterCards('guidance-card', field);
  });

  function filterCards(className, field) {
    var cards = document.querySelectorAll('.' + className);
    cards.forEach(function(card) {
      if (field === 'all' || card.getAttribute('data-field') === field) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    });
  }
</script>
</body>
</html>

