<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login - HealthCare Diagnostic</title>

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
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
      overflow-x: hidden;
    }

    video.bg-video {
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 100%;
      min-height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .login-form {
      max-width: 400px;
      margin: 100px auto;
      background-color: rgba(0, 0, 0, 0.85);
      padding: 40px;
      border-radius: 12px;
      color: white;
      border: 3px solid hsla(120, 100%, 50%, 0.65);
    }

    .text {
      text-align: center;
      font-size: 28px;
      margin-bottom: 30px;
      font-weight: bold;
    }

    .field {
      position: relative;
      margin-bottom: 20px;
    }

    .field i.fas {
      position: absolute;
      top: 50%;
      left: 10px;
      transform: translateY(-50%);
      color: #00e450;
      font-size: 16px;
    }

    .field input {
      width: 100%;
      padding: 10px 10px 10px 35px;
      background-color: #1e1e1e;
      color: white;
      border: none;
      border-radius: 4px;
    }

    .show-password {
      color: white;
      font-size: 14px;
      margin-top: -10px;
      margin-bottom: 10px;
    }

    button[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #00e450;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      color: #000;
    }

    .link {
      margin-top: 15px;
      text-align: center;
      color: white;
    }

    .link a {
      color: #00e450;
      text-decoration: none;
    }

    nav.navbar {
      z-index: 1;
    }
  </style>
</head>

<body>

  <!-- Background Video -->
  <video autoplay muted loop class="bg-video">
    <source src="1.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
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

  <!-- Login Form -->
  <div class="login-form">
    <div class="text">LOGIN</div>
    <form action="{{ route('login.auth') }}" method="POST">
      @csrf
      <div class="field"><i class="fas fa-envelope"></i><input type="email" name="email" placeholder="Email" required>
      </div>
      <div class="field"><i class="fas fa-lock"></i><input type="password" id="password" name="password"
          placeholder="Password" required></div>
      <div class="show-password"><input type="checkbox" onclick="togglePassword()"> Show Password</div>
      @if(session('error'))
      <p style="color:red;">{{ session('error') }}</p>
    @endif
      <button type="submit">LOGIN</button>
      <div class="link">Don't have an account? <a href="register">Sign Up</a></div>
    </form>
  </div>

  <script>
    function togglePassword() {
      var password = document.getElementById("password");
      password.type = password.type === "password" ? "text" : "password";
    }
  </script>

</body>

</html>