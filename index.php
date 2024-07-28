
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"> <!-- FontAwesome -->
  <style>
    .jumbotron {
      background: url('images/image-10.jpg') no-repeat center center;
      background-size: cover;
      color: white;
      text-align: center;
      padding: 5rem 1rem;
    }
    .feature {
      text-align: center;
      padding: 2rem 1rem;
    }
    .feature img {
      max-width: 100px;
      margin-bottom: 1rem;
    }
    .login-link {
      color: #ff5733 !important;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">TransitionPlus</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#features">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link login-link" href="login.php">
            <i class="fas fa-sign-in-alt"></i> Login
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid" id="home">
    <div class="container">
      <h1 class="display-4">Welcome to TransitionPlus</h1>
      <p class="lead">Empowering students with personalized guidance and expert mentorship for a brighter future.</p>
      <a href="signup.php" class="btn btn-primary btn-lg">Get Started</a>
    </div>
  </div>

  <!-- About Section -->
  <div class="container mt-5" id="about">
    <div class="row">
      <div class="col text-center">
        <h2>About TransitionPlus</h2>
        <p class="lead">Why Choose TransitionPlus?

TransitionPlus is designed to provide high school students in Rwanda with the tools and support needed for a successful transition to higher education. 

Our platform offers:

Comprehensive educational resources and guides
Access to a network of experienced mentors
Career guidance and planning tools
Opportunities for personal growth and development
Join us today and start your journey towards a brighter future!Our mission is to support students in navigating their educational and career paths with confidence and success.</p>
      </div>
    </div>
  </div>

  <!-- Features Section -->
  <div class="container mt-5" id="features">
    <div class="row">
      <div class="col-md-4 feature">
        <img src="images/image-13.jpg" alt="Feature 1">
        <h3>Personalized Guidance</h3>
        <p>Receive customized advice and resources tailored to your academic and career aspirations.</p>
      </div>
      <div class="col-md-4 feature">
        <img src="images/image-13.jpg" alt="Feature 2">
        <h3>Scholarship Opportunities</h3>
        <p>Discover and apply for scholarships to help fund your educational journey.</p>
      </div>
      <div class="col-md-4 feature">
        <img src="images/image-12.jpg" alt="Feature 3">
        <h3>Mentorship Programs</h3>
        <p>Connect with experienced mentors who can provide valuable insights and guidance.</p>
      </div>
    </div>
  </div>

  <!-- Get Started Section -->
  <div class="container mt-5" id="get-started">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <h2>Join TransitionPlus Today!</h2>
        <p class="lead">Sign up now and start accessing our comprehensive resources and mentorship programs.</p>
        <a href="signup.php" class="btn btn-primary btn-lg">Sign Up</a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-light py-4 mt-5">
    <div class="container text-center">
      <p>&copy; 2024 TransitionPlus.  All rights reserved.</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- For FontAwesome Icons -->
</body>
</html>
