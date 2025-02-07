<?php
// app/Models/ProductivityTip.php
require_once __DIR__ . '/../../db/Database.php';

class ProductivityTip {
    public $id;
    public $title;
    public $explanation;
    public $key_question;

    // Fetch all tips.
    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM productivity_tips";
        $result = $db->query($sql);
        $tips = [];
        while ($row = $result->fetch_assoc()) {
            $tip = new ProductivityTip();
            $tip->id = $row['id'];
            $tip->title = $row['title'];
            $tip->explanation = $row['explanation'];
            $tip->key_question = $row['key_question'];
            $tips[] = $tip;
        }
        return $tips;
    }

    // Get a tip by ID.
    public static function getById($id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM productivity_tips WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $tip = new ProductivityTip();
            $tip->id = $row['id'];
            $tip->title = $row['title'];
            $tip->explanation = $row['explanation'];
            $tip->key_question = $row['key_question'];
            return $tip;
        }
        return null;
    }
}
?>
