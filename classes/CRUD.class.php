<?php

require_once 'Database.class.php';

abstract class CRUD
{
    protected static string $table;

    abstract public function create(): bool;
    abstract public function update(): bool;

    public static function get(int $id): ?array
    {
        return Database::executeQuery("SELECT * FROM " . static::$table . " WHERE id = ?", [$id]);
    }

    public static function getBy(string $campo, mixed $value): array
    {
        return Database::executeQuery("SELECT * FROM " . static::$table . " WHERE $campo = ?", [$value]);
    }

    public static function all(): array
    {
        return Database::executeQuery("SELECT * FROM " . static::$table);
    }

    public static function delete(int $id): bool
    {
        return Database::execute("DELETE FROM " . static::$table . " WHERE id = ?", [$id]); 
    }
}