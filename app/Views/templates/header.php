<?php
// app/Views/templates/header.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo isset($title) ? $title : 'Productivity App'; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Load Bootstrap CSS from CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #FF8C00; color: white;">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFB347;">
    <a class="navbar-brand text-white" href="/">Productivity App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <!-- Font Size Adjustment Buttons -->
        <li class="nav-item">
          <a class="nav-link text-white" href="#" id="increase-font">A+</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#" id="decrease-font">A-</a>
        </li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item">
            <a class="nav-link text-white" href="/logout">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link text-white" href="/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/register">Register</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
  <div class="container mt-4">
