<?php
// app/Views/login.php
$title = "Login - Productivity App";
include __DIR__ . '/templates/header.php';
?>
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card bg-dark text-white mt-5">
      <div class="card-body">
        <h2 class="card-title text-center">Login</h2>
        <?php if(isset($message) && $message): ?>
          <div class="alert alert-warning"><?php echo $message; ?></div>
        <?php endif; ?>
        <form action="" method="POST">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control bg-dark text-white" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control bg-dark text-white" id="password" name="password" required>
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
<?php include __DIR__ . '/templates/footer.php'; ?>
