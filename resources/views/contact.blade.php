<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Welcome to HealthCare Diagnostic & Drug Testing System</title>

  <!-- Bootstrap & Material Design CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-material-design@4.1.3/dist/css/bootstrap-material-design.min.css"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap-material-design@4.1.3/dist/js/bootstrap-material-design.min.js"></script>

  <script>
    $(document).ready(function () {
      $('body').bootstrapMaterialDesign();
    });
  </script>

  <style>
    body,
    html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: Arial, sans-serif;
      color: white;
    }

    /* Video Background */
    .video-bg {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .home-content {
      padding: 40px 20px;
      margin-top: 80px;
      /* 🔽 Adds space below navbar */
      position: relative;
      z-index: 1;
    }

    .image-box img {
      max-width: 100%;
      height: auto;
      width: 100px;
      display: block;
      margin: 0 auto 20px auto;
      border-radius: 8px;
    }

    .description-container {
      max-width: 800px;
      margin: 0 auto 40px auto;
    }

    .description-box {
      background-color: rgba(7, 7, 7, 0.96);
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .description-box a {
      color: #bbb;
    }

    .cta-button {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #00887a;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .cta-button:hover {
      background-color: #006f64;
    }
  </style>
</head>

<body>
  <!-- ✅ Background Video -->
  <video autoplay muted loop class="video-bg">
    <source src="1.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="index">Health Care Diagnostic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="index">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="about">About</a></li>
          <li class="nav-item"><a class="nav-link active" href="contact">Contact</a></li>
          <li class="nav-item"><a class="nav-link active" href="service">Service</a></li>
          <li class="nav-item"><a class="nav-link active" href="register">Sign Up</a></li>
          <li class="nav-item"><a class="nav-link active" href="login">Sign In</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content Section -->
  <div class="home-content">
    <div class="image-box">
      <img src="3.png" alt="Contact Us" />
    </div>

    <!-- Contact Information -->
    <div class="description-container">
      <div class="description-box">
        <h1>Contact Us</h1>
        <p>
          For any questions, feedback, or support regarding the Health Care Diagnostic and Drug Testing Lab System,
          feel free to reach out through the following contact details:
        </p>

        <ul style="margin-top: 20px; color: #bbb; font-size: 16px;">
          <li>
            <i class="fas fa-envelope"></i>
            Email:
            <a href="mailto:nidabaptismo04@gmail.com">nidabaptismo04@gmail.com</a>
          </li>
          <li>
            <i class="fas fa-phone"></i>
            Phone: +63 912 435 0527
          </li>
          <li>
            <i class="fas fa-map-marker-alt"></i>
            Address:
            <a href="https://www.google.com/maps?q=Cebu+Technological+University+Naga+Extension+Campus" target="_blank">
              Cebu Technological University – Naga Ext. Campus
            </a>
          </li>
        </ul>

        <a href="register.php" class="cta-button">Create an Account</a>
      </div>
    </div>
  </div>
</body>

</html>