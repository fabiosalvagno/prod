<?php
// app/Models/Answer.php
require_once __DIR__ . '/../../db/Database.php';

class Answer {
    public $id;
    public $tip_id;
    public $answer;
    public $created_at;

    // Get answers by tip id.
    public static function getByTipId($tip_id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM answers WHERE tip_id = ? ORDER BY created_at DESC");
        $stmt->bind_param("i", $tip_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $answers = [];
        while ($row = $result->fetch_assoc()) {
            $a = new Answer();
            $a->id = $row['id'];
            $a->tip_id = $row['tip_id'];
            $a->answer = $row['answer'];
            $a->created_at = $row['created_at'];
            $answers[] = $a;
        }
        return $answers;
    }

    // Create a new answer.
    public static function create($tip_id, $answer_text) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO answers (tip_id, answer) VALUES (?, ?)");
        $stmt->bind_param("is", $tip_id, $answer_text);
        return $stmt->execute();
    }

    // Delete an answer.
    public static function delete($answer_id, $tip_id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM answers WHERE id = ? AND tip_id = ?");
        $stmt->bind_param("ii", $answer_id, $tip_id);
        return $stmt->execute();
    }
}
?>
