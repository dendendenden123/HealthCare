<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Dashboard - HealthCare Diagnostic</title>

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
      <h4 class="mb-4">Lab Portal</h4>
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
      <div class="card shadow-lg card-dark-light">
        <div class="card-header bg-success text-white text-center">
          <h3 class="mb-0">Dashboard</h3>
        </div>
        <div class="card-body">
          @if (empty(Auth::user()->name) || empty(Auth::user()->age || empty(Auth::user()->gender) || empty(Auth::user()->phone)))
        <h5 class="mb-3">Complete Your Profile</h5>
        <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Age</label>
          <input type="number" name="age" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Gender</label>
          <select name="gender" class="form-select" required>
          <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Phone Number</label>
          <input type="text" name="phone" class="form-control" required>
        </div>
        <button type="submit" name="update_profile" class="btn btn-success btn-lg">Save Profile</button>
        </form>
      @else
        <h5 class="mb-3">Welcome, {{ Auth::user()->name }}!</h5>
        <p class="text-muted">This is your dashboard. Use the sidebar to navigate.</p>

        <div class="row g-4 mt-4">
        <div class="col-md-6 col-lg-4">
          <div class="card text-center p-4 bg-light text-dark shadow-sm">
          <div style="font-size: 24px;">📌</div>
          <h6 class="mt-2">You have 2 upcoming tests</h6>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card text-center p-4 bg-light text-dark shadow-sm">
          <div style="font-size: 24px;">📄</div>
          <h6 class="mt-2">Recent Results: 3 reports</h6>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card text-center p-4 bg-light text-dark shadow-sm">
          <div style="font-size: 24px;">🔔</div>
          <h6 class="mt-2">Notifications: None</h6>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card text-center p-4 bg-light text-dark shadow-sm">
          <div style="font-size: 24px;">📝</div>
          <h6 class="mt-2">Profile Status: Complete</h6>
          </div>
        </div>
        </div>
      @endif
        </div>
      </div>
    </main>
  </div>
</body>

</html>