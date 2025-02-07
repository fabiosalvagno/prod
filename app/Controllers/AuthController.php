<?php
// app/Controllers/AuthController.php
require_once __DIR__ . '/../Models/User.php';

class AuthController {
    public function login() {
        // if (session_status() === PHP_SESSION_NONE) {
        //     session_start();
        // }
        
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            if ($username && $password) {
                $user = User::findByUsername($username);
                if ($user && password_verify($password, $user->password)) {
                    // Successful login
                    $_SESSION['user_id'] = $user->id;
                    $_SESSION['username'] = $user->username;
                    header("Location: /");
                    exit;
                } else {
                    $message = "Invalid username or password.";
                }
            } else {
                $message = "Please fill in all fields.";
            }
        }
        require __DIR__ . '/../Views/login.php';
    }
    
    public function register() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username         = trim($_POST['username']);
            $email            = trim($_POST['email']);
            $password         = trim($_POST['password']);
            $confirm_password = trim($_POST['confirm_password']);
            if ($username && $email && $password && $confirm_password) {
                if ($password === $confirm_password) {
                    if (User::findByUsername($username)) {
                        $message = "Username already exists.";
                    } else {
                        if (User::create($username, $email, $password)) {
                            header("Location: /login");
                            exit;
                        } else {
                            $message = "Registration failed. Please try again.";
                        }
                    }
                } else {
                    $message = "Passwords do not match.";
                }
            } else {
                $message = "Please fill in all fields.";
            }
        }
        require __DIR__ . '/../Views/register.php';
    }
    
    public function logout() {
        session_start();
        session_destroy();
        header("Location: /");
        exit;
    }
}
?>
