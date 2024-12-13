<?php
final class Database
{
    private static string $driver = "mysql"; 
    private static string $host = "db"; 
    private static string $dbname = "granja-serra-dourada"; 
    private static int $port = 3306; 
    private static string $username = "admin"; 
    private static string $password = "admin"; 
    private static string $charset = "utf8mb4"; 
    private static ?PDO $pdo = null;
    private static string $error;

    public static function connect()
    {
        if (self::$pdo === null) {
            if (self::$driver === "mysql") {
                $dsn = "mysql:host=" . self::$host . "; port=" . self::$port . ";dbname=" . self::$dbname . ";charset=" . self::$charset;
            } elseif (self::$driver === "pgsql") {
                $dsn = "pgsql:host=" . self::$host . "; port=" . self::$port . ";dbname=" . self::$dbname;
            } else {
                throw new Exception("Driver de banco de banco e dados não suportado" . self::$driver);
            }

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_PERSISTENT => false, 
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            try {
                self::$pdo = new PDO($dsn, self::$username, self::$password, $options);
            } catch (PDOException $e) {
                self::$error = $e->getMessage();
                echo "Erro de conexão" . self::$error;
            }
        }

        return self::$pdo;
    }

    public static function prepare($sql)
    {
        $pdo = self::connect();
        if ($pdo) {
            return $pdo->prepare($sql);
        }
        return false;
    }
}