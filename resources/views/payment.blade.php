<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: auth.html?form=login");
    exit;
}

$user_id = $_SESSION['user_id'];

// Handle proof of payment upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_proof'])) {
    $booking_id = $_POST['booking_id'];
    $target_dir = "uploads/";
    $file_name = basename($_FILES["proof"]["name"]);
    $target_file = $target_dir . time() . "_" . $file_name;

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES["proof"]["tmp_name"], $target_file)) {
        $stmt = $conn->prepare("UPDATE bookings SET payment_proof=?, payment_status='Paid' WHERE id=? AND user_id=?");
        $stmt->bind_param("sii", $target_file, $booking_id, $user_id);
        $stmt->execute();
    }
}

// Fetch bookings
$query = $conn->prepare("
    SELECT 
        b.id,
        s.name AS service_name,
        s.price,
        b.booking_date,
        b.status,
        b.payment_status,
        b.payment_proof
    FROM bookings b
    JOIN services s ON b.service_id = s.id
    WHERE b.user_id = ?
    ORDER BY b.booking_date DESC
");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment</title>
  <!-- Bootstrap & Material Design -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-material-design@4.1.3/dist/css/bootstrap-material-design.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-material-design@4.1.3/dist/js/bootstrap-material-design.min.js"></script>

  <script>
    $(document).ready(function () {
      $('body').bootstrapMaterialDesign();
    });

    function openModal() {
        document.getElementById("gcashModal").style.display = "flex";
    }

    function closeModal(event) {
        if (event.target.classList.contains('modal') || event.target.classList.contains('close')) {
            document.getElementById("gcashModal").style.display = "none";
        }
    }
  </script>

  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.6);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background: white;
      padding: 30px;
      border-radius: 15px;
      text-align: center;
      position: relative;
      max-width: 400px;
    }

    .modal-content img {
      max-width: 100%;
    }

    .close {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 24px;
      cursor: pointer;
    }
  </style>
</head>
<body class="bg-dark text-white">

<div class="d-flex">
  <!-- Sidebar -->
  <aside class="bg-black p-4 vh-100" style="min-width: 220px;">
    <h4 class="text-success mb-4">Lab Portal</h4>
    <ul class="nav flex-column">
      <li class="nav-item mb-2"><a class="nav-link text-white" href="dashboard.php">🏠 Dashboard</a></li>
      <li class="nav-item mb-2"><a class="nav-link text-white" href="book_test.php">🧪 Book Test</a></li>
      <li class="nav-item mb-2"><a class="nav-link text-white" href="appointments.php">📅 Appointments</a></li>
      <li class="nav-item mb-2"><a class="nav-link text-white" href="payment.php">💳 Payment</a></li>
      <li class="nav-item mb-2"><a class="nav-link text-white" href="profile.php">👤 Profile</a></li>
      <li class="nav-item mb-2"><a class="nav-link text-white" href="logout.php">🚪 Logout</a></li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="my-5 flex-grow-1 px-4">
    <div class="card bg-white text-dark shadow-lg">
      <div class="card-header bg-success text-white text-center">
        <h3 class="mb-0">Your Payments</h3>
      </div>
      <div class="card-body">
        <div class="text-end mb-3">
          <button class="btn btn-success" onclick="openModal()">💳 View GCash QR Code</button>
        </div>

        <!-- GCash Modal -->
        <div id="gcashModal" class="modal" onclick="closeModal(event)">
          <div class="modal-content">
            <span class="close" onclick="closeModal(event)">&times;</span>
            <h4 class="text-dark">Scan to Pay via GCash</h4>
            <img src="4.jpg" alt="GCash QR">
            <p class="text-dark mt-3">After payment, upload your proof below.</p>
          </div>
        </div>

        <?php if ($result->num_rows === 0): ?>
          <div class="alert alert-info text-center">No bookings found.</div>
        <?php else: ?>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="table-light">
                <tr>
                  <th>Service</th>
                  <th>Booking Date</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Payment Status</th>
                  <th>Proof</th>
                </tr>
              </thead>
              <tbody>
              <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                  <td><?= htmlspecialchars($row['service_name']) ?></td>
                  <td><?= htmlspecialchars($row['booking_date']) ?></td>
                  <td>₱<?= number_format($row['price'], 2) ?></td>
                  <td>
                    <span class="badge bg-<?= 
                      $row['status'] === 'Approved' ? 'success' : 
                      ($row['status'] === 'Pending' ? 'info' : 'danger') ?>">
                      <?= htmlspecialchars($row['status']) ?>
                    </span>
                  </td>
                  <td>
                    <span class="badge bg-<?= $row['payment_status'] === 'Paid' ? 'success' : 'secondary' ?>">
                      <?= htmlspecialchars($row['payment_status']) ?>
                    </span>
                  </td>
                  <td>
                    <?php if (empty($row['payment_proof'])): ?>
                      <form method="POST" enctype="multipart/form-data" class="upload-form d-flex flex-column gap-2">
                        <input type="hidden" name="booking_id" value="<?= $row['id'] ?>">
                        <input type="file" name="proof" accept="image/*" class="form-control form-control-sm" required>
                        <button type="submit" name="upload_proof" class="btn btn-sm btn-info">Upload</button>
                      </form>
                    <?php else: ?>
                      <a class="btn btn-sm btn-outline-dark" href="<?= $row['payment_proof'] ?>" target="_blank">View Proof</a>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </main>
</div>

</body>
</html>
