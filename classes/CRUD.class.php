<?php

require_once 'Database.class.php';

abstract class CRUD
{
    protected static string $table;
    protected static array $columns;

    abstract public function create(): void;

    public static function get(int $id): ?array
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id = ?";
        $stmt = self::execute($sql, [$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public static function all(): array
    {
        $sql = "SELECT * FROM " . static::$table;
        $stmt = self::execute($sql, []);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update(array $data, int $id): bool
    {
        if (empty($data)) {
            throw new InvalidArgumentException("Data array cannot be empty.");
        }

        $fields = [];
        $params = [];

        foreach ($data as $key => $value) {
            $fields[] = "$key = ?";
            $params[] = $value;
        }

        $params[] = $id;

        $fieldsList = implode(", ", $fields);
        $sql = "UPDATE " . static::$table . " SET $fieldsList WHERE id = ?";
        
        return self::execute($sql, $params)->rowCount() > 0; // Return true if update was successful
    }

    public static function delete(int $id): bool
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id = ?";
        return self::execute($sql, [$id])->rowCount() > 0; // Return true if delete was successful
    }

    public static function checkAndCreateTable(): void
    {
        $pdo = Database::connect();

        $sql = "SHOW TABLES LIKE ?";
        $checkStmt = $pdo->prepare($sql);
        $checkStmt->execute([static::$table]);

        if ($checkStmt->rowCount() === 0) {
            self::createTable($pdo);
        }
    }

    private static function createTable(PDO $pdo): void
    {
        $columnsList = [];
        foreach (static::$columns as $column => $type) {
            $columnsList[] = "$column $type";
        }

        $createSQL = "CREATE TABLE " . static::$table . " (
            id INT AUTO_INCREMENT PRIMARY KEY,
            " . implode(", ", $columnsList) . "
        )";

        $createStmt = $pdo->prepare($createSQL);
        $createStmt->execute();
    }

    public static function execute(string $sql, array $params): PDOStatement|bool
    {
        self::checkAndCreateTable();

        $stmt = Database::prepare($sql);
        $stmt->execute($params);

        return $stmt;
    }
}