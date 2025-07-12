<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Welcome to HealthCare Diagnostic & Drug Testing</title>

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
    /* ✅ Video Background */
    video.bg-video {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      object-fit: cover;
      z-index: -1;
      filter: brightness(0.9);
      /* pahayag */
    }

    /* ✅ Main Content Styling */
    .home-content {
      position: relative;
      z-index: 1;
      padding: 100px 30px;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      gap: 40px;
      color: black;
      text-align: center;
    }

    .image-box img {
      max-width: 450px;
      border: 5px solid #fff;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }

    .description-container {
      max-width: 750px;
    }

    .description-box {
      background-color: rgba(196, 185, 185, 0.9);
      /* brighter box */
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
      border: 4px solid hsla(120, 100%, 50%, 0.65);
      color: #000;
    }

    .description-box h1 {
      font-size: 32px;
      margin-bottom: 20px;
      color: #0d47a1;
    }

    .description-box p {
      font-size: 17px;
      margin-bottom: 25px;
      line-height: 1.6;
    }

    .cta-button {
      display: inline-block;
      padding: 12px 25px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
      font-size: 16px;
      transition: background-color 0.3s ease;
      margin-right: 10px;
    }

    .cta-button:hover {
      background-color: #0056b3;
    }

    .book-button {
      background-color: #28a745;
    }

    .book-button:hover {
      background-color: #218838;
    }

    .cta-button.register {
      background-color: #ff5252;
    }

    .cta-button.register:hover {
      background-color: #e53935;
    }
  </style>
</head>

<body>

  <!-- ✅ Background Video -->
  <video class="bg-video" autoplay muted loop>
    <source src="1.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <!-- ✅ Navigation Bar -->
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

  <!-- ✅ Main Content Section -->
  <div class="home-content">
    <div class="image-box">
      <img src="2.jpg" alt="System Showcase">
    </div>

    <div class="description-container">
      <div class="description-box">
        <h1>Welcome to HealthCare Diagnostic & Drug Testing System</h1>
        <p>
          Our web-based Health Care Diagnostic and Drug Testing Laboratory Management System provides an efficient and
          secure platform
          for scheduling appointments, managing test records, and sending SMS reminders.
          Designed for both healthcare staff and patients, the system ensures accurate diagnostics, streamlined
          communication,
          and enhanced patient care. Say goodbye to missed appointments and paperwork—embrace modern digital health
          management today.
        </p>



        <a href="register.php" class="cta-button book-button">Book Now</a>


      </div>
    </div>
  </div>

</body>

</html>