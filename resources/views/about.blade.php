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
    /* Background Video Fix */
    .video-bg {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      object-fit: cover;
      z-index: -2;
      pointer-events: none;
      /* Prevent blocking clicks */
    }

    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background-color: rgba(255, 255, 255, 0.2);
      /* Brighter overlay */
      z-index: -1;
      pointer-events: none;
      /* Prevent blocking clicks */
    }

    body {
      position: relative;
      z-index: 1;
    }

    /* Layout */
    .home-content {
      padding: 60px 20px;
      position: relative;
      z-index: 1;
      pointer-events: auto;
    }

    .row-content {
      max-width: 1200px;
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      position: relative;
      z-index: 1;
      pointer-events: auto;
    }

    .left-column {
      flex: 1;
      min-width: 300px;
      position: relative;
      z-index: 1;
    }

    .right-column {
      flex: 0 0 350px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      position: relative;
      z-index: 1;
    }

    .image-box img {
      width: 100%;
      max-width: 300px;
      border-radius: 10px;
    }

    .description-box {
      background-color: rgba(7, 7, 7, 0.96);
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(238, 218, 218, 0.87);
      color: white;
      margin-bottom: 20px;
      position: relative;
      z-index: 1;
    }

    .services-preview {
      background-color: #ffffff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      position: relative;
      z-index: 1;
    }

    .services-preview h2 {
      font-size: 22px;
      color: #00887a;
      margin-bottom: 20px;
    }

    .service-category strong {
      font-size: 16px;
      color: #333;
    }

    .service-category ul {
      padding-left: 20px;
      font-size: 14px;
      color: #555;
    }

    .see-more-button {
      display: inline-block;
      margin-top: 15px;
      padding: 10px 18px;
      background-color: #00887a;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      text-decoration: none;
      position: relative;
      z-index: 2;
      pointer-events: auto;
    }

    .see-more-button:hover {
      background-color: #006f64;
    }
  </style>
</head>

<body>

  <!-- Video Background -->
  <video autoplay muted loop class="video-bg">
    <source src="1.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <!-- Navigation Bar -->
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

  <!-- Main Content -->
  <div class="home-content">
    <div class="row-content">

      <!-- Left Column -->
      <div class="left-column">
        <div class="description-box">
          <h3>About Our Health Care Diagnostic and Drug Testing Laboratory Management System</h3>
          <p>This system helps our health care staff easily manage patient appointments, lab tests, and results in one
            place.
            It sends SMS notifications to patients, making sure they don’t forget their appointments. The system keeps
            patient information safe and organized.</p>
          <p>Our goal is to improve communication and make lab work faster and simpler for everyone.</p>
          If you have any questions, feel free to <a href="contact.php" class="text-info">contact us</a>.
        </div>

        <div class="services-preview">
          <h2>Our Services</h2>
          <div class="service-category">
            <strong>Hematology</strong>
            <ul>
              <li>CBC</li>
              <li>Platelet Count</li>
              <li>Clotting Time</li>
            </ul>
          </div>
          <div class="service-category">
            <strong>Chemistry</strong>
            <ul>
              <li>Cholesterol</li>
              <li>FBS/RBS</li>
              <li>Creatinine</li>
            </ul>
          </div>
          <div class="service-category">
            <strong>Serology</strong>
            <ul>
              <li>Blood Typing</li>
              <li>HIV</li>
              <li>Dengue Test</li>
            </ul>
          </div>
          <a href="service.php" class="see-more-button">See All Services</a>
        </div>
      </div>

      <!-- Right Column -->
      <div class="right-column">
        <div class="image-box">
          <img src="2.jpg" alt="Health Care Diagnostic System">
        </div>
      </div>

    </div>
  </div>

</body>

</html>