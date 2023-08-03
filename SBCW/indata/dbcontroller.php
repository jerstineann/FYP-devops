<?php
    class DBController {
        private $host = "192.16.0.3";
        private $user = "sbc";
        private $pass = "fyp";
        private $dbname = "sbc";
        function __construct() {
            $this->conn = $this->connectDB();
        }
        function connectDB() {
            $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
            mysqli_set_charset($conn, "utf8");
            return $conn;
        }
        function runQuery($query) {
            $result = mysqli_query($this->conn, $query);
            $resultset = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
            }
            if (!empty($resultset)) {
                return $resultset;
            }
        }
        function numRows($query) {
            $result = mysqli_query($this->conn, $query);
            return mysqli_num_rows($result);
        }
    }
?>
