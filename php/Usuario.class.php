<?php

require_once 'CRUD.class.php';
require_once 'Nivel.enum.php';

class Usuario extends CRUD
{
    protected static string $table = "Usuario";
    private ?int $id = null;
    private string $nome;
    private string $email;
    private Nivel $nivel;
    private string $senha;

    public function create(): bool
    {
        $sql = "INSERT INTO " . static::$table . " (nome, email, nivel, senha) VALUES (?, ?, ?, ?)";
        $params = [
            $this->nome,
            $this->email,
            $this->nivel->value,
            $this->senha
        ];

        return Database::execute($sql, $params);
    }

    public static function getByEmail(string $email): ?array
    {
        $result = self::getBy('email', $email);
        return $result ? $result[0] ?? null : null;
    }

    public function update(): bool
    {
        $sql = "UPDATE " . static::$table . " SET nome = ?, email = ?, nivel = ?, senha = ? WHERE id = ?";
        $params = [
            $this->nome,
            $this->email,
            $this->nivel->value,
            $this->senha,
            $this->id
        ];

        return Database::execute($sql, $params);
    }

    public function getNivel(): Nivel
    {
        return $this->nivel;
    }

    public function setNivel(Nivel $nivel): self
    {
        $this->nivel = $nivel;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this;
        }
        $this->email = $email;
        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {    
        $this->nome = $nome;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): self
    {
        $this->senha = password_hash($senha, PASSWORD_BCRYPT);
        return $this;
    }
}