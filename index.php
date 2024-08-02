
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
      color: #dc143c  !important;
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
  <div class="row justify-content-center">
    <div class="col-lg-8 text-center about-card">
      <h2 class="about-heading">TransitionPlus</h2>
      <p class="lead mb-4 about-description">
        <strong>TransitionPlus</strong> is a cutting-edge digital platform dedicated to empowering high school students with personalized mentorship, career guidance, and invaluable resources to ensure a seamless transition to higher education.
      </p>
      <div class="about-content">
        <div class="about-item">
          <h3 class="about-subheading">Our Vision</h3>
          <p>
        To bridge the gap between secondary education and higher learning, enabling every student to achieve their academic and career aspirations.<br><br>
        </p>
        </div>
        <div class="about-item">
          <h3 class="about-subheading">Why Choose TransitionPlus?</h3>
          <p>Navigating the transition to higher education can be challenging. TransitionPlus offers a solution, addressing the unique needs of students to overcome obstacles and thrive.</p>
        </div>
        <div class="about-item">
          <h3 class="about-subheading">Join Us</h3>
          <p>Empower your academic journey with TransitionPlus. Together, let's build a brighter future.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
   #about {
            background: #ffffff; /* White background */
            color: #333333; /* Dark text color for contrast */
            padding: 80px 0;
            position: relative;
        }

        .about-card {
            background: #f9f9f9; /* Slightly off-white background for cards */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
            position: relative;
            z-index: 1;
        }

        .about-heading {
            font-size: 3rem;
            color: #2c3e50; /* Dark color for heading */
            margin-bottom: 30px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .about-heading:hover {
            color: #3498db; /* Bright blue color on hover */
            transform: translateY(-10px); /* Floating effect */
        }

        .about-subheading {
            font-size: 2rem;
            color: #2c3e50; /* Dark color for subheadings */
            margin-bottom: 20px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .about-subheading:hover {
            color: #3498db; /* Bright blue color on hover */
            transform: translateY(-5px); /* Slight floating effect */
        }

        .about-description {
            font-size: 1.2rem;
            color: #555555; /* Medium grey for the description */
            line-height: 1.8;
        }

        .about-content {
            margin-top: 30px;
        }

        .about-item {
            margin-bottom: 30px;
        }

        .about-item p {
            font-size: 1.1rem;
            color: #333333; /* Dark color for text */
            line-height: 1.6;
            transition: color 0.3s ease;
        }

        .about-item p:hover {
            color: #3498db; /* Bright blue color on hover */
        }
</style>

      </div>
    </div>
  </div>

<!-- Features Section -->
<div class="container mt-5" id="features">
  <div class="row text-center">
    <div class="col-md-4 feature">
      <div class="feature-card">
        <div class="feature-content">
          <h3 class="feature-heading"><a href="signup.php" class="feature-link">Personalized Guidance</a></h3>
          <p class="feature-description">Experience bespoke advice and resources, tailored to your unique academic and career aspirations. Your guidance will be as personalized as your dreams.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 feature">
      <div class="feature-card">
        <div class="feature-content">
          <h3 class="feature-heading"><a href="signup.php" class="feature-link">Scholarship Opportunities</a></h3>
          <p class="feature-description">Explore a curated selection of scholarship opportunities to fund your educational journey. Find the perfect match for your needs and ambitions.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 feature">
      <div class="feature-card">
        <div class="feature-content">
          <h3 class="feature-heading"><a href="signup.php" class="feature-link">Mentorship Programs</a></h3>
          <p class="feature-description">Connect with experienced mentors offering invaluable insights and guidance. Our programs are designed to elevate you to your highest potential.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .container {
    max-width: 1200px;
  }

  .text-center {
    text-align: center;
  }

  .feature-card {
    background: linear-gradient(135deg, #1f2c3d, #3a506b);
    border-radius: 20px;
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4);
    overflow: hidden;
    margin-bottom: 30px;
    padding: 20px;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 300px; /* Ensures all cards are of the same height */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
  }

  .feature-content {
    padding-top: 20px;
    position: relative;
    z-index: 2;
  }

  .feature-heading {
    color: #ecf0f1;
    font-size: 1.8rem;
    margin-bottom: 10px;
    font-weight: 700;
    position: relative;
  }

  .feature-heading::after {
    content: '';
    display: block;
    width: 100px;
    height: 4px;
    background: #3498db;
    margin: 10px auto 0;
    border-radius: 2px;
  }

  .feature-description {
    color: #bdc3c7;
    font-size: 1.1rem;
    line-height: 1.6;
  }

  .feature-link {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease, text-shadow 0.3s ease;
  }

  .feature-link:hover {
    color: #3498db;
    text-shadow: 0 0 8px #3498db;
  }

  .btn-feature {
    display: inline-block;
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: #fff;
    padding: 14px 28px;
    border-radius: 40px;
    font-size: 1.3rem;
    font-weight: bold;
    text-transform: uppercase;
    text-decoration: none;
    transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    margin-top: 20px;
  }

  .btn-feature:hover {
    background: linear-gradient(135deg, #2980b9, #3498db);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
    transform: translateY(-4px);
  }

  .feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 120%;
    height: 120%;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0.1));
    opacity: 0.7;
    z-index: 1;
    pointer-events: none;
    transition: opacity 0.3s ease;
  }

  .feature-card:hover::before {
    opacity: 0.9;
  }

  .feature-card::after {
    content: '';
    position: absolute;
    top: -20%;
    right: -20%;
    width: 140%;
    height: 140%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.3), rgba(0, 0, 0, 0));
    z-index: 0;
    pointer-events: none;
  }

  .btn-info {
    background-color: #1a1a1a;
    border-color: #1a1a1a;
    color: #ffffff;
  }

  .btn-info:hover {
    background-color: #000000;
    border-color: #000000;
  }
</style>

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

<!-- Map Section -->
<div class="container mt-5" id="map">
  <div class="row justify-content-center">
    <div class="col-lg-12 text-center">
      <h2 class="map-heading">Our Location</h2>
      <p class="map-description">
      TransitionPlus is based in Kigali, Rwanda, where we are committed to fostering educational advancement and innovation.
        <br></br>Plan your visit to our Kigali office.
      </p>
      <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15620.129940529357!2d30.055473123661795!3d-1.9558500317560084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19d908568f4bb639%3A0x9347e37cf2ac0b28!2sKigali%2C%20Rwanda!5e0!3m2!1sen!2sus!4v1623423152797!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>
</div>

<style>
  /* Map Section Styles */
  #map {
    background: #f8f9fa; /* Light background color for the map section */
    padding: 60px 0;
  }

  .map-heading {
    font-size: 2.5rem;
    color: #333; /* Darker color for the heading */
    margin-bottom: 20px;
  }

  .map-description {
    font-size: 1.2rem;
    color: #555; /* Medium grey for the description */
    margin-bottom: 30px;
  }

  .map-container {
    text-align: center;
  }

  iframe {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow effect */
  }
</style>


  <!-- Footer -->
<footer class="bg-light py-4 mt-5 text-center">
  <div class="container">
    <p class="copyright-text">
      &copy; 2024 <span class="footer-company">TransitionPlus</span>. All rights reserved.

    <p>
    Developed by Geofrey Tumwesigye
    </p>

    </p>
  </div>
</footer>

<style>
  /* Footer Styles */
  footer {
    background-color: #f8f9fa; /* Light background color */
    border-top: 1px solid #e1e1e1; /* Subtle border for separation */
  }
  
  .copyright-text {
    color: #6c757d; /* Medium grey color for text */
    font-size: 0.9rem; /* Slightly smaller text */
    margin-bottom: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Modern font */
  }
  
  .footer-name {
    color: #007bff; /* Blue color for name */
    font-weight: bold; /* Bold text for emphasis */
  }
  
  .footer-company {
    color: #007bff; /* Blue color for company name */
    font-weight: bold; /* Bold text for emphasis */
  }
</style>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- For FontAwesome Icons -->
</body>
</html>
