<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $birthdate = $_POST['birthdate'];
  $age = $_POST['age']; // New age field
  $gender = $_POST['gender'];
  $street = $_POST['street'];
  $region = $_POST['region'];
  $city = $_POST['city'];
  $zip_code = $_POST['zip_code'];
  $role = $_POST['role'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

  $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    echo "<script>alert('This email is already registered.');</script>";
  } else {
    $stmt = $conn->prepare("INSERT INTO users (name, email, password_hash, role, phone, birthdate, age, gender, street, region, city, zip_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssisssss", $name, $email, $password, $role, $phone, $birthdate, $age, $gender, $street, $region, $city, $zip_code);

    if ($stmt->execute()) {
      echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
    } else {
      echo "Error: " . $stmt->error;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Register - HealthCare Diagnostic</title>

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
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      object-fit: cover;
      filter: brightness(0.9);
      z-index: -1;
    }

    .login-form {
      max-width: 900px;
      margin: 100px auto;
      background-color: rgba(0, 0, 0, 0.75);
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

    .form-grid {
      display: flex;
      gap: 40px;
      flex-wrap: wrap;
    }

    .form-column {
      flex: 1;
      min-width: 300px;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .field {
      position: relative;
    }

    .field i.fas {
      position: absolute;
      top: 50%;
      left: 10px;
      transform: translateY(-50%);
      color: #00e450;
      font-size: 16px;
    }

    .field input,
    .field select {
      width: 100%;
      padding: 10px 10px 10px 35px;
      background-color: #1e1e1e;
      color: white;
      border: none;
      border-radius: 4px;
    }

    .role-selection-container {
      position: relative;
    }

    .role-selection-container i.fas {
      position: absolute;
      top: 50%;
      left: 10px;
      transform: translateY(-50%);
      color: #00e450;
    }

    .role-selection-container select {
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
    }

    button[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #00e450;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      margin-top: 20px;
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

  <!-- Form Container -->
  <div class="login-form">
    <div class="text">REGISTER</div>
    <form method="POST">
      <div class="form-grid">
        <!-- Column 1 -->
        <div class="form-column">
          <div class="field"><i class="fas fa-user"></i><input type="text" name="name" placeholder="Full Name" required>
          </div>
          <div class="field"><i class="fas fa-phone"></i><input type="tel" name="phone" placeholder="Phone Number"
              required></div>
          <div class="field"><i class="fas fa-calendar"></i><input type="date" name="birthdate" id="birthdate" required>
          </div>
          <div class="field"><i class="fas fa-hourglass-half"></i><input type="number" id="age" name="age"
              placeholder="Age" readonly></div>
          <div class="field">
            <i class="fas fa-venus-mars"></i>
            <select name="gender" required>
              <option value="">Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Prefer not to say">Prefer not to say</option>
            </select>
          </div>
          <div class="field"><i class="fas fa-map-marker-alt"></i><input type="text" name="street" placeholder="Street"
              required></div>
          <div class="field"><i class="fas fa-map"></i><input type="text" name="region" placeholder="Region" required>
          </div>
        </div>

        <!-- Column 2 -->
        <div class="form-column">
          <div class="field"><i class="fas fa-envelope"></i><input type="email" name="email" placeholder="Email"
              required></div>
          <div class="field"><i class="fas fa-city"></i><input type="text" name="city" placeholder="City" required>
          </div>
          <div class="field"><i class="fas fa-mail-bulk"></i><input type="text" name="zip_code"
              placeholder="Postal Code" required></div>
          <div class="field"><i class="fas fa-lock"></i><input type="password" id="password" name="password"
              placeholder="Password" required></div>
          <div class="show-password">
            <input type="checkbox" id="showPass" onclick="togglePassword()"> Show Password
          </div>
          <div class="field role-selection-container">
            <i class="fas fa-user-tag"></i>
            <select name="role" required>
              <option value="">Select Role</option>
              <option value="client">Patient</option>
            </select>
          </div>
        </div>
      </div>

      <button type="submit">REGISTER</button>
      <div class="link">Already have an account? <a href="login">Sign In</a></div>
    </form>
  </div>

  <!-- Scripts -->
  <script>
    function togglePassword() {
      const pass = document.getElementById("password");
      pass.type = pass.type === "password" ? "text" : "password";
    }

    document.getElementById("birthdate").addEventListener("change", function () {
      const birthdate = new Date(this.value);
      const today = new Date();
      let age = today.getFullYear() - birthdate.getFullYear();
      const m = today.getMonth() - birthdate.getMonth();
      if (m < 0 || (m === 0 && today.getDate() < birthdate.getDate())) {
        age--;
      }
      document.getElementById("age").value = age;
    });
  </script>

</body>

</html>