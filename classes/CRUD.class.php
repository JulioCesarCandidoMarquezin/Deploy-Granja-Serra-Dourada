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

    public static function update(array $data, int $id): void 
    {
        $fields = [];
        $params = [];
    
        foreach ($data as $key => $value) {
            $fields[] = "$key = ?";
            $params[] = $value;
        }
    
        $params[] = $id;
    
        $fieldsList = implode(", ", $fields);
    
        $sql = "UPDATE " . static::$table . " SET $fieldsList WHERE id = ?";
        self::execute($sql, $params);
    }    

    public static function delete(int $id): void 
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id = ?";
        self::execute($sql, [$id]);
    }

    public static function checkAndCreateTable(): void
    {
        $pdo = Database::connect();
    
        $sql = "SHOW TABLES LIKE '" . static::$table . "'";
        $checkStmt = $pdo->prepare($sql);
        $checkStmt->execute();
    
        if ($checkStmt->rowCount() === 0) {
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
    }   
    
    public static function execute(string $sql, array $params): PDOStatement
    {
        self::checkAndCreateTable();

        $stmt = Database::prepare($sql);
        $stmt->execute($params);
        
        return $stmt;
    }
}
