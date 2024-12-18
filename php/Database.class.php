<?php

final class Database
{
    private static string $driver = "pgsql"; 
    private static string $host = "dpg-cthckg9opnds73b27ic0-a"; 
    private static string $dbname = "granja_serra_dourada"; 
    private static int $port = 3306; 
    private static string $username = "granja_serra_dourada_user"; 
    private static string $password = "XrAuvQhiE2WJeoXnnrh4F1VAd0KQCgmB"; 
    private static string $charset = "utf8mb4"; 
    private static ?PDO $pdo = null;

    public static function connect(): ?PDO
    {
        return self::$pdo ?? self::initializeConnection();
    }

    private static function initializeConnection(): PDO
    {
        $dsn = self::getDsn();
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_PERSISTENT => false, 
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            self::$pdo = new PDO($dsn, self::$username, self::$password, $options);
            return self::$pdo;
        } catch (PDOException $e) {
            throw new Exception("Connection error: " . $e->getMessage());
        }
    }

    private static function getDsn(): string
    {
        return match (self::$driver) {
            "mysql" => "mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbname . ";charset=" . self::$charset,
            "pgsql" => "pgsql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbname,
            default => throw new Exception("Unsupported database driver: " . self::$driver),
        };
    }

    public static function prepare(string $sql): ?PDOStatement
    {
        $pdo = self::connect();
        return $pdo ? $pdo->prepare($sql) : null;
    }

     public static function execute(string $sql, array $params = []): bool
    {
        $stmt = self::prepare($sql);
        if ($stmt) {
            return $stmt->execute($params);
        }
        return false;
    }

    public static function executeQuery(string $sql, array $params = []): array
    {
        $stmt = self::prepare($sql);

        if ($stmt) {
            $stmt->execute($params);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        return [];
    }
}