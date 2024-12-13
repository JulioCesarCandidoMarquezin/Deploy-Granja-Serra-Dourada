<?php

require_once 'CRUD.class.php';
require_once 'Nivel.enum.php';

class Usuario extends CRUD
{
    protected static string $table = "Usuario";
    protected static array $columns = [
        'nome' => 'VARCHAR(50)',
        'email' => 'VARCHAR(255)',
        'nivel' => 'ENUM("administrador", "gerente", "funcionario")',
        'senha' => 'VARCHAR(255)'
    ];

    private ?int $id = null;
    private string $nome;
    private string $email;
    private Nivel $nivel;
    private string $senha;

    public function create(): void
    {
        if (empty($this->nome) || empty($this->email) || empty($this->senha) || !isset($this->nivel)) {
            throw new InvalidArgumentException("All fields must be set before creating a user.");
        }

        $fields = ['nome', 'email', 'nivel', 'senha'];
        $values = [$this->nome, $this->email, $this->nivel->value, password_hash($this->senha, PASSWORD_BCRYPT)];
        $params = $values;

        $fieldsList = implode(", ", $fields);
        $valuesList = implode(", ", array_fill(0, count($values), "?"));

        $sql = "INSERT INTO " . static::$table . " ($fieldsList) VALUES ($valuesList)";
        self::execute($sql, $params);
    }

    public static function emailExists(string $email): bool
    {
        $sql = "SELECT COUNT(*) FROM " . static::$table . " WHERE email = ?";
        $stmt = Database::prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
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
            throw new InvalidArgumentException("Invalid email format.");
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
        if (empty($nome)) {
            throw new InvalidArgumentException("Name cannot be empty.");
        }
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
        if (strlen($senha) < 6) {
            throw new InvalidArgumentException("Password must be at least 6 characters long.");
        }
        $this->senha = $senha;
        return $this;
    }
}