<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: auth.html?form=login");
  exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['service_id']) && is_array($_POST['service_id'])) {
  $service_ids = $_POST['service_id'];
  $stmt = $conn->prepare("INSERT INTO bookings (user_id, service_id, status) VALUES (?, ?, 'Pending')");

  foreach ($service_ids as $service_id) {
    $stmt->bind_param("ii", $user_id, $service_id);
    $stmt->execute();
  }

  $success = "Selected test(s) booked successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Book a Lab Test</title>

  <!-- Bootstrap + Material Design -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-material-design@4.1.3/dist/css/bootstrap-material-design.min.css"
    rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap-material-design@4.1.3/dist/js/bootstrap-material-design.min.js"></script>

  <script>
    $(document).ready(function () {
      $('body').bootstrapMaterialDesign();
    });
  </script>
  <style>
    body {
      background-color: #f4f4f4;
    }

    aside {
      background-color: #212529;
    }

    aside h4 {
      color: #4caf50;
    }

    .nav-link {
      color: #f8f9fa !important;
    }

    .nav-link:hover {
      background-color: #343a40;
    }

    .card-dark-light {
      background-color: #f8f9fa;
      color: #212529;
    }
  </style>
</head>

<body>
  <div class="d-flex">

    <!-- Sidebar -->
    <aside class="p-4 vh-100" style="min-width: 220px;">
      <h4 class="mb-4 text-success">Lab Portal</h4>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a class="nav-link" href="dashboard">🏠 Dashboard</a></li>
        <li class="nav-item mb-2"><a class="nav-link" href="book_test">🧪 Book Test</a></li>
        <li class="nav-item mb-2"><a class="nav-link" href="appointments">📅 Appointments</a></li>
        <li class="nav-item mb-2"><a class="nav-link" href="payment">💳 Payment</a></li>
        <li class="nav-item mb-2"><a class="nav-link" href="profile">👤 Profile</a></li>
        <li class="nav-item mb-2"><a class="nav-link" href="logout">🚪 Logout</a></li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main class="container my-5">
      <div class="card card-dark-light shadow-lg">
        <div class="card-header bg-success text-white text-center">
          <h3 class="mb-0">Book a Lab Test</h3>
        </div>
        <div class="card-body">
          <?php if (isset($success)): ?>
          <div class="alert alert-success text-center"><?= $success ?></div>
          <?php endif; ?>

          <form method="POST">
            <div class="row g-4">

              <!-- Column 1 -->
              <div class="col-md-6">
                <h5 class="text-warning">Hematology</h5>
                <?php
$hematology = [
  1 => ["CBC", 180],
  2 => ["BLEEDING TIME", 80],
  3 => ["CLOTTING TIME", 80],
  4 => ["PLATELET COUNT", 75],
  5 => ["HEMATOCRIT / HEMAGLOBIN", 75]
];
foreach ($hematology as $id => [$name, $price]) {
  echo "<div class='form-check'><label class='form-check-label'><input class='form-check-input' type='checkbox' name='service_id[]' value='$id'> $name <span class='text-info'>₱$price</span></label></div>";
}
              ?>

                <h5 class="text-warning mt-4">Immunology</h5>
                <?php
$immuno = [
  6 => ["TSH", 600],
  7 => ["T3", 545],
  8 => ["T4", 545],
  9 => ["FT3", 545],
  10 => ["FT4", 545]
];
foreach ($immuno as $id => [$name, $price]) {
  echo "<div class='form-check'><label class='form-check-label'><input class='form-check-input' type='checkbox' name='service_id[]' value='$id'> $name <span class='text-info'>₱$price</span></label></div>";
}
              ?>

                <h5 class="text-warning mt-4">Serology</h5>
                <?php
$serology = [
  11 => ["BLOOD TYPING", 130],
  12 => ["HAV", 470],
  13 => ["HBs Ag", 160],
  14 => ["SYPHILIS", 120],
  15 => ["TYPHIDOT", 620],
  16 => ["HIV", 400],
  17 => ["DENGUE TEST", 1200],
  18 => ["PREGNANCY TEST (SERUM)", 170]
];
foreach ($serology as $id => [$name, $price]) {
  echo "<div class='form-check'><label class='form-check-label'><input class='form-check-input' type='checkbox' name='service_id[]' value='$id'> $name <span class='text-info'>₱$price</span></label></div>";
}
              ?>
              </div>

              <!-- Column 2 -->
              <div class="col-md-6">
                <h5 class="text-warning">Microscopy</h5>
                <?php
$micro = [
  19 => ["URINALYSIS", 100],
  20 => ["STOOL EXAM", 70],
  21 => ["PREGNANCY TEST (URINE)", 150]
];
foreach ($micro as $id => [$name, $price]) {
  echo "<div class='form-check'><label class='form-check-label'><input class='form-check-input' type='checkbox' name='service_id[]' value='$id'> $name <span class='text-info'>₱$price</span></label></div>";
}
              ?>

                <h5 class="text-warning mt-4">Chemistry</h5>
                <?php
$chemistry = [
  22 => ["LIPID PANEL", 400],
  23 => ["CHOLESTEROL", 110],
  24 => ["TRIGLYCERIDES", 140],
  25 => ["HDL/LDL", 200],
  26 => ["FBS/RBS", 100],
  27 => ["OGTT", 450],
  28 => ["HBA1C", 670],
  29 => ["SGOT/AST", 170],
  30 => ["SGP/ALT", 170],
  31 => ["URIC ACID", 110],
  32 => ["CREATININE", 110],
  33 => ["BUN", 120],
  34 => ["SODIUM", 280],
  35 => ["POTASSIUM", 280],
  36 => ["CHLORIDE", 280]
];
foreach ($chemistry as $id => [$name, $price]) {
  echo "<div class='form-check'><label class='form-check-label'><input class='form-check-input' type='checkbox' name='service_id[]' value='$id'> $name <span class='text-info'>₱$price</span></label></div>";
}
              ?>
              </div>
            </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-success btn-lg">Book Selected Test(s)</button>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>
</body>

</html>