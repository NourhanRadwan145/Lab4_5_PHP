
<?php
// Require Composer's autoloader
require_once "vendor/autoload.php";

class Database {
    private $connection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql) {
        if (DEBUG_MODE) {
            echo "SQL Query: $sql<br>";
        }
        return $this->connection->query($sql);
    }

    public function fetchArray($result) {
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function numRows($result) {
        return $result->num_rows;
    }

    public function close() {
        $this->connection->close();
    }
}
?>