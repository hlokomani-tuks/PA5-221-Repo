<?php
    session_start();

    if(!isset($_SESSION['UserName'])) $_SESSION['UserName'] = "";
    if(!isset($_SESSION['LoggedIN'])) $_SESSION['LoggedIN'] = false;
    if(!isset($_SESSION['Email'])) $_SESSION['Email'] = "";
    if(!isset($_SESSION['Type'])) $_SESSION['Type'] = "";


    include 'functions.php';

    class Database {
        public string $servername = "";
        public string $username = "";
        public string $password = "";
        public string $database = "";

        public mysqli $connection;

        public static function instance($servername, $username, $password, $database): ?Database
        {
            static $instance = null;
            if($instance === null) $instance = new Database($server, $username, $password, $database);
            return $instance;
        }

        public function __construct($servername, $username, $password, $database) {
            $this->server = $server;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;

            $this->connect();
        }

        public function connect() {
            $this->connection = new mysqli($this->servername,$this->username,$this->password, $this->database);

            if($this->connection->connect_error) die("Connection failure: ".$this->connection->connect_error);
            else js_console_log("db connected!");
        }

        public function getConnection(): mysqli
        {
            return $this->connection;
        }

        public function query($sql){
            return $this->connection->query($sql);
        }

        public function prepareStatement($sql) {
            return $this->connection->prepare($sql);
        }

        public function __destruct() {
        }
    }

    class PA5{
        public static string $_server = "localhost";
        public static string $_username = "PA5";
        public static string $_password = "admin";
        public static string $_database = "db";

        public Database $db;

        public static function instance(): ?Database
        {
            return Database::instance(PA5::$_server, PA5::$_username, PA5::$_password, PA5::$_database);
        }

        public static function conn(): ?PA5
        {
            static $conn = null;
            if($conn === null) $conn = new PA5();
            return $conn;
        }

        public function __construct() {
            $this->db = new Database(PA5::$_server, PA5::$_username, PA5::$_password, PA5::$_database);
        }

        public function __destruct() {
            $this->db->__destruct();
        }

        public function insertUser($fname, $lname, $uname, $email, $password): bool
        {
            $stmt = $this->db->prepareStatement("SELECT email FROM USER WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            if ($stmt->get_result()->num_rows > 0)
                return false;

            $hash = password_hash($password, PASSWORD_ARGON2ID);

            $stmt = $this->db->prepareStatement("INSERT INTO USER (email, fname, lname, hash, type, uname) VALUES (?, ?, ?, ?, 'default', ?);");
            $stmt->bind_param("sssss", $email, $fname, $lname, $hash, $uname);
            return $stmt->execute();
        }

        public function getUserData($email) {
            $stmt = $this->db->prepareStatement("SELECT * FROM USER WHERE 1 AND email = ? LIMIT 1;");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            return $stmt->get_result();
        }

        public function getResultRow($result) {
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }
            return null;
        }

        public function getResultRowArr($result): array
        {
            $resArr = array();
            for ($i=0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                $resArr[$i] = $row;
            }
            return $resArr;
        }

        public function getResultValue($result, $value) {
            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                return $row[$value];
            }
            return null;
        }

        public function getResultValueArr($result, $value): array
        {
            $resArr = array();
            for ($i=0; $i < $result->num_rows; $i++) { 
                $row = $result->fetch_assoc();
                $resArr[$i] = $row[$value];
            }
            return $resArr;
        }

        public function userLogin($email, $password): bool
        {
            $result = $this->getUserData($email);
            if ($result->num_rows != 1) {
                $_SESSION['LoggedIN'] = false;
                return false;
            } else {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['hash'])) {
                    $_SESSION['LoggedIN'] = true;
                    $_SESSION['Email'] = $email;
                    $_SESSION['UserName'] = $row['uname'];
                    $_SESSION['Type'] = $row['type'];
                } else {
                    $_SESSION['LoggedIN'] = false;
                }
            }

            return $_SESSION['LoggedIN'];
        }

        
    }
    include 'connection.php';
    $conn = PA5::conn();

    $user_email = "";
    $key = "";
?>