<?php
session_start();
include 'db.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user info from DB
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT name, email, phone, birthdate, age, gender, street, region, city, zip_code, role FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile - HealthCare Diagnostic</title>

  <!-- Bootstrap + Material Design -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-material-design@4.1.3/dist/css/bootstrap-material-design.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-material-design@4.1.3/dist/js/bootstrap-material-design.min.js"></script>

  <script>
    $(document).ready(function () {
      $('body').bootstrapMaterialDesign();
    });
  </script>
</head>
<body class="bg-dark text-white">

<div class="d-flex">
  <!-- Sidebar -->
  <div class="bg-black p-4 vh-100" style="min-width: 220px;">
    <h4 class="text-success mb-4">Lab Portal</h4>
    <ul class="nav flex-column">
      <li class="nav-item mb-2">
        <a class="nav-link text-white" href="dashboard.php">🏠 Dashboard</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link text-white" href="book_test.php">🧪 Book Test</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link text-white" href="appointments.php">📅 Appointments</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link text-white" href="payment.php">💳 Payment</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link text-white" href="profile.php">👤 Profile</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link text-white" href="logout.php">🚪 Logout</a>
      </li>
    </ul>
  </div>

  <!-- Profile Info -->
  <div class="container my-5">
    <div class="card bg-secondary text-white shadow-lg">
      <div class="card-header bg-success text-center">
        <h3 class="mb-0">My Profile</h3>
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-6">
            <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
          </div>
          <div class="col-md-6">
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
          </div>
          <div class="col-md-6">
            <p><strong>Phone:</strong> <?= htmlspecialchars($user['phone']) ?></p>
          </div>
          <div class="col-md-6">
            <p><strong>Birthdate:</strong> <?= htmlspecialchars($user['birthdate']) ?></p>
          </div>
          <div class="col-md-6">
            <p><strong>Age:</strong> <?= htmlspecialchars($user['age']) ?></p>
          </div>
          <div class="col-md-6">
            <p><strong>Gender:</strong> <?= htmlspecialchars($user['gender']) ?></p>
          </div>
          <div class="col-md-6">
            <p><strong>Street:</strong> <?= htmlspecialchars($user['street']) ?></p>
          </div>
          <div class="col-md-6">
            <p><strong>Region:</strong> <?= htmlspecialchars($user['region']) ?></p>
          </div>
          <div class="col-md-6">
            <p><strong>City:</strong> <?= htmlspecialchars($user['city']) ?></p>
          </div>
          <div class="col-md-6">
            <p><strong>Postal Code:</strong> <?= htmlspecialchars($user['zip_code']) ?></p>
          </div>
          <div class="col-md-12">
            <p><strong>Role:</strong> <?= htmlspecialchars($user['role']) ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
