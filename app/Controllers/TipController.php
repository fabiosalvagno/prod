<?php
// app/Controllers/TipController.php
require_once __DIR__ . '/../Models/ProductivityTip.php';
require_once __DIR__ . '/../Models/Answer.php';

class TipController {
    // Home page: list all productivity tips.
    public function home() {
        $tips = ProductivityTip::getAll();
        require __DIR__ . '/../Views/home.php';
    }

    // Show a single tip and process answer-related actions.
    public function showTip($id) {
        $tip = ProductivityTip::getById($id);
        if (!$tip) {
            die("Tip not found");
        }
        $message = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['answer']) && trim($_POST['answer']) !== '') {
                if (Answer::create($id, $_POST['answer'])) {
                    $message = "Your answer has been submitted!";
                } else {
                    $message = "Error submitting your answer.";
                }
            } else {
                $message = "Please enter an answer.";
            }
        }
        $answers = [];
        if (isset($_GET['action']) && $_GET['action'] == 'show') {
            $answers = Answer::getByTipId($id);
        }
        if (isset($_GET['delete_id'])) {
            $delete_id = intval($_GET['delete_id']);
            if (Answer::delete($delete_id, $id)) {
                $deleteMessage = "Answer deleted successfully.";
            } else {
                $deleteMessage = "Error deleting the answer.";
            }
            // Refresh the answers list.
            $answers = Answer::getByTipId($id);
        }
        require __DIR__ . '/../Views/answer.php';
    }
}
?>
