<?php
// app/Views/answer.php
// Set the page title for the header template.
$title = "Answer Tip - Productivity App";

// Include the header template.
include __DIR__ . '/templates/header.php';
?>

<!-- Page Content: Display the Tip, Answer Form, and any Recorded Answers -->
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
    
    <!-- Answer Submission Form -->
    <form action="" method="POST">
      <div class="form-group">
        <label for="answer">Your Answer:</label>
        <!-- Using Bootstrap's form-control with bg-dark and text-white classes -->
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
          <a href="/tip/<?php echo $tip->id; ?>?action=show&delete_id=<?php echo $ans->id; ?>" 
             class="btn btn-danger btn-sm" 
             onclick="return confirm('Are you sure you want to delete this answer?');">
             Delete
          </a>
        </div>
      <?php endforeach; ?>
    <?php elseif (isset($_GET['action']) && $_GET['action'] == 'show'): ?>
      <p>No answers recorded yet.</p>
    <?php endif; ?>
  </div>
</div>

<?php
// Include the footer template.
include __DIR__ . '/templates/footer.php';
?>
