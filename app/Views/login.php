<?php
// app/Views/login.php
// (Assuming session_start() is already called in your front controller.)
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <!-- Load Bootstrap CSS from CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #FF8C00; color: white;">
  <!-- Navbar with light orange background -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFB347;">
    <a class="navbar-brand text-white" href="/">Productivity App</a>
  </nav>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Bootstrap Card with dark (black) background -->
        <div class="card bg-dark text-white mt-5">
          <div class="card-body">
            <h2 class="card-title text-center">Login</h2>
            <?php if(isset($message) && $message): ?>
              <div class="alert alert-warning"><?php echo $message; ?></div>
            <?php endif; ?>
            <form action="" method="POST">
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-outline-light btn-block">Login</button>
              <p class="mt-3 text-center">
                Don't have an account? <a href="/register" class="text-warning">Register</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Optionally include Bootstrap JS dependencies if needed -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
