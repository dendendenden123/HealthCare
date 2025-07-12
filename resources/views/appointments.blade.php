<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: auth.html?form=login");
  exit;
}

$user_id = $_SESSION['user_id'];

$query = $conn->prepare("SELECT b.id, s.name, s.price, b.status, b.booked_at 
                         FROM bookings b 
                         JOIN services s ON b.service_id = s.id 
                         WHERE b.user_id = ?
                         ORDER BY b.booked_at DESC");

if (!$query) {
  die("Query failed: " . $conn->error);
}

$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>My Appointments</title>

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
      background-color: #ffffff;
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
          <h3 class="mb-0">My Appointments</h3>
        </div>
        <div class="card-body">
          <?php if ($result->num_rows > 0): ?>
          <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
              <thead class="table-success">
                <tr>
                  <th>#</th>
                  <th>Service</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Booked At</th>
                </tr>
              </thead>
              <tbody>
                <?php  $i = 1;
  while ($row = $result->fetch_assoc()): ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= htmlspecialchars($row['name']) ?></td>
                  <td>₱<?= number_format($row['price'], 2) ?></td>
                  <td>
                    <?php
    $status = ucfirst(strtolower($row['status']));
    $badge = match ($status) {
      'Pending' => 'info',      // blue instead of yellow
      'Approved' => 'success',
      'Rejected' => 'danger',
      default => 'secondary',
    };
                    ?>
                    <span class="badge bg-<?= $badge ?>"><?= $status ?></span>
                  </td>
                  <td><?= date("M d, Y h:i A", strtotime($row['booked_at'])) ?></td>
                </tr>
                <?php  endwhile; ?>
              </tbody>
            </table>
          </div>
          <?php else: ?>
          <div class="alert alert-info text-center">You have no appointments yet.</div>
          <?php endif; ?>
        </div>
      </div>
    </main>
  </div>
</body>

</html>