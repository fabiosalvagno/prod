<?php
// app/Models/User.php
require_once __DIR__ . '/../../db/Database.php';

class User {
    public $id;
    public $username;
    public $email;
    public $password; // This stores the hashed password.
    public $created_at;
    
    // Find a user by username.
    public static function findByUsername($username) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $user = new User();
            $user->id = $row['id'];
            $user->username = $row['username'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->created_at = $row['created_at'];
            return $user;
        }
        return null;
    }

    // Create a new user.
    public static function create($username, $email, $password) {
        $db = Database::getInstance()->getConnection();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashedPassword);
        return $stmt->execute();
    }
}
?>
