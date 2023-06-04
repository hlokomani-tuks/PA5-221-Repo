<?php

class Database {
    private static $connection = null;

    private static $host = "wheatley.cs.up.ac.za";
    private static $database = "u22506889_PA5";
    private static $password = "SQZMUYWXTZSQURHKCBDKQQ6RDGAI6LYX";
    private static $user = "u22506889";

    /* To avoid confusion with any function in config.php:
     * 
     * This function should be called once at the beginning of each script
     * that needs to connect to the database. The connection can then
     * be put in a variable and used.
     * 
     * The point of this class is to not have to repeat credentials 
     * and to automatically return an error and exit if connecting fails.
     * 
     * The the first if statement is just to allow getting the connection
     * at different scopes in the same script. 
     */
    public static function getConnection(): mysqli {
        if (self::$connection != null)
            return self::$connection;
        
        self::$connection = new mysqli(
            self::$host,
            self::$user,
            self::$password,
            self::$database
        );

        if (self::$connection->connect_error) {
            header("HTTP/1.1 500 Internal Server Error");
            die("Error connecting: " . self::$connection->connect_error);
        }

        return self::$connection;
    }
}

?>