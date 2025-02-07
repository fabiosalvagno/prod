<?php
// app/Views/home.php
// (Assuming session_start() is already called in your front controller.)
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Productivity Tips</title>
  <!-- Load Bootstrap CSS from CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #FF8C00;" class="text-white">
  <!-- Navbar with light orange background -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFB347;">
    <a class="navbar-brand text-white" href="/">Productivity App</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
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
    <?php if (isset($_SESSION['user_id'])): ?>
      <div class="row">
        <?php foreach ($tips as $tip): ?>
          <div class="col-md-4">
            <!-- Bootstrap Card with black background -->
            <div class="card bg-dark text-white mb-3">
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($tip->title); ?></h5>
                <p class="card-text"><?php echo nl2br(htmlspecialchars($tip->explanation)); ?></p>
                <p class="card-text">
                  <strong>Key Question:</strong>
                  <?php echo nl2br(htmlspecialchars($tip->key_question)); ?>
                </p>
              </div>
              <div class="card-footer text-right">
                <a href="/tip/<?php echo $tip->id; ?>" class="btn btn-outline-warning">Answer</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="alert alert-info mt-4">
        Please login or register to view the productivity tips.
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
