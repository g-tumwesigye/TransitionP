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
  <title>Student Dashboard</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      background-color: #f4f6f9;
    }
    .navbar {
      background-color: #343a40;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .navbar-brand {
      font-size: 1.5rem;
      font-weight: bold;
    }
    .sidebar {
      height: 100vh;
      width: 250px;
      position: fixed;
      background: linear-gradient(180deg, #007bff 0%, #6610f2 100%);
      padding-top: 20px;
      color: white;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }
    .sidebar a {
      color: white;
      display: block;
      padding: 15px;
      text-decoration: none;
      font-size: 16px;
      transition: background 0.3s;
    }
    .sidebar a:hover {
      background-color: #6c757d;
      text-decoration: none;
    }
    .content {
      margin-left: 270px;
      padding: 20px;
      background-color: #f4f6f9;
      min-height: 100vh;
    }
    .notification {
      background-color: #ffdd57;
      border-color: #ffca28;
      color: #856404;
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      border-radius: .25rem;
      display: flex;
      align-items: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .notification .fa-bell {
      margin-right: 10px;
    }
    .card {
      border: none;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card-title {
      font-weight: bold;
      font-size: 1.25rem;
    }
    .btn-primary {
      background: linear-gradient(90deg, #007bff 0%, #6610f2 100%);
      border: none;
    }
    .btn-primary:hover {
      background: linear-gradient(90deg, #6610f2 0%, #007bff 100%);
    }
    .text-muted {
      color: #6c757d !important;
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
          <a class="nav-link" href="#"><i class="fas fa-bell"></i> Notifications</a>
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
    <a href="#">Scholarship Opportunities</a>
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

      <h1 class="text-center mb-4">Scholarship Opportunities</h1>
      <div class="row">
        <!-- Scholarship 1 -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Merit-Based Excellence Scholarship</h5>
              <p class="card-text">This scholarship recognizes outstanding academic achievement and is awarded to students who have demonstrated exceptional performance in their studies. It is open to high school students with a strong academic record and a commitment to academic excellence.</p>
              <p class="card-text"><small class="text-muted">Deadline: August 20, 2024</small></p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <!-- Scholarship 2 -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Future Leaders Scholarship</h5>
              <p class="card-text">Designed to support students who exhibit strong leadership potential and a passion for making a positive impact in their communities. Applicants should have a track record of leadership and community involvement.</p>
              <p class="card-text"><small class="text-muted">Deadline: September 15, 2024</small></p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <!-- Scholarship 3 -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Academic Achievement Award</h5>
              <p class="card-text">This award is given to students who have achieved exceptional academic results and have shown dedication to their educational pursuits. It aims to support students who consistently excel in their studies.</p>
              <p class="card-text"><small class="text-muted">Deadline: September 1, 2024</small></p>
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
              <h5 class="card-title">Leadership Development Mentorship</h5>
              <p class="card-text">This program is designed to cultivate leadership skills in students through one-on-one mentoring with experienced leaders. Participants will engage in activities that enhance their leadership capabilities and prepare them for future roles.</p>
              <p class="card-text"><small class="text-muted">Start Date: September 1, 2024</small></p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <!-- Mentorship 2 -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Entrepreneurship and Innovation Mentorship</h5>
              <p class="card-text">Targeted at aspiring entrepreneurs, this program offers mentorship from successful entrepreneurs and business leaders. It includes guidance on starting a business, innovative thinking, and strategic planning to help students turn their business ideas into reality.</p>
              <p class="card-text"><small class="text-muted">Start Date: August 15, 2024</small></p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <!-- Mentorship 3 -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">STEM Mentorship Program</h5>
              <p class="card-text">This program pairs students interested in STEM fields with mentors who are professionals in science, technology, engineering, and mathematics. The goal is to provide guidance, support, and encouragement for students pursuing careers in these fields.</p>
              <p class="card-text"><small class="text-muted">Start Date: October 1, 2024</small></p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      </div>

      <h1 class="text-center mb-4 mt-5">Courses</h1>
      <div class="row">
        <!-- Course 1 -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Introduction to Programming</h5>
              <p class="card-text">A beginner-friendly course that introduces the basics of programming and coding. It covers fundamental concepts, such as variables, loops, and functions, using an easy-to-understand language.</p>
              <a href="#" class="btn btn-primary">Enroll</a>
            </div>
          </div>
        </div>
        <!-- Course 2 -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Advanced Data Analysis</h5>
              <p class="card-text">This course delves into more complex data analysis techniques, including statistical methods and data visualization. It is designed for students with a basic understanding of data analysis who wish to deepen their knowledge.</p>
              <a href="#" class="btn btn-primary">Enroll</a>
            </div>
          </div>
        </div>
        <!-- Course 3 -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Effective Communication Skills</h5>
              <p class="card-text">A course aimed at improving students' communication abilities, including public speaking, writing, and interpersonal skills. It provides practical tips and exercises to help students become more effective communicators.</p>
              <a href="#" class="btn btn-primary">Enroll</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

