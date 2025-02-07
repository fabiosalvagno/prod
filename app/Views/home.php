<?php
// app/Views/home.php
$title = "Home - Productivity App";
include __DIR__ . '/templates/header.php';
?>
<!-- Page Content -->
<?php if (isset($_SESSION['user_id'])): ?>
  <div class="row">
    <?php foreach ($tips as $tip): ?>
      <div class="col-md-4">
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
<?php include __DIR__ . '/templates/footer.php'; ?>
