<?php
// db/Database.php
class Database {
    private static $instance = null;
    private $conn;

    // Update with your own credentials
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "productivity";

    // Private constructor to prevent multiple instances.
    private function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Get the singleton instance.
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Return the database connection.
    public function getConnection() {
        return $this->conn;
    }
}
?>
