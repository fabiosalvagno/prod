<?php
// app/Views/answer.php
// (Assuming session_start() is already called in your front controller.)
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Answer Tip</title>
  <!-- Load Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #FF8C00;" class="text-white">
  <!-- Navbar -->
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
    <!-- Bootstrap Card for the Tip -->
    <div class="card bg-dark text-white mb-3">
      <div class="card-body">
        <h5 class="card-title"><?php echo htmlspecialchars($tip->title); ?></h5>
        <p class="card-text"><?php echo nl2br(htmlspecialchars($tip->explanation)); ?></p>
        <p class="card-text"><strong>Key Question:</strong> <?php echo nl2br(htmlspecialchars($tip->key_question)); ?></p>
        <?php if (isset($message) && $message): ?>
          <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>
        <?php if (isset($deleteMessage) && $deleteMessage): ?>
          <div class="alert alert-warning"><?php echo $deleteMessage; ?></div>
        <?php endif; ?>
        <!-- Answer Form -->
        <form action="" method="POST">
          <div class="form-group">
            <label for="answer">Your Answer:</label>
            <!-- Use Bootstrap's form-control with background and text utility classes -->
            <textarea class="form-control bg-dark text-white" id="answer" name="answer" rows="5"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit Answer</button>
          <a href="/tip/<?php echo $tip->id; ?>?action=show" class="btn btn-light">Show Answer</a>
        </form>
        <?php if (isset($answers) && !empty($answers)): ?>
          <hr>
          <h5>Recorded Answer(s):</h5>
          <?php foreach ($answers as $ans): ?>
            <div class="border p-2 mb-2">
              <small class="text-muted">Submitted on <?php echo $ans->created_at; ?></small>
              <p><?php echo nl2br(htmlspecialchars($ans->answer)); ?></p>
              <a href="/tip/<?php echo $tip->id; ?>?action=show&delete_id=<?php echo $ans->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this answer?');">Delete</a>
            </div>
          <?php endforeach; ?>
        <?php elseif (isset($_GET['action']) && $_GET['action'] == 'show'): ?>
          <p>No answers recorded yet.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>
