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

    .video-bg {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .services-box {
      max-width: 1100px;
      margin: 100px auto 50px auto;
      padding: 30px;
      background-color: rgba(249, 249, 249, 0.95);
      /* slightly transparent white */
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      color: #333;
      position: relative;
      z-index: 1;
    }

    .services-box h2 {
      text-align: center;
      color: #00887a;
      font-size: 20px;
      margin-bottom: 10px;
    }

    .services-content {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
    }

    .column {
      flex: 1;
      min-width: 300px;
    }

    .services-box strong {
      display: block;
      color: #007169;
      font-size: 14px;
      margin-top: -5px;
      margin-bottom: 2px;
      text-transform: uppercase;
    }

    .services-box ul {
      list-style: none;
      padding-left: 0;
      margin: 0;
    }

    .services-box li {
      font-size: 14px;
      padding: 4px 0;
      border-bottom: 1px dashed #ccc;
      color: #333;
    }

    .go-back {
      text-align: center;
      margin-top: 40px;
    }

    .go-back button {
      padding: 10px 25px;
      background-color: rgb(18, 81, 9);
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .go-back button:hover {
      background-color: rgb(10, 138, 27);
    }
  </style>
</head>

<body>

  <!-- ✅ Background Video -->
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

  <!-- Services Section -->
  <div class="services-box">
    <h2>Our Services with Prices</h2>

    <div class="services-content">
      <!-- Column 1 -->
      <div class="column">
        <strong>Hematology</strong>
        <ul>
          <li>CBC - ₱180</li>
          <li>BLEEDING TIME - ₱80</li>
          <li>CLOTTING TIME - ₱80</li>
          <li>PLATELET COUNT - ₱75</li>
          <li>HEMATROCRIT / HEMAGLOBIN - ₱75</li>
        </ul>

        <strong>Immunology</strong>
        <ul>
          <li>TSH - ₱600</li>
          <li>T3 - ₱545</li>
          <li>T4 - ₱545</li>
          <li>FT3 - ₱545</li>
          <li>FT4 - ₱545</li>
        </ul>

        <strong>Serology</strong>
        <ul>
          <li>BLOOD TYPING - ₱130</li>
          <li>HAV - ₱470</li>
          <li>HBs Ag - ₱160</li>
          <li>SYPIHLIS - ₱120</li>
          <li>TYPHIDOT - ₱620</li>
          <li>HIV - ₱400</li>
          <li>DENGUE TEST - ₱1,200</li>
          <li>PREGNANCY TEST (SERUM) - ₱170</li>
        </ul>
      </div>

      <!-- Column 2 -->
      <div class="column">
        <strong>Microscopy</strong>
        <ul>
          <li>URINALYSIS - ₱100</li>
          <li>STOOL EXAM - ₱70</li>
          <li>PREGNANCY TEST (URINE) - ₱150</li>
        </ul>

        <strong>Chemistry</strong>
        <ul>
          <li>LIPID PANEL - ₱400</li>
          <li>CHOLESTEROL - ₱110</li>
          <li>TRIGLYCERIDES - ₱140</li>
          <li>HDL/LDL - ₱200</li>
          <li>FBS/RBS - ₱100</li>
          <li>OGTT - ₱450</li>
          <li>HBA1C - ₱670</li>
          <li>SGOT/AST - ₱170</li>
          <li>SGP/ALT - ₱170</li>
          <li>URIC ACID - ₱110</li>
          <li>CREATININE - ₱110</li>
          <li>BUN - ₱120</li>
          <li>SODIUM - ₱280</li>
          <li>POTASSIUM - ₱280</li>
          <li>CHLORIDE - ₱280</li>
        </ul>
      </div>
    </div>

    <div class="go-back">
      <button onclick="window.location.href='index.php'">Go Back</button>
    </div>
  </div>

</body>

</html>